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
			<h2><a href="/">首页</a> <span>/ 我的账户</span> <span>/ 我的收藏夹</span></h2>
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

	<?php include '_my.php'; ?>
	
</div>


<!-- Page Content
================================================== -->
<div class="twelve columns">

<div class="headline no-margin"><h4>我的收藏夹</h4></div>

		<table class="standard-table">
            <tr>
				<th width="40%">产品名称</th>
				<th  width="35%">型号</th>
				<th  width="25%">操作</th>
			</tr>
			<?php foreach($collection as $v) { ?>
			<tr>
				<td>
					<a href="<?php echo site_url('home/item'), '/' , $v['pd_id'];?>" target="_blank" class="pd_image" data-val="<?php echo $v['pd_id']; ?>"></a>
            		<a href="<?php echo site_url('home/item'), '/' , $v['pd_id'];?>" target="_blank"><?php echo $v['pd_name']; ?></a>
            	</td>
				<td><?php echo $v['st_name']; ?></td>
				<td>
					<a href="javascript:;" class="add_cart button color" data-val="<?php echo $v['sp_id']; ?>">添加到询价单</a>
					<a href="javascript:;" class="cl_remove button" data-val="<?php echo $v['sp_id']; ?>">删除</a>
                </td>
	        </tr>
	        <?php } ?>
		</table>
      <div class="pagination"><?php echo $pages; ?></div>

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
	$('.cl_remove').on('click', function(){
		if(confirm('确定要移除该商品吗？')){
			var tr = $(this).parents('tr');
			var sp_id = $(this).attr('data-val');
			$.ajax({
				type: 'POST',
				url: '/index.php/order/removeCartItem',
				data: {sp_id: sp_id}
			});
			tr.remove();
		}
	});
	/*添加到购物车*/
	$('.add_cart').on('click', function(){
		var tr = $(this).parents('tr');
		var sp_id = $(this).attr('data-val');
		$.ajax({
			type: 'POST',
			url: '/index.php/order/changeCollectionStatus',
			data: {sp_id: sp_id},
			success: function(data){
				if(data == '1'){alert('收藏品成功添加到询价单中.');tr.remove();}
				else if(data == '-1'){alert('询价单中已经存在相同的商品库存了.');}
			}
		});
	});
});
</script>

</body>
</html>