var ProductTarget = function(handle){
	this.handle = handle;
	this.bindEvent();
};
ProductTarget.prototype = {
	constructor: ProductTarget,
	bindEvent: function(){
		this.handle.on('click', 'button', function(){
			if($(this).hasClass('btn-primary')){
				$(this).removeClass('btn-primary');
			}else{
				$(this).parent().find('button').removeClass('btn-primary');
				$(this).addClass('btn-primary');
			}
		});
	},
	getValue: function(){
		var value = '';
		this.handle.find('.btn-primary').each(function(){
			value += $(this).attr('data-val') + '-';
		});
		return value;
	},
	render: function(sel){
		var f = this;
		var select = $.parseJSON(sel);

		$.get('/index.php/target/getAllTargetList', function(data){
			var datas = $.parseJSON(data);
			var html = '';
			$.each(datas, function(k, v){
				html += '<p><small><strong>'+v.group_name+'：</strong></small>'
				$.each(v.group_item, function(i, d){
					if($.inArray(d.tg_id, select) < 0){
						html += ' <button type="button" class="btn btn-mini" data-val="'+d.tg_id+'">'+d.tg_name+'</button>';
					}else{
						html += ' <button type="button" class="btn btn-mini btn-primary" data-val="'+d.tg_id+'">'+d.tg_name+'</button>';
					}
				});
				html += '</p>';
			});
			f.handle.html(html);
		});
	}
};