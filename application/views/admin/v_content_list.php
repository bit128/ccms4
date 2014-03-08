<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>New Site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include '_header.php'; ?>
  </head>

  <body>

    <?php include '_top.php'; ?>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <p>
            <a class="btn btn-success" href="<?php echo site_url('content/contentDetail/'.$cn_id); ?>" style="margin-top:-10px"><i class="icon-plus icon-white"></i> 添加新内容</a>
            <span class="input-append">
              <input type="text">
              <a class="btn" href="javascript:;">搜索</a>
            </span>
          </p>
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>编号</th>
                <th>标题</th>
                <th>更新时间</th>
                <th>状态</th>
                <th style="width:100px;">操作</th>
              </tr>
            </thead>
            <tbody class="f_tiny" id="content_list">
              <?php foreach ($content as $v) { ?>
              <tr>
                <td><?php echo $v['ct_id']; ?></td>
                <td><a href="<?php echo site_url('content/contentDetail/'.$cn_id.'/'.$v['ct_id']);?>"><?php echo $v['ct_title']; ?></a></td>
                <td><?php echo date('Y-m-d', $v['ct_ctime']); ?></td>
                <td><?php switch($v['ct_status']){
                  case 0: echo '<span class="text-warning">隐藏</span>'; break;
                  case 1: echo '<span class="text-success">公开</span>'; break;
                  case 2: echo '<span class="text-info">推荐</span>'; break;
                }?>
                </td>
                <td>
                  <a class="btn btn-mini" href="<?php echo site_url('content/contentDetail/'.$cn_id.'/'.$v['ct_id']);?>">修改</a>
                  <a class="btn btn-mini content_delete">删除</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <div class="pagination"><?php echo $pages; ?></div>
        </div>
      </div>

      <?php include '_footer.php'; ?>

    </div>

  </body>
<script type="text/javascript">
$(document).ready(function(){
  $('#content_list').on('click', '.content_delete', function(){
    if(confirm('您确定删除么？')){
      var handle = $(this).parents('tr');
      var ct_id = handle.find('td:eq(0)').text();
      $.ajax({
        type: 'POST',
        url: '/index.php/content/deleteContent',
        data: {ct_id: ct_id}
      });
      handle.remove();
    }
  });
});
</script>
</html>