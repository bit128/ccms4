var ProductExpress = function(condition, limit, order, oren, handle){
	this.condition = condition;
	this.limit = limit;
	this.order = order;
	this.oren = oren;
	this.handle = handle;
};
ProductExpress.prototype = {
	constructor: ProductExpress,
	getList: function(render){
		var f = this;
		$.ajax({
			type: 'POST',
			url: '/index.php/product/getExpressList',
			data: {condition: f.condition, limit: f.limit, order: f.order, oren: f.oren},
			success: function(data){
				if(data != '[]'){
					var datas = $.parseJSON(data);
					var html = '';
					$.each(datas, function(i, d){
						html += render(d);
					});
					f.handle.html(html).find('.pd_image').each(function(){
						var f = $(this);
						var pd_id = f.attr('data-val');
						$.get('/index.php/product/getImageList/'+pd_id, function(data){
							if(data != '[]'){
								var imgs = $.parseJSON(data);
								f.html('<img src="/uploads/product/tb_'+imgs.result[0].pdi_name+'" alt=""/>');
							}
						});
					});
				}
			}
		});
	}
};