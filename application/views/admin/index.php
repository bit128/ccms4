<!DOCTYPE html>
<html lang="en">
  <?php include '_header.php'; ?>
<!-- NAVBAR
================================================== -->
  <body>
    <?php include '_top.php'; ?>


<div id="myCarousel" class="carousel slide" data-ride="carousel" style="position:relative;margin-bottom:0;margin-top:-20px;">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo base_url(),APPPATH; ?>views/img/bar-1.jpg" alt="First slide">
    </div>
    <div class="item">
      <img src="<?php echo base_url(),APPPATH; ?>views/img/bar-2.jpg" alt="Second slide">
    </div>
    <div class="item">
      <img src="<?php echo base_url(),APPPATH; ?>views/img/bar-3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
  <!-- 搜索框开始 -->
  <div style="position:absolute; top:160px; left:0px; width:95%;" class="text-center">
    <h1 style="color:#fff;"><strong>丸子地球：专业预定海外中文向导</strong></h1>
    <p style="color:#fff; font-size:21px;"><strong>在全球43个国家300多座城市提供中文向导服务</strong></p>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form class="input-group" id="search_form">
          <input type="text" class="form-control input-lg" placeholder="搜索目的地..." id="keyword">
          <span class="input-group-btn">
            <button class="btn btn-primary input-lg" type="submit">
              <span class="glyphicon glyphicon-search"></span> 搜索</button>
          </span>
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>

  </div>
  <!-- 搜索框结束 -->
</div>

<div style="background:#eee; margin-top:-20px; padding:30px;" class="text-center">
	<h2>欢迎来到丸子地球</h2>
	<p style="font-size:21px;">无论你身处世界上的任何角落，丸子地球都能为你提供当地的中文向导服务！</p>
	<p>
		<button type="button" class="btn btn-info btn-lg show_demand">点击这里提交您的需求</button>
	</p>
</div>

<div class="container marketing">
	<!-- 区域推荐开始 -->
	<div class="text-center">
		<h1>推荐热门区域</h1>
	</div>
	<p>&nbsp;</p>
	<div class="row">
		<div class="col-md-4" style="position:relative;">
			<a href="/site/home/0/3/0/52c6641f36ee2">
				<img src="<?php echo base_url(),APPPATH; ?>views/img/area-1.jpg" class="img-thumbnail" style="border:0;">
				<p style="position:absolute; top:30%; width:90%" class="text-center"><strong style="font-size:40px; color:#fff">巴黎</strong></p>
			</a>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-3" style="position:relative;">
					<a href="/site/home/0/3/0/52c66b044069d">
						<img src="<?php echo base_url(),APPPATH; ?>views/img/area-2.jpg" class="img-thumbnail" style="border:0;">
						<p style="position:absolute; top:35%; width:85%" class="text-center"><strong style="font-size:20px; color:#fff">米兰</strong></p>
					</a>
				</div>
				<div class="col-md-3" style="position:relative;">
					<a href="/site/home/0/3/0/52c66ab8d92ed">
						<img src="<?php echo base_url(),APPPATH; ?>views/img/area-3.jpg" class="img-thumbnail" style="border:0;">
						<p style="position:absolute; top:35%; width:85%" class="text-center"><strong style="font-size:20px; color:#fff">罗马</strong></p>
					</a>
				</div>
				<div class="col-md-3" style="position:relative;">
					<a href="/site/home/0/3/0/52c64fb874770">
						<img src="<?php echo base_url(),APPPATH; ?>views/img/area-4.jpg" class="img-thumbnail" style="border:0;">
						<p style="position:absolute; top:35%; width:85%" class="text-center"><strong style="font-size:20px; color:#fff">东京</strong></p>
					</a>
				</div>
				<div class="col-md-3" style="position:relative;">
					<a href="/site/home/0/3/0/52c663404d6a3">
						<img src="<?php echo base_url(),APPPATH; ?>views/img/area-5.jpg" class="img-thumbnail" style="border:0;">
						<p style="position:absolute; top:35%; width:85%" class="text-center"><strong style="font-size:20px; color:#fff">莫斯科</strong></p>
					</a>
				</div>
			</div>
			<div class="row" style="margin-top:5px;">
				<div class="col-md-3" style="position:relative;">
					<a href="/site/home/0/3/0/52c675e05bcab">
						<img src="<?php echo base_url(),APPPATH; ?>views/img/area-6.jpg" class="img-thumbnail" style="border:0;">
						<p style="position:absolute; top:35%; width:85%" class="text-center"><strong style="font-size:20px; color:#fff">纽约</strong></p>
					</a>
				</div>
				<div class="col-md-3" style="position:relative;">
					<a href="/site/home/0/3/0/52c674160d56a">
						<img src="<?php echo base_url(),APPPATH; ?>views/img/area-7.jpg" class="img-thumbnail" style="border:0;">
						<p style="position:absolute; top:35%; width:85%" class="text-center"><strong style="font-size:20px; color:#fff">悉尼</strong></p>
					</a>
				</div>
				<div class="col-md-3" style="position:relative;">
					<a href="/site/home/0/3/0/52c6890556016">
						<img src="<?php echo base_url(),APPPATH; ?>views/img/area-8.jpg" class="img-thumbnail" style="border:0;">
						<p style="position:absolute; top:35%; width:85%" class="text-center"><strong style="font-size:20px; color:#fff">多伦多</strong></p>
					</a>
				</div>
				<div class="col-md-3" style="position:relative;">
					<a href="/site/home/0/3/0/52c6752e37578">
						<img src="<?php echo base_url(),APPPATH; ?>views/img/area-9.jpg" class="img-thumbnail" style="border:0;">
						<p style="position:absolute; top:35%; width:85%" class="text-center"><strong style="font-size:20px; color:#fff">奥克兰</strong></p>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- 区域推荐结束 -->
	<hr class="featurette-divider">
	<div class="text-center">
		<h1>推荐人气导游</h1>
	</div>
	<p>&nbsp;</p>
	<div class="row">
		<div class="col-md-3">
				<p><a href="/site/detail/534f846d2cece"><img src="<?php echo base_url(),APPPATH; ?>views/img/service-1.jpg" class="img-thumbnail"></a></p>
				<p><strong style="font-size:16px;" class="text-info">玩转芝加哥 - Main</strong></p>
				<p>
					带你去吃美食是一定要的，必吃的深盘披萨；
至少尝一家米其林；唐人街的老字号餐厅。
				</p>
		</div>
		<div class="col-md-3">
				<p><a href="/site/detail/53672cc4d0bbb"><img src="<?php echo base_url(),APPPATH; ?>views/img/service-2.jpg" class="img-thumbnail"></a></p>
				<p><strong style="font-size:16px;" class="text-info">Patrick带你游温哥华</strong></p>
				<p>如果您有时间来温哥华或西雅图旅游，
我会把当地的风土人情，文化遗址，历史地理等等和您来一一分享。 
				</p>
		</div>
		<div class="col-md-3">
				<p><a href="/site/detail/1170"><img src="<?php echo base_url(),APPPATH; ?>views/img/service-3.jpg" class="img-thumbnail"></a></p>
				<p><strong style="font-size:16px;" class="text-info">全世界最漂亮的維多利亞港</strong></p>
				<p> 去過馬尼拉，海南，台北，大阪，四川，西藏，尼泊爾，
新彊，甘肅，青海，西安，東三省，江淅沪
熱愛背包旅遊尋找還沒有被旅遊書摧毀的地方（真心不容易） 
				</p>
		</div>
		<div class="col-md-3">
				<p><a href="/site/detail/53688e67ad4c6"><img src="<?php echo base_url(),APPPATH; ?>views/img/service-4.jpg" class="img-thumbnail"></a></p>
				<p><strong style="font-size:16px;" class="text-info">日本中文导游陈彦俊</strong></p>
				<p>
					 即使走同样的路，和不同的人，也能感受不同的风景。日本是个出其不意的地方，你不亲自驻足是看不到的。 
				</p>
		</div>
	</div>
      <!-- FOOTER -->

</div><!-- /.container -->


    <hr class="featurette-divider">

    <div class="container marketing">
      <div style="position:relative;"><?php include '_footer.php'; ?></div>
    </div>
  </body>
<script type="text/javascript">
$(document).ready(function(){
	/*搜索目的地*/
	$('#search_form').on('submit', function(){
		var keyword = $(this).find('input').val();
		if(keyword != ''){
			searchService(3, keyword);
		}else{
			location.href = '/site/home/0/3/0';
		}
		return false;
	});
	function searchService(ser_status, keyword){
		//查询区域id
		$.get('/area/search/' + encodeURI(encodeURI(keyword)), function(data){
			if(data.length != ''){
				location.href = '/site/home/0/'+ser_status+'/0/'+data;
			}
		});
	}
});
</script>
</html>