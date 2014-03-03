<?php
/**
* 菜单目录 - 模型
* ======
* @author 洪波
* @version 13.11.18
*/
class Menu_model extends CI_Model {

	public function getAttributes()
	{
		return array('mu_id', 'mu_fid', 'mu_name', 'mu_sort');
	}

	/**
	* 添加菜单目录
	* ======
	* @param $mu_fid 	父菜单id
	* @param $mu_name 	菜单名称
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function add($mu_fid, $mu_name)
	{
		//获取最大排序因子
		$max_sort = $this->db->select_max('mu_sort')
			->get_where('t_menu', array('mu_fid' => $mu_fid))
			->row();
		if(! $max_sort->mu_sort)
			$mu_sort = 1;
		else
			$mu_sort = $max_sort->mu_sort + 1;
		//写入数据库
		$data = array(
			'mu_id' => uniqid(),
			'mu_fid' => $mu_fid,
			'mu_name' => $mu_name,
			'mu_sort' => $mu_sort
			);

		if($this->db->insert('t_menu', $data))
			return $data['mu_id'];
		else
			return 0;
	}

	/**
	* 获取子菜单列表
	* ======
	* $mu_fid 	父菜单id
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function getChildList($mu_fid)
	{
		$fields = $this->getAttributes();
		$menu = $this->db->select($fields)
			->order_by('mu_sort', 'asc')
			->get_where('t_menu', array('mu_fid' => $mu_fid))
			->result_array();

		return $menu;
	}

	/**
	* 包含子菜单列表
	*/
	private $include = null;

	/**
	* 获取包含子级菜单列表
	* ======
	* @param $mu_fid 	父菜单id
	* ======
	* @author 洪波
	* @version 14.02.22
	*/
	public function getInclude($mu_fid)
	{
		$this->include = array();
		$this->include[] = $mu_fid;
		$menus = $this->db->select('mu_id,mu_fid')
			->get('t_menu')
			->result();
		$this->getIncludeId($mu_fid, $menus);
		return $this->include;
	}

	/**
	* 遍历出子级菜单
	* ======
	* @param $id 	父级id
	* @param $list 	菜单数组
	* ======
	* @author 洪波
	* @version 14.02.22
	*/
	private function getIncludeId($id, $list)
	{
		foreach ($list as $k => $v)
		{
			if($v->mu_fid == $id)
			{
				$this->include[] = $v->mu_id;
				unset($list[$k]);
				$this->getIncludeId($v->mu_id, $list);
			}
		}
	}

	/**
	* 获取菜单列表
	* ======
	* @param $mu_id 	菜单id
	* ======
	* @author 洪波
	* @version 13.11.19
	*/
	public function getBrotherList($mu_id)
	{
		//获取父级id
		$f = $this->db->select('mu_fid')
			->get_where('t_menu', array('mu_id'=>$mu_id))
			->row();
		$mu_fid = $f->mu_fid;
		unset($f);
		//获取兄弟层成员
		$fields = $this->getAttributes();
		$menu = $this->db->select($fields)
			->order_by('mu_sort', 'asc')
			->get_where('t_menu', array('mu_fid' => $mu_fid))
			->result_array();

		return $menu;
	}

	/**
	* 获取上层菜单关系列表
	* ======
	* @param $mu_id 	菜单id
	* ======
	* @author 洪波
	* @version 14.02.16
	*/
	public function getParentList($mu_id)
	{
		$result = array();
		$i = 2;
		$id = $mu_id;
		do
		{
			$rs = array();
			$brother = $this->getBrotherList($id);
			foreach ($brother as $v)
			{
				$index = $v['mu_sort'];
				if($v['mu_id'] == $id)
				{
					$rs[$index]['select'] = 1;
				}
				else
				{
					$rs[$index]['select'] = 0;
				}
				$rs[$index]['id'] = $v['mu_id'];
				$rs[$index]['name'] = $v['mu_name'];
			}
			$result[$i] = $rs;
			--$i;
			$id = $brother[0]['mu_fid'];
		}
		while ($id != '0');

		return $result;
	}

	/**
	* 更新菜单名称
	* ======
	* @param $mu_id 	菜单id
	* @param $mu_name 	菜单名称
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function updateName($mu_id, $mu_name)
	{
		return $this->db->where('mu_id', $mu_id)
			->update('t_menu', array('mu_name' => $mu_name));
	}

	/**
	* 菜单排序
	* ======
	* @param $mu_id 	目录id
	* @param $op 		排序方向
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function sort($mu_fid, $mu_id, $op)
	{
		//获取当前成员排序
		$rs = $this->db->select('mu_sort')->get_where('t_menu', array('mu_id' => $mu_id))->row();
		$self_sort = $rs->mu_sort;
		//上移
		if($op == '0' && $self_sort > 1)
		{
			//查找比当前排序小的项
			$condition = "mu_fid = '{$mu_fid}' AND mu_sort < {$self_sort}";
			$order = 'desc';
		}
		//下移
		else if($op == '1')
		{
			//查找比当前排序大的项
			$condition = "mu_fid = '{$mu_fid}' AND mu_sort > {$self_sort}";
			$order = 'asc';
		}
		else
		{
			return 0;
		}

		//获取操作相对对象
		$other = $this->db->select('mu_id,mu_sort')
			->where($condition)
			->order_by('mu_sort', $order)
			->get('t_menu')
			->row();
		if($other)
		{
			$new_sort = $other->mu_sort;
			//更新操作相对对象
			$flag_1 = $this->db->where('mu_id', $other->mu_id)->update('t_menu', array('mu_sort' => $self_sort));
			//更新当前操作对象
			$flag_2 = $this->db->where('mu_id', $mu_id)->update('t_menu', array('mu_sort' => $new_sort));

			if($flag_1 && $flag_2)
				return 1;
			else
				return 0;
		}
		else
		{
			return 0;
		}
	}

	/**
	* 删除菜单
	* ======
	* @param $mu_id 	菜单id
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function delete($mu_id)
	{
		//获取子成员
		$child = $this->db->select('mu_id')
			->get_where('t_menu', array('mu_fid' => $mu_id))
			->result();
		//递归删除子成员
		if($child)
		{
			foreach ($child as $v) {
				$this->delete($v->mu_id);
			}
		}
		unset($child);
		//删除当前成员
		$this->db->where('mu_id', $mu_id)->delete('t_menu');
	}

}