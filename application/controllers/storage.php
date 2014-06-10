<?php
/**
* 库存 - 控制器
* ======
* @author 洪波
* @version 13.11.21
*/
class Storage extends CI_Controller {

	public $nav_index = 50;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Storage_model', 'storage');
		$this->load->model('Admin_model', 'admin');
	}

	/**
	* 库存列表 - 页面
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function storageList($offset = '0', $pd_id = '0', $order = '1')
	{
		if($this->admin->validate(16))
		{
			$this->load->library('pagination');

			$limit = 20;
			$condition = array();
			if($pd_id != '0')
				$condition = "pd_id = '{$pd_id}'";

			$result = $this->storage->getList($offset, $limit, $condition, $order);
			//分页
			$config['base_url'] = site_url('storage/storageList');
	        $config['suffix'] = '/'.$pd_id.'/'.$order;
	        $config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
	        $config['total_rows'] = $result['count'];
	        $config['per_page'] = $limit;
	        $this->pagination->initialize($config);
	        $pages = $this->pagination->create_links();
			$data = array(
				'pd_id' => $pd_id,
				'storage' => $result['result'],
				'pages' => $pages
				);
			$this->load->view('admin/v_storage_list', $data);
		}
		else
		{
			echo '权限不足';
		}
	}

	/**
	* 库存记录 - 页面
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function storageRecord($offset = '0', $type = '0')
	{
		if($this->admin->validate(16))
		{
			$this->nav_index = 51;
			$this->load->library('pagination');

			$limit = 20;
			$condition = array();
			if($type != '0')
				$condition = "st_type = '{$type}'";

			$result = $this->storage->getRecord($offset, $limit, $condition);
			//分页
			$config['base_url'] = site_url('storage/storageRecord');
	        $config['suffix'] = '/'.$type;
	        $config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
	        $config['total_rows'] = $result['count'];
	        $config['per_page'] = $limit;
	        $this->pagination->initialize($config);
	        $pages = $this->pagination->create_links();

	        $data = array(
	        	'type' => $type,
	        	'record' => $result['result'],
	        	'pages' => $pages
	        	);
			$this->load->view('admin/v_storage_record', $data);
		}
		else
		{
			echo '权限不足';
		}
	}

	/**
	* 添加库存类目
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function addStorage()
	{
		if($pd_id = $this->input->post('pd_id'))
		{
			$st_name = $this->input->post('st_name');
			echo $this->storage->create($pd_id, $st_name);
		}
	}

	/**
	* 变更库存状态
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function changeStatus()
	{
		if($st_id = $this->input->post('st_id'))
		{
			$data = array(
				'st_status' => $this->input->post('st_status')
				);
			//TODO 库存状态变更 记录
			echo $this->storage->update($st_id, $data);
		}
	}

	/**
	* 变更库存量
	* ======
	* @author 洪波
	* @version 13.11.22
	*/
	public function changeStorage()
	{
		if($st_id = $this->input->post('st_id'))
		{
			$op = $this->input->post('op');
			$st_id = $this->input->post('st_id');
			$st_price = $this->input->post('st_price');
			$st_quantity = $this->input->post('st_quantity');
			//获取原库存价格
			$storage = $this->storage->get($st_id, 'st_quantity');
			if($storage)
			{
				if($op == '1')
				{
					$quantity = $storage['st_quantity'] + $st_quantity;
					$this->storage->record($st_id, 3, '', $st_quantity, $st_price);
				}
				else
				{
					$quantity = $storage['st_quantity'] - $st_quantity;
					$this->storage->record($st_id, 4, '', $st_quantity, $st_price);
				}

				//保存变更
				$data = array(
					'st_inprice' => $st_price,
					'st_quantity' => $quantity
					);

				echo $this->storage->update($st_id, $data);
			}
			else
			{
				echo 0;
			}
			
		}
	}

	/**
	* 更新库存属性
	* ======
	* @author 洪波
	* @version 13.11.22
	*/
	public function updateStorage()
	{
		if($st_id = $this->input->post('st_id'))
		{
			$field = $this->input->post('field');
			$value = $this->input->post('data');

			$data = array($field => $value);
			echo $this->storage->update($st_id, $data);
			//变更记录
			if($field == 'st_outprice')
				$this->storage->record($st_id, 6, '', 0, $value);
			elseif ($field == 'st_discount')
				$this->storage->record($st_id, 7, '', 0, $value);
		}
	}

	/**
	* 删除库存条目
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function deleteStorage()
	{
		if($st_id = $this->input->post('st_id'))
		{
			//TODO 删除库存条目 记录
			echo $this->storage->delete($st_id);
		}
	}

}