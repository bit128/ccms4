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
			<h2><a href="/">首页</a> <span>/ <a href="javascript:history.back();">产品中心</a></span> <span>/ <?php echo $products['pd_name']?></span></h2>
			
			<div id="bolded-line"></div>
		</div>
		<!-- Page Title / End -->

	</div>
</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container ">

	<!-- 1/2 Columns -->
	<div class="eight columns">
		
        <!-- Flexslider -->
		<section class="slider">
			<div class="flexslider subpage">
				<ul class="slides">
				<?php foreach ($products['pd_image'] as $img) { ?>
					<li><div class="picture"><a href="/uploads/product/<?php echo $img; ?>" rel="image-gallery" title="<?php echo $products['pd_name']; ?>"><img src="/uploads/product/<?php echo $img; ?>" alt="" /><div class="image-overlay-zoom"></div></a></div></li>
				<?php } ?>
				</ul>
			</div>
		</section>
		
		<div class="clear"></div>
	</div>
	
	<div class="eight columns">
		<input type="hidden" id="pd_id" value="<?php echo $products['pd_id']; ?>">
		<h3><?php echo $products['pd_name']; ?></h3>
        <p><span>产品编号:<?php echo $products['pd_no']; ?></span></p>
		<p>如果你对该款产品感兴趣并欲采购，请告知需求数量，以便我们给您更准确的报价。 </p>
        <!-- Large Notice -->
		<div class="large-notice row">
        
            <!-- Form -->
		<div id="contact-form" class="row">
			<form method="post" />
				
				<div class="field">
					<label>询价数量 <span>*</span></label>
					<input type="text" class="text" id="sp_quantity" />
				</div>
                
                <div class="field">
					<label>选择库存 <span>*</span></label>
					<select id="storage_list">
					<?php if ($storages){  foreach($storages as $v) {
							echo '<option value="',$v['st_id'],'">颜色：',$v['st_colour'],' - 尺寸：',$v['st_size'],'</option>';
						} } else { 
						echo '<option value="0">没有现货</option>';
					} ?>
					</select>
		  		</div>
				
			</form>
            <div class="clear"></div>
		</div>
			<p>
				<?php if($this->session->userdata('user_id')){ ?>
				<a href="javascript:;" class="putin button medium color">添加到询价单</a> 
	            <a href="javascript:;" class="putin button" >收藏</a>
	            <?php } else { ?>
	            <a href="<?php echo site_url('home/login'); ?>" class="button medium color">添加到询价单</a> 
	            <a href="<?php echo site_url('home/login'); ?>" class="button" >收藏</a>
	            <?php } ?>
        	</p>
            <div id="mess_box"></div>
		</div>
        <p class="alert-red">注意:该款 最低询价数量不低于10件. </p>
	</div>
    
	<!-- 1/2 Columns End -->
	
</div>
<!-- 960 Container End -->

<!-- 960 Container -->
<div class="container">


<!-- Sidebar
================================================== -->
<div class="four columns">

    <!-- Tags  下载仅限vip认证会员-->
	<div class="widget">
		<div class="headline no-margin"><h4>资料下载</h4></div>
		<div class="tags">
			<a href="#">产品说明书</a>
			<a href="#">产品宣传册</a>
		</div>
	</div>
    	
	<!-- Popular Posts -->
	<div class="widget">
		<div class="headline no-margin"><h4>热销产品</h4></div>
		<div id="pd_hot"></div>
	</div>
	
	
</div>


<!-- Page Content
================================================== -->
<div class="twelve columns" style="margin-top:40px;">

        <!-- Tabs Navigation -->
		<ul class="tabs-nav">
			<li class="active"><a href="#tab1"><i class="mini-ico-exclamation-sign"></i> 产品描述</a></li>
            <li><a href="#tab2"><i class="mini-ico-list-alt"></i> 产品常见问答</a></li>
			<li  class="last-child"><a href="#tab3"><i class="mini-ico-pencil"></i> 产品意见</a></li>
		</ul>
				
		<!-- Tabs Content -->
		<div class="tabs-container">
			<div class="tab-content" id="tab1">
				<?php echo $products['pd_detail']; ?>
            </div>
			<div class="tab-content" id="tab2">
             <ul class="lister3">
		        <li><h4><i class="mini-ico-question-sign"></i> when customers submit their answer, we thank them ?</h4>
				<p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. Mauris ut ligula tortorea lorem ipsum dolor sit amet gorbi vel nulla eget quam porttitor gravida.</p></li>
                
                <li><h4><i class="mini-ico-question-sign"></i> when customers submit their answer, we thank them ?</h4>
				<p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. Mauris ut ligula tortorea lorem ipsum dolor sit amet gorbi vel nulla eget quam porttitor gravida.</p></li>
                
                <li><h4><i class="mini-ico-question-sign"></i> when customers submit their answer, we thank them ?</h4>
				<p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. Mauris ut ligula tortorea lorem ipsum dolor sit amet gorbi vel nulla eget quam porttitor gravida.</p></li>
                
                <li><h4><i class="mini-ico-question-sign"></i> when customers submit their answer, we thank them ?</h4>
				<p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. Mauris ut ligula tortorea lorem ipsum dolor sit amet gorbi vel nulla eget quam porttitor gravida.</p></li>
                
                <li><h4><i class="mini-ico-question-sign"></i> when customers submit their answer, we thank them ?</h4>
				<p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. Mauris ut ligula tortorea lorem ipsum dolor sit amet gorbi vel nulla eget quam porttitor gravida.</p></li>
                
                <li><h4><i class="mini-ico-question-sign"></i> when customers submit their answer, we thank them ?</h4>
				<p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. Mauris ut ligula tortorea lorem ipsum dolor sit amet gorbi vel nulla eget quam porttitor gravida.</p></li>
                
              <li><h4><i class="mini-ico-question-sign"></i> when customers submit their answer, we thank them ?</h4>
				<p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. Mauris ut ligula tortorea lorem ipsum dolor sit amet gorbi vel nulla eget quam porttitor gravida.</p></li>

       </ul>
            </div>
			<div class="tab-content" id="tab3">
            <!-- Comments -->
            <!-- Add Comment -->
		<!-- Form -->
		<div id="contact-form">
        <div class="notification error closeable">
			<p>红色 " * " 为必填项，谢谢 !</p>
		</div>
			<form id="form_ct">
            
				<div class="field">
					<label>姓名:  <span>*</span></label>
					<input type="text" class="text" id="gb_username" />
				</div>
				
				<div class="field">
					<label>电子邮箱: <span>*</span></label>
					<input type="text" class="text" id="gb_email" />
				</div>
                
                 <div class="field">
					<label>QQ / Skype: </label>
					<input type="text" class="text" id="gb_contact" />
				</div>
                
                <div class="field">
					<label>电话: </label>
					<input type="text" class="text" id="gb_phone" />
				</div>
                
                
                <div class="field">
					<label>产品名称: <span> 请保持默认项，无需编辑</span></label>
					<input type="text" class="text" value="<?php echo $products['pd_name']; ?>" id="gb_title" disabled/>
				</div>
				
				<div class="field">
					<label>评论: <span>*</span></label>
					<textarea class="text textarea" id="gb_content"></textarea>
				</div>
                
              
				
				<div class="field">
					<input type="button" id="send_guestbook" value="发送" />
				</div>
				
			</form>
		</div>
	
</div>
            </div>
		</div>


</div>


<!-- 960 Container End -->


<!-- 960 Container -->
<div class="container">

	<div class="sixteen columns">
		<!-- Headline -->
		<div class="headline"><h3>类似产品</h3></div>
	</div>
	<div id="pd_like"></div>

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
	/*热销产品*/
	var express = new ProductExpress('pd_status = 1', 5, 'pd_click', 'desc', $('#pd_hot'));
	express.getList(function(d){
		return '<div class="latest-post-blog"><a href="/index.php/home/item/'+d.pd_id+'" data-val="'+d.pd_id
			+'" class="pd_image"></a><p><a href="/index.php/home/item/'+d.pd_id+'">'+d.pd_name
			+'</a> <span><a href="/index.php/home/product"><strong>查看更多</strong> '
			+'<i class="mini-ico-chevron-right"></i></a></span></p></div>';
	});
	/*相似产品*/
	var pd_category = "<?php echo $products['pd_category']; ?>";
	var express2 = new ProductExpress("pd_status = 1 AND pd_category = '"+pd_category+"'", 4, 'pd_utime', 'desc', $('#pd_like'));
	express2.getList(function(d){
		return '<div class="four columns"><div class="picture"><a href="/index.php/home/item/'+d.pd_id
			+'" class="pd_image" data-val="'+d.pd_id+'"></a></div><div class="item-description related"><h5>'
			+'<a href="/index.php/home/item/'+d.pd_id+'">'+d.pd_name+'</a></h5><p><a href="#" class="button color">询价</a>'
			+'<a href="/index.php/home/item/'+d.pd_id+'" class="button light">查看详细</a></p></div></div>';
	});
	/*消息框*/
	function message(handle, level, message){
		handle.html('<div class="notification '+level+' closeable">'+message+'</div>');
	}
	/*放入cart*/
	$('.putin').on('click', function(){
		var mess = $('#mess_box');
		var pd_id = $('#pd_id').val();
		var sp_status = $('.putin').index($(this));
		var st_id = $('#storage_list').val();
		var sp_quantity = $('#sp_quantity').val();
		if(sp_quantity == ''){
			sp_quantity = 0;
		}else{
			sp_quantity = parseInt(sp_quantity);
		}
		if(sp_status == 0){
			if(st_id == '0'){
				message(mess, 'error', '<p>请选择库存。如果商品没有库存，则暂时不能添加到购物车，但您仍可以收藏。</p>');
				return false;
			}else if(sp_quantity < 10){
				message(mess, 'error', '<p>最低询价数量不低于10件。</p>');
				return false;
			}
		}
		$.ajax({
			type: 'POST',
			url: '/index.php/order/addShoppingCart',
			data: {pd_id: pd_id, st_id: st_id, sp_quantity: sp_quantity, sp_status: sp_status},
			success: function(data){
				if(data == '1'){
					if(sp_status == 0){
						var rs = '<p>成功添加到购物车。</p>';
					}else{
						var rs = '<p>成功添加到收藏夹。</p>';
					}
					message(mess, 'success', rs);
				}else if(data == '-1'){
					if(sp_status == 0){
						var rs = '<p>购物车中已经有该商品了。</p>';
					}else{
						var rs = '<p>收藏夹中已经有该商品了。</p>';
					}
					message(mess, 'success', rs);
				}
			}
		});
	});
	/*商品留言*/
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
				gb_content: gb_content, gb_title: gb_title, gb_type: 1},
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