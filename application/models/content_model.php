<?php
/**
* 内容 - 模型
* ======
* @author 洪波
* @version 13.10.17
*/
class Content_model extends CI_Model {

	public function getAttributes()
	{
		return array('ct_id', 'cn_id', 'ct_image', 'ct_title', 'ct_subtitle', 'ct_summary', 'ct_detail', 'ct_ctime', 'ct_status');
	}

	/**
	* 添加新内容
	* ======
	* @param $data 	内容数据
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function create($data)
	{
		return $this->db->insert('t_content', $data);
	}

	/**
	* 更新内容数据
	* ======
	* @param $ct_id 	内容id
	* @param $data 		内容数据
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function update($ct_id, $data)
	{
		//更新图片
		if($data['ct_image'] != '')
		{
			$image = $this->get(array('ct_id'=>$ct_id), array('ct_image'));
			if($image['ct_image'] != '' && $image['ct_image'] != $data['ct_image'])
				@unlink('./uploads/content/' . $image['ct_image']);
		}

		return $this->db->where('ct_id', $ct_id)
			->update('t_content', $data);
	}

	/**
	* 获取内容列表
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* @param $condition 查询条件
	* @param $field 	检索字段
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function getList($offset, $limit, $condition, $field = array())
	{
		if(! $field)
		{
			$field = $this->getAttributes();
		}
		//统计数量
		$count = $this->db->select('ct_id')
			->get_where('t_content', $condition)
			->num_rows();
		//查询数据
		$result = $this->db->select($field)
			->where($condition)
			->limit($limit, $offset)
			->order_by('ct_ctime', 'desc')
			->get('t_content')
			->result_array();

		return array('count'=>$count, 'result'=>$result);
	}

	/**
	* 获取内容详情
	* ======
	* @param $condition 	查询条件
	* @param $field 		查询字段
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function get($condition, $field = array())
	{
		if(! $field)
		{
			$field = $this->getAttributes();
		}
		return $this->db->select($field)
			->get_where('t_content', $condition)
			->row_array();
	}

	/**
	* 删除内容
	* ======
	* @param $ct_id 	内容id
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function delete($ct_id)
	{
		//删除图片
		$image = $this->get(array('ct_id'=>$ct_id), array('ct_image'));
		if($image['ct_image'] != '')
			@unlink('./uploads/content/'.$image['ct_image']);

		$this->db->where('ct_id', $ct_id)->delete('t_content');
	}

	/**
	* 删除栏目下全部内容
	* ======
	* @param $cn_id 	栏目id
	* ======
	* @author 洪波
	* @version 14.02.09
	*/
	public function deleteAll($cn_id)
	{
		//获取当前栏目全部内容id
		$result = $this->db->select('ct_id')
			->get_where('t_content', array('cn_id' => $cn_id))
			->result_array();
		//遍历删除
		foreach($result as $v)
		{
			$this->delete($v['ct_id']);
		}
	}

}