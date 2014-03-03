<?php
/**
* 用户 - 模型
* ======
* @author 洪波
* @version 13.10.20
*/
class User_model extends CI_Model {

	public function getAttributes()
	{
		return array('user_id', 'user_account', 'user_password', 'user_nick', 'user_avatar', 'user_gender', 'user_score', 'user_allscore', 'user_ctime', 'user_utime', 'user_count', 'user_uip', 'user_status');
	}

	/**
	* 检测账户可用性
	* ======
	* @param $account 	账户名称
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function checkAccount($account)
	{
		$count = $this->db->select('user_id')
			->get_where('t_user', array('user_account'=>$account))
			->num_rows();

		if($count)
			return false;
		else
			return true;
	}

	/**
	* 生成用户数字账号
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	private function getNewId()
	{
		do{
			$user_id = '80' . rand(100000, 999999);
			$count = $this->db->select('user_id')
				->get_where('t_user', array('user_id'=>$user_id))
				->num_rows();
		}while($count);

		return $user_id;
	}

	/**
	* 用户注册
	* ======
	* @param $user_account 	账户
	* @param $user_password 密码
	* @param $user_nick 	昵称
	* @param $user_status 	状态
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function register($user_account, $user_password, $user_nick, $user_status)
	{
		$time = time();
		$data = array(
			'user_id' => $this->getNewId(),
			'user_account' => $user_account,
			'user_password' => md5($user_password),
			'user_nick' => $user_nick,
			'user_avatar' => 'default.jpg',
			'user_gender' => 0,
			'user_score' => 0,
			'user_allscore' => 0,
			'user_ctime' => $time,
			'user_utime' => $time,
			'user_count' => 0,
			'user_uip' => '',
			'user_status' => $user_status
			);

		if($this->db->insert('t_user', $data))
		{
			$this->cache($data);
			return 1;
		}
		else
		{
			return 0;
		}
	}

	/**
	* 用户登录
	* ======
	* @param $account 	账户(或数字账号)
	* @param $password 	密码
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function login($user_account, $user_password)
	{
		$user_password = md5($user_password);
		$condition = "user_account = '{$user_account}' AND user_password = '{$user_password}'";
		$user = $this->db->select('user_id,user_nick,user_avatar,user_status,user_count')
			->where($condition)
			->get('t_user')
			->row_array();

		if($user)
		{
			//更新登录信息
			$data = array(
				'user_utime'=>time(),
				'user_count'=>($user['user_count'] + 1),
				'user_uip' => $_SERVER['REMOTE_ADDR']
				);
			$this->update($user['user_id'], $data);
			//缓存用户信息
			$this->cache($user);
			return 1;
		}
		else
		{
			return 0;
		}
	}

	/**
	* 更新用户基本信息
	* ======
	* @param $user_id 	用户id
	* @param $data 		用户数据
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function update($user_id, $data)
	{
		return $this->db->where('user_id', $user_id)
			->update('t_user', $data);
	}

	/**
	* 获取用户基本信息
	* ======
	* @param $user_id 	用户id
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function get($user_id, $fields = array())
	{
		if(! $fields)
		{
			$fields = $this->getAttributes();
		}

		return $this->db->select($fields)
			->where('user_id', $user_id)
			->get('t_user')
			->row_array();
	}

	/**
	* 获取用户列表
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* @param $condition 查询条件
	* @param $order 	排序规则
	* @param $fiekds 	检索条件
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function getList($offset, $limit, $condition, $fields = array())
	{
		//组合字段
		if(! $fields)
		{
			$fields = $this->getAttributes();
		}
		//统计总数
		$count = $this->db->select('user_id')
			->where($condition)
			->get('t_user')
			->num_rows();
		//查询数据
		$result = $this->db->select($fields)
			->where($condition)
			->from('t_user')
			->limit($limit, $offset)
			->get()
			->result_array();

		return array('count'=>$count, 'result'=>$result);
	}

//=========================

	/**
	* 缓存用户信息
	* ======
	* @param $user 	用户数据
	* ======
	* @author 洪波
	* @param 13.10.22
	*/
	private function cache($user)
	{
		$this->session->set_userdata('user_id', $user['user_id']);
		$this->session->set_userdata('user_nick', $user['user_nick']);
		$this->session->set_userdata('user_avatar', $user['user_avatar']);
		$this->session->set_userdata('user_status', $user['user_status']);
	}

	/**
	* 变更用户昵称
	* ======
	* @param $user_id 	用户id
	* @param $user_nick 用户昵称
	* ======
	* @author 洪波
	* @version 13.10.22
	*/
	public function changeNick($user_id, $user_nick)
	{
		return $this->update($user_id, array('user_nick'=>$user_nick));
	}

	/**
	* 变更用户头像
	* ======
	* @param $user_id 		用户id
	* @param $user_avatar 	用户头像
	* ======
	* @author 洪波
	* @version 13.10.22
	*/
	public function changeAvatar($user_id, $user_avatar)
	{
		//删除旧图片
		$avatar = $this->get($user_id, array('user_avatar'));
		if($avatar['user_avatar'] != 'default.jpg' && $avatar['user_avatar'] != '')
		{
			@unlink('./uploads/user/' . $avatar['user_avatar']);
		}
		//更新头像
		return $this->update($user_id, array('user_avatar'=>$user_avatar));
	}

	/**
	* 设置用户性别
	* ======
	* @param $user_id 		用户id
	* @param $user_gender 	用户性别
	* ======
	* @author 洪波
	* @version 14.02.25
	*/
	public function setGender($user_id, $user_gender)
	{
		return $this->update($user_id, array('user_gender'=>$user_gender));
		//判断是否设置过
		/*
		$gender = $this->get($user_id, array('user_gender'));

		if($gender['user_gender'] == 0)
		{
			return $this->update($user_id, array('user_gender'=>$user_gender));
		}
		else
		{
			return 0;
		}*/
	}

	/**
	* 变更用户状态
	* ======
	* @param $user_id 		用户id
	* @param $user_status 	用户状态
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function changeStatus($user_id, $user_status)
	{
		return $this->update($user_id, array('user_status'=>$user_status));
	}

	/**
	* 用户变更密码
	* ======
	* @param $user_id 		用户id
	* @param $user_password 原密码
	* @param $new_password 	新密码
	* ======
	* @author 洪波
	* @version 13.02.25
	*/
	public function changePassword($user_id, $user_password, $new_password)
	{
		//判断原密码是否正确
		$condition = array(
			'user_id' => $user_id,
			'user_password' => md5($user_password)
			);
		$count = $this->db->select('user_id')
			->get_where('t_user', $condition)
			->num_rows();
		//如果密码正确，则修改
		if($count)
		{
			return $this->update($user_id, array('user_password'=>md5($new_password)));
		}
		else
		{
			return -1;
		}
	}

	/**
	* 更新用户详情
	* ======
	* @param $user_id 	用户id
	* @param $data 		用户详情数据
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function updateDetail($user_id, $data)
	{
		$count = $this->db->select('user_id')
			->get_where('t_user_detail', array('user_id'=>$user_id))
			->num_rows();
		//存在详情，则更新
		if($count)
		{
			return $this->db->where('user_id', $user_id)
				->update('t_user_detail', $data);
		}
		//不存在详情，则全新创建
		else
		{
			$data['user_id'] = $user_id;
			return $this->db->insert('t_user_detail', $data);
		}
	}

	/**
	* 获取用户详情
	* ======
	* @param $user_id 	用户id
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function getDetail($user_id, $fields = array())
	{
		if(! $fields)
		{
			$fields = array('user_id', 'user_birthday', 'user_phone', 'user_email', 'user_qq', 'user_post', 'user_address', 'user_introduce');
		}

		$detail = $this->db->select($fields)
			->get_where('t_user_detail', array('user_id'=>$user_id))
			->row_array();
		//如果不存在详情，则填充空数据
		if(! $detail)
		{
			foreach ($fields as $v)
			{
				$detail[$v] = '';
			}
		}

		return $detail;
	}

}