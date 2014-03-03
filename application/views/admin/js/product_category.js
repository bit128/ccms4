var ProductCategory = function(handle){
	this.handle = handle;
};
/*绑定下拉菜单事件*/
ProductCategory.prototype.bindSelectEvent = function(){
	var f = this;
	f.handle.on('change', 'select', function(){
		var indexNum = f.handle.find('select').index(this);
		f.handle.find('select:gt('+indexNum+')').remove();
		f.getChildList($(this).val(), f.templateSelect);
	});
};
/*渲染器-级联下拉菜单*/
ProductCategory.prototype.renderSelect = function(select){
	var f = this;
	f.bindSelectEvent();
	if(select == ''){
		f.getChildList('0', f.templateSelect);
	}else{
		f.getBrotherList(select, f.templateSelect);
	}
};
/*获取兄弟成员菜单*/
ProductCategory.prototype.getBrotherList = function(select, render){
	var f = this;
	$.get('/index.php/menu/getBrotherList/'+select, function(data){
		if(data != '[]'){
			var datas = $.parseJSON(data);
			var mu_fid = datas[0].mu_fid;
			f.handle.prepend(render(datas, select));
			//继续渲染上一级
			if(mu_fid != '0'){
				f.getBrotherList(mu_fid, render);
			}
		}
	});
};
/*获取直属子级菜单*/
ProductCategory.prototype.getChildList = function(select, render){
	var f = this;
	if(select != ''){
		$.get('/index.php/menu/getChildList/'+select, function(data){
			if(data != '[]'){
				var datas = $.parseJSON(data);
				f.handle.append(render(datas, ''));
			}
		});
	}
};
/*下拉菜单模板*/
ProductCategory.prototype.templateSelect = function(data, select){
	var html = ' <select class="input-medium class="pd_category"><option value="">请选择分类</option>';
	$.each(data, function(i, d){
		if(select != d.mu_id){
			html += '<option value="'+d.mu_id+'">'+d.mu_name+'</option>';
		}else{
			html += '<option value="'+d.mu_id+'" selected>'+d.mu_name+'</option>';
		}
	});
	return html + '</select>';
};