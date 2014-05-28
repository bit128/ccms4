var ProductQuestion = function(pd_id,  handle, render){
	this.pd_id = pd_id;
	this.handle = handle;
	this.render = render;
	this.getList();
};
ProductQuestion.prototype = {
	constructor: ProductQuestion,
	getList: function(){
		var f = this;
		$.ajax({
			type: 'POST',
			url: '/index.php/product/getQuestionList',
			data: {pd_id: f.pd_id, pdq_status: -1},
			success: function(data){
				if(data != '[]'){
					var datas = $.parseJSON(data);
					var html = '';
					$.each(datas, function(i, d){
						html += f.render(d);
					});
					f.handle.html(html);
				}
			}
		});
	},
	bindEvent: function(){
		//变更状态
		this.handle.on('click', '.pdq_lock', function(){
			var pdq_id = $(this).attr('data-val');
			var pdq_status = $(this).attr('data-lock');
			if(pdq_status == '1'){
				$(this).removeClass('btn-success').addClass('btn-warning').attr('data-lock', '0').text('隐藏');
			}else{
				$(this).removeClass('btn-warning').addClass('btn-success').attr('data-lock', '1').text('显示');
			}
			$.ajax({
				type: 'POST',
				url: '/index.php/product/changeQuestionStatus',
				data: {pdq_id: pdq_id, pdq_status: pdq_status}
			});
		});
		this.handle.on('click', '.pdq_edit', function(){
			var f = $(this).parents('.pdq_item');
			var span = $(this).parent();
			var pdq_id = $(this).attr('data-val');
			var pdq_question = f.find('.pdq_question');
			var pdq_answer = f.find('.pdq_answer');
			var question = pdq_question.html();
			var answer = pdq_answer.html();
			pdq_question.html('<input type="text" value="'+question+'" style="width:60%">');
			pdq_answer.html('<textarea rows="8" style="width:90%">'+answer+'</textarea>');
			span.html(' <a class="btn btn-mini btn-primary">保存</a> <a class="btn btn-mini">取消</a>');
			span.on('click', 'a', function(){
					var indexNum = span.find('a').index(this);
					var q = pdq_question.find('input').val();
					var a = pdq_answer.find('textarea').val();
					if(indexNum == 0){
						if(q == ''){alert('请填写问题');pdq_question.find('input').focus();return;}
						if(a == ''){alert('请填写问题答案');pdq_answer.find('input').focus();return;}
						$.ajax({
							type: 'POST',
							url: '/index.php/product/updateQuestion',
							data: {pdq_id: pdq_id, pdq_question: q, pdq_answer: a}
						});
						question = q;
						answer = a;
					}
					pdq_question.html(q == '' ? question : q);
					pdq_answer.html(a == '' ? answer : a);
					span.off();
					span.html('<a href="javascript:;" data-val="'+pdq_id+'" class="pdq_edit btn btn-mini">编辑</a>');
				});
		});
		//删除
		this.handle.on('click', '.pdq_delete', function(){
			if(confirm('确定要删除么？')){
				var pdq_id = $(this).attr('data-val');
				var f = $(this).parents('.pdq_item');
				$.ajax({
					type: 'POST',
					url: '/index.php/product/deleteQuestion',
					data: {pdq_id: pdq_id},
					success: function(data){
						if(data == '1'){
							f.remove();
						}
					}
				});
			}
		});
	},
	addItem: function(handle){
		var f = this;
		handle.on('click', function(){
			if(f.pd_id != ''){
				var pdq_question = $('#pdq_question').val();
				if(pdq_question == ''){alert('请填写问题');$('#pdq_question').focus();return;}
				var pdq_answer = $('#pdq_answer').val();
				if(pdq_answer == ''){alert('请填写问题答案.');$('#pdq_answer').focus();return;}
				var pdq_status = $('input[name="pdq_status"]:checked').val();
				$.ajax({
					type: 'POST',
					url: '/index.php/product/addQuestion',
					data: {pd_id: f.pd_id, pdq_question: pdq_question, pdq_answer: pdq_answer, pdq_status: pdq_status},
					success: function(data){
						if(data == '1'){
							alert('添加成功');
							$('#pdq_question').val('');
							$('#pdq_answer').val('');
							f.getList();
						}
					}
				});
			}else{
				alert('请先添加或选择一个商品.');
			}
		});
	}
};