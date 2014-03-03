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
          <p>
            <select class="input-small">
              <option value="0">全部</option>
              <option value="1">平台用户</option>
              <option value="2">站内用户</option>
              <option value="3">高级用户</option>
            </select>
            <span class="input-prepend">
              <input type="text">
              <a class="btn">搜索</a>
            </span>
          </p>
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>编号</th>
                <th>账号</th>
                <th>创建时间</th>
                <th>登录时间</th>
                <th>登录次数</th>
                <th>积分</th>
                <th>累计积分</th>
                <th>状态</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody id="user_list" class="f_tiny">
              <?php foreach($result as $v) { ?>
              <tr>
                <td><?php echo $v['user_id']; ?></td>
                <td><?php echo $v['user_account']; ?></td>
                <td><?php echo date('Y-m-d', $v['user_ctime']); ?></td>
                <td><?php echo date('Y-m-d', $v['user_utime']); ?></td>
                <td><?php echo $v['user_count']; ?></td>
                <td><?php echo $v['user_score']; ?></td>
                <td><?php echo $v['user_allscore']; ?></td>
                <td><?php switch ($v['user_status']) {
                  case 1: echo '平台'; break;
                  case 2: echo '站内'; break;
                  case 3: echo '高级'; break;
                }?></td>
                <td><a class="btn btn-mini" href="<?php echo site_url('user/userDetail'), '/', $v['user_id']; ?>">详情</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <div class="pagination"><?php echo $pages; ?></div>
        </div>
      </div>

      <?php include '_footer.php'; ?>

    </div>

  </body>
</html>