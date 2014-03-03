<?php
/**
* 留言板 - 模型
* ======
* @author 洪波
* @version 13.10.19
*/
class Guestbook_model extends CI_Model {

	public function getAttributes()
	{
		return array('gb_id', 'gb_type', 'gb_title', 'gb_content', 'gb_username', 'gb_phone', 'gb_email', 'gb_contact', 'gb_ctime', 'gb_status');
	}

	/**
	* 添加留言
	* ======
	* @param $data 	留言数据
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function create($data)
	{
		$data['gb_id'] = uniqid();
		$data['gb_ctime'] = time();
		$data['gb_status'] = 0;

		return $this->db->insert('t_guestbook', $data);
	}

	/**
	* 获取留言详情
	* ======
	* @param $gb_id 	留言id
	* @param $fields 	检索字段
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function get($gb_id, $fields = array())
	{
		if(! $fields)
		{
			$fields = $this->getAttributes();
		}
		return $this->db->select($fields)
			->where('gb_id', $gb_id)
			->get('t_guestbook')
			->row_array();
	}

	/**
	* 获取留言列表
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* @param $condition 查询条件
	* @param $fields 	检索字段
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function getList($offset, $limit, $condition, $fields = array())
	{
		if(! $fields)
		{
			$fields = $this->getAttributes();
		}
		//统计总数
		$count = $this->db->select('gb_id')
			->get_where('t_guestbook', $condition)
			->num_rows();
		//查询数据
		$result = $this->db->select($fields)
			->where($condition)
			->limit($limit, $offset)
			->order_by('gb_ctime', 'desc')
			->get('t_guestbook')
			->result_array();

		return array('count'=>$count, 'result'=>$result);
	}

	/**
	* 删除留言
	* ======
	* @param $gb_id 	留言id
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function delete($gb_id)
	{
		//删除留言反馈
		$this->deleteReply(array('gb_id'=>$gb_id));

		return $this->db->where('gb_id', $gb_id)
			->delete('t_guestbook');
	}

	/**
	* 变更留言状态
	* ======
	* @param $gb_id 	留言id
	* @param $gb_status 状态
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function changeStatus($gb_id, $gb_status)
	{
		return $this->db->where('gb_id', $gb_id)
			->update('t_guestbook', array('gb_status'=>$gb_status));
	}

//===========================

	/**
	* 添加留言反馈
	* ======
	* @param $data 	留言反馈数据
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function addReply($data)
	{
		$data['gbr_id'] = uniqid();
		$data['gbr_ctime'] = time();

		return $this->db->insert('t_guestbook_reply', $data);
	}

	/**
	* 获取留言反馈列表
	* ======
	* $gb_id 		留言id
	* $gbr_status 	反馈类型
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function getReply($gb_id, $gbr_status = 0)
	{
		$condition = array();
		if($gbr_status)
		{
			$condition['gbr_status'] = $gbr_status;
		}
		$result = $this->db->where($condition)
			->order_by('gbr_ctime', 'desc')
			->get('t_guestbook_reply')
			->result_array();
		foreach ($result as $k => $v) {
			$result[$k]['gbr_ctime'] = date('Y-m-d', $v['gbr_ctime']);
		}

		return $result;
	}

	/**
	* 删除留言反馈
	* ======
	* @param $condition 	条件
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function deleteReply($condition)
	{
		return $this->db->where($condition)
			->delete('t_guestbook_reply');
	}

}