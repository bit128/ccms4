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
			<h2><a href="/">首页</a> <span>/ 关于我们</span></h2>
			<div id="bolded-line"></div>
		</div>
		<!-- Page Title / End -->

	</div>
</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container">
	<!-- 16 Columns -->
	<div class="sixteen columns">
		<div class="headline no-margin"><h3>公司简介</h3></div>
        <img src="/uploads/content/<?php echo $detail['ct_image']?>" alt="Staff Photo" class="float-right"/>
		<?php echo $detail['ct_detail']; ?>
	</div>
	<!-- 16 Columns End -->
	
	
	<div class="sixteen columns">
		<div class="headline low-margin"><h4>关于我们更多信息</h4></div>
	</div>
	
	<!-- About -->
	<div class="one-third column"> 
    <div class="picture"><a href="<?php echo $style['ct_subtitle']; ?>"><img src="/uploads/content/<?php echo $style['ct_image']; ?>" alt="" /><div class="image-overlay-link"></div></a></div>
    <div class="team-name"><h4><?php echo $style['ct_title']; ?> </h4> <span><a href="<?php echo $style['ct_subtitle']; ?>" class="">点击查看</a></span></div>
	</div>
	
	<!-- About -->
	<div class="one-third column"> 
    <div class="picture"><a href="<?php echo $fac['ct_subtitle']; ?>"><img src="/uploads/content/<?php echo $fac['ct_image']; ?>" alt="" /><div class="image-overlay-link"></div></a></div>
    <div class="team-name"><h4><?php echo $fac['ct_title']; ?> </h4> <span><a href="<?php echo $fac['ct_subtitle']; ?>" class="">点击查看</a></span></div>
	</div>

	<!-- About -->
	<div class="one-third column"> 
    <div class="picture"><a href="<?php echo $emp['ct_subtitle']; ?>"><img src="/uploads/content/<?php echo $emp['ct_image']; ?>" alt="" /><div class="image-overlay-link"></div></a></div>
    <div class="team-name"><h4><?php echo $emp['ct_title']; ?> </h4> <span><a href="<?php echo $emp['ct_subtitle']; ?>" class="">点击查看</a></span></div>
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


</body>
</html>