<?php
/**
* 邮件服务 - 控制器
* ======
* @author 洪波
* @version 14.05.09
*/
class Mail extends CI_Controller {

	 public function index()
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
                $this->email->from('ct880_colour@163.com', '彩网科技');
                $this->email->to('hongerbo@qq.com');
                $this->email->subject('Email Test');
                $this->email->message('<font color=red>Testing the email class.</font>');

                $this->email->send();

		echo $this->email->print_debugger();
	 }
}