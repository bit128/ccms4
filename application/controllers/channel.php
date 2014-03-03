<?php
/**
* 栏目树 - 控制器
* ======
* @author 洪波
* @version 13.10.17
*/
class Channel extends CI_Controller {

	public $nav_index = 10;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Channel_model', 'channel');
		$this->load->model('Admin_model', 'admin');
	}

	/**
	* 显示栏目树 - 页面
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function tree()
	{
		if($this->admin->validate(1))
		{
			$this->load->view('admin/v_channel');
		}
		else
		{
			echo '权限不足';
		}
	}
	
//======================

	/**
	* 获取栏目树数据
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function getChannelTree()
	{
		isset($_REQUEST['id']) ? $cn_fid = $_REQUEST['id'] : $cn_fid = '0';

 		echo $this->channel->getList($cn_fid);
	}

	/**
	* 获取栏目详情
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function getChannel()
	{
		$cn_id = $this->input->post('cn_id');

		echo json_encode($this->channel->get($cn_id));
	}

	/**
	* 添加栏目
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function addChannel()
	{
		$cn_name = $this->input->post('cn_name');
		$cn_fid = $this->input->post('cn_fid');

		echo $this->channel->create($cn_fid, $cn_name);
	}

	/**
	* 重命名栏目
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function renameChannel()
	{
		$cn_id = $this->input->post('cn_id');
		$cn_name = $this->input->post('cn_name');

		echo $this->channel->rename($cn_id, $cn_name);
	}

	/**
	* 更新栏目
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function updateChannel()
	{
		$cn_id = $this->input->post('cn_id');
		$data = array(
			'cn_nick' => $this->input->post('cn_nick'),
			'cn_url' => $this->input->post('cn_url'),
			'cn_status' => $this->input->post('cn_status')
			);

		echo $this->channel->update($cn_id, $data);
	}

	/**
	* 变更栏目排序
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function changeOrder()
	{
		$cn_id = $this->input->post('cn_id');
		$cn_fid = $this->input->post('cn_fid');
		$by_id = $this->input->post('by_id');
		$type = $this->input->post('type');

		$this->channel->changeOrder($cn_id, $cn_fid, $by_id, $type);
	}

	/**
	* 删除栏目
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function deleteChannel()
	{
		$cn_id = $this->input->post('cn_id');
		//栏目删除内容
		$this->load->model('Content_model', 'content');
		$this->content->deleteAll($cn_id);
		//删除栏目
		echo $this->channel->delete($cn_id);
	}

	/**
	* 创建快捷方式
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function createShortCut()
	{
		$cn_id = $this->input->post('cn_id');
		$cn_name = $this->input->post('cn_name');

		echo $this->channel->createShortCut($cn_id, $cn_name);
	}

	/**
	* 获取快捷方式列表
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function getShortCut()
	{
		echo json_encode($this->channel->getShortCut());
	}

	/**
	* 重命名快捷方式
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function renameShortCut()
	{
		$cn_id = $this->input->post('cn_id');
		$cns_name = $this->input->post('cns_name');

		echo $this->channel->renameShortCut($cn_id, $cns_name);
	}

	/**
	* 排序快捷方式
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function orderShortCut($cn_id, $order)
	{
		echo $this->channel->orderShortCut($cn_id, $order);
	}

	/**
	* 删除快捷方式
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function deleteShortCut($cn_id)
	{
		echo $this->channel->deleteShortCut($cn_id);
	}

}