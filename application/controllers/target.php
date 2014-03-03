<?php
/**
* 标签 - 控制器
* ======
* @author 洪波
* @version 13.12.28
*/
class Target extends CI_Controller {

	public $nav_index = 43;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Target_model', 'target');
	}

	/**
	* 标签管理 - 页面
	* ======
	* @author 洪波
	* @version 13.12.28
	*/
	public function targetList()
	{
		$this->load->view('admin/v_target_list');
	}

//==============================

	/**
	* 添加标签/标签组
	* ======
	* @author 洪波
	* @version 13.12.28
	*/
	public function addTarget()
	{
		if($tg_name = $this->input->post('tg_name'))
		{
			$tg_fid = $this->input->post('tg_fid');
			echo $this->target->create($tg_fid, $tg_name);
		}
	}

	/**
	* 获取标签/标签组列表
	* ======
	* @author 洪波
	* @version 13.12.28
	*/
	public function getTargetList($tg_fid)
	{
		$offset = 0;
		$limit = 1000;
		echo json_encode($this->target->getList($offset, $limit, $tg_fid));
	}

	/**
	* 获取全部标签列表
	* ======
	* @author 洪波
	* @version 14.02.19
	*/
	public function getAllTargetList()
	{
		echo json_encode($this->target->getAllList());
	}

	/**
	* 删除标签/标签组
	* ======
	* @author 洪波
	* @version 13.12.28
	*/
	public function deleteTarget()
	{
		if($tg_id = $this->input->post('tg_id'))
		{
			echo $this->target->delete($tg_id);
		}
	}
}