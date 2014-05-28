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
			<h2><a href="/">首页</a> <span>/ 我的账户</span> <span>/ 我的资料</span></h2>
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

<div class="headline no-margin"><h4>我的资料</h4></div>

<p>如果您能提供详细的资料信息我们将会非常感谢，并依此为您提供更贴身的服务。<br/>

<span class="alert-orange">温馨提示：您的信息隐私是绝对安全的，将仅限于我们与您的沟通交流之用，绝不会泄露于任何第三方。</span></p>

<!-- Form -->
		<div id="contact-form">
			<form method="post" action="contact.php" />
                 
                <div class="field">
					<label>称谓:</label>
					<select id="user_gender">
						<option value="0" <?php if($users['user_gender'] == 0) echo 'selected'; ?>>未知</option>
				  		<option value="2" <?php if($users['user_gender'] == 2) echo 'selected'; ?>>女士</option>
				  		<option value="1" <?php if($users['user_gender'] == 1) echo 'selected'; ?>>先生</option>
		  			</select>
		  		</div>
				
				<div class="field">
					<label>生日:</label>
					<input type="text" class="text" id="user_birthday" value="<?php if($detail['user_birthday']) echo date('Y-m-d', $detail['user_birthday']); ?>"/>
				</div>

				<div class="field">
					<label>常用邮箱:</label>
					<input type="text" class="text" id="user_email" value="<?php echo $detail['user_email']; ?>"/>
				</div>
                
                <div class="field">
					<label>QQ:</label>
					<input type="text" class="text" id="user_qq" value="<?php echo $detail['user_qq']; ?>"/>
				</div>
                
                <div class="field">
					<label>电话:</label>
					<input type="text" class="text" id="user_phone" value="<?php echo $detail['user_phone']?>"/>
				</div>
                
                <div class="field">
					<label>邮编:</label>
					<input type="text" class="text" id="user_post" value="<?php echo $detail['user_post']; ?>"/>
				</div>
                
                <div class="field">
					<label>地址:</label>
					<input type="text" class="text" id="user_address" value="<?php echo $detail['user_address']; ?>"/>
				</div>
				
				<div id="box"></div>
                
				<div class="field">
					<input type="button" id="update_detail" value="保存更改" />
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
	/*用户更新性别*/
	$('#user_gender').on('change', function(){
		var user_gender = $(this).val();
		$.ajax({
			type: 'POST',
			url: '/index.php/user/changeGender',
			data: {user_gender: user_gender}
		});
	});
	/*用户更新资料*/
	$('#update_detail').on('click', function(){
		$.ajax({
			type: 'POST',
			url: '/index.php/user/updateDetail',
			data: {user_birthday: $('#user_birthday').val(), user_email: $('#user_email').val(), user_qq: $('#user_qq').val(),
				user_phone: $('#user_phone').val(), user_post: $('#user_post').val(), user_address: $('#user_address').val()},
			success: function(data){
				if(data == '1'){
					$('#box').html('<div class="notification success closeable"><p><span>*</span> 您的信息资料更新成功 ！</p></div>');
				}
			}
		});
	});
});
</script>
</body>
</html>