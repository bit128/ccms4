<?php
/**
* 目录菜单 - 控制器
* ======
* @author 洪波
* @version 13.11.18
*/
class Menu extends CI_Controller {

	public $nav_index = 42;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model', 'menu');
		$this->load->model('Admin_model', 'admin');
	}

	/**
	* 菜单目录管理 - 页面
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function menuList()
	{
		if($this->admin->validate(8))
		{
			$this->load->view('admin/v_menu_list');
		}
		else
		{
			echo '权限不足';
		}
	}

//===================================

	/**
	* 添加菜单成员
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function addMenu()
	{
		$mu_fid = $this->input->post('mu_fid');
		$mu_name = $this->input->post('mu_name');

		echo $this->menu->add($mu_fid, $mu_name);
	}

	/**
	* 获取菜单直属子菜单列表
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function getChildList($mu_fid)
	{
		echo json_encode($this->menu->getChildList($mu_fid));
	}

	/**
	* 获取菜单列表
	* ======
	* @author 洪波
	* @version 13.11.19
	*/
	public function getBrotherList($mu_id)
	{
		echo json_encode($this->menu->getBrotherList($mu_id));
	}

	/**
	* 排序菜单目录
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function sortMenu()
	{
		$mu_fid = $this->input->post('mu_fid');
		$mu_id = $this->input->post('mu_id');
		$op = $this->input->post('op');

		echo $this->menu->sort($mu_fid, $mu_id, $op);
	}

	/**
	* 更新菜单名称
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function updateName()
	{
		$mu_id = $this->input->post('mu_id');
		$mu_name = $this->input->post('mu_name');

		echo $this->menu->updateName($mu_id, $mu_name);
	}

	/**
	* 删除菜单
	* ======
	* @author 洪波
	* @version 13.11.18
	*/
	public function deleteMenu()
	{
		$mu_id = $this->input->post('mu_id');

		echo $this->menu->delete($mu_id);
	}

}