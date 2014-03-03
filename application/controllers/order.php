<?php
/**
* 订单控制器
* ======
* @author 洪波
* @version 13.11.22
*/
class Order extends CI_Controller {

	public $nav_index = 60;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order_model', 'order');
		$this->load->model('Admin_model', 'admin');
	}

	/**
	* 订单列表 - 页面
	* ======
	* @author 洪波
	* @version 13.11.22
	*/
	public function orderList($offset = '0', $od_status = '0')
	{
		if($this->admin->validate(32))
		{
			$this->load->library('pagination');

			$limit = 20;
			$condition = "od_status = {$od_status}";

			$result = $this->order->getOrderList($offset, $limit, $condition);
			//分页
			$config['base_url'] = site_url('order/orderList');
	        $config['suffix'] = '/'.$od_status;
	        $config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
	        $config['total_rows'] = $result['count'];
	        $config['per_page'] = $limit;
	        $this->pagination->initialize($config);
	        $pages = $this->pagination->create_links();

			$data = array(
				'od_status' => $od_status,
				'order' => $result['result'],
				'pages' => $pages
				);
			$this->load->view('admin/v_order_list', $data);
		}
		else
		{
			echo '权限不足';
		}
	}

//==================================================

	/**
	* 用户添加到购物车/收藏夹
	* ======
	* @author 洪波
	* @version 13.11.24
	*/
	public function addShoppingCart()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$pd_id = $this->input->post('pd_id');
			$st_id = $this->input->post('st_id');
			$sp_quantity = $this->input->post('sp_quantity');
			$sp_status = $this->input->post('sp_status');
			
			echo $this->order->createCart($user_id, $pd_id, $st_id, $sp_quantity, $sp_status);
		}
	}

	/**
	* 用户变更购物车数量
	* ======
	* @author 洪波
	* @version 14.03.01
	*/
	public function setCartQuantity()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$sp_id = $this->input->post('sp_id');
			$sp_quantity = $this->input->post('sp_quantity');
			//检查归属
			if($this->order->checkMyCart($user_id, $sp_id))
			{
				echo $this->order->setCartQuantity($sp_id, $sp_quantity);
			}
		}
	}

	/**
	* 用户变更收藏夹状态（添加到购物车中）
	* ======
	* @author 洪波
	* @version 14.03.01
	*/
	public function changeCollectionStatus()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$sp_id = $this->input->post('sp_id');
			//检查归属
			if($this->order->checkMyCart($user_id, $sp_id))
			{
				echo $this->order->collectionToCart($sp_id);
			}
		}
	}

	/**
	* 用户删除购物车/收藏夹成员
	* ======
	* @author 洪波
	* @version 14.02.27
	*/
	public function removeCartItem()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$sp_id = $this->input->post('sp_id');
			//检查归属
			if($this->order->checkMyCart($user_id, $sp_id))
			{
				echo $this->order->deleteCart($sp_id);
			}
			else
			{
				echo -1;
			}
		}
	}

	/**
	* 用户创建订单
	* ======
	* @author 洪波
	* @version 14.02.27
	*/
	public function createOrder()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$od_send = $this->input->post('od_send');
			$od_remark = $this->input->post('od_remark');
			echo $this->order->createOrder($user_id, $od_send, $od_remark);
		}
	}

	/**
	* 用户获取订单成员商品列表
	* ======
	* @author 洪波
	* @version 14.03.01
	*/
	public function getOrderItem($od_id)
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$this->load->model('Order_model', 'order');
			//检查归属
			if($this->order->checkMyOrder($user_id, $od_id))
			{
				echo json_encode($this->order->getOrderItem($od_id));
			}
			else
			{
				echo '[]';
			}
		}
	}
}