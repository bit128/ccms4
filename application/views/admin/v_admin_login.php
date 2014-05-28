<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>登录 &middot; CCMS管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo VIEWPATH; ?>/admin/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="<?php echo site_url('admin/login'); ?>" method="post">
        <h2 class="form-signin-heading">CCMS - 管理员登录</h2>
        <input type="text" class="input-block-level" placeholder="管理员帐号" name="am_account">
        <input type="password" class="input-block-level" placeholder="密码" name="am_password">
        <button class="btn btn-large btn-primary" type="submit">登录系统</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>
