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
      <p>
        <select class="input-medium">
          <option value="0">待支付订单</option>
          <option value="1">待发货订单</option>
          <option value="2">已发货订单</option>
        </select>
      </p>
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>订单号</th>
            <th>用户id</th>
            <th>总价</th>
            <th>下单时间</th>
            <th>发货时间</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order as $v) { ?>
          <tr>
            <td><?php echo $v['od_id']; ?></td>
            <td><?php echo $v['user_id']; ?></td>
            <td><?php echo $v['od_price']; ?></td>
            <td><small><?php echo date('Y-m-d H:i:s', $v['od_ctime']); ?></small></td>
            <td><small><?php echo date('Y-m-d H:i:s', $v['od_stime']); ?></small></td>
            <td></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

      <?php include '_footer.php'; ?>

    </div>

  </body>
</html>