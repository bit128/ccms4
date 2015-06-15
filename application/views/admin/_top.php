<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="javascript:;">CTS商贸管理系统</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              <a href="<?php echo site_url('admin/adminHome'); ?>" class="navbar-link"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('am_account'); ?></a> |
              <a href="<?php echo site_url('admin/logout'); ?>" class="navbar-link">注销</a>
            </p>
            <ul class="nav">
              <li <?php if($this->nav_index == 10) echo 'class="active"'; ?>><a href="<?php echo site_url('channel/tree'); ?>">内容</a></li>
              <li <?php if($this->nav_index == 20) echo 'class="active"'; ?>><a href="<?php echo site_url('guestbook/guestbookList'); ?>">留言</a></li>
              <li <?php if($this->nav_index == 30) echo 'class="active"'; ?>><a href="<?php echo site_url('user/userList'); ?>">用户</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">商品 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li <?php if($this->nav_index == 40) echo 'class="active"'; ?>><a href="<?php echo site_url('product/productDetail'); ?>">添加商品</a></li>
                  <li <?php if($this->nav_index == 41) echo 'class="active"'; ?>><a href="<?php echo site_url('product/productList'); ?>">商品列表</a></li>
                  <li <?php if($this->nav_index == 42) echo 'class="active"'; ?>><a href="<?php echo site_url('menu/menuList'); ?>">分类管理</a></li>
                  <li <?php if($this->nav_index == 43) echo 'class="active"'; ?>><a href="<?php echo site_url('target/targetList'); ?>">标签管理</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">库存 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li <?php if($this->nav_index == 50) echo 'class="active"'; ?>><a href="<?php echo site_url('storage/storageList'); ?>">库存列表</a></li>
                  <li <?php if($this->nav_index == 51) echo 'class="active"'; ?>><a href="<?php echo site_url('storage/storageRecord'); ?>">库存记录</a></li>
                </ul>
              </li>
              <li <?php if($this->nav_index == 60) echo 'class="active"'; ?>><a href="<?php echo site_url('order/orderList'); ?>">订单</a></li>
              <li <?php if($this->nav_index == 70) echo 'class="active"'; ?>><a href="<?php echo site_url('admin/adminList'); ?>">管理员</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>