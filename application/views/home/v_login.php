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
			<h2><a href="/">首页</a> <span>/ 登录或注册</span></h2>
			<div id="bolded-line"></div>
		</div>
		<!-- Page Title / End -->

	</div>
</div>
<!-- 960 Container / End -->


<!--  960 Container Start -->
<div class="container">


    <!-- 1/2 Columns -->
	<div class="eight columns">
		<div class="headline no-margin"><h3>登录</h3></div>
		<!--
        <div class="notification error closeable">
			<p><span>*</span> 请核对您的登录邮箱和密码并重试.</p>
		</div>-->
        <div id="l_box"></div>
		<!-- Form -->
		<div id="contact-form">
			<form id="l_form">
				
				<div class="field">
					<label> 登录邮箱:  <span>*</span></label>
					<input type="text" class="text" id="l_account" />
				</div>
                
                <div class="field">
					<label>密码: <span>*</span></label>
					<input type="password" class="text" id="l_password" />
				</div>
			
				
				<div class="field">
					<input type="button" id="login" value="登录" />
				</div>
				
			</form>
            
            
            <div class="clear"></div>
            <div class="headline no-margin"><h3>忘记密码?</h3></div>
            <!--
            <div class="notification error closeable">
				<p><span>*</span> 填写邮箱地址.</p>
			</div>
	        <div class="notification success closeable">
				<p><span>*</span> 密码已成功送至您的登录邮箱，请查看并及时修改！</p>
			</div>-->
			<div id="f_box"></div>
            <form>
				
				<div class="field">
					<label>请输入您的登录邮箱地址以便接受新密码:  </label>
					<input type="text" name="email" id="f_account" />
				</div>
                
               
				<div class="field">
					<input type="button" id="find_pwd" value="提交" />
					<div class="loading"></div>
				</div>
				
			</form>
           
            
		</div>
        
     </div>
	
	<div class="eight columns">
		<div class="headline no-margin"><h3>注册新账户</h3></div>
		<div id="r_box"></div>
		<div id="contact-form">
			<form id="r_form">
				
				<div class="field">
					<label> 电子邮件:  <span>*</span></label>
					<input type="text" class="text" id="r_account" />
				</div>
                
                <div class="field">
					<label> 姓名:  <span>*</span></label>
					<input type="text" class="text" id="r_nick" />
				</div>
                
                <div class="field">
					<label>密码: <span>*</span></label>
					<input type="password" class="text" id="r_password" />
				</div>
                
                <div class="field">
					<label>确认密码: <span>*</span></label>
					<input type="password" class="text" id="r_password2" />
				</div>
			
				
				<div class="field">
					<input type="button" id="register" value="提交" />
				</div>
				
			</form>
		</div>
	</div>
	<!-- 1/2 Columns End -->



</div>
<!-- End 960 Container -->

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
	/*login*/
	$('#login').on('click', function(){
		var l_account = $('#l_account').val();
		if(l_account == ''){return false;}
		var l_password = $('#l_password').val();
		if(l_password == ''){return false;}
		$.ajax({
			type: 'POST',
			url: '/index.php/user/login',
			data: {user_account: l_account, user_password: l_password},
			success: function(data){
				if(data == '1'){
					location.href = '/';
				}else{
					message($('#l_box'), 'error', '<p><span>*</span>  请核对您的登录邮箱和密码并重试.</p>');
				}
			}
		});
	});
	/*register*/
	$('#register').on('click', function(){
		var handle = $('#r_box');
		/*check type*/
		var r_account = $('#r_account').val();
		if(r_account == ''){
			message(handle, 'error', '<p><span>*</span>  请填写邮箱.</p>');
		}else if(! /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/.exec(r_account)){
			message(handle, 'error', '<p><span>*</span>  邮箱格式不正确.</p>');
		}else{
			$.ajax({
				type: 'POST',
				url: '/index.php/user/checkAccount',
				data: {account: r_account},
				success: function(data){
					if(data == '1'){
						var r_nick = $('#r_nick').val();
						if(r_nick == ''){message(handle, 'error', '<p><span>*</span>  请填写姓名.</p>');return false;}
						else{handle.html('');}
						var r_password = $('#r_password').val();
						if(r_password == ''){message(handle, 'error', '<p><span>*</span>  请填写密码.</p>');return false;}
						else{handle.html('');}
						var r_password2 = $('#r_password2').val();
						if(r_password != r_password2){message(handle, 'error', '<p><span>*</span>  两次密码输入不一致.</p>');return false;}
						else{handle.html('');}
						$('#register').hide();
						$.ajax({
							type: 'POST',
							url: '/index.php/user/register',
							data: {user_account: r_account, user_password: r_password, user_nick: r_nick},
							success: function(data){
								if(data == '1'){
									message(handle, 'success', '<p>您的账户注册成功！</p>');
								}
								$('#r_form')[0].reset();
								$('#register').show();
							}
						});
					}else{
						message(handle, 'error', '<p><span>*</span>  邮箱已经被使用，请更换一个.</p>');
					}
				}
			});
		}
	});
	/*find password*/
	$('#find_pwd').on('click', function(){
		var handle = $('#f_box');
		var account = $('#f_account').val();
		if(account == ''){
			message(handle, 'error', '<p><span>*</span>  请填写邮箱.</p>');
		}else if(! /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/.exec(account)){
			message(handle, 'error', '<p><span>*</span>  邮箱格式不正确.</p>');
		}else{
			$.ajax({
				type: 'POST',
				url: '/index.php/home/findPassword',
				data: {account: account},
				success: function(data){
					message(handle, 'warning', '<p><span>*</span> '+data+'</p>');
					$('#f_account').val('');
				}
			});
		}
	});
});
</script>
</body>
</html>