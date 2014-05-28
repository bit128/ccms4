var NewsExpress = function(handle, cn_id, limit){
	this.handle = handle;
	this.cn_id = cn_id;
	this.limit = limit;
};
NewsExpress.prototype = {
	constructor: NewsExpress,
	getList: function(render){
		var f = this;
		var src = '/index.php/home/getContentExpress/'+f.cn_id+'/'+f.limit;
		$.get(src, function(data){
			var datas = $.parseJSON(data);
			var html = '';
			if(datas.count != '0'){
				$.each(datas.result, function(i, d){
					html += render(d);
				})
			}
			f.handle.html(html);
		});
	}
};