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
        <div class="span12">
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home">管理员列表</a></li>
            <li><a href="#profile">添加管理员</a></li>
          </ul>
           
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>编号</th>
                    <th>账号</th>
                    <th>权限</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody id="admin_list">
                  <?php foreach ($admin as $v) { ?>
                  <tr>
                    <td><?php echo $v['am_id']; ?></td>
                    <td><?php echo $v['am_account']; ?></td>
                    <td><?php echo $this->admin->printRole($v['am_role']); ?></td>
                    <td>
                      <?php if($v['am_status'] == 1) { ?>
                      <a class="btn btn-mini btn-warning admin_lock" data-val="0">冻结</a>
                      <?php } else { ?>
                      <a class="btn btn-mini btn-success admin_lock" data-val="1">启用</a>
                      <?php } ?>
                      <a class="btn btn-mini btn-danger admin_cpwd">重置</a>
                      <a class="btn btn-mini admin_delete">删除</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane" id="profile">
              <form class="well">
                <p>
                  <label>账号：</label>
                  <input type="text" id="am_account">
                </p>
                <p>
                  <label>密码：<small><a href="javascript:;" data-val="1" id="show_pwd">显示密码</a></small></label>
                  <span><input type="password" id="am_password"></span>
                </p>
                <p>
                  <label>权限：</label>
                  <span id="role_input"><?php echo $this->admin->printRole();?></span>
                </p>
                <p>&nbsp;</p>
                <p><a class="btn btn-success" id="create_admin"><i class="icon-plus icon-white"></i> 添加管理员</a></p>
              </form>
            </div>
          </div>

        </div>
      </div>

      <?php include '_footer.php'; ?>

    </div>
    <!-- 重置密码框 -->
    <div id="cpwd_box" class="popover bottom">
      <div class="arrow"></div>
      <div class="popover-content">
        <div class="input-prepend input-append">
          <input type="password" class="input-small" placeholder="输入新密码" id="new_password">
          <input type="hidden" id="cache_id" value="">
          <a class="btn btn-success" id="change_pwd">变更</a>
          <a class="btn" id="change_cancel">取消</a>
        </div>
      </div>
    </div>
    <!-- 重置密码框 -->
  </body>
<script type="text/javascript">
$(document).ready(function(){
  $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });
  /*显示隐藏密码*/
  $('#show_pwd').on('click', function(){
    var op = $(this).attr('data-val');
    var pwd = $('#am_password').val();
    if(op == '1'){
      $('#am_password').parent().html('<input type="text" id="am_password" value="'+pwd+'">');
      $(this).text('隐藏密码').attr('data-val', '0');
    }else{
      $('#am_password').parent().html('<input type="password" id="am_password" value="'+pwd+'">');
      $(this).text('显示密码').attr('data-val', '1');
    }
  });
  /*添加管理员*/
  $('#create_admin').on('click', function(){
    var am_account = $('#am_account').val();
    if(! /^[\w]{3,10}$/.exec(am_account)){alert('账户名由3-10个数字字母下划线组成');$('#am_account').focus();return;}
    var am_password = $('#am_password').val();
    if(am_password == ''){alert('请输入密码');$('#am_password').focus();return;}
    var am_role = 0;
    $('#role_input input[name="am_role"]').each(function(){
      if($(this).attr('checked')){
        am_role += parseInt($(this).val());
      }
    });
    $.ajax({
      type: 'POST',
      url: '/index.php/admin/addAdmin',
      data: {am_account: am_account, am_password: am_password, am_role: am_role},
      success: function(data){
        if(data == '1'){location.href='/index.php/admin/adminList';}
        else if(data == '-1'){alert('账号重名，请重新选择一个');$('#am_account').focus();}
      }
    });
  });
  /*管理员锁*/
  $('#admin_list').on('click', '.admin_lock', function(){
    var status = $(this).attr('data-val');
    var handle = $(this).parents('tr');
    if(status == '1'){
      $(this).text('冻结').removeClass('btn-success').addClass('btn-warning').attr('data-val', '0');
    }else{
      $(this).text('启用').removeClass('btn-warning').addClass('btn-success').attr('data-val', '1');
    }
    $.ajax({
      type: 'POST',
      url: '/index.php/admin/changeStatus',
      data: {am_id: handle.find('td:eq(0)').text(), am_status: status}
    });
  });
  /*设置权限*/
  $('#admin_list').on('click', 'input[name="am_role"]', function(){
    if($(this).attr('checked')){
      var op = 1;
    }else{
      var op = 0;
    }
    var am_id = $(this).parents('tr').find('td:eq(0)').text();
    var role = $(this).val();
    $.ajax({
      type: 'POST',
      url: '/index.php/admin/changeRole',
      data: {am_id: am_id, role: role, op: op}
    });
  });
  /*删除管理员*/
  $('#admin_list').on('click', '.admin_delete', function(){
    if(confirm('您确定要删除该账号吗？其实您也可以选择冻结.')){
      var handle = $(this).parents('tr');
      $.ajax({
        type: 'POST',
        url: '/index.php/admin/deleteAdmin',
        data: {am_id: handle.find('td:eq(0)').text()}
      });
      handle.remove();
    }
  });
  /*重置密码框*/
  $('#admin_list').on('click', '.admin_cpwd', function(e){
    $('#cpwd_box').css('top', e.pageY+10).css('left', e.pageX-120).show();
    $('#cache_id').val($(this).parents('tr').find('td:eq(0)').text());
    $('#new_password').focus();
  });
  $('#change_cancel').on('click', function(){
    $('#cpwd_box').hide();
    $('#new_password').val('');
    $('#cache_id').val('');
  });
  /*变更管理员密码*/
  $('#change_pwd').on('click', function(){
    var am_id = $('#cache_id').val();
    var new_password = $('#new_password').val();
    $.ajax({
      type: 'POST',
      url: '/index.php/admin/changePassword',
      data: {am_id: am_id, am_password: new_password},
      success: function(data){
        if(data == '1'){
          alert('管理员密码变更成功！');
        }
        $('#cpwd_box').hide();
        $('#new_password').val('');
        $('#cache_id').val('');
      }
    });
  });
});
</script>
</html>