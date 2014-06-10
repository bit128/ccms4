<div id="footer">
	<!-- 960 Container -->
	<div class="container">
	
		<!-- About -->
		<div class="one-third column">
			<div class="footer-headline"><h4>主产品线目录</h4></div>
			<ul class="links-list" id="pro_category"></ul>
		</div>
		
		<!-- Useful Links -->
		<div class="one-third column">
			<div class="footer-headline"><h4>便捷链接</h4></div>
			<ul class="links-list" id="hot_link"></ul>
		</div>
		
		<!-- Photo Stream -->
		<div class="one-third column">
			<div class="footer-headline"><h4>联系信息</h4></div>
            <div class="tooltips" id="contact_mess"></div>
           
        </div>

		<!-- Footer / Bottom -->
		<div class="sixteen columns">
			<div id="footer-bottom">
				<div id="footer_content"> Powered by  <a href="http://www.ct880.com/" target="_blank">Color Web Studio</a></div>
				<div id="scroll-top-top"><a href="#"></a></div>
			</div>
		</div>

	</div>
	<!-- 960 Container / End -->

</div>
<script type="text/javascript">
$(document).ready(function(){
	/*页面搜索*/
	$('#search').on('submit', function(){
		var keyword = $(this).find('input').val();
		if(keyword != ''){
			location.href = '/index.php/home/product/0/0/0/'+encodeURI(encodeURI(keyword));
		}
		return false;
	});
	/*首页logo*/
	$.get('/index.php/home/showContent/536d93a25c2d1', function(data){
		var datas = $.parseJSON(data);
		$('#logo').html('<a href="/"><img src="/uploads/content/'+datas.ct_image+'" alt="logo" /></a>');
	});
	/*主导航*/
	$.get('/index.php/home/channelList/0/10/536d95c6cf841', function(data){
		var datas = $.parseJSON(data);
		var html = '';
		$.each(datas.result, function(i, d){
			html += '<li><a href="'+d.cn_url+'">'+d.cn_name+'</a></li>';
		});
		$('#nav').html(html);
		//设置导航的自适应性
		(function() {
			selectnav('nav', {
				label: 'Menu',
				nested: true,
				indent: '-'
			});
					
		})();
	});
	/*主线产品目录*/
	$.get('/index.php/home/channelList/0/16/533a6bf49ed03', function(data){
		var html = '';
		if(data != ''){
			var datas = $.parseJSON(data);
			$.each(datas.result, function(i, d){
				html += '<li><a href="'+d.cn_url+'">'+d.cn_name+'</a></li>';
			});
		}
		$('#pro_category').html(html);
	});
	/*便捷链接*/
	$.get('/index.php/home/channelList/0/16/534a657df2a0e', function(data){
		var html = '';
		if(data != ''){
			var datas = $.parseJSON(data);
			$.each(datas.result, function(i, d){
				html += '<li><a href="'+d.cn_url+'">'+d.cn_name+'</a></li>';
			});
		}
		$('#hot_link').html(html);
	});
	/*联系信息*/
	$.get('/index.php/home/showContent/534a66e2cedd4', function(data){
		var html = '';
		if(data != ''){
			var d = $.parseJSON(data);
			html = d.ct_detail;
		}
		$('#contact_mess').html(html);
	});
	/*页脚信息*/
	$.get('/index.php/home/showContent/537dad7fac67f', function(data){
		var d = $.parseJSON(data);
		$('#footer_content').prepend(d.ct_detail);
	});
})
</script>