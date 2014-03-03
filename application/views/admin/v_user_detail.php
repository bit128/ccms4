<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>New Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include '_header.php'; ?>
  </head>

  <body>

    <?php include '_top.php'; ?>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#base">用户资料</a></li>
            <li><a href="#detail">用户详情</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="base">
              <div class="row-fluid">
                <div class="span6">
                  <form class="well">
                    <legend>基本信息</legend>
                    <p>
                      <span class="btn-group" id="user_status">
                        <a class="btn btn-small <?php if($user['user_status'] == 1) echo 'btn-primary';?>">平台</a>
                        <a class="btn btn-small <?php if($user['user_status'] == 2) echo 'btn-primary';?>">站内</a>
                        <a class="btn btn-small <?php if($user['user_status'] == 3) echo 'btn-primary';?>">高级</a>
                      </span>
                    </p>
                    <hr>
                    <p>
                      <label>账号：<strong><?php echo $user['user_account']; ?></strong></label>
                    </p>
                    <p>
                      <label>昵称：<strong><?php echo $user['user_nick']; ?></strong></label>
                    </p>
                    <p>
                      <label>性别：<strong><?php if($user['user_gender'] == 1){echo '男';}elseif($user['user_gender'] == 2){echo '女';}else{echo '未知';}?></strong></label>
                    </p>
                  </form>
                </div>
                <div class="span6">
                  <form class="well">
                    <legend>使用信息</legend>
                    <p>
                      <label>注册时间：<strong><?php echo date('Y年m月d日 H:i:s', $user['user_ctime']); ?></strong></label>
                    </p>
                    <p>
                      <label>最后登录时间：<strong><?php echo date('Y年m月d日 H:i:s', $user['user_utime']); ?></strong></label>
                    </p>
                    <p>
                      <label>最后登录ip：<strong><?php echo $user['user_uip']; ?></strong></label>
                    </p>
                    <p>
                      <label>登录次数：<strong><?php echo $user['user_count']; ?></strong></label>
                    </p>
                    <p>
                      <label>积分：<strong><?php echo $user['user_score']; ?></strong></label>
                    </p>
                    <p>
                      <label>累计积分：<strong><?php echo $user['user_allscore']; ?></strong></label>
                    </p>
                  </form>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="detail">
              <div class="row-fluid">
                <div class="span6">
                  <form class="well">
                    <legend>用户信息</legend>
                    <p><label>生日：<strong><?php if($user_detail['user_birthday'] != '') echo date('Y年m月d日', $user_detail['user_birthday']); ?></strong></label></p>
                    <p>
                      <label>电话：<strong><?php echo $user_detail['user_phone']; ?></strong></label>
                    </p>
                    <p>
                      <label>邮件：<strong><?php echo $user_detail['user_email']; ?></strong></label>
                    </p>
                    <p>
                      <label>QQ：<strong><?php echo $user_detail['user_qq']; ?></strong></label>
                    </p>
                    <p>
                      <label>邮编：<strong><?php echo $user_detail['user_post']; ?></strong></label>
                    </p>
                    <p>
                      <label>地址：<strong><?php echo $user_detail['user_address']; ?></strong></label>
                    </p>
                  </form>
                </div>
                <div class="span6">
                  <form class="well">
                    <legend>用户介绍</legend>
                    <p><?php echo $user_detail['user_introduce']; ?></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" value="<?php echo $user['user_id']; ?>" id="user_id">
      <?php include '_footer.php'; ?>

    </div>

  </body>
<script type="text/javascript">
$(document).ready(function(){
  $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });
  /*变更用户状态*/
  $('#user_status').on('click', 'a', function(){
    var status = $('#user_status a').index(this) + 1;
    $('#user_status a').removeClass('btn-primary');
    $.ajax({
      type: 'POST',
      url: '/index.php/user/changeStatus',
      data: {user_id: $('#user_id').val(), user_status: status}
    });
    $(this).addClass('btn-primary');
  });
});
</script>
</html>