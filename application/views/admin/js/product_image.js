var ProductImage = function(pd_id, handle){
	this.pd_id = pd_id;
	this.handle = handle;
};
ProductImage.prototype.uploader = function(btn){
	var f = this;
	/*上传商品图片*/
	btn.on('change', '#fileToUpload', function(){
		f.pd_id = $('#pd_id').val();
		if(f.pd_id != '')
		{
			$.ajaxFileUpload({
			    url: '/index.php/image/upload/product/320/240/tb_',
			    fileElementId: 'fileToUpload',
			    dataType: 'json',
			    success: function(data, status){
				    var path = data.path;
				    $.ajax({
				    	type: 'POST',
				    	url: '/index.php/product/addImage',
				    	data: {pd_id: f.pd_id, pdi_name: path},
				    	success: function(){
				    		f.getList(f.renderTable);
				    	}
				    });
			    }
		    });
		}else{
			alert('请先添加或选择一个商品')
		}
	});
	/*删除商品图片*/
	f.handle.on('click', '.image_remove', function(){
		var pdi_name = $(this).parent().find('input').val();
		$.ajax({
			type: 'POST',
			url: '/index.php/product/deleteImage',
			data: {pdi_name: pdi_name}
		});
		$(this).parents('.thumbnail').remove();
	});
	/*排序商品图片*/
	f.handle.on('click', '.image_sort', function(){
		var pdi_name = $(this).parent().find('input').val();
		var op = $(this).attr('data-val');
		$.ajax({
			type: 'POST',
			url: '/index.php/product/sortImage',
			data: {pdi_name: pdi_name, op: op},
			success: function(data){
				if(data == '1'){
					f.getList(f.renderTable);
				}
			}
		});
	});
};
ProductImage.prototype.getList = function(render){
	var f = this;
	if(f.pd_id != ''){
		$.get('/index.php/product/getImageList/'+f.pd_id, function(data){
			var datas = $.parseJSON(data);
			if(datas.count != '0'){
				f.handle.html(render(datas.result));
			}
		});
	}
	return f;
};
ProductImage.prototype.renderTable = function(data){
	var html = '';
	var s = 0;
	var e = false;
	$.each(data, function(i, d){
		if(s == 0){html += '<div class="row-fluid">';}
		html += '<div class="span3"><p><div class="thumbnail"><img src="/uploads/product/tb_'+d.pdi_name+'"></p>'
			+'<p class="text-center"><input type="hidden" value="'+d.pdi_name+'">'
			+'<a class="btn btn-mini image_sort" data-val="0"><i class="icon-arrow-left"></i> 前移</a>'
			+' <a class="btn btn-mini image_sort" data-val="1"><i class="icon-arrow-right"></i> 后移</a>'
			+' <a class="btn btn-mini btn-danger image_remove"><i class="icon-trash icon-white"></i> 删除</a></p></div></div>';
		++s;
		if(s > 3){
			s = 0;
			e = true;
			html += '</div>';
		}else{
			e = false;
		}
	});
	if(! e){html += '</div>';}
	return html;
};