<?php

class Admin_model extends CI_Model {

	public $role = array(
		1 => '内容',
		2 => '留言',
		4 => '用户',
		8 => '产品',
		16 => '库存',
		32 => '订单',
		64 => '管理员'
		);

	/**
	* 验证账户权限
	* ======
	* @param $role 	权限
	* ======
	* @author 洪波
	* @version 13.12.28
	*/
	public function validate($role)
	{
		if($am_role = $this->session->userdata('am_role'))
		{
			if($role & $am_role)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	/**
	* 添加管理员
	* ======
	* @param $am_account 	账号
	* @param $am_password 	密码
	* @param $am_role 		权限
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function create($am_account, $am_password, $am_role)
	{
		//判断账号重名
		$count = $this->db->select('am_id')
			->get_where('t_admin', array('am_account'=>$am_account))
			->num_rows();
		if($count)
		{
			return -1; //账号重名
		}
		else
		{
			$data = array(
				'am_id' => uniqid(),
				'am_account' => $am_account,
				'am_password' => md5(trim($am_password)),
				'am_role' => $am_role,
				'am_status' => 1
				);
			return $this->db->insert('t_admin', $data);
		}
	}

	/**
	* 更新管理员账号
	* ======
	* @param $am_id 	管理员账号
	* @param $data 		管理员数据
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function update($am_id, $data)
	{
		return $this->db->where('am_id', $am_id)
			->update('t_admin', $data);
	}

	public function get($am_id)
	{
		return $this->db->select('am_id,am_account,am_role,am_status')
			->get_where('t_admin', array('am_id'=>$am_id))
			->row_array();
	}

	/**
	* 获取管理员列表
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function getList()
	{
		return $this->db->select('am_id,am_account,am_role,am_status')
			->get('t_admin')
			->result_array();
	}

	/**
	* 删除管理员
	* ======
	* @param $am_id 	管理员id
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function delete($am_id)
	{
		return $this->db->where('am_id', $am_id)
			->delete('t_admin');
	}

//===========================

	/**
	* 打印权限表
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function printRole($select = 0)
	{
		$input = '';
		foreach ($this->role as $k => $v)
		{
			if($select & $k)
				$input .= ' <input type="checkbox" name="am_role" value="'.$k.'" checked> '.$v;
			else
				$input .= ' <input type="checkbox" name="am_role" value="'.$k.'"> '.$v;
		}
		return $input;
	}

	/**
	* 变更管理员状态
	* ======
	* @param $am_id 	管理员id
	* @param $am_status 状态
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function changeStatus($am_id, $am_status)
	{
		return $this->update($am_id, array('am_status'=>$am_status));
	}

	/**
	* 变更管理员权限
	* ======
	* @param $am_id 	管理员id
	* @param $role 		权限
	* @param $op 		操作方式
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function changeRole($am_id, $role, $op)
	{
		$rs = $this->get($am_id);

		if($op == '1')
		{
			$am_role = $rs['am_role'] + $role;
			
		}
		else
		{
			$am_role = $rs['am_role'] - $role;
		}
		return $this->update($am_id, array('am_role'=>$am_role));
	}

	/**
	* 管理员登录
	* ======
	* @param $am_account 	账户
	* @param $am_password 	密码
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function login($am_account, $am_password)
	{
		$am_password = md5(trim($am_password));
		$condition = array(
			'am_account' => $am_account,
			'am_password' => $am_password,
			'am_status' => 1
			);
		$admin = $this->db->select('am_id,am_account,am_role')
			->get_where('t_admin', $condition)
			->row_array();
		if($admin)
		{
			$this->session->set_userdata($admin);
			return true;
		}
		else
		{
			return false;
		}
	}

}