<div class="widget-alt">
	<div class="headline no-margin">
	<h4>欢迎您</h4></div>
	<?php if($this->session->userdata('user_status') == '1') { ?>
	    <p><i class="mini-ico-user"></i> <?php echo $this->session->userdata('user_account'); ?></p>
	<?php } else { ?>
	    <ul class="star_list"><li>VIP - <?php echo $this->session->userdata('user_account'); ?> </li></ul>
	<?php } ?>
     
</div>
<div class="widget-alt">
	<div class="headline">
	  <h4>我的目录</h4></div>
		<ul class="check_list">
			<li><a href="<?php echo site_url('home/my_order'); ?>">我的询价单</a></li>
			<li><a href="<?php echo site_url('home/my'); ?>">我的资料</a></li>
			<li><a href="<?php echo site_url('home/my_safety'); ?>">修改密码</a></li>
            <li><a href="<?php echo site_url('home/my_collection'); ?>">我的收藏</a></li>
		</ul>
</div>