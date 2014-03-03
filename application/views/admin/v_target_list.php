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
            <li class="active"><a href="#list">标签列表</a></li>
            <li><a href="#setting">设置标签组</a></li>
          </ul>
           
          <div class="tab-content">
            <div class="tab-pane active" id="list">
              <p>
                <span class="input-prepend">
                  <select class="input-medium" id="tg_group"><option>选择标签组</option></select>
                  <input type="text" id="tg_target_input">
                  <a class="btn" id="add_target"><i class="icon-plus"></i> 添加</a>
                </span>
              </p>
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>标签</th>
                    <th>创建时间</th>
                    <th>使用次数</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody id="target_list"></tbody>
              </table>
            </div>
            <div class="tab-pane" id="setting">
              <p>
                <span class="input-prepend">
                  <input type="text" id="tg_group_input">
                  <a class="btn" id="add_group"><i class="icon-plus"></i> 添加标签组</a>
                </span>
              </p>
              <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th style="width:100px;">ID</th>
                    <th>标签组</th>
                    <th style="width:100px;">操作</th>
                  </tr>
                </thead>
                <tbody id="group_list"></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <?php include '_footer.php'; ?>

    </div>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#myTab a').click(function(e){
      e.preventDefault();
      $(this).tab('show');
    });
    /*选择标签组*/
    $('#tg_group').on('change', function(){
      loadTarget($(this).val());
    });
    /*添加标签*/
    $('#add_target').on('click', function(){
      var tg_fid = $('#tg_group').val();
      if(tg_fid == '0'){alert('请选择标签组');return;}
      var tg_name = $('#tg_target_input').val();
      if(tg_name == ''){alert('请填写标签名称');$('#tg_target_input').focus();return;}
      $.ajax({
        type: 'POST',
        url: '/index.php/target/addTarget',
        data: {tg_fid: tg_fid, tg_name: tg_name},
        success: function(data){
          if(data.length == 13){loadTarget(tg_fid);}
        }
      });
      $('#tg_target_input').val('');
    });
    /*删除标签*/
    $('#target_list').on('click', '.remove', function(){
      if(confirm('确定要删除该标签吗?')){
        var tr = $(this).parents('tr');
        $.ajax({
          type: 'POST',
          url: '/index.php/target/deleteTarget',
          data: {tg_id: tr.find('td:eq(0)').text()},
        });
        tr.remove();
      }
    });
    /*添加标签组*/
    $('#add_group').on('click', function(){
      var group = $('#tg_group_input').val();
      if(group == ''){alert('请填写标签组名称');$('#tg_group_input').focus();return;}
      $.ajax({
        type: 'POST',
        url: '/index.php/target/addTarget',
        data: {tg_fid: 0, tg_name: group},
        success: function(data){
          if(data.length == 13){loadGroup();}
        }
      });
      $('#tg_group_input').val('');
    });
    /*删除标签组*/
    $('#group_list').on('click', '.remove', function(){
      if(confirm('确定要删除该标签组吗？同时删除该组标签')){
        var tr = $(this).parents('tr');
        $.ajax({
          type: 'POST',
          url: '/index.php/target/deleteTarget',
          data: {tg_id: tr.find('td:eq(0)').text()}
        });
        loadGroup();
      }
    });
    /*获取标签组*/
    loadGroup();
    function loadGroup(){
      $.get('/index.php/target/getTargetList/0', function(data){
        var datas = $.parseJSON(data);
        var select = '<option value="0">请选择标签组</option>';
        var group = '';
        $.each(datas.result, function(i, d){
          select += '<option value="'+d.tg_id+'">'+d.tg_name+'</option>';
          group += '<tr><td>'+d.tg_id+'</td><td>'+d.tg_name+'</td><td>'+'<a class="btn btn-mini remove">删除</a></td></tr>';
        });
        $('#tg_group').html(select);
        $('#group_list').html(group);
      });
    }
    /*获取标签列表*/
    function loadTarget(tg_fid){
      if(tg_fid == '0'){tg_fid == '';}
      $.get('/index.php/target/getTargetList/'+tg_fid, function(data){
        var datas = $.parseJSON(data);
        var html = '';
        $.each(datas.result, function(i, d){
          html += '<tr><td>'+d.tg_id+'</td><td>'+d.tg_name+'</td><td>'+d.tg_ctime+'</td><td>'+d.tg_count+'</td>'
            + '<td><a class="btn btn-mini remove">删除</a></td></tr>';
        });
        $('#target_list').html(html);
      });
    }
  });
  </script>
  </body>
</html>