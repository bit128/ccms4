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
			<h2><a href="/">首页</a> <span>/ 询价单</span></h2>
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
    	<p> 您好！ 我们将会在第一时间就您的询价给予回复，感谢您的支持！</p>
	<div class="headline margin"><h3>询价单</h3></div>
      
        <table class="standard-table">
			<tr>
				<th>产品名称 </th>
				<th>库存名称</th>
				<th>数量</th>
				<th>操作</th>
			</tr>
			<?php foreach ($shoppingcart['result'] as $v) { ?>
			<tr>
				<td><a href="<?php echo site_url('home/item'), '/' , $v['pd_id'];?>" target="_blank" class="pd_image" data-val="<?php echo $v['pd_id']; ?>"></a>
            		<a href="<?php echo site_url('home/item'), '/' , $v['pd_id'];?>" target="_blank"><?php echo $v['pd_name']; ?></a></td>
				<td><?php echo $v['st_name']; ?></td>
				<td><input type="text" class="text sp_quantity" data-val="<?php echo $v['sp_id']; ?>" value="<?php echo $v['sp_quantity']; ?>"/></td>
				<td><a href="javascript:;" class="cart_remove" data-val="<?php echo $v['sp_id']; ?>">删除</a></td>
	        </tr>
	        <?php } ?>
		</table>
      
	</div>

	<!-- Tooltips 
================================================== -->

	<div class="eight columns">
	
		<!-- Headline -->
		<div class="headline no-margin"><h3>询价单选项</h3></div>

		 <div class="tooltips">
			<p>如果您在包装、运输上有特别要求或其他问题，请给我们留言： </p>
            <p>
            	<select id="od_send">
                    <option value="0">选择运输方式-</option>
		            <option value="1">快递</option>
                    <option value="2">物流</option>
		            <option value="3">平邮</option>
                </select>
            </p>
            <p><textarea id="od_remark" class="text textarea" style="width:75%;">留言: </textarea></p>
		</div>

	</div>
	
	
<!-- Blockquote
================================================== -->

	<div class="eight columns">
	
		<!-- Headline -->
		<div class="headline no-margin"><h3>询价单摘要</h3></div>
		
		<h4 class="row"><i class="mini-ico-tags"></i>  询价产品总数量: <span class="alert-orange" id="sp_count"> 25 件</span> </h4>
        
        <a href="<?php echo site_url('home/product'); ?>/0/0/0" class="button medium light">继续添加</a>
        <a href="javascript:;" class="button medium color" id="create_order">发送询价单</a>
	</div>

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
	//获取商品图片
	$('.pd_image').each(function(){
		var f = $(this);
		var pd_id = f.attr('data-val');
		$.get('/index.php/product/getImageList/'+pd_id, function(data){
			if(data != '[]'){
				var imgs = $.parseJSON(data);
				f.html('<img src="/uploads/product/tb_'+imgs.result[0].pdi_name+'" alt="" class="image-left w55"/>');
			}
		});
	});
	/*移除购物车条目*/
	$('.cart_remove').on('click', function(){
		if(confirm('确定要移除该商品吗？')){
			var tr = $(this).parents('tr');
			var sp_id = $(this).attr('data-val');
			$.ajax({
				type: 'POST',
				url: '/index.php/order/removeCartItem',
				data: {sp_id: sp_id},
				success: function(data){
					sp_count();
				}
			});
			tr.remove();
		}
	});
	/*设置商品数量*/
	$('.sp_quantity').on('focus', function(){
		var sp_id = $(this).attr('data-val');
		var cache_quantity = $(this).val();
		$(this).on('blur', function(){
			var sp_quantity = $(this).val();
			if(/[0-9]+/.exec(sp_quantity) && parseInt(sp_quantity) >= 10)
			{
				$.ajax({
					type: 'POST',
					url: '/index.php/order/setCartQuantity',
					data: {sp_id: sp_id, sp_quantity: sp_quantity}
				});
				cache_quantity = sp_quantity;
				sp_count();
			}
			$(this).off('blur').val(cache_quantity);
		});
	});
	/*统计购物车商品数量*/
	sp_count();
	function sp_count(){
		var count = 0;
		$('.sp_quantity').each(function(){
			count += parseInt($(this).val());
		});
		$('#sp_count').text(count);
	}
	/*生成订单*/
	$('#create_order').on('click', function(){
		var od_send = $('#od_send').val();
		if(od_send == '0'){alert('请选择运输方式,');$('#od_send').focus();return;}
		var od_remark = $('#od_remark').val();
		$.ajax({
			type: 'POST',
			url: '/index.php/order/createOrder',
			data: {od_send: od_send, od_remark: od_remark},
			success: function(data){
				if(data == '1'){
					location.href = '/index.php/home/my_order';
				}
			}
		});
	});
});
</script>
</body>
</html>