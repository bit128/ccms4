<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>New Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="<?php echo VIEWPATH; ?>/admin/css/zTreeStyle/zTreeStyle.css" type="text/css" />
    <?php include '_header.php'; ?>
    <style type="text/css">
    .alert-info {margin-bottom: 5px;}
    .alert-info a {color: white; font-size: 12px;}
    </style>
  </head>

  <body>

    <?php include '_top.php'; ?>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div id="sc_list"></div>
        </div>
        <div class="span9">
          <p class="text-success"><small><strong>小提示：</strong>右键单击栏目可查看和修改，双击栏目可管理其下内容</small></p>
          <div class="well">
            <ul id="tree" class="ztree"></ul>
          </div>
        </div>
      </div>

      <?php include '_footer.php'; ?>

    </div>
    <!-- 栏目详情 -->
    <div id="channelDetail" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">栏目详情</h3>
      </div>
      <div class="modal-body">
        <form class="well form-horizontal" style="margin:0">
          <div class="control-group">
            <label class="control-label">编号：</label>
            <div class="controls"><input type="text" id="cn_id"></div>
          </div>
          <div class="control-group">
            <label class="control-label">名称：</label>
            <div class="controls"><input type="text" id="cn_name" disabled></div>
          </div>
          <div class="control-group">
            <label class="control-label">别名：</label>
            <div class="controls"><input type="text" id="cn_nick"></div>
          </div>
          <div class="control-group">
            <label class="control-label">超链接：</label>
            <div class="controls"><input type="text" id="cn_url"></div>
          </div>
          <div class="control-group">
            <label class="control-label">状态：</label>
            <div class="controls" id="cn_status" style="padding-top:4px;"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
        <button class="btn btn-success" id="createSortCut">创建快捷方式</button>
        <button class="btn btn-primary" id="updateChannel">更新栏目</button>
      </div>
    </div>
    <!-- 栏目详情 -->
  </body>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/js/jquery.ztree.core-3.5.min.js"></script>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/js/jquery.ztree.excheck-3.5.min.js"></script>
<script type="text/javascript" src="<?php echo VIEWPATH; ?>/admin/js/jquery.ztree.exedit-3.5.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  //栏目树设置
  var setting = {
      async: {
        enable: true,
        url: '/index.php/channel/getChannelTree',
        autoParam:["id"],
        dataFilter: filter
      },
      view: {
        addHoverDom: addHoverDom,
        removeHoverDom: removeHoverDom,
        selectedMulti: false,
        dblClickExpand: false
      },
      edit: {
        enable: true
      },
      data: {
        simpleData: {
          enable: true
        }
      },
      callback: {
        beforeRemove: beforeRemove,
        beforeRename: beforeRename,
        onRightClick: onRightClick,
        onDblClick: onDblClick,
        onDrop: onDrop
      }
    };

  function filter(treeId, parentNode, childNodes) {
    if (!childNodes) return null;
    /*
    for (var i=0, l=childNodes.length; i<l; i++) {
      //childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
    }*/
    return childNodes;
  }
  /*内容详情*/
  function onDblClick(event, treeId, treeNode){
    //检测查看内容权限
    location.href = '/index.php/content/contentList/0/'+treeNode.id;
  }
  /*栏目详情*/
  function onRightClick(event, treeId, treeNode){
    $('#channelDetail').modal('show');
    $.ajax({
      type: 'POST',
      url: '/index.php/channel/getChannel',
      data: {'cn_id': treeNode.id},
      success: function(data){
        var cn = $.parseJSON(data);
        $('#cn_id').val(cn.cn_id);
        $('#cn_name').val(cn.cn_name);
        $('#cn_nick').val(cn.cn_nick);
        $('#cn_url').val(cn.cn_url);
        //权限
        if(cn.cn_status == '1'){
          $('#cn_status').html('<input type="radio" name="cn_status" value="1" checked> 公开 <input type="radio" name="cn_status" value="0"> 保护');
          $('#role_setting').hide();
        }else{
          $('#cn_status').html('<input type="radio" name="cn_status" value="1"> 公开 <input type="radio" name="cn_status" value="0" checked> 保护');
          $('#role_setting').show();
        }
      }
    });
  }
  /*删除栏目*/
  function beforeRemove(treeId, treeNode) {
    var zTree = $.fn.zTree.getZTreeObj("tree");
    zTree.selectNode(treeNode);
    if(treeNode.id == '1'){
      alert('删除了站点根目录就没得玩了，还是不要干傻事！');
      return false;
    }
    if(treeNode.isParent){
      alert('您需要先删除子栏目！')
      return false;
    }
    if(confirm("确认删除 " + treeNode.name + " 栏目及内容吗？")){
      $.ajax({
        type:'POST',
        url: '/index.php/channel/deleteChannel',
        data:{cn_id:treeNode.id},
        success: function(data){
          if(data == '0')
            alert('您没有权限删除该栏目！');
          else
            loadShortCut();
        }
      });
      return true;
    }
    return false;
  }
  /*重命名栏目*/ 
  function beforeRename(treeId, treeNode, newName) {
    if (newName.length == 0) {
      alert("节点名称不能为空.");
      return false;
    }else{
      $.ajax({
        type:'POST',
        url: '/index.php/channel/renameChannel',
        data:{cn_id:treeNode.id, cn_name:newName},
        success: function(data){
          if(data == '0')
            alert('您没有权限重命名该栏目！');
        }
      });
    }
    return true;
  }
  /*新建栏目*/
  function addHoverDom(treeId, treeNode) {
    var sObj = $("#" + treeNode.tId + "_span");
    if (treeNode.editNameFlag || $("#addBtn_"+treeNode.id).length>0) return;
    var addStr = "<span class='button add' id='addBtn_" + treeNode.id
      + "' title='添加' onfocus='this.blur();'></span>";
    sObj.after(addStr);
    var btn = $("#addBtn_"+treeNode.id);
    if (btn) btn.bind("click", function(){
      //判断是否有创建子栏目权限
      $.ajax({
        type:'POST',
        url: '/index.php/channel/addChannel',
        data:{cn_name:'新建栏目',cn_fid:treeNode.id},
        success:function(data){
          var zTree = $.fn.zTree.getZTreeObj("tree");
          if(treeNode.isParent){
            zTree.reAsyncChildNodes(treeNode,'refresh');
          }else{
            zTree.addNodes(treeNode, {id:data, pId:treeNode.id, name:"新建栏目"});
          }
        }
      });
    });
  };
  function removeHoverDom(treeId, treeNode) {
    $("#addBtn_"+treeNode.id).unbind().remove();
  };
  /*栏目排序重组*/
  function onDrop(event, treeId, treeNodes, targetNode, moveType, isCopy){
    var data = treeNodes[0];
    if(moveType){
      $.ajax({
        type: 'POST',
        url: '/index.php/channel/changeOrder',
        data: {cn_id: data.id, cn_fid: data.pId, by_id: targetNode.id, type: moveType}
      });
    }
  }
  
  /*初始化栏目树*/
  $.fn.zTree.init($("#tree"), setting);
  
  /*更新栏目*/
  $('#updateChannel').on('click', function(){
    $.ajax({
      type: 'POST',
      url: '/index.php/channel/updateChannel',
      data: {cn_id: $('#cn_id').val(), cn_nick: $('#cn_nick').val(), cn_url: $('#cn_url').val(), cn_status: $('input[name="cn_status"]:checked').val()},
      success: function(data){
        if(data == '1'){alert('栏目更新成功.');$('#channelDetail').modal('hide')}
      }
    });
  });
  /*创建快捷方式*/
  $('#createSortCut').on('click', function(){
    if(confirm('确定要创建快捷方式？')){
      $.ajax({
        type: 'POST',
        url: '/index.php/channel/createShortCut',
        data: {cn_id: $('#cn_id').val(), cn_name: $('#cn_name').val()},
        success: function(data){
          if(data == '-1'){
            alert('已经存在快捷方式了！');
          }
          loadShortCut();
        }
      });
    }
  });
  //删除快捷方式
  $('.sc_delete').live('click', function(){
    if(confirm('您确定删除该快捷方式吗？')){
      var handel = $(this).parent();
      $.ajax({
        type: 'GET',
        url: '/index.php/channel/deleteShortCut/'+handel.find('input:eq(0)').val(),
        success: function(data){
          if(data == '1')
            loadShortCut();
        }
      });
    }
  });
  //载入快捷方式
  loadShortCut();
  function loadShortCut(){
    $.ajax({
      type: 'GET',
      url: '/index.php/channel/getShortCut',
      success: function(data){
        var sc = $.parseJSON(data);
        var ct = '';
        $.each(sc, function(i, d){
          ct += '<div class="alert alert-info"><input type="hidden" value="'+d.cn_id+'" /><a title="删除" class="close sc_delete"><i class="icon-trash"></i></a>'
          +' <a title="下移" class="close sc_down"><i class="icon-download"></i></a> <a title="上移" class="close sc_up"><i class="icon-upload"></i></a>'
          +' <a title="编辑" class="close sc_rename"><i class="icon-pencil"></i></a> <span><a href="/index.php/content/contentList/0/'+d.cn_id
          +'">'+d.cns_name+'</a></span></div>';
        });
        $('#sc_list').html(ct);
      }
    });
  }
  //快捷方式排序
  $('.sc_up').live('click', function(){
    orderShortCut($(this).parent().find('input').val(), '1');
  });
  $('.sc_down').live('click', function(){
    orderShortCut($(this).parent().find('input').val(), '0');
  });
  function orderShortCut(cn_id, order){
    $.ajax({
      type: 'GET',
      url: '/index.php/channel/orderShortCut/'+cn_id+'/'+order,
      success: function(data){
        if(data == '1'){
          loadShortCut();
        }
      }
    });
  }
  //重命名快捷方式-输入框
  $('.sc_rename').live('click', function(){
    var span = $(this).parent().find('span');
    var ct = span.find('a').text();
    span.html('<input type="text" class="span8 rename_box" value="'+ct+'"><input type="hidden" value="'+ct+'">');
    span.find('input:eq(0)').focus();
  });
  //重命名快捷方式-提交
  $('.rename_box').live('blur', function(){
    var handel = $(this).parent();
    var cns_name = handel.find('input:eq(0)').val();
    var cn_id = handel.parents('div').find('input:eq(0)').val();
    //如果输入值不同于旧值，则修改
    if(cns_name != handel.find('input:eq(1)').val()){
      $.ajax({
        type: 'POST',
        url: '/index.php/channel/renameShortCut',
        data: {cn_id: cn_id, cns_name: cns_name},
        success: function(data){
          if(data == '1'){
            handel.html('<a href="/index.php/content/contentList/0/'+cn_id+'">'+cns_name+'</a>');
          }else{
            handel.html('<a href="/index.php/content/contentList/0/'+cn_id+'">'+handel.find('input:eq(1)').val()+'</a>');
          }
        }
      });
    }else{
      handel.html('<a href="/index.php/content/contentList/0/'+cn_id+'">'+cns_name+'</a>');
    }
  });
});
</script>
</html>
