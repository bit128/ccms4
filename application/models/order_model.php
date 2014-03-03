<?php
/**
* 订单 - 模型
* ======
* @author 洪波
* @version 13.11.22
*/
class Order_model extends CI_Model {

	/**
	* 订单状态标识
	*/
	public static $ORDER_CREATE = 0;
	public static $ORDER_PAY = 1;
	public static $ORDER_FINISH = 2;

	/**
	* 购物车状态标识
	*/
	public static $CART_SHOPPINGCART = 0;
	public static $CART_COLLECTION = 1;
	public static $CART_ORDER = 2;

	public function getOrderAttributes()
	{
		return array('od_id', 'user_id', 'od_price', 'od_send', 'od_remark', 'od_ctime', 'od_stime', 'od_status');
	}

	public function getCartAttributes()
	{
		return array('sp_id', 'pd_id', 'od_id', 'user_id', 'st_id', 'sp_quantity', 'sp_time', 'sp_status');
	}

	/**
	* 创建购物车条目
	* ======
	* @param $user_id 		用户id
	* @param $st_id 		库存id
	* @param $sp_quantity 	数量
	* @param $sp_status 	购物车状态
	* ======
	* @author 洪波
	* @version 13.11.22
	*/
	public function createCart($user_id, $pd_id, $st_id, $sp_quantity, $sp_status)
	{
		//判断是否重复
		$data = array(
			'user_id' => $user_id,
			'pd_id' => $pd_id,
			'st_id' => $st_id,
			'sp_status' => $sp_status
			);
		$has = $this->db->select('sp_id')
			->get_where('t_shopping_cart', $data)
			->num_rows();
		//重复
		if($has)
		{
			return -1;
		}
		else
		{
			$data['sp_id'] = uniqid();
			$data['od_id'] = '';
			$data['sp_quantity'] = $sp_quantity;
			$data['sp_time'] = time();
			$data['sp_status'] = $sp_status;
			return $this->db->insert('t_shopping_cart', $data);
		}
	}

	/**
	* 获取购物车/收藏夹列表
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* @param $user_id 	用户id
	* ======
	* @author 洪波
	* @version 14.02.25
	*/
	public function getCartList($offset, $limit, $user_id, $sp_status = 0)
	{
		//查询字段
		$fields = 't_shopping_cart.sp_id,t_shopping_cart.od_id,t_shopping_cart.st_id,t_shopping_cart.sp_quantity,t_shopping_cart.sp_time'
			.',t_storage.st_unit,t_storage.st_colour,t_storage.st_size,t_storage.st_outprice'
			.',t_product.pd_id,t_product.pd_name,t_product.pd_no';
		//组合查询条件
		$condition = "t_shopping_cart.user_id = '{$user_id}' AND t_shopping_cart.sp_status = {$sp_status}";
		//统计总数
		$count = $this->db->select('sp_id')
			->get_where('t_shopping_cart', $condition)
			->num_rows();
		//获取数据
		$result = $this->db->select($fields)
			->where($condition)
			->from('t_shopping_cart')
			->join('t_storage', 't_storage.st_id = t_shopping_cart.st_id')
			->join('t_product', 't_product.pd_id = t_shopping_cart.pd_id')
			->limit($limit, $offset)
			->order_by('t_shopping_cart.sp_time', 'desc')
			->get()
			->result_array();

		return array('count'=>$count, 'result'=>$result);
	}

	/**
	* 获取收藏夹列表
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* @param $user_id 	用户id
	* ======
	* @author 洪波
	* @version 14.02.27
	*/
	// public function getCollectionList($offset, $limit, $user_id)
	// {
	// 	//查询字段
	// 	$fields = 't_shopping_cart.sp_id,t_shopping_cart.od_id,t_shopping_cart.st_id,t_shopping_cart.sp_quantity,t_shopping_cart.sp_time'
	// 		.',t_product.pd_id,t_product.pd_name,t_product.pd_no';
	// 	//组合查询条件
	// 	$condition = "t_shopping_cart.user_id = '{$user_id}' AND t_shopping_cart.sp_status = 1";
	// 	//统计总数
	// 	$count = $this->db->select('sp_id')
	// 		->get_where('t_shopping_cart', $condition)
	// 		->num_rows();
	// 	//获取数据
	// 	$result = $this->db->select($fields)
	// 		->where($condition)
	// 		->from('t_shopping_cart')
	// 		->join('t_product', 't_product.pd_id = t_shopping_cart.pd_id')
	// 		->limit($limit, $offset)
	// 		->order_by('t_shopping_cart.sp_time', 'desc')
	// 		->get()
	// 		->result_array();

	// 	return array('count'=>$count, 'result'=>$result);
	// }

	/**
	* 设置购物车商品数量
	* ======
	* @param $sp_id 		购物车成员id
	* @param $sp_quantity 	数量
	* ======
	* @author 洪波
	* @version 14.02.27
	*/
	public function setCartQuantity($sp_id, $sp_quantity)
	{
		return $this->db->where('sp_id', $sp_id)
			->update('t_shopping_cart', array('sp_quantity' => $sp_quantity));
	}

	/**
	* 检查购物车/收藏夹成员归属
	* ======
	* @param $user_id 	用户id
	* @param $sp_id 	购物车/收藏夹成员id
	* ======
	* @author 洪波
	* @version 14.02.27
	*/
	public function checkMyCart($user_id, $sp_id)
	{
		$condition = array(
			'user_id' => $user_id,
			'sp_id' => $sp_id
			);
		$has = $this->db->select('sp_id')
			->get_where('t_shopping_cart', $condition)
			->num_rows();
		if($has)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/**
	* 收藏夹商品添加到购物车
	* ======
	* @param $sp_id 	收藏夹商品id
	* ======
	* @author 洪波
	* @version 14.03.01
	*/
	public function collectionToCart($sp_id)
	{
		//获取藏品详情
		$collection = $this->db->select('pd_id,st_id,sp_status')
			->get_where('t_shopping_cart', array('sp_id'=>$sp_id))
			->row();
		if($collection && $collection->sp_status == 1)
		{
			//检查购物车中是否有重复
			$condition = array(
				'pd_id' => $collection->pd_id,
				'st_id' => $collection->st_id,
				'sp_status' => 0
				);
			$has = $this->db->select('sp_id')
				->get_where('t_shopping_cart', $condition)
				->num_rows();
			if($has)
			{
				return -1;
			}
			else
			{
				return $this->db->where('sp_id', $sp_id)
					->update('t_shopping_cart', array('sp_status'=>0,'sp_quantity'=>10));
			}
		}
	}

	/**
	* 删除购物车成员
	* ======
	* @param $sp_id 	购物车成员id
	* ======
	* @author 洪波
	* @version 13.11.22
	*/
	public function deleteCart($sp_id)
	{
		return $this->db->where('sp_id', $sp_id)
			->delete('t_shopping_cart');
	}

	/**
	* 生成新订单号
	* ======
	* @author 洪波
	* @version 13.11.24
	*/
	private function getNewOrderId()
	{
		do
		{
			$od_id = date('ymdHis') . rand(1000, 9999);
			$has = $this->db->select('od_id')
				->get_where('t_order', array('od_id'=>$od_id))
				->num_rows();
		}
		while($has);

		return $od_id;
	}

	/**
	* 生成订单
	* ======
	* @param $user_id 	用户id
	* @param $od_send 	邮寄方式
	* @param $od_remark 备注
	* ======
	* @author 洪波
	* @version 14.02.27
	*/
	public function createOrder($user_id, $od_send, $od_remark)
	{
		//将购物车商品放入订单
		$condition = array(
			'user_id' => $user_id,
			'od_id' => '',
			'sp_status' => 0
			);
		//判断购物车中是否有商品
		$has = $this->db->select('sp_id')
			->get_where('t_shopping_cart', $condition)
			->num_rows();
		if($has)
		{
			//生成订单号
			$od_id = $this->getNewOrderId();
			$data = array(
				'od_id' => $od_id,
				'sp_status' => 2
				);
			$this->db->where($condition)->update('t_shopping_cart', $data);
			//统计购物车总价
			$condition['od_id'] = $od_id;
			$condition['sp_status'] = 2;
			$cart = $this->db->select('t_shopping_cart.st_id,t_shopping_cart.sp_quantity,t_storage.st_outprice')
				->from('t_shopping_cart')
				->where($condition)
				->join('t_storage', 't_shopping_cart.st_id = t_storage.st_id')
				->get()
				->result();
			$all_price = 0;
			foreach ($cart as $v)
			{
				$all_price += ($v->sp_quantity * $v->st_outprice);
			}
			//生成订单
			$data = array(
				'od_id' => $od_id,
				'user_id' => $user_id,
				'od_send' => $od_send,
				'od_remark' => $od_remark,
				'od_price' => $all_price,
				'od_ctime' => time(),
				'od_stime' => 0,
				'od_status' => 0
				);

			return $this->db->insert('t_order', $data);
		}
		else
		{
			return 0;
		}
	}

	/**
	* 获取订单列表
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* @param $condition 查询条件
	* ======
	* @author 洪波
	* @version 13.11.24
	*/
	public function getOrderList($offset, $limit, $condition)
	{
		$fields = $this->getOrderAttributes();
		//统计总数
		$count = $this->db->select('od_id')
			->get_where('t_order', $condition)
			->num_rows();
		//获取数据
		$result = $this->db->select($fields)
			->where($condition)
			->from('t_order')
			->limit($limit, $offset)
			->order_by('od_id', 'desc')
			->get()
			->result_array();

		return array('count' => $count, 'result' => $result);
	}

	/**
	* 获取订单成员商品列表
	* ======
	* @param $od_id 	商品id
	* ======
	* @author 洪波
	* @version 14.03.01
	*/
	public function getOrderItem($od_id)
	{
		//检索字段
		$fields = 't_shopping_cart.st_id,t_shopping_cart.sp_quantity,'
			.'t_storage.pd_id,t_storage.st_unit,t_storage.st_colour,t_storage.st_size,t_storage.st_outprice,'
			.'t_product.pd_name,t_product.pd_no';
		//获取数据
		$items = $this->db->select($fields)
			->where('t_shopping_cart.od_id', $od_id)
			->from('t_shopping_cart')
			->join('t_storage', 't_shopping_cart.st_id = t_storage.st_id')
			->join('t_product', 't_storage.pd_id = t_product.pd_id')
			->get()
			->result_array();

		return $items;
	}

	/**
	* 获取订单详情
	* ======
	* @param $od_id 	订单id
	* ======
	* @author 洪波
	* @version 13.11.24
	*/
	public function getOrder($od_id)
	{
		//获取订单信息
		$order = $this->db->select($this->getOrderAttributes())
			->get_where('t_order', array('od_id' => $od_id))
			->result_array();
		if($order)
		{
			$order['items'] = $this->getOrderItem($od_id);
			return $order;
		}
		else
		{
			return array();
		}
	}

	/**
	* 检查订单归属
	* ======
	* @param $user_id 	用户id
	* @param $od_id 	订单id
	* ======
	* @author 洪波
	* @version 14.02.27
	*/
	public function checkMyOrder($user_id, $od_id)
	{
		$condition = array(
			'user_id' => $user_id,
			'od_id' => $od_id
			);
		$has = $this->db->select('od_id')
			->get_where('t_order', $condition)
			->num_rows();
		if($has)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}