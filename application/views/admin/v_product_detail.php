<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>New Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include '_header.php'; ?>
    <link href="<?php echo VIEWPATH; ?>/admin/redactor/css/redactor.css" rel="stylesheet">
  </head>

  <body>

    <?php include '_top.php'; ?>

    <div class="container-fluid">

      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#home">商品信息</a></li>
        <li><a href="#profile">商品图片</a></li>
      </ul>
       
      <div class="tab-content">
        <div class="tab-pane active" id="home">
          <form class="well">
            <fieldset>
              <legend>基本信息</legend>
              <p>
                <label>名称：</label>
                <input type="text" class="input-xxlarge" id="pd_name" value="<?php echo $product['pd_name']; ?>">
              </p>
              <p>
                <label>货号：</label>
                <input type="text" id="pd_no" value="<?php echo $product['pd_no']; ?>">
              </p>
              <p>
                <label>类目：</label>
                <span id="category"></span>
              </p>
              <p>
                <label>标签：</label>
              </p>
              <div id="target"></div>
              <p>
                <label>状态：</label>
                <input type="radio" name="pd_status" value="1" <?php if($product['pd_status'] == '1') echo 'checked';?>> 上架
                <input type="radio" name="pd_status" value="0" <?php if($product['pd_status'] == '0') echo 'checked';?>> 下架
              </p>
            </fieldset>
            <fieldset>
              <legend>详细信息</legend>
              <textarea id="pd_detail" class="redactor" style="height:300px;"><?php echo $product['pd_detail']; ?></textarea>
            </fieldset>
            <p>&nbsp;</p>
            <p>
              <a class="btn btn-success" id="save_product"><i class="icon-inbox icon-white"></i> 保存商品信息</a>
            </p>
          </form>
        </div>
        <div class="tab-pane" id="profile">
          <form class="well">
            <label>添加商品图片</label>
            <div class="alert">一个商品可以上传8张图片，每张图片大小不能超过2MB字节大小。</div>
            <p id="ajaxUpload">
              <input id="fileToUpload" type="file" name="fileToUpload" style="position: absolute;filter: alpha(opacity=0);opacity:0;width: 100px">
              <a href="javascript:;" class="btn"><i class="icon-camera"></i> 上传图片</a>
            </p>
          </form>
          <div id="pd_images"></div>
        </div>
      </div>

      <?php include '_footer.php'; ?>

    </div>

  </body>
<input type="hidden" id="pd_category" value="<?php echo $product['pd_category']; ?>">
<input type="hidden" id="pd_id" value="<?php echo $product['pd_id']; ?>">
<input type="hidden" id="targets" value='<?php echo $target; ?>'>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/js/ajaxfileupload.js"></script>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/redactor/redactor.min.js"></script>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/js/product_category.js"></script>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/js/product_target.js"></script>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/js/product_image.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });
  /*富文本*/
  $('.redactor').redactor({
      //imageUpload: '/service/uploadImages',
      lang: 'zh_cn'
  });
  /*绑定商品分类菜单*/
  var productCategory = new ProductCategory($('#category'));
  productCategory.renderSelect($('#pd_category').val());
  /*绑定商品标签菜单*/
  var productTarget = new ProductTarget($('#target'));
  productTarget.render($('#targets').val());
  /*保存商品信息*/
  $('#save_product').on('click', function(){
    var pd_id = $('#pd_id').val();
    if(pd_id == ''){
      var url = '/index.php/product/addProduct';
    }else{
      var url = '/index.php/product/updateProduct';
    }
    var pd_name = $('#pd_name').val();
    if(pd_name == ''){alert('请填写商品名称');$('#pd_name').focus();return;}
    var pd_no = $('#pd_no').val();
    var pd_category = $('#category select:last').val();
    if(pd_category == ''){alert('请选择商品分类');$('#category select:last').focus();return;}
    var target = productTarget.getValue();
    var pd_status = $('input[name="pd_status"]:checked').val();
    var pd_detail = $('#pd_detail').val();
    /*保存到数据库*/
    $.ajax({
      type: 'POST',
      url: url,
      data: {pd_id: pd_id, pd_name: pd_name, pd_no: pd_no, pd_category: pd_category, target: target, pd_status: pd_status, pd_detail: pd_detail},
      success: function(data){
        if(data.length == 13){
          $('#pd_id').val(data);
          alert('添加商品数据成功')
        }else if(data == '1'){
          alert('保存商品数据成功');
        }
      }
    });
  });
  /*商品图片*/
  var productImage = new ProductImage($('#pd_id').val(), $('#pd_images'));
  productImage.getList(productImage.renderTable).uploader($('#ajaxUpload'));
});
</script>
</html>