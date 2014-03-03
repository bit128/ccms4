var ProductImage = function(handle, pd_id, max){
	this.handle = handle;
	this.pd_id = pd_id;
	this.max = max;
	this.getImage();
};
ProductImage.prototype = {
	constructor: ProductImage,
	getImage: function(){
		var f = this;
		$.get('/index.php/product/getImageList/'+f.pd_id, function(data){
			if(data != '[]'){
				var datas = $.parseJSON(data);
				var i = 0;
				var img = '';
				$.each(datas.result, function(i, d){
					img += '<img src="/uploads/product/'+d.pdi_name+'" alt="" />';
					++i;
					if(i >= f.max){
						return false;
					}
				});
				f.handle.html(img);
			}
		});
	}
};