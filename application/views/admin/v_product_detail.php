<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>欢迎使用CCMS彩网后台内容管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include '_header.php'; ?>
    <link href="<?php echo VIEWPATH; ?>/admin/redactor/css/redactor.css" rel="stylesheet">
    <style type="text/css">
    .pdq_item { border-bottom: 1px dashed #ddd; margin-bottom: 10px; }
    </style>
  </head>

  <body>

    <?php include '_top.php'; ?>

    <div class="container-fluid">

      <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#home">商品信息</a></li>
        <li><a href="#profile">商品图片</a></li>
        <li><a href="#question">常见问答</a></li>
        <li><a href="#annex">附件资料</a></li>
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
        <div class="tab-pane" id="question">
          <div class="row-fluid">
            <div class="span6" id="pdq_list">
              <div class="pdq_item">
                <p><strong>常见问题的标题</strong>
                  <a href="javascript:;" class="btn btn-warning btn-mini">隐藏</a>
                  <a href="javascript:;" class="btn btn-danger btn-mini">删除</a>
                </p>
                <p><small>常见问题的答案</small></p>
              </div>
            </div>
            <div class="span6 well">
              <form>
                <legend>添加常见问题</legend>
                <p>
                  <label>问题：</label>
                  <input type="text" style="width:90%" id="pdq_question">
                </p>
                <p>
                  <label>回答：</label>
                  <textarea rows="8" style="width:90%" id="pdq_answer"></textarea>
                </p>
                <p>
                  <label>状态：</label>
                  <input type="radio" name="pdq_status" value="1" checked> 显示
                  <input type="radio" name="pdp_status" value="0"> 隐藏
                </p>
                <p>
                  <button id="add_pdq" type="button" class="btn btn-primary"><i class="icon-plus icon-white"></i>添加</button>
                </p>
              </form>
            </div>
        </div>
      </div>
      <div class="tab-pane" id="annex">
        <div class="row-fluid">
          <div class="span6">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>名称</th>
                  <th>类型</th>
                  <th>创建时间</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody id="pda_list">
                <tr>
                  <td>资料下载</td>
                  <td>pdf</td>
                  <td><small>2014-03-25</small></td>
                  <td>
                    <a class="btn btn-mini btn-warning pda_lock" data-val="0">隐藏</a> 
                    <a class="btn btn-mini btn-danger pda_remove">删除</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="span6 well">
            <form id="pda_form">
              <legend>添加附件资料</legend>
              <p>
                <label>名称：</label>
                <input type="text" style="width:90%" id="pda_name">
              </p>
              <p>
                <label>文件：</label>
              </p>
              <p id="annex_upload">
                <input id="annex_file" type="file" name="annex_file" style="position: absolute;filter: alpha(opacity=0);opacity:0;width: 100px">
                <a href="javascript:;" class="btn"><i class="icon-camera"></i> 上传文件</a>
              </p>
              <p>
                <label>类型：</label>
                <input type="text" id="pda_type">
              </p>
              <p>
                <label>状态：</label>
                <input type="radio" name="pda_status" value="1" checked> 开放
                <input type="radio" name="pda_status" value="0"> 隐藏
              </p>
              <p>
                <input type="hidden" id="pda_src" value="">
                <button id="pda_add" type="button" class="btn btn-primary">添加附件</button>
              </p>
            </form>
          </div>
        </div>
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
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/js/product_question.js"></script>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/js/product_annex.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });
  /*富文本*/
  $('.redactor').redactor({
      imageUpload: '/index.php/image/redactorUpload',
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
  /*常见问题*/
  var productQuestion = new ProductQuestion($('#pd_id').val(), $('#pdq_list'), function(d){
    var html = '<div class="pdq_item"><p><strong class="pdq_question">'+d.pdq_question+'</strong>'
      +' <span><a href="javascript:;" data-val="'+d.pdq_id+'" class="pdq_edit btn btn-mini">编辑</a></span>';
    if(d.pdq_status == '1'){
      html += ' <a href="javascript:;" data-val="'+d.pdq_id+'" data-lock="0" class="pdq_lock btn btn-warning btn-mini">隐藏</a>'
    }else{
      html += ' <a href="javascript:;" data-val="'+d.pdq_id+'" data-lock="1" class="pdq_lock btn btn-success btn-mini">显示</a>'
    }
    html += ' <a href="javascript:;" data-val="'+d.pdq_id+'" class="pdq_delete btn btn-danger btn-mini">删除</a>'
      +'</p><p><small class="pdq_answer">'+d.pdq_answer+'</small></p></div>';
    return html;
  });
  productQuestion.addItem($('#add_pdq'));
  productQuestion.bindEvent();
  /*商品附件*/
  var productAnnex = new ProductAnnex($('#pd_id').val(), $('#pda_list'), function(d){
    var html = '<tr><td><a href="/uploads/product/'+d.pda_src+'">'+d.pda_name+'</a></td><td>'+d.pda_type+'</td>'
      + '<td><small>'+d.pda_time+'</small></td><td>';
      if(d.pda_status == '1'){
        html += '<a class="btn btn-mini btn-warning pda_lock" data-val="'+d.pda_id+'" data-status="0">隐藏</a>';
      }else{
        html += '<a class="btn btn-mini btn-success pda_lock" data-val="'+d.pda_id+'" data-status="1">公开</a>'
      }
      html += ' <a class="btn btn-mini btn-danger pda_remove" data-val="'+d.pda_id+'">删除</a></td></tr>';
      return html;
  });
  productAnnex.addItem($('#pda_add'), $('#annex_upload'));
  productAnnex.bindEvent();
});
</script>
</html>