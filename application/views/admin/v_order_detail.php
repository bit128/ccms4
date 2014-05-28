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
        <div class="span6">
          <form class="well">
            <fieldset>
              <legend>订单详情</legend>
              <input type="hidden" id="od_id" value="<?php echo $orders['od_id']; ?>">
              <p>
                <a class="od_status btn <?php if($orders['od_status'] == 0) echo 'btn-danger'; ?>">待处理</a>
                <a class="od_status btn <?php if($orders['od_status'] == 1) echo 'btn-success'; ?>">已完成</a>
              </p>
              <p>
                <label>订单号：</label>
                <small><strong><?php echo $orders['od_id']; ?></strong></small>
              </p>
              <p>
                <label>客户：</label>
                <small><strong><?php echo $orders['user_account']; ?></strong></small>
              </p>
              <p>
                <label>订单总价：</label>
                <input id="od_price" type="text" class="input-mini" value="<?php echo $orders['od_price']; ?>"> 元
              </p>
              <p>
                <label>下单时间：</label>
                <small><strong><?php echo date('Y年m月d日 H:i', $orders['od_ctime']); ?></strong></small>
              </p>
              <p>
                <label>发货时间：</label>
                <small><strong><?php if($orders['od_stime'] != '0')
                  echo date('Y年m月d日 H:i', $orders['od_stime']); ?></strong></small>
              </p>
              <p>
                <label>运输方式：</label>
                <small><strong>
                <?php switch($orders['od_send']){
                  case 1: echo '快递'; break;
                  case 2: echo '物流'; break;
                  case 3: echo '平邮'; break;
                }?>
                </strong></small>
              </p>
              <p>
                <label>留言：</label>
                <small class="text-info"><?php echo $orders['od_remark']; ?></small>
              </p>
            </fieldset>
          </form>
        </div>
        <div class="span6">
          <div class="well">
            <legend>订单商品列表</legend>
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>图片</th>
                  <th>名称</th>
                  <th>型号</th>
                  <th>数量</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($orders['items'] as $v) { ?>
                <tr>
                  <td><a href="<?php echo site_url('product/productDetail/'), '/', $v['pd_id']; ?>" targte="_blank"
                    class="pd_image" data-val="<?php echo $v['pd_id']; ?>"></a></td>
                  <td><a href="<?php echo site_url('product/productDetail/'), '/', $v['pd_id']; ?>" target="_blank">
                    <?php echo $v['pd_name'];?></a></td>
                  <td><small><?php echo $v['st_name']; ?></small></td>
                  <td><?php echo $v['sp_quantity']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <?php include '_footer.php'; ?>

    </div>
    <div id="mess_box" class="modal hide fade">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3>订单邮件回复：</h3>
        </div>
        <div class="modal-body">
          <p>
            <textarea style="width:97%;" rows="8" id="message"></textarea>
          </p>
        </div>
        <div class="modal-footer">
          <a href="javascript:;" class="btn send_mess">关闭</a>
          <a href="javascript:;" class="btn btn-primary send_mess">发送邮件</a>
        </div>
    </div>
  </body>
  <script type="text/javascript">
  $(document).ready(function(){
    /*加载商品图片*/
    $('.pd_image').each(function(){
      var f = $(this);
      $.get('/index.php/product/getImageList/'+f.attr('data-val'), function(data){
        if(data != '[]'){
          var imgs = $.parseJSON(data);
          f.html('<img src="/uploads/product/tb_'+imgs.result[0].pdi_name+'" alt="" style="width:50px;"/>');
        }
      });
    });
    /*变更商品状态*/
    $('.od_status').on('click', function(){
      var od_id = $('#od_id').val();
      var status = $('.od_status').index(this);
      if(status == 0){
        $('.od_status:eq(0)').addClass('btn-danger');
        $('.od_status:eq(1)').removeClass('btn-success');
      }else{
        //$('#mess_box').modal('show');
        $('.od_status:eq(0)').removeClass('btn-danger');
        $('.od_status:eq(1)').addClass('btn-success');
      }
      $.ajax({
        type: 'POST',
        url: '/index.php/order/changeOrderStatus',
        data: {od_id: od_id, od_status: status}
      });
    });
    /*变更订单价格*/
    $('#od_price').on('blur', function(){
      var od_price = $(this).val();
      if(/[0-9\.]+/.exec(od_price)){
        var od_id = $('#od_id').val();
        $.ajax({
          type: 'POST',
          url: '/index.php/order/changeOrderPrice',
          data: {od_id: od_id, od_price: od_price}
        });
      }
    });
    /*回复邮件*/
    /*
    $('.send_mess').on('click', function(){
      $('#mess_box').modal('hide');
      var indexNum = $('.send_mess').index(this);
      if(indexNum == 1){
        var od_id = $('#od_id').val();
        var message = $('#message').val();
        if(message != ''){
          $.ajax({
            type: 'POST',
            url: '/index.php/order/sendMessage',
            data: {od_id: od_id, message: message},
            success: function(data){
              if(data == '1'){alert('邮件发送成功');}
            }
          });
        }
      }
    });*/

  });
  </script>
</html>