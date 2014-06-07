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
			<h2><a href="/">首页</a> <span>/ 产品中心</span></h2>
           
			<div id="bolded-line"></div>
		</div>
		<!-- Page Title / End -->

	</div>
</div>
<!-- 960 Container / End -->

	
<!-- 960 Container -->
<div class="container">


<div class="conditions-box row  clearfix">
	<div class="sixteen columns">
		
		<div id="category">
	    	<?php echo $category_list; ?>
	    </div>

	    <div id="target">
	    	<?php echo $target_list; ?>
	    </div>
	        
	</div>
</div>

	<!-- Portfolio Content -->
	<div id="#portfolio-wrapper"  class="clearfix">
		
		<?php if($product_list){ foreach($product_list as $v) { ?>
		<div class="one-third column portfolio-item">
			<div class="picture"><a href="<?php echo site_url('home/item'), '/', $v['pd_id']; ?>">
				<span class="pd_image" data-val="<?php echo $v['pd_id']; ?>"></span>
				<div class="image-overlay-link"></div></a></div>
			<div class="item-description alt">
				<h5><a href="<?php echo site_url('home/item'), '/', $v['pd_id']; ?>"><?php echo $v['pd_name']; ?></a></h5>
				<p><a href="<?php echo site_url('home/item'), '/', $v['pd_id']; ?>" class="button color">查看详细</a></p>
			</div>
		</div>
		<?php }} else { ?>
		<div class="notification warning closeable">
			<p><span>抱歉 !</span>  没有找到你所查询的相关产品，请尝试其他搜索条件。</p>
        </div>
		<?php } ?>
	</div>
	<!-- End Portfolio Content -->
    
    <div class="pagination"><?php echo $pages; ?></div>
		
</div>
<!-- End 960 Container -->


</div>
<!-- Wrapper / End -->

<!-- Footer
================================================== -->

<!-- Footer Start -->
<?php include '_footer.php'; ?>
<!-- Footer / End -->

<script type="text/javascript" src="<?php echo VIEWPATH; ?>/home/js/product_image.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//载入商品列表
	$('.pd_image').each(function(){
		new ProductImage($(this), $(this).attr('data-val'), 1);
	});
});
</script>
</body>
</html>