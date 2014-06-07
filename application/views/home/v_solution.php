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
			<h2><a href="/">首页</a> <span>/ 产品应用</span></h2>
			<div id="bolded-line"></div>
		</div>
		<!-- Page Title / End -->

	</div>
</div>
<!-- 960 Container / End -->




<!--
================================================== -->

<!-- 960 Container -->
<div class="container">
	<?php foreach($solution_list as $v) { ?>
	<div class="sixteen columns row">
		<!-- Large Notice -->
		<div class="large-notice">
        <img class="image-left" src="/uploads/content/<?php echo $v['ct_image']; ?>" alt="" />
			<h2><?php echo $v['ct_title']; ?></h2>
			<p><?php echo $v['ct_detail']; ?></p>
			<a href="<?php echo site_url('home/solution_list'), '/', $v['cn_id']; ?>" class="button medium color">查看详细</a>
            <div class="clear"></div>
		</div>
	</div>
	<?php } ?>
</div>
<!-- 960 Container / End -->




</div>
<!-- Wrapper / End -->

<!-- Footer
================================================== -->

<!-- Footer Start -->
<?php include '_footer.php'; ?>
<!-- Footer / End -->
</body>
</html>