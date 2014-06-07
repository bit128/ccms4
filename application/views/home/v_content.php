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
			<h2><a href="/">首页</a> <span>/ <a href="javascript:;"><?php echo $breadcrumb; ?></a></span> <span>/ <?php echo $channel['cn_name']; ?></span></h2>
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
   				<?php foreach ($channel_list['result'] as $v) { 
   					echo '<li><a href="';
   					echo site_url('home/content');
   					echo '/0/',$type,'/',$v['cn_id'],'">',$v['cn_name'],'</a></li>';
   				} ?>
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

<div class="headline no-margin"><h4><?php echo $channel['cn_name']; ?></h4></div>
           <!-- list-->
           <div class="lister2 row">
<ul>
	<?php foreach ($content_list as $v) { ?>
	<li>
		<a href="<?php echo site_url('home/content_detail'), '/', $type, '/', $v['ct_id'];?>">
			<span><?php echo date('Y-m-d', $v['ct_ctime']); ?> </span> <?php echo $v['ct_title']; ?>
		</a>
	</li>
	<?php } ?>
</ul>
<div class="clear"></div>
</div>
    	<div class="pagination"><?php echo $content_pages; ?></div>

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