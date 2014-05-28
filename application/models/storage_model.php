<?php
/**
* 库存 - 模型
* ======
* @author 洪波
* @version 13.11.21
*/
class Storage_model extends CI_Model {

	/*
	* 库存操作方案
	*/
	private $storage_record = array(
		1 => '添加库存条目',
		2 => '删除库存条目',
		3 => '库存采购',
		4 => '常规出库',
		5 => '售出',
		6 => '售价变动',
		7 => '折扣变动',
		);

	/**
	* 库存排序方案
	*/
	private $storage_order = array(
		'0' => array('st_utime', 'asc'),
		'1' => array('st_utime', 'desc')
		);

	/**
	* 返回库存模型属性
	*/
	public function getAttributes()
	{
		return array('st_id', 'pd_id', 'st_name', 'st_quantity', 'st_inprice', 'st_outprice', 'st_discount', 'st_utime', 'st_status');
	}

	/**
	* 添加库存条目
	* ======
	* @param $data
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function create($pd_id, $st_name, $st_unit, $st_size, $st_colour)
	{
		$data = array(
			'st_id' => uniqid(),
			'pd_id' => $pd_id,
			'st_name' => $st_name,
			'st_quantity' => 0,
			'st_inprice' => 0.00,
			'st_outprice' => 0.00,
			'st_discount' => 1,
			'st_utime' => time(),
			'st_status' => 0
			);
		$this->record($data['st_id'], 1, $pd_id);
		return $this->db->insert('t_storage', $data);
	}

	/**
	* 更新库存信息
	* ======
	* @param $st_id 	库存id
	* @param $data 		库存数据
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function update($st_id, $data)
	{
		$data['st_utime'] = time();
		return $this->db->where('st_id', $st_id)
			->update('t_storage', $data);
	}

	public function get($st_id, $fields = array())
	{
		if(! $fields)
		{
			$fields = $this->getAttributes();
		}

		return $this->db->select($fields)
			->where('st_id', $st_id)
			->from('t_storage')
			->get()
			->row_array();
	}

	/**
	* 获取库存列表
	* ======
	* @param $offset 		起始位置
	* @param $limit 		查询行数
	* @param $condition 	查询条件
	* @param $order 		排序方案
	* @param $fields 		检索字段
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function getList($offset, $limit, $condition, $order, $fields = array())
	{
		if(! $fields)
		{
			$fields = $this->getAttributes();
		}
		//统计总数
		$count = $this->db->select('st_id')
			->get_where('t_storage', $condition)
			->num_rows();
		//获取数据
		$result = $this->db->select($fields)
			->where($condition)
			->from('t_storage')
			->order_by($this->storage_order[$order][0], $this->storage_order[$order][1])
			->limit($limit, $offset)
			->get()
			->result_array();

		return array('count' => $count, 'result' => $result);
	}

	/**
	* 删除库存条目(数量必须为0)
	* ======
	* @param $st_id 	库存id
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function delete($st_id)
	{
		//判断数量是否为0
		$result = $this->get($st_id, 'st_quantity');
		if($result['st_quantity'] == 0)
		{
			$this->record($st_id, 2);
			return $this->db->where('st_id', $st_id)
				->delete('t_storage');
		}
		else
		{
			return 0;
		}
	}

//================================================

	/**
	* 库存变动记录
	* ======
	* @param st_id 		库存id
	* @param $sr_type 	变动类型
	* ======
	* @author 洪波
	* @version 13.11.21
	*/
	public function record($st_id, $sr_type, $pd_id = '', $sr_quantity = 0, $sr_price = 0)
	{
		if($pd_id == '')
		{
			$storage = $this->get($st_id, 'pd_id');
			$pd_id = $storage['pd_id'];
		}
		$data = array(
			'sr_id' => uniqid(),
			'pd_id' => $pd_id,
			'st_id' => $st_id,
			'sr_type' => $sr_type,
			'sr_detail' => $this->storage_record[$sr_type],
			'sr_quantity' => $sr_quantity,
			'sr_price' => $sr_price,
			'am_account' => 'hongbo',
			'sr_time' => time()
			);
		return $this->db->insert('t_storage_record', $data);
	}

	public function getRecord($offset, $limit, $condition)
	{
		$fields = array('sr_id', 'pd_id', 'st_id', 'sr_type', 'sr_detail', 'sr_quantity', 'sr_price', 'sr_time', 'am_account');

		$count = $this->db->select('sr_id')
			->get_where('t_storage_record', $condition)
			->num_rows();
		$result = $this->db->select($fields)
			->from('t_storage_record')
			->where($condition)
			->limit($limit, $offset)
			->order_by('sr_time', 'desc')
			->get()
			->result_array();

		return array('count'=>$count, 'result'=>$result);
	}

}