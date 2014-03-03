<?php
/**
* 用户 - 控制器
* ======
* @author 洪波
* @version 13.10.20
*/
class User extends CI_Controller {

	public $nav_index = 30;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
		$this->load->model('Admin_model', 'admin');
	}

	/**
	* 用户列表 - 页面
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function userList($offset = 0, $user_status = 0, $keyword = '')
	{
		if($this->admin->validate(4))
		{
			$this->load->library('pagination');
			$limit = 20;
			//组合查询条件
			$condition = array();
			if($user_status != 0)
			{
				$condition = "user_status = {$user_status}";
			}
			if($keyword != '')
			{
				$keyword = urldecode($keyword);
				$str = "user_id = '{$keyword}' OR user_account like '%{$keyword}%' OR user_nick like '%{$keyword}%'";
				if($condition)
					$condition = $str;
				else
					$condition .= ' AND (' . $str . ')';
			}
			//查询结果
			$result = $this->user->getList($offset, $limit, $condition);
			//分页
			$config['base_url'] = site_url('user/userList');
	        $config['suffix'] = '/'.$user_status.'/'.$keyword;
	        $config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
	        $config['total_rows'] = $result['count'];
	        $config['per_page'] = $limit;
	        $this->pagination->initialize($config);
	        $pages = $this->pagination->create_links();

	        $data = array(
	        	'result' => $result['result'],
	        	'pages' => $pages
	        	);
			$this->load->view('admin/v_user_list.php', $data);
		}
		else
		{
			echo '权限不足';
		}
	}

	/**
	* 用户详情 - 页面
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function userDetail($user_id)
	{
		if($this->admin->validate(4))
		{
			$user = $this->user->get($user_id);
			if($user)
			{
				$user_detail = $this->user->getDetail($user_id);
				$data = array(
					'user' => $user,
					'user_detail' => $user_detail
					);
				$this->load->view('admin/v_user_detail', $data);
			}
		}
		else
		{
			echo '权限不足';
		}
	}

//========================================

	/**
	* 检查账户重名
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function checkAccount()
	{
		$account = $this->input->post('account');

		if($this->user->checkAccount($account))
			echo 1;
		else
			echo 0;
	}

	/**
	* 用户注册
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function register()
	{
		$user_account = $this->input->post('user_account');
		$user_password = trim($this->input->post('user_password'));
		$user_nick = $this->input->post('user_nick');
		if($this->user->checkAccount($user_account))
		{
			echo $this->user->register($user_account, $user_password, $user_nick, 2);
		}
		else
		{
			//TODO 账户重名
		}
	}

	/**
	* 用户登录
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function login()
	{
		$account = $this->input->post('user_account');
		$password = trim($this->input->post('user_password'));

		echo $this->user->login($account, $password);
	}

	/**
	* 用户登出
	* ======
	* @author 洪波
	* @version 13.10.20
	*/
	public function logout()
	{
		$this->session->sess_destroy();
	}

	/**
	* 变更用户昵称
	* ======
	* @author 洪波
	* @version 13.10.22
	*/
	public function changeNick()
	{
		$user_id = $this->session->userdata('user_id');
		$user_status = $this->input->post('user_status');

		echo $this->user->changeNick($user_id, $user_status);
	}

	/**
	* 用户变更头像
	* ======
	* @author 洪波
	* @version 13.10.22
	*/
	public function changeAvatar()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$user_avatar = $this->input->post('user_avatar');
			echo $this->user->changeAvatar($user_id, $user_avatar);
		}
	}

	/**
	* 用户变更性别
	* ======
	* @author 洪波
	* @version 13.10.22
	*/
	public function changeGender()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$user_gender = $this->input->post('user_gender');
			echo $this->user->setGender($user_id, $user_gender);
		}
	}

	/**
	* 变更用户状态
	* ======
	* @author 洪波
	* @version 13.10.22
	*/
	// public function changeStatus()
	// {
	// 	$user_id = $this->input->post('user_id');
	// 	$user_status = $this->input->post('user_status');

	// 	echo $this->user->changeStatus($user_id, $user_status);
	// }

	/**
	* 用户变更密码
	* ======
	* @author 洪波
	* @version 14.02.25
	*/
	public function changePassword()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$user_password = $this->input->post('user_password');
			$new_password = $this->input->post('new_password');

			echo $this->user->changePassword($user_id, $user_password, $new_password);
		}
	}

	/**
	* 更新用户详情
	* ======
	* @author 洪波
	* @version 14.02.23
	*/
	public function updateDetail()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$data = array(
				'user_phone' => $this->input->post('user_phone'),
				'user_email' => $this->input->post('user_email'),
				'user_qq' => $this->input->post('user_qq'),
				'user_post' => $this->input->post('user_post'),
				'user_address' => $this->input->post('user_address')
				);
			$birthday = $this->input->post('user_birthday');
			if($birthday != '')
			{
				$data['user_birthday'] = strtotime($birthday);
			}
			echo $this->user->updateDetail($user_id, $data);
		}
	}

}