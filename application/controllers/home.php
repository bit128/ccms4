<?php
/**
* 站点主控制器
* ======
* @author 洪波
* @version 14.02.01
*/
class Home extends CI_Controller {

	public $title = "彩网贸易CTS";

	public function __construct()
	{
		parent::__construct();
		if($web_title = $this->session->userdata('web_title'))
		{
			$this->title = $web_title;
		}
		else
		{
			$title = $this->getContent('536e037497e9c', 'ct_title');
			$this->session->set_userdata('web_title', $title['ct_title']);
			$this->title = $title['ct_title'];
		}
	}

	/**
	* 首页 - 页面
	* ======
	* @author 洪波
	* @version 14.02.01
	*/
	public function index()
	{
		//首页幻灯
		$banner = $this->getContentList(0, 10, '532e44796a9ef', 1, 'ct_id,ct_title,ct_subtitle,ct_image');
		//公司简介
		$detail = $this->getContent('532e4b77b35c8', 'ct_summary');

		$this->title = '首页 | ' . $this->title;
		$data = array(
			'banner' => $banner['result'],
			'detail' => $detail
			);
		$this->load->view('home/v_index', $data);
	}

	/**
	* 公共页 - 页面
	* ======
	* @author 洪波
	* @version 14.04.01
	*/
	public function pubpage($ct_id)
	{
		if(strlen($ct_id) == 13)
		{
			$content = $this->getContent($ct_id);
			$data = array(
				'content' => $content
				);
			$this->load->view('home/v_public', $data);
		}
	}

	/**
	* 商品列表 - 页面
	* ======
	* @author 洪波
	* @version 14.02.01
	*/
	public function product($offset, $categorys, $targets, $keyword = '')
	{
		//获取商品种类列表
		$category_list = $this->buildCategory($categorys, $targets);
		$target_list = $this->buildTarget($categorys, $targets);
		//组合查询条件
		$condition = 'pd_status = 1';
		if($categorys != '0')
		{
			$this->load->model('Menu_model', 'menu');
			$category = "('" . implode("','", $this->menu->getInclude($categorys)) . "')";
			$condition .= " AND pd_category in {$category}";
		}
		if($targets != '0')
		{
			$flag = false;
			$this->load->model('Target_model', 'target');
			$t = explode('-', $targets);
			$pd_ids = array();
			foreach ($t as $v)
			{
				if($v != '0' && $v != '')
				{
					$flag = true;
					$arr = $this->target->getProductByTarget($v);
					if($pd_ids)
						$pd_ids = array_intersect($pd_ids, $arr);
					else
						$pd_ids = $arr;
				}
			}
			if($pd_ids)
			{
				$condition .= " AND pd_id in ('" . implode("','", $pd_ids) . "')";
			}
			else
			{
				if($flag)
					$condition = "pd_id = '-1'";
			}
		}
		if($keyword != '')
		{
			$keyword = urldecode(urldecode($keyword));
			$condition .= " AND pd_name like '%{$keyword}%'";
		}
		//分页显示数据
		$this->load->model('Product_model', 'product');
		$limit = 9;
		$product_list = $this->product->getList($offset, $limit, $condition);
		$this->load->library('pagination');
		$config['base_url'] = site_url('home/product');
        $config['suffix'] = '/'.$categorys.'/'.$targets.'/'.$keyword;
        $config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
        $config['total_rows'] = $product_list['count'];
        $config['per_page'] = $limit;
        $this->pagination->initialize($config);
        $pages = $this->pagination->create_links();

        $this->title = '产品中心 | ' . $this->title;
		$data = array(
			'category_list' => $category_list,
			'target_list' => $target_list,
			'product_list' => $product_list['result'],
			'pages' => $pages
			);
		$this->load->view('home/v_product', $data);
	}

	/**
	* 商品详情 - 页面
	* ======
	* @author 洪波
	* @version 14.02.07
	*/
	public function item($id)
	{
		if(isset($id))
		{
			$this->load->model('Product_model', 'product');
			$this->load->model('Storage_model', 'storage');
			$product_detail = $this->product->get($id, 1, 2);
			//增加点击量
			$this->product->click($id);
			//获取库存
			$product_storage = $this->storage->getList(0, 20, array(
				'pd_id' => $product_detail['pd_id'],
				'st_status' => 1
				), 1);

			$this->title = $product_detail['pd_name'] . ' | 产品中心 | ' . $this->title;
			$data = array(
				'products' => $product_detail,
				'storages' => $product_storage['result'],
				);
			$this->load->view('home/v_item', $data);
		}
	}

	/**
	* 修身养性 - 页面
	* ======
	* @author 洪波
	* @version 14.02.01
	*/
	public function solution()
	{
		$cn_id = '52f6fa53a0520';
		//获取子栏目id列表
		$child = $this->getChannelList(0, 99, $cn_id, 'cn_id,cn_order');
		//获取子栏目内容列表
		$result = array();
		foreach ($child['result'] as $v)
		{
			$rs = $this->getContentList(0, 1, $v['cn_id'], 2);
			if($rs['count'] > 0)
			{
				$result[$v['cn_order']] = $rs['result'][0];
			}
		}

		$this->title = '修身养性 | ' . $this->title;
		$data = array(
			'solution_list' => $result
			);
		$this->load->view('home/v_solution', $data);
	}

	/**
	* 解决方案列表 - 页面
	* ======
	* @author 洪波
	* @version 14.03.31
	*/
	public function solution_list($cn_id, $ct_id = '')
	{
		if($cn_id != '')
		{
			$cn_fid = '52f6fa53a0520';
			$path = site_url('home/solution_list');
			$breadcrumb = '';
			$title = '';
			//生成nav（获取子栏目列表）
			$side = $this->getChannelList(0, 99, $cn_fid, 'cn_id,cn_name');
			$data = array(
				'side' => $side['result'],
				'cn_id' => $cn_id
				);
			//获取当前栏目名称
			$cn_name = $this->getChannel($cn_id);
			$data['title'] = $cn_name['cn_name'];
			$breadcrumb .= '/ <a href="'.$path.'/'.$cn_id.'">'.$cn_name['cn_name'].'</a>';
			//获取当前栏目列表
			if($ct_id == '')
			{
				//显示列表
				$content = $this->getContentList(0, 20, $cn_id, 1, 'ct_id,ct_title,ct_ctime');
				$data['content_list'] = $content['result'];
			}
			else
			{
				$data['content_list'] = 0;
				//显示内容
				$content = $this->getContent($ct_id);
				$data['content'] = $content;
				$data['title'] = $content['ct_title'];
				$breadcrumb .= ' / '.$content['ct_title'];
			}
			$data['breadcrumb'] = $breadcrumb;

			$this->title = $data['title'] . ' | 修身养性 | ' . $this->title;
			$this->load->view('home/v_solution_list', $data);
		}
	}

	private $content_breadcrumb = array(
		'solution' => '修身养性',
		'news' => '新闻中心',
		'support' => '购买合作'
		);

	/**
	* 内容列表 - 页面
	* ======
	* @author 洪波
	* @version 14.02.01
	*/
	public function content($offset, $type, $cn_id)
	{
		$this->load->model('Content_model', 'content');

		$breadcrumb = $this->content_breadcrumb;
		//获取栏目详情
		$channel = $this->getChannel($cn_id);
		//获取兄弟栏目列表
		$channel_list = $this->getChannelList(0, 20, $channel['cn_fid'], 'cn_id,cn_name');
		//获取栏目下内容列表
		$content_limit = 12;
		$content_list = $this->content->getList($offset, $content_limit, "cn_id = '{$cn_id}' AND ct_status != 0", 'ct_id,ct_title,ct_ctime');
		$this->load->library('pagination');
		$config['base_url'] = site_url('home/content');
        $config['suffix'] = '/'.$type.'/'.$cn_id;
        $config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
        $config['total_rows'] = $content_list['count'];
        $config['per_page'] = $content_limit;
        $this->pagination->initialize($config);
        $content_pages = $this->pagination->create_links();

		if($channel)
		{
			$this->title = $channel['cn_name'] . ' | 公司新闻 | ' . $this->title;
			$data = array(
				'type' => $type,
				'breadcrumb' => $breadcrumb[$type],
				'channel' => $channel,
				'channel_list' => $channel_list,
				'content_list' => $content_list['result'],
				'content_pages' => $content_pages
				);
			$this->load->view('home/v_content', $data);
		}
		
	}

	/**
	* 内容详情 - 页面
	* ======
	* @author 洪波
	* @version 14.02.09
	*/
	public function content_detail($type, $ct_id)
	{
		$content = $this->getContent($ct_id);
		if($content)
		{
			$breadcrumb = $this->content_breadcrumb;
			//获取内容详情
			$content = $this->getContent($ct_id);
			//获取栏目详情
			$channel = $this->getChannel($content['cn_id']);

			$this->title = $content['ct_title'] . ' | ' . $channel['cn_name'] . ' | ' . $this->title;
			$data = array(
				'type' => $type,
				'breadcrumb' => $breadcrumb[$type],
				'content' => $content,
				'channel' => $channel
				);
			$this->load->view('home/v_content_detail', $data);
		}
	}

	/**
	* 新闻中心 - 页面
	* ======
	* @author 洪波
	* @version 14.02.01
	*/
	// public function news()
	// {
	// 	$this->load->view('home/v_news');
	// }

	/**
	* 购买合作 - 页面
	* ======
	* @author 洪波
	* @version 14.02.01
	*/
	// public function support()
	// {
	// 	$this->load->view('home/v_support');
	// }

	/**
	* 关于我们 - 页面
	* ======
	* @author 洪波
	* @version 14.02.01
	*/
	public function about()
	{
		$this->title = '关于我们 | ' . $this->title;
		$data = array(
			'detail' => $this->getContent('532e4b77b35c8'),
			'style' => $this->getContent('532e4f90468bc'),
			'fac' => $this->getContent('532e4f74e76c2'),
			'emp' => $this->getContent('532e4f538b530')
			);
		$this->load->view('home/v_about', $data);
	}

	/**
	* 联系我们 - 页面
	* ======
	* @author 洪波
	* @version 14.02.01
	*/
	public function contact()
	{
		$this->title = '联系我们 | ' . $this->title;
		$cont = $this->getContent('532e569d0f2a9', 'ct_image, ct_detail');
		$data = array(
			'cont' => $cont
			);
		$this->load->view('home/v_contact', $data);
	}

	/**
	* 登录注册 - 页面
	* ======
	* @author 洪波
	* @version 14.02.07
	*/
	public function login()
	{
		$this->title = '登录注册 | ' . $this->title;
		$this->load->view('home/v_login');
	}

	/**
	* 找回密码
	* ======
	* @author 洪波
	* @version 14.05.10
	*/
	public function findPassword()
	{
		if($account = $this->input->post('account'))
		{
			//检查账户是否存在
			$this->load->model('User_model', 'user');
			if($this->user->checkAccount($account))
			{
				echo '账号不存在.';
			}
			else
			{
				$new_password = $this->user->resetPassword($account);
				if($new_password)
				{
					$this->load->library('email'); 
	                //参数设置
	                $config['protocol'] = 'smtp';
	                $config['smtp_host'] = 'smtp.163.com';
	                $config['smtp_user'] = 'ct880_colour';
	                $config['smtp_pass'] = 'ct880@colour';
	                $config['smtp_port'] = '25';
	                $config['charset'] = 'utf-8';
	                $config['wordwrap'] = TRUE;
	                $config['mailtype'] = 'html';
	                $this->email->initialize($config);
	                //以下设置Email内容  
	                $this->email->from('ct880_colour@163.com', $this->title);
	                $this->email->to($account);
	                $this->email->subject($this->title . '协助您找回用户密码.');
	                $this->email->message('<p>您好！根据您的请求，我们已经为您重设了密码：'.$new_password.'，请您尽快登录后，并重新修改。</p>');
	                $this->email->send();

	                echo '新密码已经发往您的邮箱，请注意查收.';
				}
				else
				{
					echo '重置密码失败，请联系网站管理人员.';
				}
			}
		}
	}

	/**
	* 购物车 - 页面
	* ======
	* @author 洪波
	* @version 14.02.07
	*/
	public function shoppingcart()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$this->load->model('Order_model', 'order');
			$shoppingcart = $this->order->getCartList(0, 100, $user_id);

			$this->title = '询价单 | ' . $this->title;
			$data = array(
				'shoppingcart'=>$shoppingcart
				);
			$this->load->view('home/v_shoppingcart', $data);
		}
	}

	/**
	* 我的账户信息 - 页面
	* ======
	* @author 洪波
	* @version 14.02.07
	*/
	public function my()
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$this->load->model('User_model', 'user');
			$users = $this->user->get($user_id);
			$detail = $this->user->getDetail($user_id);

			$this->title = '我的账户 | ' . $this->title;
			$data = array(
				'users' => $users,
				'detail' => $detail
				);
			$this->load->view('home/v_my', $data);
		}
		
	}

	/**
	* 我的订单 - 页面
	* ======
	* @author 洪波
	* @version 14.02.07
	*/
	public function my_order($offset = 0, $status = 0)
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$this->load->model('Order_model', 'order');
			$condition = array(
				'user_id' => $user_id,
				'od_status' => $status
				);
			$limit = 10;
			$order_list = $this->order->getOrderList($offset, $limit, $condition);
			//分页
			$this->load->library('pagination');
			$config['base_url'] = site_url('home/my_order');
			$config['suffix'] = '/'.$status;
			$config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
			$config['total_rows'] = $order_list['count'];
			$config['per_page'] = $limit;
			$this->pagination->initialize($config);
			$pages = $this->pagination->create_links();

			$this->title = '我的询价单 | ' . $this->title;
			$data = array(
				'od_status' => $status,
				'order_list' => $order_list['result'],
				'pages' => $pages
				);
			$this->load->view('home/v_my_order', $data);
		}
	}

	/**
	* 我的收藏 - 页面
	* ======
	* @author 洪波
	* @version 14.02.07
	*/
	public function my_collection($offset = 0)
	{
		if($user_id = $this->session->userdata('user_id'))
		{
			$this->load->model('Order_model', 'order');
			$limit = 10;
			$collection = $this->order->getCartList($offset, $limit, $user_id, 1);
			//分页
			$this->load->library('pagination');
			$config['base_url'] = site_url('home/my_collection');
			//$config['suffix'] = '/'.$status;
			//$config['first_url'] = $config['base_url'].'/0'.$config['suffix'];
			$config['total_rows'] = $collection['count'];
			$config['per_page'] = $limit;
			$this->pagination->initialize($config);
			$pages = $this->pagination->create_links();

			$this->title = '我的收藏 | ' . $this->title;
			$data = array(
				'collection' => $collection['result'],
				'pages' => $pages
				);
			$this->load->view('home/v_my_collection', $data);
		}
	}

	/**
	* 我的安全设置 - 页面
	* ======
	* @author 洪波
	* @version 14.02.07
	*/
	public function my_safety()
	{
		$this->title = '安全设置 | ' . $this->title;
		$this->load->view('home/v_my_safety');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

//==============================================
//=============  后台统一调用方法  ===============
//==============================================

	/**
	* 获取子栏目列表
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* @param $cn_id 	栏目id
	* @param $fields 	检索字段
	* ======
	* @author 洪波
	* @version 14.02.09
	*/
	private function getChannelList($offset, $limit, $cn_id, $fields = array())
	{
		$this->load->model('Channel_model', 'channel');
		return $this->channel->getChildList($offset, $limit, array('cn_fid'=>$cn_id), $fields);
	}

	/**
	* 获取自乱木列表 - 前端调用
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* ======
	* @author 洪波
	* @version 14.05.10
	*/
	public function channelList($offset, $limit, $cn_id)
	{
		$rs = $this->getChannelList($offset, $limit, $cn_id);
		echo json_encode($rs);
	}

	/**
	* 获取栏目详情
	* ======
	* @param $cn_id 	栏目id
	* ======
	* @author 洪波
	* @version 14.02.09
	*/
	public function getChannel($cn_id)
	{
		$this->load->model('Channel_model', 'channel');
		return $this->channel->get($cn_id);
	}

	/**
	* 获取栏目内容列表
	* ======
	* @param $offset 	起始位置
	* @param $limit 	查询行数
	* @param $cn_id 	栏目id
	* @param $fields 	检索字段
	* ======
	* @author 洪波
	* @version 14.02.09
	*/
	private function getContentList($offset, $limit, $cn_id, $ct_status = 1, $fields = array())
	{
		$this->load->model('Content_model', 'content');
		$condition = array(
			'cn_id' => $cn_id,
			'ct_status' => $ct_status
			);
		return $this->content->getList($offset, $limit, $condition, $fields);
	}

	/**
	* 获取内容快捷列表
	* ======
	* @param $cn_id 	栏目id
	* @param $count 	获取数量
	* ======
	* @author 洪波
	* @version 14.03.08
	*/
	public function getContentExpress($cn_id, $limit)
	{
		$this->load->model('Content_model', 'content');
		$condition = array(
			'cn_id' => $cn_id,
			'ct_status' => 2
			);
		$result = $this->content->getList(0, $limit, $condition);
		echo json_encode($result);
	}

	/**
	* 获取内容详情
	* ======
	* @param $ct_id 	内容id
	* @param $fields 	检索字段
	* ======
	* @author 洪波
	* @version 14.02.09
	*/
	private function getContent($ct_id, $fields = array())
	{
		$this->load->model('Content_model', 'content');
		return $this->content->get(array('ct_id'=>$ct_id), $fields);
	}

	/**
	* 显示内容详情 - 前端调用
	* ======
	* @param $ct_id 	内容id
	* ======
	* @author 洪波
	* @version 14.05.10
	*/
	public function showContent($ct_id)
	{
		$rs = $this->getContent($ct_id);
		echo json_encode($rs);
	}
	
	/**
	* 构建商品分类
	* ======
	* @param $category 	商品分类
	* @param $target 	标签
	* ======
	* @author 洪波
	* @version 14.02.16
	*/
	private function buildCategory($category, $target)
	{
		$this->load->model('Menu_model', 'menu');
		if($category == '0')
		{
			$child = $this->menu->getChildList($category);
			$item = array();
			foreach ($child as $v)
			{
				$index = $v['mu_sort'];
				$item[$index]['select'] = 0;
				$item[$index]['id'] = $v['mu_id'];
				$item[$index]['name'] = $v['mu_name'];
			}
			$result = array(0 => $item);
		}
		else
		{
			$result = $this->menu->getParentList($category);
			//判断是否有子级菜单
			$child = $this->menu->getChildList($category);
			if($child)
			{
				foreach ($child as $v)
				{
					$index = $v['mu_sort'];
					$result[3][$index]['select'] = 0;
					$result[3][$index]['id'] = $v['mu_id'];
					$result[3][$index]['name'] = $v['mu_name'];
				}
			}
			ksort($result);
		}
		//打印结构
		$prefix = site_url('home/product');
		$html = '';
		$head = true;
		foreach ($result as $v)
		{
			$html .= '<div class="con-class clearfix">';
			if($head)
			{
				$html .= '<div class="con-left"><h3>产品分类</h3></div><div class="tags2">';
				if($category != '0')
				{
					$html .= '<a href="'.$prefix.'/0/0/'.$target.'">不限</a>';
				}
				else
				{
					$html .= '<a href="javascript:;" class="cur">不限</a>';
				}
			}
			else
			{
				$html .= '<div class="con-left"><h3>&nbsp;</h3></div><div class="tags2">';
			}
			$head = false;
			foreach ($v as $iv)
			{
				if($iv['select'] == '1')
				{
					$html .= '<a href="'.$prefix.'/0/'.$iv['id'].'/'.$target.'" class="cur">'.$iv['name'].'</a>';
				}
				else
				{
					$html .= '<a href="'.$prefix.'/0/'.$iv['id'].'/'.$target.'">' . $iv['name'] . '</a>';
				}
			}
			$html .= '</div></div>';
		}
		return $html;
	}

	/**
	* 构建商品标签
	* ======
	* @param $category 	分类id
	* @param $target 	标签id
	* ======
	* @author 洪波
	* @version 14.02.16
	*/
	private function buildTarget($category, $target)
	{
		$this->load->model('Target_model', 'target');
		$result = $this->target->getAllList();
		$c = count($result);
		$select = array();
		if($target == '0')
		{
			for($i = 0; $i < $c; ++$i)
			{
				$select[$i] = '0';
			}
		}
		else
		{
			$select = explode('-', $target);
		}
		//打印结构
		$prefix = site_url('home/product');
		$html = '';
		for ($i = 0; $i < $c; ++$i)
		{
			$s = $select[$i];
			$html .= '<div class="con-class clearfix"><div class="con-left"><h3>'.$result[$i]['group_name'].'</h3></div><div class="tags2">';
			if($s == '0')
			{
				$html .= '<a href="'.$prefix.'/0/'.$category.'/'.$this->buildTargetParam($select, $i, '0').'" class="cur">不限</a>';
			}
			else
			{
				$html .= '<a href="'.$prefix.'/0/'.$category.'/'.$this->buildTargetParam($select, $i, '0').'">不限</a>';
			}
			foreach($result[$i]['group_item'] as $item)
			{
				$param = $this->buildTargetParam($select, $i, $item['tg_id']);
				if($s == $item['tg_id'])
					$html .= '<a href="'.$prefix.'/0/'.$category.'/'.$param.'" class="cur">'.$item['tg_name'].'</a>';
				else
					$html .= '<a href="'.$prefix.'/0/'.$category.'/'.$param.'">'.$item['tg_name'].'</a>';
			}
			$html .= '</div></div>';
		}
		return $html;
	}

	/**
	* 构建标签按钮定向参数
	* ======
	* @param $select 	标签id组
	* @param $index 	标签位
	* @param $item 		选中项
	* ======
	* @author 洪波
	* @version 14.02.19
	*/
	private function buildTargetParam($select, $index, $item)
	{
		$select[$index] = $item;
		return implode('-', $select);
	}

}