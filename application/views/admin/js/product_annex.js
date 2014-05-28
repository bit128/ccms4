var ProductAnnex = function(pd_id, handle, render){
	this.pd_id = pd_id;
	this.handle = handle;
	this.render = render;
	this.getList();
};
ProductAnnex.prototype = {
	constructor: ProductAnnex,
	getList: function(){
		var f = this;
		$.ajax({
			type: 'POST',
			url: '/index.php/product/getAnnexList',
			data: {offset: 0, limit: 10, pd_id: f.pd_id, pda_status: -1},
			success: function(data){
				var datas = $.parseJSON(data);
				var html = '';
				$.each(datas.result, function(i, d){
					html += f.render(d);
				});
				f.handle.html(html);
			}
		});
	},
	bindEvent: function(){
		//变更状态
		this.handle.on('click', '.pda_lock', function(){
			var pda_id = $(this).attr('data-val');
			var status = $(this).attr('data-status');
			if(status == '1'){
				$(this).removeClass('btn-success').addClass('btn-warning').attr('data-status', '0').text('隐藏');
			}else{
				$(this).removeClass('btn-warning').addClass('btn-success').attr('data-status', '1').text('公开');
			}
			$.ajax({
				type: 'POST',
				url: '/index.php/product/changeAnnexStatus',
				data: {pda_id: pda_id, pda_status: status}
			});
		});
		//删除
		this.handle.on('click', '.pda_remove', function(){
			if(confirm('确定要删除么？')){
				var pda_id = $(this).attr('data-val');
				$.ajax({
					type: 'POST',
					url: '/index.php/product/deleteAnnex',
					data: {pda_id: pda_id}
				});
				$(this).parents('tr').remove();
			}
		});
	},
	addItem: function(){
		var f = this;
		if(f.pd_id != ''){
			//异步上传文件
			$('#annex_upload').on('change', '#annex_file', function(){
				$.ajaxFileUpload({
				    url: '/index.php/product/uploadFile',
				    fileElementId: 'annex_file',
				    dataType: 'json',
				    success: function(data, status){
					    $('#pda_src').val(data.path);
					    $('#pda_type').val(data.type);
				    }
			    });
			});
			//提交数据
			$('#pda_add').on('click', function(){
				var pda_name = $('#pda_name').val();
				if(pda_name == ''){alert('请填写附件名称');$('#pda_name').focus();return;}
				var pda_src = $('#pda_src').val();
				if(pda_src == ''){alert('上传附件文件');return;}
				var pda_type = $('#pda_type').val();
				var pda_status = $('input[name="pda_status"]:checked').val();
				$.ajax({
					type: 'POST',
					url: '/index.php/product/addAnnex',
					data: {pd_id: f.pd_id, pda_name: pda_name, pda_src: pda_src, pda_type: pda_type, pda_status: pda_status},
					success: function(data){
						if(data == '1'){
							$('#pda_form')[0].reset();
							//重载附件列表
							f.getList();
						}
					}
				});
			});
		}else{
			alert('请先添加或选择一个商品');
		}
	}
};