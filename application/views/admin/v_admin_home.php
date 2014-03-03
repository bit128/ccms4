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
          <div class="well">
            <p>
              <label>当前登录管理员：</label>
              <strong class="text-info"><?php echo $this->session->userdata('am_account'); ?></strong>
            </p>
            <p>
              <label>拥有权限：</label>
              <?php echo $this->admin->printRole($this->session->userdata('am_role')); ?>
            </p>
            <p>&nbsp;</p>
            <p>
              <a href="<?php echo site_url('admin/logout'); ?>" class="btn btn-success">注销账户</a>
            </p>
          </div>
        </div>
      </div>

      <?php include '_footer.php'; ?>

    </div>

  </body>
</html>