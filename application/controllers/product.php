<?php
/**
* 商品 - 控制器
* ======
* @author 洪波
* @version 13.10.22
*/
class Product extends CI_Controller {

	public $nav_index = 40;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model', 'product');
		$this->load->model('Target_model', 'target');
		$this->load->model('Admin_model', 'admin');
	}

	/**
	* 商品详情 - 页面
	* ======
	* @author 洪波
	* @version 13.11.20
	*/
	public function productDetail($pd_id = '')
	{
		if($this->admin->validate(8))
		{
			$product = array(
				'pd_id' => '',
				'pd_name' => '',
				'pd_no' => '',
				'pd_category' => '',
				'pd_click' => 0,
				'target' => '',
				'pd_status' => 1,
				'pd_detail' => ''
				);
			$target = '[]';
			if($pd_id != '')
			{
				//获取商品详情
				if($rs = $this->product->get($pd_id, 1))
				{
					$product = $rs;
				}
				$target = json_encode($this->target->getTargetByProduct($pd_id));
			}

			$data = array(
				'product' => $product,
				'target' => $target
				);
			$this->load->view('admin/v_product_detail', $data);
		}
		else
		{
			echo '权限不足';
		}
	}

	/**
	* 商品列表 - 页面
	* ======
	* @author 洪波
	* @version 13.11.20
	*/
	public function productList($offset = '0', $keyword = '0')
	{
		if($this->admin->validate(8))
		{
			$this->nav_index = 41;
			$this->load->library('pagination');

			$limit = 20;
			$condition = array();
			if($keyword != '0')
			{
				$keyword = urldecode($keyword);
				$condition = "pd_name like '%{$keyword}%'";
			}
			$result = $this->product->getList($offset, $limit, $condition);
			//分页
			$config['base_url'] = site_url('product/productList');
	        $config['suffix'] = '/'.$keyword;
	        $config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
	        $config['total_rows'] = $result['count'];
	        $config['per_page'] = $limit;
	        $this->pagination->initialize($config);
	        $pages = $this->pagination->create_links();
			$data = array(
				'product' => $result['result'],
				'pages' => $pages
				);
			$this->load->view('admin/v_product_list', $data);
		}
		else
		{
			echo '权限不足';
		}
	}

//================================= 产品逻辑

	/**
	* 添加产品数据
	* ======
	* @author 洪波
	* @version 13.11.20
	*/
	public function addProduct()
	{
		$pd_id = uniqid();
		$data = array(
			'pd_id' => $pd_id,
			'pd_name' => $this->input->post('pd_name'),
			'pd_no' => $this->input->post('pd_no'),
			'pd_category' => $this->input->post('pd_category'),
			'pd_click' => 0,
			'pd_utime' => time(),
			'pd_status' => $this->input->post('pd_status')
			);
		$detail = array(
			'pd_id' => $pd_id,
			'pd_detail' => $this->input->post('pd_detail')
			);
		$targets = $this->input->post('target');

		if($this->product->create($data, $detail))
		{
			$pd_id = $data['pd_id'];
			//添加商品标签
			if($targets != '')
			{
				$targets = explode('-', $targets);
				foreach ($targets as $v)
				{
					if($v != '')
					{
						$this->target->addProductIndex($pd_id, $v);
					}
				}
			}
			echo $pd_id;
		}
		else
		{
			echo 0;
		}
	}

	/**
	* 更新产品数据
	* ======
	* @author 洪波
	* @version 13.11.20
	*/
	public function updateProduct()
	{
		$pd_id = $this->input->post('pd_id');
		$data = array(
			'pd_name' => $this->input->post('pd_name'),
			'pd_no' => $this->input->post('pd_no'),
			'pd_category' => $this->input->post('pd_category'),
			'pd_utime' => time(),
			'pd_status' => $this->input->post('pd_status')
			);
		$detail = array(
			'pd_detail' => $this->input->post('pd_detail')
			);
		$targets = $this->input->post('target');
		$rs1 = $this->product->update($pd_id, $data);
		$rs2 = $this->product->updateDetail($pd_id, $detail);
		if($rs1 || $rs2)
		{
			//删除旧商品标签
			$this->target->deleteProductIndex($pd_id);
			//添加新商品标签
			if($targets != '')
			{
				$targets = explode('-', $targets);
				foreach ($targets as $v)
				{
					if($v != '')
					{
						$this->target->addProductIndex($pd_id, $v);
					}
				}
			}
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	/**
	* 根据条件获取商品快捷菜单列表
	* ======
	* @author 洪波
	* @version 14.03.02
	*/
	public function getExpressList()
	{
		$condition = $this->input->post('condition');
		$limit = $this->input->post('limit');
		$order = $this->input->post('order');
		$oren = $this->input->post('oren');

		$list = $this->product->getExpressList($condition, $limit, $order, $oren);
		echo json_encode($list);
	}

	/**
	* 变更商品状态
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function changeStatus()
	{
		$pd_id = $this->input->post('pd_id');
		$data = array(
			'pd_status' => $this->input->post('pd_status')
			);

		echo $this->product->update($pd_id, $data);
	}

	/**
	* 删除商品
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function deleteProduct()
	{
		if($pd_id = $this->input->post('pd_id'))
		{
			//删除商品
			$this->product->delete($pd_id);
		}
	}

	/**
	* 增加商品统计数量
	* ======
	* @param $pd_id 	商品id
	* ======
	* @author 洪波
	* @version 14.03.02
	*/
	public function clickProduct($pd_id)
	{
		echo $this->product->click($pd_id);
	}

//=================================== 产品图片逻辑

	/**
	* 添加商品图片
	* ======
	* @author 洪波
	* @version 13.11.20
	*/
	public function addImage()
	{
		$pd_id = $this->input->post('pd_id');
		$pdi_name = $this->input->post('pdi_name');

		echo $this->product->addImage($pd_id, $pdi_name);
	}

	/**
	* 获取商品图片列表
	* ======
	* @param $pd_id 	商品id
	* ======
	* @author 洪波
	* @author 13.11.20
	*/
	public function getImageList($pd_id)
	{
		echo json_encode($this->product->getImageList($pd_id));
	}

	/**
	* 删除商品图片
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function deleteImage()
	{
		$pdi_name = $this->input->post('pdi_name');
		echo $this->product->deleteImage($pdi_name);
	}

	/**
	* 排序商品图片
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function sortImage()
	{
		$pdi_name = $this->input->post('pdi_name');
		$op = $this->input->post('op');

		echo json_encode($this->product->sortImage($pdi_name, $op));
	}

//========================== 产品常见问题逻辑

	/**
	* 添加常见问题
	* ======
	* @author 洪波
	* @version 14.03.23
	*/
	public function addQuestion()
	{
		if($pd_id = $this->input->post('pd_id'))
		{
			$pdq_question = $this->input->post('pdq_question');
			$pdq_answer = $this->input->post('pdq_answer');
			$pdq_status = $this->input->post('pdq_status');

			$data = array(
				'pd_id' => $pd_id,
				'pdq_question' => $this->input->post('pdq_question'),
				'pdq_answer' => $this->input->post('pdq_answer'),
				'pdq_status' => $this->input->post('pdq_status')
				);

			echo $this->product->addQuestion($data);
		}
	}

	/**
	* 更新常见问题
	* ======
	* @author 洪波
	* @version 14.03.23
	*/
	public function updateQuestion()
	{
		if($pdq_id = $this->input->post('pdq_id'))
		{
			$data = array(
				'pdq_question' => $this->input->post('pdq_question'),
				'pdq_answer' => $this->input->post('pdq_answer')
				);
			echo $this->product->updateQuestion($pdq_id, $data);
		}
	}

	/**
	* 变更常见问题状态
	* ======
	* @author 洪波
	* @version 14.03.23
	*/
	public function changeQuestionStatus()
	{
		if($pdq_id = $this->input->post('pdq_id'))
		{
			$pdq_status = $this->input->post('pdq_status');
			echo $this->product->changeQuestionStatus($pdq_id, $pdq_status);
		}
	}

	/**
	* 获取常见问题列表
	* =======
	* @author 洪波
	* @version 14.03.23
	*/
	public function getQuestionList()
	{
		if($pd_id = $this->input->post('pd_id'))
		{
			$pdq_status = $this->input->post('pdq_status');
			echo json_encode($this->product->getQuestionList($pd_id, $pdq_status));
		}
	}

	/**
	* 删除常见问题
	* ======
	* @author 洪波
	* @version 14.03.23
	*/
	public function deleteQuestion()
	{
		if($pdq_id = $this->input->post('pdq_id'))
		{
			echo $this->product->deleteQuestion($pdq_id);
		}
	}

//============================= 产品资料逻辑

	/**
	* 添加商品附件
	* ======
	* @author 洪波
	* @version 14.03.25
	*/
	public function addAnnex()
	{
		if($pd_id = $this->input->post('pd_id'))
		{
			$data = array(
				'pda_name' => $this->input->post('pda_name'),
				'pda_src' => $this->input->post('pda_src'),
				'pda_type' => $this->input->post('pda_type'),
				'pda_status' => $this->input->post('pda_status')
				);
			$data['pd_id'] = $pd_id;

			echo $this->product->addAnnex($data);
		}
	}

	/**
	* 上传文件
	* ======
	* @author 洪波
	* @version 14.03.25
	*/
	public function uploadFile()
	{
		$config = array(
        	'upload_path' => './uploads/product/',
        	'allowed_types' => 'zip|rar|txt|doc|xls|ppt|pdf|gif|jpg|png',
        	'file_name' => uniqid()
        	);
        $this->load->library('upload', $config);
        if($this->upload->do_upload('annex_file'))
        {
            $data = $this->upload->data();
            echo json_encode(array('path'=>$data['file_name'], 'type'=>$data['file_type'], 'error'=>0));
        }
        else
        {
            print_r($this->upload->display_errors());
        }
	}

	/**
	* 获取商品附件列表
	* ======
	* @author 洪波
	* @version 14.03.25
	*/
	public function getAnnexList()
	{
		if($pd_id = $this->input->post('pd_id'))
		{
			$offset = $this->input->post('offset');
			$limit = $this->input->post('limit');
			$pda_status = $this->input->post('pda_status');
			echo json_encode($this->product->getAnnexList($offset, $limit, $pd_id, $pda_status));
		}
	}

	/**
	* 变更商品附件状态
	* ======
	* @author 洪波
	* @version 14.03.26
	*/
	public function changeAnnexStatus()
	{
		if($pda_id = $this->input->post('pda_id'))
		{
			$pda_status = $this->input->post('pda_status');

			echo $this->product->changeAnnexStatus($pda_id, $pda_status);
		}
	}

	/**
	* 删除商品附件
	* ======
	* @author 洪波
	* @version 14.03.26
	*/
	public function deleteAnnex()
	{
		if($pda_id = $this->input->post('pda_id'))
		{
			echo $this->product->deleteAnnex($pda_id);
		}
	}

}