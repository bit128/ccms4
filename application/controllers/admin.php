<?php
/**
* 管理员 - 控制器
* ======
* @author 洪波
* @version 13.10.18
*/
class Admin extends CI_Controller {

	public $nav_index = 64;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model', 'admin');
	}

	/**
	* 管理员列表 - 页面
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function adminList()
	{
		if($this->admin->validate(64))
		{
			$data = array(
			'admin' => $this->admin->getList()
			);
			$this->load->view('admin/v_admin_list', $data);
		}
		else
		{
			echo '权限不足';
		}
	}

	/**
	* 管理员登录 - 页面
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function adminLogin()
	{
		$this->load->view('admin/v_admin_login');
	}

	/**
	* 管理员登录后 - 页面
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function adminHome()
	{
		$this->load->view('admin/v_admin_home.php');
	}

//===============================

	/**
	* 添加管理员
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function addAdmin()
	{
		$am_account = $this->input->post('am_account');
		$am_password = $this->input->post('am_password');
		$am_role = $this->input->post('am_role');

		echo $this->admin->create($am_account, $am_password, $am_role);
	}

	/**
	* 变更管理员状态
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function changeStatus()
	{
		$am_id = $this->input->post('am_id');
		$am_status = $this->input->post('am_status');

		echo $this->admin->changeStatus($am_id, $am_status);
	}

	/**
	* 变更管理员权限
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function changeRole()
	{
		$am_id = $this->input->post('am_id');
		$role = $this->input->post('role');
		$op = $this->input->post('op');

		echo $this->admin->changeRole($am_id, $role, $op);
	}

	/**
	* 删除管理员
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function deleteAdmin()
	{
		$am_id = $this->input->post('am_id');

		echo $this->admin->delete($am_id);
	}

	/**
	* 管理员登录
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function login()
	{
		$am_account = $this->input->post('am_account');
		$am_password = $this->input->post('am_password');

		if($this->admin->login($am_account, $am_password))
		{
			redirect('admin/adminHome');
		}
	}

	/**
	* 注销管理员登录
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/adminLogin');
	}

}