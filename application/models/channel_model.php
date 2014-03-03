<?php
/**
* 栏目 - 模型
* ======
* @author 洪波
* @version 13.10.17
*/
class Channel_model extends CI_Model {

	/**
	* 获取栏目属性
	*/
	public function getAttributes()
	{
		return array('cn_id', 'cn_fid', 'cn_name', 'cn_nick', 'cn_url', 'cn_ctime', 'cn_order', 'cn_status');
	}

	/**
	* 添加新栏目
	* ======
	* @param $cn_fid 	栏目父id
	* @param $cn_name 	栏目名称
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function create($cn_fid, $cn_name)
	{
		$data = array(
			'cn_id' => uniqid(),
			'cn_fid' => $cn_fid,
			'cn_name' => $cn_name,
			'cn_nick' => '',
			'cn_url' => '',
			'cn_ctime' => time(),
			'cn_order' => $this->newOrderId($cn_fid),
			'cn_status' => 1
			);

		if($this->db->insert('t_channel', $data))
			return $data['cn_id'];
		else
			return 0;
	}

	/**
	* 更新栏目列表
	* ======
	* @param $cn_id 	栏目id
	* @param $data 		更新数据
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function update($cn_id, $data)
	{
		return $this->db->where('cn_id', $cn_id)
			->update('t_channel', $data);
	}

	/**
	* 获取栏目列表
	* ======
	* @param $cn_fid 	栏目父id
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function getList($cn_fid)
	{
		$channel = $this->db->order_by('cn_order')
			->get_where('t_channel', array('cn_fid'=>$cn_fid))
			->result_array();
		$tree = "[";
		foreach ($channel as $arr){
			$ct = $this->db->get_where('t_channel', array('cn_fid'=>$arr['cn_id']))->num_rows();
			$ct == 0 ? $ct = 'false' : $ct = 'true';
			$tree .= "{id:'{$arr['cn_id']}',name:'{$arr['cn_name']}',isParent:{$ct}},";
		}
		$tree .="]";
		$tree = str_replace('},]', '}]', $tree);
		return $tree;
	}

	/**
	* 获取子栏目列表
	* ======
	* @param $offset
	* @param $limit
	* @param $condition
	* @param $fields
	* ======
	* @author 洪波
	* @version 14.02.09
	*/
	public function getChildList($offset, $limit, $condition, $fields = array())
	{
		if(! $fields)
		{
			$fields = $this->getAttributes();
		}
		//统计数量
		$count = $this->db->select('cn_id')
			->get_where('t_channel', $condition)
			->num_rows();
		//获取数据
		$result = $this->db->select($fields)
			->where($condition)
			->limit($limit, $offset)
			->order_by('cn_order')
			->get('t_channel')
			->result_array();

		return array('count'=>$count, 'result'=>$result);
	}

	/**
	* 获取栏目详情
	* ======
	* @param $cn_id 	栏目id
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function get($cn_id)
	{
		$result = $this->db->where('cn_id', $cn_id)
			->get('t_channel')
			->row_array();
		return $result;
	}

	/**
	* 删除栏目
	* ======
	* @param $cn_id 	栏目id
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function delete($cn_id)
	{
		//删除快捷方式
		$this->deleteShortCut($cn_id);
		//删除栏目
		return $this->db->where('cn_id', $cn_id)
			->delete('t_channel');
	}

//===========================

	/**
	* 获取父级栏目下子栏目最大排序
	* ======
	* @param $cn_fid 	栏目父级id
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	private function newOrderId($cn_fid)
	{
		$rs = $this->db->select_max('cn_order')
			->where('cn_fid', $cn_fid)
			->get('t_channel')
			->row();
		if($rs->cn_order)
			return $rs->cn_order + 1;
		else
			return 1;
	}

	/**
	* 重命名栏目
	* ======
	* @param $cn_id 	栏目id
	* @param $cn_name 	栏目新名称
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function rename($cn_id, $cn_name)
	{
		return $this->update($cn_id, array('cn_name'=>$cn_name));
	}

	/**
	* 变更栏目排序
	* ======
	* @param $cn_id 	栏目id
	* @param $cn_fid 	栏目父级id
	* @param $by_id 	作用对象父级id
	* @param $type 		对象位置 inner内部 prev前部 next后部
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function changeOrder($cn_id, $cn_fid, $by_id, $type)
	{
		$data = array('cn_fid'=>$cn_fid);
		//如果作为子对象被添加，则排到尾端
		if($type == 'inner')
		{
			$order_id = $this->newOrderId($cn_fid);
			$data['cn_order'] = $order_id;
			$this->update($cn_id, $data);
		}
		//否则是同级别排序
		else
		{
			$data['cn_order'] = '0';
			$this->update($cn_id, $data);
			//取作用栏目序号
			$order = $this->db->select('cn_order')->get_where('t_channel', array('cn_id'=>$by_id))->row();
			$pointer = $order->cn_order;
			//相对位置前
			if($type == 'prev')
			{
				$sql = "update t_channel set cn_order=cn_order+1 where cn_order >= '{$pointer}' and cn_fid = '{$cn_fid}'";
				$this->db->query($sql);
				//更新当前栏目序号
				$this->db->where('cn_id', $cn_id)->update('t_channel', array('cn_order'=>$pointer));
			}
			//相对位置后
			elseif ($type == 'next')
			{
				$sql = "update t_channel set cn_order=cn_order+1 where cn_order > '{$pointer}' and cn_fid = '{$cn_fid}'";
				$this->db->query($sql);
				//更新当前栏目序号
				$pointer += 1;
				$this->db->where('cn_id', $cn_id)->update('t_channel', array('cn_order'=>$pointer));
			}
		}
	}

	/**
	* 创建栏目快捷方式
	* ======
	* @param $cn_id 	栏目id
	* @param $cn_name 	栏目名称
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function createShortCut($cn_id, $cn_name)
	{
		$data = array(
			'cn_id' => $cn_id,
			'cns_name' => substr($cn_name, 0, 20)
			);
		$count = $this->db->select('cn_id')
			->get_where('t_channel_sc', array('cn_id'=>$data['cn_id']))
			->num_rows();
		if( ! $count )
		{
			//获取排序索引
			$rs = $this->db->select_max('cns_order')
				->get('t_channel_sc')
				->row();
			if($rs->cns_order)
				$data['cns_order'] = $rs->cns_order + 1;
			else
				$data['cns_order'] = 1;
			//写入数据库
			return $this->db->insert('t_channel_sc', $data);
		}
		else
		{
			return '-1';
		}
	}

	/**
	* 获取栏目快捷方式列表
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function getShortCut()
	{
		return $this->db->order_by('cns_order')
			->get('t_channel_sc')
			->result_array();
	}

	/**
	* 重命名快捷方式
	* ======
	* @param $cn_id 	快捷方式id
	* @param $cns_name 	新名称
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function renameShortCut($cn_id, $cns_name)
	{
		return $this->db->where('cn_id', $cn_id)
			->update('t_channel_sc', array('cns_name'=>$cns_name));
	}

	/**
	* 变更快捷方式排序
	* ======
	* @param $cn_id 	快捷方式id
	* @param $order 	排序方式(1为上移 0为下移)
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function orderShortCut($cn_id, $order)
	{
		//查找当前快捷方式的序号
		$rs = $this->db->select('cns_order')
			->get_where('t_channel_sc', array('cn_id'=>$cn_id))
			->row();
		$i_order = $rs->cns_order;
		unset($rs);
		//操作为上移，找出上位快捷方式
		if($order == '1')
		{
			$rs = $this->db->select('cn_id,cns_order')
				->order_by('cns_order', 'desc')
				->get_where('t_channel_sc', array('cns_order < '=>$i_order))
				->row();
		}	
		//操作为下移，找出下位快捷方式
		else
		{
			$rs = $this->db->select('cn_id,cns_order')
				->order_by('cns_order')
				->get_where('t_channel_sc', array('cns_order > '=>$i_order))
				->row();
		}
		$u_order = $rs->cns_order;
		//如果有目标则更改顺序
		if($rs)
		{
			//更改当前快捷方式order
			$this->db->where('cn_id', $cn_id)
				->update('t_channel_sc', array('cns_order'=>$u_order));
			//更改上位快捷方式order
			$this->db->where('cn_id', $rs->cn_id)
				->update('t_channel_sc', array('cns_order'=>$i_order));
			return 1;
		}
		else
		{
			return 0;
		}
	}

	/**
	* 删除快捷方式
	* ======
	* @param $cn_id 	栏目id
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function deleteShortCut($cn_id)
	{
		return $this->db->where('cn_id', $cn_id)
			->delete('t_channel_sc');
	}

}