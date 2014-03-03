<?php
/**
* 内容 - 控制器
* ======
* @author 洪波
* @version 13.10.17
*/
class Content extends CI_Controller {

	public $nav_index = 10;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Content_model', 'content');
		$this->load->model('Admin_model', 'admin');
	}

	/**
	* 内容列表 - 页面
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function contentList($offset, $cn_id, $keyword='')
	{
		if($this->admin->validate(1))
		{
			$this->load->library('pagination');
			$limit = 20;
			$condition = "cn_id = '{$cn_id}'";
			if($keyword != '')
			{
				$keyword = urldecode($keyword);
				$condition .= "AND ct_title like '%{$keyword}%'";
			}
			$result = $this->content->getList($offset, $limit, $condition, array('ct_id', 'ct_title', 'ct_ctime', 'ct_status'));
			//分页
			$config['base_url'] = site_url('content/contentList');
	        $config['suffix'] = '/'.$cn_id.'/'.$keyword;
	        $config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
	        $config['total_rows'] = $result['count'];
	        $config['per_page'] = $limit;
	        $this->pagination->initialize($config);
	        $pages = $this->pagination->create_links();

			$data = array(
				'cn_id' => $cn_id,
				'content' => $result['result'],
				'pages' => $pages
				);
			$this->load->view('admin/v_content_list', $data);
		}
		else
		{
			echo '权限不足';
		}
	}

	/**
	* 内容详情 - 页面
	* ======
	* @author 洪波
	* @version 13.10.17
	*/
	public function contentDetail($cn_id, $ct_id='')
	{
		if($this->admin->validate(1))
		{
			$content = array(
			'ct_id' => $ct_id,
			'cn_id' => $cn_id,
			'ct_title' => '',
			'ct_subtitle' => '',
			'ct_image' => '',
			'ct_summary' => '',
			'ct_detail' => '',
			'ct_status' => 1
			);
			if($ct_id != '')
			{
				$result = $this->content->get(array('ct_id'=>$ct_id));
				if($result)
				{
					$content = $result;
				}
			}
			if($content['ct_image'] == '')
				$content['ct_image'] = 'default.jpg';

			$data = array(
				'content' => $content
				);
			$this->load->view('admin/v_content_detail', $data);
		}
		else
		{
			echo '权限不足';
		}
	}

//=========================================

	/**
	* 接收post参数
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	private function getParam()
	{
		$ct_image = $this->input->post('ct_image');
		if($ct_image == 'default.jpg')
			$ct_image = '';

		return array(
			'ct_id' => $this->input->post('ct_id'),
			'data' => array(
				'cn_id' => $this->input->post('cn_id'),
				'ct_image' => $ct_image,
				'ct_title' => $this->input->post('ct_title'),
				'ct_subtitle' => $this->input->post('ct_subtitle'),
				'ct_summary' => $this->input->post('ct_summary'),
				'ct_detail' => $this->input->post('ct_detail'),
				'ct_ctime' => time(),
				'ct_status' => $this->input->post('ct_status')
				)
			);
	}

	/**
	* 添加新内容
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function addContent()
	{
		$param = $this->getParam();
		$data = $param['data'];
		$data['ct_id'] = uniqid();

		if($this->content->create($data))
		{
			echo $data['ct_id'];
		}
	}

	/**
	* 更新内容
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function updateContent()
	{
		$param = $this->getParam();

		echo $this->content->update($param['ct_id'], $param['data']);
	}

	/**
	* 删除内容
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function deleteContent()
	{
		$ct_id = $this->input->post('ct_id');
		$this->content->delete($ct_id);
	}

}