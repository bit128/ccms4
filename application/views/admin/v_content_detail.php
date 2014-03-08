<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>New Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include '_header.php'; ?>
    <link href="<?php echo VIEWPATH; ?>/admin/redactor/css/redactor.css" rel="stylesheet">
  </head>

  <body>

    <?php include '_top.php'; ?>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <form class="well">
            <p><a href="<?php echo site_url('content/contentList'),'/0/',$content['cn_id']; ?>" class="btn btn-primary">返回上一页</a></p>
            <fieldset>
                <legend>内容图片</legend>
                <p><img src="/uploads/content/<?php echo $content['ct_image']; ?>" id="image_show"></p>
                <p id="ajaxUpload">
                    <input id="fileToUpload" type="file" name="fileToUpload" style="position: absolute;filter: alpha(opacity=0);opacity:0;width: 100px">
                    <a href="javascript:;" class="btn"><i class="icon-camera"></i> 上传图片</a>
                    <input type="hidden" id="image_value" value="<?php echo $content['ct_image']; ?>">
                    <input type="hidden" id="image_delete" value="">
                </p>
                <p id="ajaxUpload_btn" style="display:none;">
                    <a href="javascript:;" class="btn btn-small btn-success">确定</a>
                    <a href="javascript:;" class="btn btn-small btn-danger">取消</a>
                </p>
            </fieldset>
            <fieldset>
              <legend>基本内容</legend>
              <p>
                <label>标题：</label>
                <input type="text" class="input-xxlarge" id="ct_title" value="<?php echo $content['ct_title']; ?>">
              </p>
              <p>
                <label>副标题：</label>
                <input type="text" class="input-xlarge" id="ct_subtitle" value="<?php echo $content['ct_subtitle']; ?>">
              </p>
              <p>
                <label>简要内容：</label>
                <textarea class="input-xlarge" id="ct_summary"><?php echo $content['ct_summary']; ?></textarea>
              </p>
              <p>
                <label>详细内容：</label>
                <textarea id="ct_detail" class="redactor" style="height:300px;"><?php echo $content['ct_detail']; ?></textarea>
              </p>
              <p>
                <label>状态：</label>
                <input type="radio" name="ct_status" value="2" <?php if($content['ct_status'] == 2) echo 'checked';?>> 推荐
                <input type="radio" name="ct_status" value="1" <?php if($content['ct_status'] == 1) echo 'checked';?>> 公开
                <input type="radio" name="ct_status" value="0" <?php if($content['ct_status'] == 0) echo 'checked';?>> 隐藏
              </p>
            </fieldset>
            <p>&nbsp;</p>
            <p>
              <input type="hidden" id="ct_id" value="<?php echo $content['ct_id']; ?>">
              <input type="hidden" id="cn_id" value="<?php echo $content['cn_id']; ?>">
              <a class="btn btn-success" id="save_content"><i class="icon-inbox icon-white"></i> 保存内容</a>
              <a href="<?php echo site_url('content/contentList'),'/0/',$content['cn_id']; ?>" class="btn btn-primary">返回上一页</a>
            </p>
          </form>
        </div>
      </div>

      <?php include '_footer.php'; ?>

    </div>

  </body>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/js/ajaxfileupload.js"></script>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/redactor/redactor.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  /*富文本*/
  $('.redactor').redactor({
      //imageUpload: '/service/uploadImages',
      lang: 'zh_cn'
  });
  /*上传图片*/
  ajaxUpload('content', 0, 0, '');
  /*保存内容*/
  $('#save_content').on('click',function(){
    var ct_image = $('#image_value').val();
    var ct_title = $('#ct_title').val();
    if(ct_title == ''){alter('请填写内容标题');$('#ct_title').focus();return;}
    var ct_subtitle = $('#ct_subtitle').val();
    var ct_summary = $('#ct_summary').val();
    var ct_detail = $('#ct_detail').val();
    var ct_status = $('input[name="ct_status"]:checked').val();
    var cn_id = $('#cn_id').val();
    var ct_id = $('#ct_id').val();
    if(ct_id == ''){
      var action = '/index.php/content/addContent';
    }else{
      var action = '/index.php/content/updateContent';
    }
    $.ajax({
      type: 'POST',
      url: action,
      data: {cn_id: cn_id, ct_id: ct_id, ct_image: ct_image, ct_title: ct_title, ct_subtitle: ct_subtitle, ct_summary: ct_summary, ct_detail: ct_detail, ct_status: ct_status},
      success: function(data){
        if(data.length == 13){
          $('#ct_id').val(data);
          alert('添加内容成功！');
        }else if(data == '1'){
          alert('保存内容成功！');
        }
        $('#image_delete').val('');
        $('#ajaxUpload_btn').hide();
      }
    });
  });
});
$(window).unload(function(){
  ajaxDelete('content', $('#image_delete').val());
});
/*异步上传文件*/
function ajaxUpload(type, width, height, prefix){
  /*上传图片*/
  $('#ajaxUpload').on('change', '#fileToUpload', function(){
    ajaxDelete(type, $('#image_delete').val());
    $.ajaxFileUpload({
      url: '/index.php/image/upload/'+type+'/'+width+'/'+height+'/'+prefix,
      fileElementId: 'fileToUpload',
      dataType: 'json',
      success: function(data, status){
        var path = data.path;
        $('#image_show').attr('src', '/uploads/'+type+'/'+path);
        $('#image_value').val(path);
        $('#image_delete').val(path);
        $('#ajaxUpload_btn').show();
      }
    });
  });
  /*上传完成按钮*/
  $('#ajaxUpload_btn').on('click', 'a', function(){
    var indexNum = $('#ajaxUpload_btn a').index(this);
    if(indexNum == 1){
      //删除图片
      ajaxDelete(type, $('#image_value').val());
      $('#image_value').val('');
    }
    $('#image_delete').val('');
    $('#ajaxUpload_btn').hide();
  });
}
/*异步删除图片*/
function ajaxDelete(type, name){
  if(name == '')
    return;
  $.ajax({
    type: 'POST',
    url: '/index.php/image/delete',
    data: {type: type, name: name}
  });
}
</script>
</html>