<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>
	<?php include '_header.php'; ?>
</head>
<body>

<!-- Wrapper Start -->
<div id="wrapper">


<!-- Header
================================================== -->

<!-- 960 Container -->
<div class="container ie-dropdown-fix">

	<!-- Header -->
	<?php include '_top.php'; ?>
	<!-- Header / End -->
	
	<!-- Navigation -->
	<div class="sixteen columns">

		<?php include '_nav.php'; ?>
		
	</div>
	<!-- Navigation / End -->

</div>
<!-- 960 Container / End -->


<!-- Content
================================================== -->

<!-- 960 Container -->
<div class="container">

	<div class="sixteen columns">
	
		<!-- Page Title -->
		<div id="page-title">
			<h2><a href="/">首页</a> <span>/ 我的账户</span> <span>/ 修改密码</span></h2>
			<div id="bolded-line"></div>
		</div>
		<!-- Page Title / End -->

	</div>
</div>
<!-- 960 Container / End -->

	
<!-- 960 Container -->
<div class="container">


<!-- Sidebar
================================================== -->
<div class="four columns">
	
	<?php include '_my.php'; ?>
    
</div>

<!-- Page Content
================================================== -->
<div class="twelve columns">

<div class="headline no-margin"><h4>修改密码</h4></div>
		<!--
		<div class="notification error closeable">
			<p><span>*</span> 请确认当前密码是正确的并重试！</p>
		</div>
        
        <div class="notification error closeable">
			<p><span>*</span> 前后密码输入不一致，请重新输入。</p>
		</div>
        
        <div class="notification success closeable">
			<p><span>*</span> 密码修改成功 ！</p>
		</div>-->
		<div id="cp_box"></div>
<!-- Form -->
		<div id="contact-form">
			<form method="post" action="contact.php" />
				<div class="field">
					<label>当前密码:</label>
					<input type="password" class="text" id="user_password" />
				</div>
				<div class="field">
					<label>新密码:</label>
					<input type="password" class="text" id="new_password" />
				</div>
                <div class="field">
					<label>确认密码:</label>
					<input type="password" class="text" id="confirm_password" />
				</div>
				<div class="field">
					<input type="button" id="change_password" value="确认修改" />
				</div>
				
			</form>
		</div>

</div>

	
</div>
<!-- 960 Container End -->


</div>
<!-- Wrapper / End -->

<!-- Footer
================================================== -->

<!-- Footer Start -->
<?php include '_footer.php'; ?>
<!-- Footer / End -->
<script type="text/javascript">
$(document).ready(function(){
	function message(handle, level, message){
		handle.html('<div class="notification '+level+' closeable">'+message+'</div>');
	}
	/*用户变更密码*/
	$('#change_password').on('click', function(){
		var mess = $('#cp_box')
		var user_password = $('#user_password').val();
		if(user_password == ''){message(mess, 'error', '<p><span>*</span> 请填写原密码！</p>');return;}
		var new_password = $('#new_password').val();
		if(new_password == ''){message(mess, 'error', '<p><span>*</span> 请填写新密码！</p>');return;}
		var confirm_password = $('#confirm_password').val();
		if(new_password != confirm_password){message(mess, 'error', '<p><span>*</span> 两次密码输入不一致！</p>');return;}
		$.ajax({
			type: 'POST',
			url: '/index.php/user/changePassword',
			data: {user_password: user_password, new_password: new_password},
			success: function(data){
				if(data == '1'){
					message(mess, 'success', '<p><span>*</span> 密码修改成功 ！</p>')
				}else if(data == '-1'){
					message(mess, 'error', '<p><span>*</span> 请确认原密码是正确的并重试！</p>')
				}
			}
		});
	});
});
</script>
</body>
</html>