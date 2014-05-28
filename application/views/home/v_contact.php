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
			<h2><a href="/">首页</a> <span>/ 联系我们</span></h2>
			<div id="bolded-line"></div>
		</div>
		<!-- Page Title / End -->

	</div>
</div>
<!-- 960 Container / End -->


<!--  960 Container Start -->
<div class="container">

	<!-- Text -->
	<div class="sixteen columns">
		<p><strong>欢迎您随时通过以下方式联系我们，感谢您的支持！</strong></p>
		
	</div>

	<!-- Contact Form -->
	<div class="twelve columns">
		<div class="headline no-margin"><h4>联系表单</h4></div>
        
        
		<div class="notification error closeable">
			<p>红色 " * " 为必填项，谢谢 !</p>
		</div>
		<div class="form-spacer"></div>
		
		<!-- Success Message -->
		<div class="success-message">
			<div class="notification success closeable">
				<p><span>成功!</span> 信息已发出.</p>
			</div>
		</div>

		<!-- Form -->
		<div id="contact-form">
			<form id="form_ct">
				<div class="field">
					<label>姓名: <span>*</span></label>
					<input type="text" class="text" id="gb_username" />
				</div>
                
                <div class="field">
					<label>电子邮箱: <span>*</span></label>
					<input type="text" name="email" class="text" id="gb_email" />
				</div>
                
                <div class="field">
					<label>QQ / Skype:</label>
					<input type="text" class="text" id="gb_contact" />
				</div>
                
                <div class="field">
					<label>电话:</label>
					<input type="text" class="text" id="gb_phone" />
				</div>
				<div class="field">
					<label>主题: <span>*</span></label>
					<input type="text" class="text" id="gb_title" />
				</div>
				<div class="field">
					<label>留言: </label>
					<textarea class="text textarea" id="gb_content"></textarea>
				</div>
                
				<div class="field">
					<input type="button" id="send_guestbook" value="发送信息" />
				</div>
			</form>
		</div>

</div>
	
    <!-- Contact Details -->
	<div class="four columns">
		<div class="headline no-margin"><h4>联系我们</h4></div>
        <?php echo $cont['ct_detail']; ?>
	</div>
    
	<!-- Contact Details -->
	<div class="four columns google-map">

		<div class="headline low-margin"><h4>公司地址</h4></div>
		
		<!-- Google Maps -->
		<div id="googlemaps" class="google-map google-map-full" style="height:200px"></div>

		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script src="<?php echo VIEWPATH; ?>/home/js/jquery.gmap.min.js"></script>
		
		<script type="text/javascript">
		jQuery('#googlemaps').gMap({
			maptype: 'ROADMAP',
			scrollwheel: false,
			zoom: 13,
			markers: [
				{
					address: '安徽省池州市青阳县蓉城镇陵阳路134号, China',  // Your Adress Here
					html: '',
					popup: false,
				}

			],
			
		});
		</script>
		
	</div>
		
	<!-- Contact Details -->
	<!--
	<div class="four columns">
		<div class="headline low-margin"><h4>关注我们</h4></div>
		<div id="social" class="tooltips">
			<a href="#" rel="tooltip" title="Facebook" class="facebook">Facebook</a>
			<a class="twitter" rel="tooltip" href="#" data-original-title="Twitter">Twitter</a>
			<a href="#" rel="tooltip" title="LinkedIn" class="linkedin">LinkedIn</a>
			<a href="#" rel="tooltip" title="Google Plus" class="googleplus">Google Plus</a>
		
		</div>
		
	</div>
	-->
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
	$('#send_guestbook').on('click', function(){
		var gb_username = $('#gb_username').val();
		if(gb_username == ''){alert('请填写姓名.');$('#gb_username').focus();return;}
		var gb_email = $('#gb_email').val();
		if(gb_email == ''){alert('请填写邮箱.');$('#gb_email').focus();return;}
		var gb_contact = $('#gb_contact').val();
		var gb_phone = $('#gb_phone').val();
		var gb_title = $('#gb_title').val();
		if(gb_title == ''){alert('请填写留言主题.');$('#gb_title').focus();return;}
		var gb_content = $('#gb_content').val();
		$.ajax({
			type: 'POST',
			url: '/index.php/guestbook/addGuestbook',
			data: {gb_username: gb_username, gb_email: gb_email, gb_contact: gb_contact, gb_phone: gb_phone,
				gb_content: gb_content, gb_title: gb_title, gb_type: 0},
			success: function(data){
				if(data == '1'){
					alert('留言提交成功！感谢您的反馈.');
					$('#form_ct')[0].reset();
				}
			}
		});
	});
});
</script>
</body>
</html>