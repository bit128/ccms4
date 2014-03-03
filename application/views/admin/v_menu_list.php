<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>New Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include '_header.php'; ?>
    <style type="text/css">
    .alert-info {margin-bottom: 5px; padding: 10px;}
    .alert-info a {color: white; font-size: 12px;}
    </style>
  </head>

  <body>

    <?php include '_top.php'; ?>

    <div class="container-fluid">

      <div class="row-fluid">

        <div class="span3 menu_items" data-val="0">
          <div class="menu_item"></div>
          <div class="well">
            <span class="input-append">
              <input type="text" class="input-small">
              <a class="btn item_add">添加</a>
              <input type="hidden" class="mu_fid" value="0">
            </span>
          </div>
        </div>

        <div class="span3 menu_items hide" data-val="1">
          <div class="menu_item"></div>
          <div class="well">
            <span class="input-append">
              <input type="text" class="input-small">
              <a class="btn item_add">添加</a>
              <input type="hidden" class="mu_fid" value="0">
            </span>
          </div>
        </div>

        <div class="span3 menu_items hide" data-val="2">
          <div class="menu_item"></div>
          <div class="well">
            <span class="input-append">
              <input type="text" class="input-small">
              <a class="btn item_add">添加</a>
              <input type="hidden" class="mu_fid" value="0">
            </span>
          </div>
        </div>

        <div class="span3 menu_items hide" data-val="3">
          <div class="menu_item"></div>
          <div class="well">
            <span class="input-append">
              <input type="text" class="input-small">
              <a class="btn item_add">添加</a>
              <input type="hidden" class="mu_fid" value="0">
            </span>
          </div>
        </div>

      </div>

      <?php include '_footer.php'; ?>

    </div>

  </body>
<script type="text/javascript">
$(document).ready(function(){
  //绑定页面事件
  MenuOpt.bindEvent();
  //获取一级菜单列表
  MenuOpt.getChildList(0, $('.menu_item:eq(0)'));
});
/*------ 目录操作类 开始 ------*/
var MenuOpt = {};
//绑定事件
MenuOpt.bindEvent = function(){
  var cacheText = '';
  //编辑成员
  $('.menu_items').on('click', '.item_edit', function(){
    var alt = $(this).parents('.alert');
    cacheText = alt.find('.item_show').text();
    alt.find('span:eq(0)')
      .html('<input type="text" class="input-small item_save" style="margin:0" value="'+cacheText+'">')
      .find('input').focus();
  });
  //保存编辑内容
  $('.menu_items').on('blur', '.item_save', function(){
    var text = $(this).val();
    var alt = $(this).parents('.alert')
    if(text == '' || text == cacheText){
      text = cacheText;
    }else{
      var mu_id = alt.find('.mu_id').val();
      //更新数据
      $.ajax({
        type: 'POST',
        url: '/index.php/menu/updateName',
        data: {mu_id: mu_id, mu_name: text}
      });
    }
    alt.find('span:eq(0)').html('<a href="javascript:;" class="item_show">'+text+'</a>');
  });
  //删除成员
  $('.menu_items').on('click', '.item_remove', function(){
    if(confirm('您确定要删除吗？包括子目录.')){
      var alt = $(this).parents('.alert');
      var mu_id = alt.find('.mu_id').val();
      var level = $(this).parents('.menu_items').attr('data-val');
      $.ajax({
        type: 'POST',
        url: '/index.php/menu/deleteMenu',
        data: {mu_id: mu_id}
      });
      alt.remove();
      $('.menu_items:gt('+level+')').hide();
    }
  });
  //添加成员
  $('.menu_items').on('click', '.item_add', function(){
    var well = $(this).parents('.well');
    var mu_name = well.find('input:eq(0)');
    var name = mu_name.val();
    if(name == ''){alert('请填写菜单名称');mu_name.focus();return;}
    var mu_fid = well.find('input:eq(1)').val();
    var items = $(this).parents('.menu_items');
    //添加成员
    $.ajax({
      type: 'POST',
      url: '/index.php/menu/addMenu',
      data: {mu_fid: mu_fid, mu_name: name},
      success: function(data){
        if(data.length == 13){
          var html = '<div class="alert alert-info"><span><a href="javascript:;" class="item_show">'
            +name+'</a></span><span class="pull-right"><input type="hidden" class="mu_id" value="'
            +data+'"><a href="javascript:;" class="item_edit"><i class="icon-edit icon-white"></i></a>'
            +'<a href="javascript:;" class="item_sort" data-val="0"><i class="icon-arrow-up icon-white"></i></a>'
            +'<a href="javascript:;" class="item_sort" data-val="1"><i class="icon-arrow-down icon-white"></i></a>'
            +'<a href="javascript:;" class="item_remove"><i class="icon-trash icon-white"></i></a></span></div>';
          items.find('.menu_item').append(html);
        }
      }
    });
    mu_name.val('');
  });
  //菜单成员排序
  $('.menu_items').on('click', '.item_sort', function(){
    var op = $(this).attr('data-val');
    var mu_id = $(this).parent().find('input').val();
    var mu_fid = $(this).parents('.menu_items').find('.mu_fid').val();
    var item = $(this).parents('.menu_item');
    $.ajax({
      type: 'POST',
      url: '/index.php/menu/sortMenu',
      data: {mu_fid: mu_fid, mu_id: mu_id, op: op},
      success: function(data){
        if(data == '1'){
          MenuOpt.getChildList(mu_fid, item);
        }
      }
    });
  });
  //显示子菜单
  $('.menu_item').on('click', '.item_show', function(){
    var level = $(this).parents('.menu_items').attr('data-val');
    if(level < '3'){
      var mu_id = $(this).parents('.alert').find('input').val();
      var indexNum = parseInt(level) + 1;
      //先隐藏全部子级
      $('.menu_items:gt('+level+')').hide();
      //显示直属子级
      var child = $('.menu_items:eq('+indexNum+')');
      child.find('.mu_fid').val(mu_id);
      child.show();
      //读取子级菜单
      MenuOpt.getChildList(mu_id, child.find('.menu_item'));
    }else{
      alert('目前菜单仅允许4层');
    }
  });
};
//获取子菜单
MenuOpt.getChildList = function(mu_fid, handle){
  $.get('/index.php/menu/getChildList/'+mu_fid, function(data){
    var datas = $.parseJSON(data);
    var html = '';
    $.each(datas, function(i, d){
      html += '<div class="alert alert-info"><span><a href="javascript:;" class="item_show">'
        +d.mu_name+'</a></span><span class="pull-right"><input type="hidden" class="mu_id" value="'
        +d.mu_id+'"><a href="javascript:;" class="item_edit"><i class="icon-edit icon-white"></i></a>'
        +'<a href="javascript:;" class="item_sort" data-val="0"><i class="icon-arrow-up icon-white"></i></a>'
        +'<a href="javascript:;" class="item_sort" data-val="1"><i class="icon-arrow-down icon-white"></i></a>'
        +'<a href="javascript:;" class="item_remove"><i class="icon-trash icon-white"></i></a></span></div>';
    });
    handle.html(html);
  });
};
/*------ 目录操作类 结束 ------*/
</script>
</html>