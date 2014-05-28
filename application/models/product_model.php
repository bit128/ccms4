<?php
/**
* 商品 - 模型
* ======
* @author 洪波
* @version 13.10.22
*/
class Product_model extends CI_Model {

	public function getAttributes()
	{
		return array('pd_id', 'pd_name', 'pd_no', 'pd_category', 'pd_click', 'pd_utime', 'pd_status');
	}

	/**
	* 创建新商品
	* ======
	* @param $data 		商品数据
	* @param $detail 	商品详情数据
	* ======
	* @author 洪波
	* @version 13.10.22
	*/
	public function create($data, $detail)
	{
		//新增商品详情数据
		$this->db->insert('t_product_detail', $detail);
		//新增商品数据
		return $this->db->insert('t_product', $data);
	}

	/**
	* 更新商品数据
	* ======
	* @param $pd_id 	商品id
	* @param $data 		商品数据
	* ======
	* @author 洪波
	* @version 13.10.22
	*/
	public function update($pd_id, $data)
	{
		//更新商品数据
		return $this->db->where('pd_id', $pd_id)
			->update('t_product', $data);
	}

	/**
	* 更新商品详情数据
	* ======
	* @param $pd_id 	商品id
	* @param $data 		商品详情数据
	* ======
	* @author 洪波
	* @version 13.10.23
	*/
	public function updateDetail($pd_id, $detail)
	{
		//更新商品详情数据
		return $this->db->where('pd_id', $pd_id)
			->update('t_product_detail', $detail);
	}

	/**
	* 获取商品信息
	* ======
	* @param $pd_id 	商品id
	* @param $image 	是否获取图片 0不需要|1主图|2全部图片
	* @param #fields 	检索字段
	* ======
	* @author 洪波
	* @version 13.10.22
	*/
	public function get($pd_id, $detail = 0, $image = 0, $fields = array())
	{
		//TODO 后期使用 right join 联表查询
		//获取商品基本信息
		if(! $fields)
		{
			$fields = $this->getAttributes();
		}
		$product = $this->db->select($fields)
			->where('pd_id', $pd_id)
			->get('t_product')
			->row_array();
		//获取详情
		if($product && $detail)
		{
			$detail = $this->db->select('pd_detail')
				->get_where('t_product_detail', array('pd_id' => $pd_id))
				->row();
			$product['pd_detail'] = $detail->pd_detail;
		}
		//获取商品图片
		if($product && $image)
		{
			$images = $this->db->select('pdi_name')
				->where('pd_id', $pd_id)
				->order_by('pdi_sort')
				->get('t_product_image')
				->result_array();
			if($images)
			{
				//获取主图
				if($image == 1)
				{
					$product['pd_image'] = $images[0]['pdi_name'];
				}
				elseif($image == 2)
				{
					foreach ($images as $img)
					{
						$product['pd_image'][] = $img['pdi_name'];
					}
				}
			}
		}

		return $product;
	}

	/**
	* 获取商品列表
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* @param $condition 查询条件
	* @param $order  	排序
	* @param $fields 	检索字段
	* ======
	* @author 洪波
	* @version 13.10.23
	*/
	public function getList($offset, $limit, $condition, $order = "pd_utime desc", $fields = array())
	{
		//检索字段
		if(! $fields)
		{
			$fields = $this->getAttributes();
		}
		//统计总数
		$count = $this->db->select('pd_id')
			->get_where('t_product', $condition)
			->num_rows();
		//查询数据
		$result = $this->db->select($fields)
			->where($condition)
			->from('t_product')
			->limit($limit, $offset)
			->order_by($order)
			->get()
			->result_array();

		return array('count'=>$count, 'result'=>$result);
	}

	/**
	* 根据条件获取商品快捷菜单列表
	* ======
	* @param $condition 	查询条件
	* @param $limit 		查询行数
	* @param $order 		排序字段
	* @param $oren 			排序索引
	* ======
	* @author 洪波
	* @version 14.03.02
	*/
	public function getExpressList($condition, $limit = 10, $order = 'pd_utime', $oren = 'desc')
	{
		return $this->db->select('pd_id,pd_name,pd_category')
			->from('t_product')
			->where($condition)
			->limit($limit)
			->order_by($order, $oren)
			->get()
			->result_array();
	}

	/**
	* 删除商品
	* ======
	* @param $pd_id 	商品id
	* ======
	* @author 洪波
	* @version 13.10.23
	*/
	public function delete($pd_id)
	{
		//删除商品图片
		$this->deleteImageMore($pd_id);
		//删除常见问题
		$this->deleteQuestionMore($pd_id);
		//删除商品附件
		$this->deleteAnnexMore($pd_id);
		//删除商品数据
		return $this->db->where('pd_id', $pd_id)
			->delete('t_product');
	}

	/**
	* 删除多个商品
	* ======
	* @param $condition 	删除条件
	* ======
	* @author 洪波
	* @version 13.10.23
	*/
	public function deleteMore($condition)
	{
		//删除图片数据
		$pd_ids = $this->db->select('pd_id')
			->get_where('t_product', $condition)
			->result_array();
		foreach ($pd_ids as $v) {
			$this->deleteImageMore($v['pd_id']);
		}
		//删除商品数据
		return $this->db->where($condition)
			->delete('t_product');
	}

	/**
	* 统计点击量（或计数）
	* ======
	* @param $pd_id 	商品id
	* ======
	* @author 洪波
	* @version 14.03.02
	*/
	public function click($pd_id)
	{
		$sql = "update t_product set pd_click = pd_click + 1 where pd_id = '{$pd_id}'";
		return $this->db->query($sql);
	}

//=============================== 图片

	/**
	* 添加商品图片
	* ======
	* @param $pd_id 	商品id
	* @param $pdi_name 	图片地址
	* ======
	* @author 洪波
	* @version 13.10.23
	*/
	public function addImage($pd_id, $pdi_name)
	{
		//获取图片最大排序因子
		$max = $this->db->select_max('pdi_sort')
			->get_where('t_product_image', array('pd_id'=>$pd_id))
			->row();
		if(! $max)
			$pdi_sort = 1;
		else
			$pdi_sort = $max->pdi_sort + 1;

		$data = array(
			'pdi_name' => $pdi_name,
			'pd_id' => $pd_id,
			'pdi_sort' => $pdi_sort
			);
		return $this->db->insert('t_product_image', $data);
	}

	/**
	* 获取商品图片列表
	* ======
	* @param $pd_id 	商品id
	* ======
	* @author 洪波
	* @version 13.11.20
	*/
	public function getImageList($pd_id)
	{
		$images = $this->db->select('pdi_name,pd_id,pdi_sort')
			->where('pd_id', $pd_id)
			->order_by('pdi_sort', 'asc')
			->get('t_product_image')
			->result_array();

		return array(
			'count' => count($images),
			'result' => $images
			);
	}

	/**
	* 排序商品图片
	* ======
	* @param $pdi_name 	图片地址
	* @param $op 		操作(up上移|down下移)
	* ======
	* @author 洪波
	* @version 13.10.23
	*/
	public function sortImage($pdi_name, $op)
	{
		//获取当前图片pd_id和pdi_sort
		$now = $this->db->select("pd_id,pdi_sort")
			->get_where('t_product_image', array('pdi_name'=>$pdi_name))
			->row();
		$pd_id = $now->pd_id;
		$self_sort = $now->pdi_sort;

		//上移操作
		if($op == '0' && $self_sort > 1)
		{
			$condition = "pd_id = '{$pd_id}' AND pdi_sort < {$self_sort}";
			$order = 'desc';
		}
		//下移操作
		elseif ($op == '1')
		{
			$condition = "pd_id = '{$pd_id}' AND pdi_sort > {$self_sort}";
			$order = 'asc';
		}
		else
		{
			return 0;
		}
		//获取相对操作对象
		$other = $this->db->select('pdi_name,pdi_sort')
			->where($condition)
			->order_by('pdi_sort', $order)
			->get('t_product_image')
			->row();
		if($other)
		{
			$new_sort = $other->pdi_sort;
			//更新相对对象
			$flag_1 = $this->db->where('pdi_name', $other->pdi_name)
				->update('t_product_image', array('pdi_sort' => $self_sort));
			//更新操作对象
			$flag_2 = $this->db->where('pdi_name', $pdi_name)
				->update('t_product_image', array('pdi_sort' => $new_sort));

			if($flag_1 && $flag_2)
				return 1;
			else
				return 0;
		}
		else
		{
			return 0;
		}
	}

	/**
	* 删除商品图片
	* ======
	* @param $pdi_name 	商品图片名称
	* ======
	* @author 洪波
	* @version 13.10.23
	*/
	public function deleteImage($pdi_name)
	{
		if($pdi_name != '' && $pdi_name != 'default.jpg')
		{
			//删除图片文件
			@unlink('./uploads/product/' . $pdi_name);
			@unlink('./uploads/product/tb_' . $pdi_name);
			//删除数据
			$this->db->where('pdi_name', $pdi_name)
				->delete('t_product_image');
		}
	}

	/**
	* 删除商品全部图片
	* ======
	* @param $pd_id 	商品id
	* ======
	* @author 洪波
	* @version 13.10.23
	*/
	public function deleteImageMore($pd_id)
	{
		$condition = array('pd_id'=>$pd_id);
		//删除图片文件
		$images = $this->db->select('pdi_name')
			->get_where('t_product_image', $condition)
			->result_array();
		foreach ($images as $v)
		{
			@unlink('./uploads/product/' . $v['pdi_name']);
			@unlink('./uploads/product/tb_' . $v['pdi_name']);
		}
		//删除图片数据
		$this->db->where($condition)
			->delete('t_product_image');
	}

//================================ 常见问题

	/**
	* 添加商品常见问题
	* ======
	* @param $data 	常见问题数据
	* ======
	* @author 洪波
	* @version 14.03.23
	*/
	public function addQuestion($data)
	{
		$data['pdq_id'] = uniqid();
		return $this->db->insert('t_product_question', $data);
	}

	/**
	* 更新常见问题
	* ======
	* @param $pdq_id 	问题id
	* @param $data 		问题数据
	* ======
	* @author 洪波
	* @version 14.03.23
	*/
	public function updateQuestion($pdq_id, $data)
	{
		return $this->db->where('pdq_id', $pdq_id)
			->update('t_product_question', $data);
	}

	/**
	* 变更常见问题状态
	* ======
	* @param $pdq_id 		问题id
	* @param $pdq_status 	问题状态
	* ======
	* @author 洪波
	* @version 14.03.23
	*/
	public function changeQuestionStatus($pdq_id, $pdq_status)
	{
		return $this->updateQuestion($pdq_id, array('pdq_status'=>$pdq_status));
	}

	/**
	* 获取常见问题列表
	* ======
	* @param $pd_id 		商品id
	* @param $pdq_status 	常见问题状态
	* ======
	* @author 洪波 
	* @version 14.03.23
	*/
	public function getQuestionList($pd_id, $pdq_status = '-1')
	{
		$condition = array(
			'pd_id' => $pd_id
			);
		if($pdq_status != '-1')
		{
			$condition['pdq_status'] = $pdq_status;
		}

		return $this->db->get_where('t_product_question', $condition)
			->result_array();
	}

	/**
	* 删除单个常见问题
	* ======
	* @param $pdq_id 	商品id
	* ======
	* @author 洪波
	* @version 14.03.23
	*/
	public function deleteQuestion($pdq_id)
	{
		return $this->db->where('pdq_id', $pdq_id)
			->delete('t_product_question');
	}

	/**
	* 删除商品常见问题
	* ======
 	* @param $pd_id 商品id
	* ======
	* @author 洪波
	* @version 14.03.23
	*/
	public function deleteQuestionMore($pd_id)
	{
		return $this->db->where('pd_id', $pd_id)
			->delete('t_product_question');
	}

//=========================== 资料

	/**
	* 添加商品附件
	* ======
	* @param $data 	资料数据
	* ======
	* @author 洪波
	* @version 14.03.25
	*/
	public function addAnnex($data)
	{
		$data['pda_id'] = uniqid();
		$data['pda_time'] = time();
		return $this->db->insert('t_product_annex', $data);
	}

	/**
	* 获取商品附件列表
	* ======
	* @param $offset 		起始位置
	* @param $limit 		查询行数
	* @param $pd_id 	 	商品id
	* @param $pda_status 	附件状态
	* ======
	* @author 洪波
	* @version 14.03.25
	*/
	public function getAnnexList($offset, $limit, $pd_id, $pda_status = '-1')
	{
		$condition = array('pd_id' => $pd_id);
		if($pda_status != '-1')
		{
			$condition['pda_status'] = $pda_status;
		}
		//统计数量
		$count = $this->db->select('pda_id')
			->get_where('t_product_annex', $condition)
			->num_rows();
		//获取数据
		$result = $this->db->where($condition)
			->from('t_product_annex')
			->limit($limit, $offset)
			->order_by('pda_time', 'desc')
			->get()
			->result_array();
		foreach($result as $k => $v)
		{
			$result[$k]['pda_time'] = date('Y-m-d', $v['pda_time']);
		}

		return array('count' => $count, 'result' => $result);
	}

	/**
	* 变更商品附件状态
	* ======
	* @param $pda_id 		附件id
	* @param $pda_status 	附件状态
	* ======
	* @author 洪波
	* @version 14.03.25
	*/
	public function changeAnnexStatus($pda_id, $pda_status)
	{
		return $this->db->where('pda_id', $pda_id)
			->update('t_product_annex', array('pda_status' => $pda_status));
	}

	/**
	* 删除单个附件
	* ======
	* @param $pda_id 	商品附件id
	* ======
	* @author 洪波
	* @version 14.03.25
	*/
	public function deleteAnnex($pda_id)
	{
		$condition = "pda_id = '{$pda_id}'";
		//获取附件信息
		$annex = $this->db->select('pda_src')
			->get_where('t_product_annex', $condition)
			->row();
		//如果附件存在
		if($annex)
		{
			//删除附件文件
			@unlink('./uploads/product/' . $annex->pda_src);
			//删除附件数据
			$this->db->where($condition)
				->delete('t_product_annex');
		}
	}

	/**
	* 删除商品附件
	* ======
	* @param $pd_id 商品id
	* ======
	* @author 洪波
	* @version 14.03.25
	*/
	public function deleteAnnexMore($pd_id)
	{
		return $this->db->where('pd_id', $pd_id)
			->delete('t_product_annex');
	}

}