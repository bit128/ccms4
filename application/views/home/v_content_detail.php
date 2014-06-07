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
			<h2><a href="/">首页</a>
				<!--<span>/ <a href="#"></a></span>-->
				<span>/ <a href="javascript:history.back();"><?php echo $channel['cn_name']; ?></a></span>
				<span>/ <?php echo $content['ct_title']; ?></span></h2>
            
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


	
	<!-- Popular Posts -->
	<div class="widget-alt">
		<div class="headline no-margin"><h4>热销产品</h4></div>
		<div id="pd_hot"></div>

	</div>
	
	
</div>



<!-- Page Content
================================================== -->
<div class="twelve columns">



<div class="post-title"><h2><?php echo $content['ct_title']; ?></h2></div>
<div class="post-meta"><span><i class="mini-ico-calendar"></i>日期 <?php echo date('Y-m-d', $content['ct_ctime']); ?></span></div>

	<?php echo $content['ct_detail']; ?>
    <div  class="pagination">
	<ul>
    	<li><a href="javascript:history.go(-1);">返回上一页</a></li>
    </ul>
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