<?php

class Target_model extends CI_Model {

	/**
	* 添加标签
	* ======
	* @param $tg_fid 	标签组id
	* @param $tg_name 	标签名称
	* ======
	* @author 洪波
	* @version 13.12.28
	*/
	public function create($tg_fid, $tg_name)
	{
		$data = array(
			'tg_id' => uniqid(),
			'tg_fid' => $tg_fid,
			'tg_name' => $tg_name,
			'tg_ctime' => time(),
			'tg_count' => 0
			);

		if($this->db->insert('t_target', $data))
		{
			return $data['tg_id'];
		}
		else
		{
			return 0;
		}
	}

	/**
	* 获取标签/标签组列表
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* @param $tg_fid 	标签组
	* ======
	* @author 洪波
	* @version 13.12.28
	*/
	public function getList($offset, $limit, $tg_fid)
	{
		$condition = array('tg_fid' => $tg_fid);
		//统计数量
		$count = $this->db->select('tg_id')
			->get_where('t_target', $condition)
			->num_rows();
		//获取数据
		$result = $this->db->from('t_target')
			->where($condition)
			->limit($limit, $offset)
			->get()
			->result_array();
		foreach($result as $k => $v)
		{
			$result[$k]['tg_ctime'] = date('Y-m-d', $v['tg_ctime']);
		}

		return array(
			'count' => $count,
			'result' => $result
			);
	}

	/**
	* 获取全部标签列表
	* ======
	* @author 洪波
	* @version 14.02.19
	*/
	public function getAllList()
	{
		$target = $this->db->get('t_target')
			->result_array();
		$result = array();
		$i = 0;
		foreach ($target as $v)
		{
			if($v['tg_fid'] == '0')
			{
				$result[$i]['group_id'] = $v['tg_id'];
				$result[$i]['group_name'] = $v['tg_name'];
				foreach($target as $item)
				{
					if($item['tg_fid'] == $v['tg_id'])
					{
						$result[$i]['group_item'][] = $item;
					}
				}
				++$i;
			}
		}
		return $result;
	}

	/**
	* 标签计数
	* ======
	* @author 洪波
	* @version 14.02.20
	*/
	public function count($tg_id)
	{
		$sql = "update t_target set tg_count = tg_count + 1 where tg_id = '{$tg_id}'";
		return $this->db->query($sql);
	}

	/**
	* 删除标签/标签组
	* ======
	* @param $tg_id 	标签id
	* ======
	* @author 洪波
	* @version 13.12.28
	*/
	public function delete($tg_id)
	{
		//删除子标签
		$target = $this->db->select('tg_id')
			->where('tg_fid', $tg_id)
			->from('t_target')
			->get()
			->result();
		foreach($target as $v)
		{
			$this->delete($v->tg_id);
		}
		//删除标签
		return $this->db->where('tg_id', $tg_id)->delete('t_target');
	}

//==============================

	/**
	* 添加商品标签索引
	* ======
	* @param $pd_id 	商品id
	* @param $tg_id 	标签id
	* ======
	* @author 洪波
	* @version 14.02.20
	*/
	public function addProductIndex($pd_id, $tg_id)
	{
		$this->count($tg_id);
		$data = array(
			'tgi_id' => uniqid(),
			'pd_id' => $pd_id,
			'tg_id' => $tg_id
			);
		return $this->db->insert('t_target_index', $data);
	}

	/**
	* 通过标签获取商品id列表
	* ======
	* @param $tg_id 	标签id
	* ======
	* @author 洪波
	* @version 14.02.20
	*/
	public function getProductByTarget($tg_id)
	{
		$rs = $this->db->select('pd_id')
			->where('tg_id', $tg_id)
			->get('t_target_index')
			->result();
		$result = array();
		foreach ($rs as $v)
		{
			$result[] = $v->pd_id;
		}
		return $result;
	}

	/**
	* 通过商品id获取标签列表
	* ======
	* @param $pd_id 	标签id
	* ======
	* @author 洪波
	* @version 14.02.20
	*/
	public function getTargetByProduct($pd_id)
	{
		$rs = $this->db->select('tg_id')
			->where('pd_id', $pd_id)
			->get('t_target_index')
			->result();

		$result = array();
		foreach ($rs as $v)
		{
			$result[] = $v->tg_id;
		}
		return $result;
	}

	/**
	* 删除商品标签索引
	* ======
	* @param $pd_id
	* ======
	* @author 洪波
	* @version 14.02.20
	*/
	public function deleteProductIndex($pd_id)
	{
		return $this->db->where('pd_id', $pd_id)
			->delete('t_target_index');
	}

}