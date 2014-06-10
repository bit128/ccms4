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
      <p>
        <a id="add_storage" class="btn <?php if($pd_id != '0'){echo 'btn-success';} ?>">
          <i class="icon-th-large icon-white"></i> 添加库存</a>
      </p>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>编号</th>
            <th>库存名称</th>
            <th>数量</th>
            <th>进货价</th>
            <th>售价</th>
            <th>折扣</th>
            <th>更新时间</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody id="storage_list">
          <?php foreach ($storage as $v) { ?>
          <tr>
            <td><?php echo $v['st_id']; ?></td>
            <td><?php echo $v['st_name']; ?></td>
            <td><?php echo $v['st_quantity']; ?></td>
            <td><?php echo $v['st_inprice']; ?></td>
            <td>
              <a href="javascript:;" class="storage_update" data-val="st_outprice"><?php echo $v['st_outprice']; ?></a>
            </td>
            <td>
              <a href="javascript:;" class="storage_update" data-val="st_discount"><?php echo $v['st_discount']; ?></a>
            </td>
            <td><small><?php echo date('Y-m-d H:i', $v['st_utime']); ?></small></td>
            <td style="width:160px;">
              <?php if($v['st_status'] == 1) { ?>
                <a class="btn btn-warning btn-mini storage_lock" data-val="0">停用</a>
              <?php } else { ?>
                <a class="btn btn-success btn-mini storage_lock" data-val="1">启用</a>
              <?php } ?>
              <a class="btn btn-mini storage_io" data-val="1">采购</a>
              <a class="btn btn-mini storage_io" data-val="0">出货</a>
              <a class="btn btn-mini btn-danger storage_delete">删除</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="pagination"><?php echo $pages; ?></div>

      <?php include '_footer.php'; ?>

    </div>
  <!-- 出入库表单 -->
  <div id="storageModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="io_title">Modal header</h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" id="io_form">
        <div class="control-group">
          <label class="control-label" for="inputEmail">单价：</label>
          <div class="controls">
            <input type="text" id="st_price">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputEmail">数量：</label>
          <div class="controls">
            <input type="text" id="st_quantity">
          </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <input type="hidden" id="st_id" value="">
      <input type="hidden" id="op" value="">
      <button class="btn io_send" data-dismiss="modal" data-val="0">放弃</button>
      <button class="btn btn-primary io_send" data-dismiss="modal" data-val="1">确定</button>
    </div>
  </div>
  <!-- 出入库表单 -->
  </body>
<input type="hidden" id="pd_id" value="<?php echo $pd_id; ?>">
<script type="text/javascript">
$(document).ready(function(){
  /*添加库存类目*/
  $('#add_storage').on('click', function(e){
    var pd_id = $('#pd_id').val();
    if(pd_id != '0'){
      var item = '<tr><td>-</td><td><input type="text"style="margin:0"></td>'
        +'<td>-</td><td>-</td>-<td>-</td><td>-</td><td>-</td>'
        +'<td><a class="btn btn-mini btn-success add_item">添加</a> <a class="btn btn-mini cancel_item">放弃</a></td><tr>';
      $('#storage_list').prepend(item);
    }
  });
  /*保存库存条目到数据库*/
  $('#storage_list').on('click', '.add_item', function(){
    var tr = $(this).parents('tr');
    var st_name_input = tr.find('input:eq(0)');
    if(st_name_input.val() == ''){alert('请填写商品库存名称.');st_name_input.focus();return;}
    var pd_id = $('#pd_id').val();
    /*保存数据到数据库*/
    $.ajax({
      type: 'POST',
      url: '/index.php/storage/addStorage',
      data: {pd_id: pd_id, st_name: st_name_input.val()},
      success: function(){
        location.reload();
      }
    });
  });
  /*取消保存*/
  $('#storage_list').on('click', '.cancel_item', function(){ $(this).parents('tr').remove(); });
  /*删除库存*/
  $('#storage_list').on('click', '.storage_delete', function(){
    var tr = $(this).parents('tr');
    if(tr.find('td:eq(2)').text() == '0'){
      var st_id = tr.find('td:eq(0)').text();
      $.ajax({
        type: 'POST',
        url: '/index.php/storage/deleteStorage',
        data: {st_id: st_id}
      });
      tr.remove();
    }else{
      alert('仍有库存数量，不能删除.');
    }
  });
  /*库存状态*/
  $('#storage_list').on('click', '.storage_lock', function(){
    var st_id = $(this).parents('tr').find('td:eq(0)').text();
    var op = $(this).attr('data-val');
    if(op == '0'){
      $(this).removeClass('btn-warning').addClass('btn-success').attr('data-val', '1').text('启用');
    }else{
      $(this).removeClass('btn-success').addClass('btn-warning').attr('data-val', '0').text('停用');
    }
    $.ajax({
      type: 'POST',
      url: '/index.php/storage/changeStatus',
      data: {st_id: st_id, st_status: op}
    });
  });
  /*变更库存属性*/
  storageUpdate();
  function storageUpdate(){
    var cacheText = '';
    /*编辑*/
    $('#storage_list').on('click', '.storage_update', function(){
      cacheText = $(this).text();
      $(this).parent()
        .html('<input type="text" class="input-mini storage_save" style="margin:0" data-val="'
          +$(this).attr('data-val')+'" value="'+cacheText+'">').find('input').focus();
    });
    /*保存*/
    $('#storage_list').on('blur', '.storage_save', function(){
      var data = $(this).val();
      var field = $(this).attr('data-val');
      if(data != '' && data != cacheText){
        cacheText = data;
        var st_id = $(this).parents('tr').find('td:eq(0)').text();
        $.ajax({
          type: 'POST',
          url: '/index.php/storage/updateStorage',
          data: {st_id: st_id, field: field, data: data}
        });
      }
      $(this).parent().html('<a href="javascript:;" class="storage_update" data-val="'+field+'">'+cacheText+'</a>');
    });
  }
  /*变更库存*/
  storageChange();
  function storageChange(){
    var tr;
    var quantity;
    /*出入库*/
    $('#storage_list').on('click', '.storage_io', function(){
      var op = $(this).attr('data-val');
      if(op == '1'){
        $('#io_title').html('<span class="text-error">采购</span> 库存商品');
      }else{
        $('#io_title').html('库存商品 <span class="text-error">出库</span>')
      }
      tr = $(this).parents('tr');
      quantity = tr.find('td:eq(2)').text();
      $('#st_price').val(tr.find('td:eq(3)').text().replace(/(^\s*)|(\s*$)/g, ""));
      $('#st_id').val(tr.find('td:eq(0)').text().replace(/(^\s*)|(\s*$)/g, ""));
      $('#op').val(op);
      $('#storageModal').modal('show');
    });
    /*库存操作*/
    $('.io_send').on('click', function(){
      var is_send = $(this).attr('data-val');
      if(is_send == '1'){
        var st_id = $('#st_id').val();
        var op = $('#op').val();
        var st_price = $('#st_price').val();
        var st_quantity = $('#st_quantity').val();
        if(! /^\d+$/.exec(st_quantity)) {alert('请填写整数');$('#st_quantity').focus();return;}
        if(op == '0' && (quantity - st_quantity) < 0){
          alert('库存不足以出库数量.');
          return;
        }else{
          $.ajax({
            type: 'POST',
            url: '/index.php/storage/changeStorage',
            data: {st_id: st_id, st_price: st_price, st_quantity: st_quantity, op: op},
            success: function(data){
              if(data == '1'){
                tr.find('td:eq(3)').text(st_price);
                if(op == '0'){
                  tr.find('td:eq(2)').text(parseInt(quantity) - parseInt(st_quantity));
                }else{
                  tr.find('td:eq(2)').text(parseInt(quantity) + parseInt(st_quantity));
                }
              }
            }
          });
        }
      }
      $('#io_form')[0].reset();
    });
  }
});
</script>
</html>