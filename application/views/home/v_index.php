<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]-->
<head>
<?php include '_header.php' ?>
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

	<!-- Flexslider -->
	<div class="sixteen columns">
		<section class="slider">
			<div class="flexslider home">
				<ul class="slides">
				<?php foreach($banner as $v) { ?>
					<li><a href="<?php echo $v['ct_subtitle']; ?>"><img src="/uploads/content/<?php echo $v['ct_image']; ?>" alt="<?php echo $v['ct_title']?>" title="<?php echo $v['ct_title']?>"></a></li>
				<?php } ?>	
				</ul>
			</div>
		</section>
  	</div>
	<!-- Flexslider / End -->
	
</div>
<!-- 960 Container / End -->





<!-- 960 Container -->
<div class="container">


	<!-- 1/3 Columns -->
	<div class="eight columns">
		<div class="headline"><h3>公司简介</h3></div>
		<p><?php echo $detail['ct_summary']; ?> …… <a href="<?php echo site_url('home/about'); ?>">更多信息 <i class="mini-ico-chevron-right"></i></a> </p>
	</div>
	
    	
	<div class="eight columns" style="margin-top:45px;">
	
		<!-- Tabs Navigation -->
		<ul class="tabs-nav">
			<li class="active"><a href="#tab1"><i class="mini-ico-bullhorn"></i> 公司新闻</a></li>
			<li class="last-child"><a href="#tab2"><i class="mini-ico-bullhorn"></i> 产品动态</a></li>
		</ul>
				
		<!-- Tabs Content -->
		<div class="tabs-container">
			<div class="tab-content" id="tab1">
            <ul class="links-list-alt" id="ne_1"></ul>
           <ul class="plus_list"> <li><a href="<?php echo site_url('home/content'); ?>/0/news/530029c52bcf6">更多信息</a></li></ul>
            </div>
			<div class="tab-content" id="tab2">
            <ul class="links-list-alt" id="ne_2"></ul>
           <ul class="plus_list"> <li><a href="<?php echo site_url('home/content'); ?>/0/news/530029d5db453">更多信息</a></li></ul>
            </div>
            
		</div>
		
	</div>
		
	<!-- 1/2 Columns End -->
	
</div>
<!-- 960 Container End -->

<!-- 960 Container -->
<div class="container">
<!-- Headline -->
	<div class="headline"><h3>热销产品</h3></div>
	
			<!-- Testimonial's Carousel -->
			<div class="testimonials-carousel" data-autorotate="3000">
				<ul class="carousel" >
					<li class="testimonial" id="pd_hot"></li>
				</ul>
			</div>
</div>
<!-- 960 Container / End -->


</div>
<!-- Wrapper / End -->


<!-- Footer
================================================== -->

<!-- Footer Start -->
<?php include '_footer.php'; ?>
<!-- Footer / End -->
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/home/js/product_express.js"></script>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/home/js/news_express.js"></script>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/home/js/datetime.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	(function() {
		var $tabsNav    = $('.tabs-nav'),
			$tabsNavLis = $tabsNav.children('li'),
			$tabContent = $('.tab-content');
		$tabsNav.each(function() {
			var $this = $(this);
			$this.next().children('.tab-content').stop(true,true).hide().first().show();
			$this.children('li').first().addClass('active').stop(true,true).show();
		});
		$tabsNavLis.on('click', function(e) {
			var $this = $(this);
			$this.siblings().removeClass('active').end().addClass('active');
			$this.parent().next().children('.tab-content').stop(true,true).hide().siblings( $this.find('a').attr('href') ).fadeIn();
			e.preventDefault();
		});
	})();
	//热销产品
	var express = new ProductExpress('pd_status = 1', 4, 'pd_click', 'desc', $('#pd_hot'));
	express.getList(function(d){
		return '<div class="four columns"><div class="picture"><a class="pd_image" href="/index.php/home/item/'
			+d.pd_id+'" data-val="'+d.pd_id+'"></a><div class="image-overlay-link"></div></a></div>'
			+'<div class="item-description"><h5><a href="/index.php/home/item/'+d.pd_id+'">'+d.pd_name
			+'</a></h5><p><a href="/index.php/home/item/'+d.pd_id+'" class="button color">查看详细</a></p></div></div>';
	});
	//公司新闻
	new NewsExpress($('#ne_1'), '530029c52bcf6', 4).getList(function(d){
		return '<li><a href="/index.php/home/content_detail/news/'+d.ct_id+'"><span>'+(new Datetime(d.ct_ctime).ymd(1))+'</span> '+d.ct_title.substring(0, 26)+'</a></li>';
	});
	//产品动态
	new NewsExpress($('#ne_2'), '530029d5db453', 4).getList(function(d){
		return '<li><a href="/index.php/home/content_detail/news/'+d.ct_id+'"><span>'+(new Datetime(d.ct_ctime).ymd(1))+'</span> '+d.ct_title.substring(0, 26)+'</a></li>';
	});
});
</script>
</body>
</html>