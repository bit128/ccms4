<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>欢迎使用CCMS彩网后台内容管理系统</title>
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
            <select id="gb_type">
              <option value="0" <?php if($gb_type == '0') echo 'selected'; ?>>留言板</option>
              <option value="1" <?php if($gb_type == '1') echo 'selected'; ?>>商品评论</option>
            </select>
          </p>
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>编号</th>
                <th>主题</th>
                <th>发布日期</th>
                <th>状态</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody id="gb_list" class="f_tiny">
              <?php foreach ($guestbook as $v) { ?>
              <tr>
                <td><?php echo $v['gb_id']; ?></td>
                <td><a href="<?php echo site_url('guestbook/guestbookDetail'),'/',$v['gb_id']; ?>"><?php echo $v['gb_title']; ?></a></td>
                <td><?php echo date('Y-m-d', $v['gb_ctime']); ?></td>
                <td><?php if($v['gb_status'] == 0){echo '未处理';}elseif($v['gb_status'] == 1){echo '<span class="text-success">已处理</span>';}else{echo '<span class="text-error">不通过</span>';} ?></td>
                <td>
                  <a href="<?php echo site_url('guestbook/guestbookDetail'),'/',$v['gb_id']; ?>" class="btn btn-mini">详情</a>
                  <a class="btn btn-mini guestbook_delete">删除</a>
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
  /*切换留言类型*/
  $('#gb_type').on('change', function(){
    location.href = '/index.php/guestbook/guestbookList/0/'+$(this).val();
  });
  /*删除留言*/
  $('#gb_list').on('click', '.guestbook_delete', function(){
    if(confirm('您确定要删除该条留言吗？')){
      var handle = $(this).parents('tr');
      $.ajax({
        type: 'POST',
        url: '/index.php/guestbook/deleteGuestbook',
        data: {gb_id: handle.find('td:eq(0)').text()}
      });
      handle.remove();
    }
  });
});
</script>
</html>