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

//=================================

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
			//删除图片
			$this->product->deleteImageMore($pd_id);
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

}