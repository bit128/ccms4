<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>欢迎使用CCMS彩网后台内容管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include '_header.php'; ?>
  </head>

  <body>

    <?php include '_top.php'; ?>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span6">
          <div class="thumbnail">
            <div class="caption">
              <input type="hidden" id="gb_id" value="<?php echo $guestbook['gb_id']; ?>">
              <div class="btn-group" id="gb_status">
                <a class="btn <?php if($guestbook['gb_status'] == 0) echo 'btn-warning'; ?>">未处理</a>
                <a class="btn <?php if($guestbook['gb_status'] == 1) echo 'btn-success'; ?>">已处理</a>
                <a class="btn <?php if($guestbook['gb_status'] == 2) echo 'btn-danger'; ?>">不通过</a>
              </div>
              <h3><?php echo $guestbook['gb_title']; ?></h3>
              <p class="f_tiny">称呼：<span class="text-info"><?php echo $guestbook['gb_username']; ?></span></p>
              <p class="f_tiny">电话：<span class="text-info"><?php echo $guestbook['gb_phone']; ?></span></p>
              <p class="f_tiny">邮箱：<span class="text-info"><?php echo $guestbook['gb_email']; ?></span></p>
              <p class="f_tiny">其他联系方式：<span class="text-info"><?php echo $guestbook['gb_contact']; ?></span></p>
              <div class="dashed"></div>
              <p style="color:#000"><?php echo $guestbook['gb_content']; ?></p>
            </div>
          </div>
        </div>
        <div class="span6">
          <div class="thumbnail">
            <div class="caption">
              <p>
                <textarea class="span12" rows="4" id="gbr_content"></textarea>
                <span class="input-prepend">
                  <a class="btn" id="add_reply">提交</a>
                  <select class="input-small" id="gbr_type"><option value="1">回复</option><option value="2">备注</option></select>
                </span>
                <span class="pull-right" style="padding:5px;" id="gbr_count">
                  您还可以输入<strong class="text-success"> 500 </strong>字
                </span>
              </p>
              <div id="reply_list" class="f_mini"></div>
            </div>
          </div>
          <div class="alert alert-warning">该功能仅为演示，如需定制请详细咨询.</div>
        </div>
      </div>
      <?php include '_footer.php'; ?>

    </div>

  </body>
<script type="text/javascript">
$(document).ready(function(){
  /*变更留言状态*/
  $('#gb_status').on('click', 'a', function(){
    var indexNum = $('#gb_status a').index(this);
    $('#gb_status a').removeClass('btn-warning').removeClass('btn-success').removeClass('btn-danger');
    switch(indexNum){
      case 0: $(this).addClass('btn-warning'); break;
      case 1: $(this).addClass('btn-success'); break;
      case 2: $(this).addClass('btn-danger'); break;
    }
    $.ajax({
      type: 'POST',
      url: '/index.php/guestbook/changeStatus',
      data: {gb_id: $('#gb_id').val(), gb_status: indexNum}
    });
  });
  /*统计字数*/
  $('#gbr_content').on('keyup', function(){
    var count = 500 - $(this).val().length;
    if(count < 0){
      count = Math.abs(count);
      $('#gbr_count').html('您输入的内容超过了<strong class="text-error"> '+count+' </strong>字');
    }else{
      $('#gbr_count').html('您还可以输入<strong class="text-success"> '+count+' </strong>字');
    }
  });
  /*提交留言反馈*/
  $('#add_reply').on('click', function(){
    var gbr_content = $('#gbr_content').val();
    if(gbr_content == ''){alert('请填写反馈内容');$('#gbr_content').focus();return;}
    if(gbr_content.length > 500){alert('反馈内容长度不能超过500个字符');$('#gbr_content').focus();return;}
    $.ajax({
      type: 'POST',
      url: '/index.php/guestbook/addReply',
      data: {gb_id: $('#gb_id').val(), gbr_content: gbr_content, gbr_type: $('#gbr_type').val()},
      success: function(data){
        if(data == '1'){
          $('#gbr_content').val('');
          $('#gbr_count').html('您还可以输入<strong class="text-success"> 500 </strong>字');
          loadReplyList($('#gb_id').val(), $('#reply_list'));
        }
      }
    });
  });
  loadReplyList($('#gb_id').val(), $('#reply_list'));
  /*载入反馈列表*/
  function loadReplyList(gb_id, handle){
    $.ajax({
      type: 'POST',
      url: '/index.php/guestbook/getReply',
      data: {gb_id: gb_id},
      success: function(data){
        var ct = '';
        var datas = $.parseJSON(data);
        $.each(datas, function(i, d){
          ct += '<div class="dashed reply_list"><p><small>';
          if(d.gbr_type == '1'){ct += '<span class="text-success">[回复]</span>';}
          else if(d.gbr_type == '2'){ct += '<span class="text-info">[备注]</span>';}
          ct += ' </span>管理员：<strong>'+d.am_account+'</strong> | 发布时间：<strong>'+d.gbr_ctime+'</strong> | <a class="gbr_delete" data-val="'+d.gbr_id+'" href="javascript:;">删除</a></small></p><p style="color:#000;">'+d.gbr_content+'</p></div>';
        });
        handle.html(ct);
      }
    });
  }
  /*删除留言反馈*/
  $('#reply_list').on('click', '.gbr_delete', function(){
    if(confirm('您确定删除该留言反馈吗？')){
      var gbr_id = $(this).attr('data-val');
      $.ajax({
        type: 'POST',
        url: '/index.php/guestbook/deleteReply',
        data: {gbr_id: gbr_id}
      });
      $(this).parents('.reply_list').remove();
    }
  });
});
</script>
</html>