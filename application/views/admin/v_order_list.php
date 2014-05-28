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
        <span class="btn-group">
          <a href="/index.php/order/orderList/0/0" class="btn <?php echo $od_status == '0' ? 'btn-success' : ''; ?>">未处理</a>
          <a href="/index.php/order/orderList/0/1" class="btn <?php echo $od_status == '1' ? 'btn-success' : ''; ?>">已处理</a>
        </span>
      </p>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>订单号</th>
            <th>用户id</th>
            <th>客户邮箱</th>
            <th>总价</th>
            <th>下单时间</th>
            <th>状态</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order as $v) { ?>
          <tr>
            <td><?php echo $v['od_id']; ?></td>
            <td><?php echo $v['user_id']; ?></td>
            <td><?php echo $v['user_account']; ?></td>
            <td><?php echo $v['od_price']; ?></td>
            <td><small><?php echo date('Y-m-d H:i:s', $v['od_ctime']); ?></small></td>
            <td><small><?php echo $v['od_status'] == '0' ?
              '<span class="text-error">待处理</span>' : '<span class="text-success">已完成</span>'; ?></small></td>
            <td><a class="btn btn-mini" href="<?php echo site_url('order/orderDetail'), '/', $v['od_id']; ?>">查看详情</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

      <?php include '_footer.php'; ?>

    </div>

  </body>
</html>