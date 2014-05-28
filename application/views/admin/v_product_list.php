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
      <p><a href="<?php echo site_url('product/productDetail'); ?>" class="btn btn-success" style="margin-top:-10px;">
        <i class="icon-plus icon-white"></i> 添加新商品</a>
        <span class="input-prepend">
          <input type="text">
          <a class="btn">搜索</a>
        </span>
      </p>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>编号</th>
            <th>货号</th>
            <th>品名</th>
            <th>更新时间</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody id="product_list">
          <?php foreach ($product as $v) { ?>
          <tr>
            <td style="width:100px;"><?php echo $v['pd_id']; ?></td>
            <td style="width:100px;"><?php echo $v['pd_no']; ?></td>
            <td><small><strong><?php echo $v['pd_name']; ?></strong></small></td>
            <td style="width:120px;"><small><?php echo date('Y-m-d H:i', $v['pd_utime']); ?></small></td>
            <td style="width:160px;">
              <?php if($v['pd_status'] == 1) {?>
                <a class="btn btn-warning btn-mini pro_lock" data-val="0">下架</a>
              <?php } else { ?>
                <a class="btn btn-success btn-mini pro_lock" data-val="1">上架</a>
              <?php } ?>
              <a href="<?php echo site_url('product/productDetail'), '/',
                $v['pd_id']; ?>" class="btn btn-mini">编辑</a>
              <a href="<?php echo site_url('storage/storageList'), '/0/', $v['pd_id'], '/0'?>" class="btn btn-mini">库存</a>
              <a class="btn btn-danger btn-mini pro_remove">删除</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="pagination"><?php echo $pages; ?></div>

      <?php include '_footer.php'; ?>

    </div>

  </body>
<script type="text/javascript">
$(document).ready(function(){
  /*变更商品状态*/
  $('#product_list').on('click', '.pro_lock', function(){
    var op = $(this).attr('data-val');
    var pd_id = $(this).parents('tr').find('td:eq(0)').text();
    if(op == '0'){
      $(this).removeClass('btn-warning').addClass('btn-success').attr('data-val', '1').text('上架');
    }else{
      $(this).removeClass('btn-success').addClass('btn-warning').attr('data-val', '0').text('下架');
    }
    $.ajax({
      type: 'POST',
      url: '/index.php/product/changeStatus',
      data: {pd_id: pd_id, pd_status: op}
    });
  });
  /*删除商品*/
  $('#product_list').on('click', '.pro_remove', function(){
    if(confirm('确定要删除该商品，包括库存信息？操作不可恢复.')){
      var tr = $(this).parents('tr');
      $.ajax({
        type: 'POST',
        url: '/index.php/product/deleteProduct',
        data: {pd_id: tr.find('td:eq(0)').text()}
      });
      tr.remove();
    }
  });
});
</script>
</html>