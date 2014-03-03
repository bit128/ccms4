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
			<h2><a href="/">首页</a> <span>/ 我的账户</span> <span>/ 我的询价单</span></h2>
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
		<div class="headline no-margin">
		  <h4>彩网科技欢迎您</h4></div>
		 
         <!--普通用户状态--><p><i class="mini-ico-user"></i> jiangjiefei@hotmail.com</p>
         <!--VIP用户状态--><ul class="star_list"><li>VIP - jiangjiefei@hotmail.com </li></ul>
         
	</div>


	
	<!-- Categories -->
	<?php include '_my.php'; ?>
    

	
</div>


<!-- Page Content
================================================== -->
<div class="twelve columns">

<div class="headline no-margin"><h4>我的询价单 </h4></div>


<!-- Tabs Navigation -->
	<ul class="tabs-nav">
		<li <?php if($od_status == '0') echo 'class="active"'; ?>>
			<a href="<?php echo site_url('home/my_order'); ?>/0/0"><i class="mini-ico-folder-close"></i> 处理中</a>
		</li>
		<li <?php if($od_status == '1') echo 'class="active"'; ?>>
			<a href="<?php echo site_url('home/my_order'); ?>/0/1"><i class="mini-ico-folder-open"></i> 已报价</a>
		</li>
	</ul>
		<!-- Tabs Content -->
    <div class="tabs-container">
		<div class="tab-content">
            <?php if($od_status == '0') { ?>
        	<div class="notification notice closeable">
				<p><span>您好 !</span>  我们将会在两个工作日内就您的询价给予回复，感谢您的支持！ </p>
			</div>
			<?php } else { ?>
			<div class="notification success closeable">
				<p><span>您好 !</span>  询价已发送至您的登陆邮箱，请查收并感谢您的支持。同时衷心期待您的回复！</p>
			</div>
			<?php } ?>
			<!-- 订单列表开始 -->
			<?php $send_type=array('','快递','物流','平邮'); foreach ($order_list as $v) { ?>
			<table class="standard-table">
				<thead>
					<tr>
						<th width="50%">产品名称</th>
						<th width="35%">型号</th>
						<th width="15%">数量</th>
					</tr>
				</thead>
				<tbody class="cart_list" data-val="<?php echo $v['od_id']?>"></tbody>
			</table>
			<p>
				<i class="mini-ico-list-alt"></i> 单号: <?php echo $v['od_id']; ?> (由系统-年+月+日+时+分+秒-生成)<br/>
				<i class="mini-ico-calendar"></i> 日期: <?php echo date('Y-m-d', $v['od_ctime']); ?><br/>
				<i class="mini-ico-th-list"></i> 运输: <?php echo $send_type[$v['od_send']]; ?><br/>
				<i class="mini-ico-comment"></i> 留言: <?php echo $v['od_remark']; ?>
            </p>
			<?php } ?>
			<!-- 订单列表结束 -->
            <!--
             <table class="standard-table">

                <tr>
					<th width="50%">产品名称 </th>
					<th  width="35%">型号</th>
					<th  width="15%">数量</th>
				</tr>

				<tr>
					<td><a href="item.html"><img src="<?php echo VIEWPATH; ?>/home/images/portfolio/portoflio-01.jpg" alt="" class="image-left w55"/></a>
                  <a href="item.html">Jack Flannel Plaid Long Sleeve Shirt (Men) Check C</a></td>
					<td>BF-220A+ with black and gray</td>
					<td>20</td>
		        </tr>
				
				<tr>
					<td><a href="item.html"><img src="<?php echo VIEWPATH; ?>/home/images/portfolio/portoflio-01.jpg" alt="" class="image-left w55"/></a>
                  <a href="item.html">Jack Flannel Plaid Long Sleeve Shirt (Men) Check C</a></td>
					<td>BF-220A+ with black and gray</td>
					<td>70</td>
		        </tr>
             </table>
             
             <blockquote>
             <p>
             <i class="mini-ico-list-alt"></i> 单号: 20130912143409 (由系统-年+月+日+时+分+秒-生成)<br/>
             <i class="mini-ico-calendar"></i> 日期: 2013-06-25<br/>
             <i class="mini-ico-th-list"></i> 运输: 快递<br/>
             <i class="mini-ico-comment"></i> 留言: 无需彩盒包装
             </p>
             </blockquote>-->
		
		        <div class="pagination"><?php echo $pages; ?></div>
            </div>
            
		</div>


	<!--<p  class="alert-red">
    Notice: The quotations above are serves as a guide line only, all of those are subject to our final confirmation and the fluctuations of the market.
    </p>-->

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
	var pd_path = "<?php echo site_url('home/item'); ?>";
	$('.cart_list').each(function(){
		var table = $(this);
		var od_id = table.attr('data-val');
		$.get('/index.php/order/getOrderItem/'+od_id, function(data){
			if(data != '[]'){
				var datas = $.parseJSON(data);
				var html = '';
				$.each(datas, function(i, d){
					html += '<tr><td><a class="pd_image" href="'+pd_path+'/'+d.pd_id+'" data-val="'+d.pd_id+'"></a><a href="'+pd_path+'/'+d.pd_id+'">'
						+d.pd_name+'</a></td><td>颜色：'+d.st_colour+' 尺寸：'+d.st_size+' 规格：'+d.st_unit
						+'</td><td>'+d.sp_quantity+'</td></tr>';
				});
				table.html(html).find('.pd_image').each(function(){
					var f = $(this);
					var pd_id = f.attr('data-val');
					$.get('/index.php/product/getImageList/'+pd_id, function(data){
						if(data != '[]'){
							var imgs = $.parseJSON(data);
							f.html('<img src="/uploads/product/tb_'+imgs.result[0].pdi_name+'" alt="" class="image-left w55"/>');
						}
					});
				});
			}
		});
	});
});
</script>
</body>
</html>