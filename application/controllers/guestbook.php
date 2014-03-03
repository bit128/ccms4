<?php
/**
* 留言板 - 控制器
* ======
* @author 洪波
* @version 13.10.19
*/
class Guestbook extends CI_Controller {

	public $nav_index = 20;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Guestbook_model', 'guestbook');
		$this->load->model('Admin_model', 'admin');
	}

	/**
	* 留言列表 - 页面
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function guestbookList($offset = 0, $type = 0)
	{
		if($this->admin->validate(2))
		{
			$this->load->library('pagination');
			$limit = 20;
			$result = $this->guestbook->getList($offset, $limit, array('gb_type'=>$type), array('gb_id','gb_title','gb_ctime','gb_status'));
			//分页
			$config['base_url'] = site_url('guestbook/guestbookList');
	        $config['suffix'] = '/'.$type;
	        $config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
	        $config['total_rows'] = $result['count'];
	        $config['per_page'] = $limit;
	        $this->pagination->initialize($config);
	        $pages = $this->pagination->create_links();

	        $data = array(
	        	'gb_type' => $type,
	        	'guestbook' => $result['result'],
	        	'pages' => $pages
	        	);
			$this->load->view('admin/v_guestbook_list', $data);
		}
		else
		{
			echo '权限不足';
		}
	}

	/**
	* 留言详情 - 页面
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function guestbookDetail($gb_id)
	{
		if($this->admin->validate(2))
		{
			if($guestbook = $this->guestbook->get($gb_id))
			{
				$this->load->view('admin/v_guestbook_detail', array('guestbook'=>$guestbook));
			}
		}
		else
		{
			echo '权限不足';
		}
	}

//====================================

	/**
	* 添加留言
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function addGuestbook()
	{
		$data = array(
			'gb_type' => $this->input->post('gb_type'),
			'gb_title' => $this->input->post('gb_title'),
			'gb_content' => $this->input->post('gb_content'),
			'gb_username' => $this->input->post('gb_username'),
			'gb_phone' => $this->input->post('gb_phone'),
			'gb_email' => $this->input->post('gb_email'),
			'gb_contact' => $this->input->post('gb_contact')
			);

		echo $this->guestbook->create($data);
	}

	/**
	* 变更留言状态
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function changeStatus()
	{
		$gb_id = $this->input->post('gb_id');
		$gb_status = $this->input->post('gb_status');

		echo $this->guestbook->changeStatus($gb_id, $gb_status);
	}

	/**
	* 删除留言
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function deleteGuestbook()
	{
		$gb_id = $this->input->post('gb_id');

		echo $this->guestbook->delete($gb_id);
	}

//===============================

	/**
	* 添加留言反馈
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function addReply()
	{
		if($am_account = $this->session->userdata('am_account'))
		{
			$data = array(
				'gb_id' => $this->input->post('gb_id'),
				'gbr_type' => $this->input->post('gbr_type'),
				'gbr_content' => $this->input->post('gbr_content'),
				'am_account' => $am_account
				);

			echo $this->guestbook->addReply($data);
		}
		else
		{
			echo '-1';
		}
	}

	/**
	* 获取留言反馈列表
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function getReply()
	{
		$gb_id = $this->input->post('gb_id');

		echo json_encode($this->guestbook->getReply($gb_id));
	}

	/**
	* 删除留言反馈
	* ======
	* @author 洪波
	* @version 13.10.19
	*/
	public function deleteReply()
	{
		$gbr_id = $this->input->post('gbr_id');

		echo $this->guestbook->deleteReply(array('gbr_id'=>$gbr_id));
	}

}