<?php
/**
* 图片 - 控制器
* ======
* @author 洪波
* @version 14.05.09
*/
class Image extends CI_Controller {

    /**
    * 处理redactor图片上传
    * ======
    * @author 洪波
    * @version 14.05.18
    */
    public function redactorUpload()
    {
        $config = array(
            'upload_path' => './uploads/other/',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => uniqid()
            );
        $this->load->library('upload', $config);
        if($this->upload->do_upload('file'))
        {
            $data = $this->upload->data();
            echo '<img src="/uploads/other/',$data['file_name'],'">';
        }
    }

	/**
	* 上传文件
	* ======
	* @param $type 		模块
	* @param $width 	最大宽度
	* @param $height 	最大高度
	* @param $save 		是否保存原图
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function upload($type, $width, $height, $prefix = '')
	{
        $config = array(
        	'upload_path' => './uploads/' . $type . '/',
        	'allowed_types' => 'gif|jpg|png',
        	'file_name' => uniqid()
        	);
        $this->load->library('upload', $config);
        if($this->upload->do_upload('fileToUpload'))
        {
            $data = $this->upload->data();
            echo json_encode(array('path'=>$data['file_name'], 'error'=>0));
            //缩略图
            if($width != '0')
            {
            	//约束图片尺寸
            	if($height != '0')
            	{
            		$this->thumber($data['file_name'], $config['upload_path'], $prefix, $width, $height);
            	}
            	//等宽缩略
            	else
            	{
            		$this->thumbw($data['file_name'], $config['upload_path'], $prefix, $width);
            	}
            }
        }
        else
        {
            print_r($this->upload->data());
        }
	}

	/**
    * 约束图片尺寸
    * ======
    * @param $file_name        文件名
    * @param $save_path        存储路径
    * @param $prefix           前缀
    * @param $max_width        极限宽度
    * @param $max_height       极限高度
    * ======
    * @author 洪波
    * @version 13.07.30
    */
    private function thumber($file_name, $save_path, $prefix = 'tb_', $max_width = 180, $max_height = 180)
    {
        
        $src = $save_path . $file_name;
        //获取图片信息
        $size = getimagesize($src);
        
        //根据图片类型创建画布
        switch($size[2]){
            case 1: $in = imagecreatefromgif($src);
            break;
            case 2: $in = imagecreatefromjpeg($src);
            break;
            case 3: $in = imagecreatefrompng($src);
            break;
        }
        
        //判断图片长宽比例
        if($size[0] < $size[1])
        {
            //宽度比高度小的图片
            $sw = $size[0] * ($max_height / $size[1]);
            $out = imagecreatetruecolor($sw, $max_height);
            imagecopyresampled($out, $in, 0, 0, 0, 0, $sw, $max_height, $size[0], $size[1]);
        }
        else
        {
            //宽度比高度大的或正方形的图片
            $sh = $size[1] * ($max_width / $size[0]);
            /* 如果缩略后的高度仍比限制高度大的话
             * 则以原始高度等比缩放
             */
            if($sh > $max_height)
            {
                $sw = $size[0] * ($max_height / $size[1]);
                $out = imagecreatetruecolor($sw, $max_height);
                imagecopyresampled($out, $in, 0, 0, 0, 0, $sw, $max_height, $size[0], $size[1]);
            }
            else
            {
                $out = imagecreatetruecolor($max_width, $sh);
                imagecopyresampled($out, $in, 0, 0, 0, 0, $max_width, $sh, $size[0], $size[1]);
            }
        }
        
        //保存文件并设置777权限
        imagejpeg($out, $save_path . $prefix . $file_name, 90);
        chmod($save_path . $prefix . $file_name, 0777);
        
        //清空缓冲区
        imagedestroy($out);
        imagedestroy($in);
        
    }

    /**
    * 创建等宽缩略图
    * ======
    * @param $file_name     文件名
    * @param $save_path     存储路径
    * @param $prefix        前缀
    * @param $max_width     限制宽度
    * ======
    * @author 洪波
    * @version 13.08.18
    */
    private function thumbw($file_name, $save_path, $prefix = 'tb_', $max_width = 300)
    {
        $src = $save_path . $file_name;
        //获取图片信息
        $size = getimagesize($src);

        //根据图片类型创建画布
        switch ($size[2]) {
            case 1: $in = imagecreatefromgif($src);
                break;
            case 2: $in = imagecreatefromjpeg($src);
                break;
            case 3: $in = imagecreatefrompng($src);
                break;
        }

        //计算缩略后尺寸
        $sh = $size[1] * ($max_width / $size[0]);
        $out = imagecreatetruecolor($max_width, $sh);
        imagecopyresampled($out, $in, 0, 0, 0, 0, $max_width, $sh, $size[0], $size[1]);
        //保存并设置777权限
        imagejpeg($out, $save_path . $prefix . $file_name, 90);
        chmod($save_path . $prefix . $file_name, 0777);
        //清空缓冲区
        imagedestroy($out);
        imagedestroy($in);
    }

	/**
	* 删除图片
	* ======
	* @param $type 	模块
	* @param $name 	文件名
	* ======
	* @author 洪波
	* @version 13.10.18
	*/
	public function delete()
	{
		$type = $this->input->post('type');
		$name = $this->input->post('name');
		@unlink('./uploads/' . $type . '/' . $name);
	}
}