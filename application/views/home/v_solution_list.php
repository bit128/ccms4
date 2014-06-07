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
			<h2><a href="/">首页</a> <span>/ <a href="<?php echo site_url('home/solution'); ?>">产品应用</a>
				<?php echo $breadcrumb; ?></h2>
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


	
	<!-- Categories -->
	<div class="widget-alt">
    
		<div class="headline no-margin"><h4>信息分类</h4></div>
   			<ul class="links-list-alt">
   				<?php foreach ($side as $v) { ?>
   				<li><a href="<?php echo site_url('home/solution_list'), '/', $v['cn_id']; ?>">
   					<?php echo $v['cn_name']; ?></a>
   				</li>
   				<?php } ?>
			</ul>
	</div>
    

    	
	<!-- Popular Posts -->
	<div class="widget">
		<div class="headline no-margin"><h4>热销产品</h4></div>
		<div id="pd_hot"></div>

	</div>
	
	
</div>



<!-- Page Content
================================================== -->
<div class="twelve columns">

<div class="headline no-margin"><h4><?php echo $title; ?></h4></div>
           <!-- list-->
           <div class="lister2 row">
	<?php if($content_list != 0){ echo '<ul>'; foreach($content_list as $v) { ?>
	<li><a href="<?php echo site_url('home/solution_list'), '/', $cn_id, '/', $v['ct_id']; ?>">
		<span><?php echo date('Y-m-d', $v['ct_ctime']); ?></span> <?php echo $v['ct_title']; ?></a></li>
	<?php } echo '</ul>'; }else{ echo $content['ct_detail']; } ?>
<div class="clear"></div>
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
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/home/js/product_express.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	/*热销产品*/
	var express = new ProductExpress('pd_status = 1', 5, 'pd_click', 'desc', $('#pd_hot'));
	express.getList(function(d){
		return '<div class="latest-post-blog clearfix"><a href="/index.php/home/item/'+d.pd_id+'" data-val="'+d.pd_id
			+'" class="pd_image"></a><p><a href="/index.php/home/item/'+d.pd_id+'">'+d.pd_name
			+'</a> <span><a href="/index.php/home/product"><strong>查看更多</strong> '
			+'<i class="mini-ico-chevron-right"></i></a></span></p></div>';
	});
});
</script>

</body>
</html>