/**
* Javascript 时间戳格式化
* ======
* @author 洪波
* @version 14.05.27
*/
var Datetime = function(time) {
	//初始化时间戳
	if(time !== undefined) {
		this.date = new Date(parseInt(time) * 1000);
	}else{
		this.date = new Date();
	}
	//alert(this.date.toLocaleString());
	//获取年月日时分秒
	this.dates = [
		this.date.getFullYear(),
		this.date.getMonth() + 1,
		this.date.getDate(),
		this.date.getHours(),
		this.date.getMinutes(),
		this.date.getSeconds()
	];
	//格式符
	this.formats = [
		['-', '-', ' ', ':', ':', ''],
		['年', '月', '日 ', ':', ':', ''],
		['年', '月', '日 ', '时', '分', '秒']
	];
}
Datetime.prototype = {
	constructor: Datetime,
	ymd: function(f){
		var time = '';
		for(var i = 0; i < 3; ++i){
			time += this.dates[i] + this.formats[f][i];
		}
		return time.substring(0, time.length - 1);
	},
	ymdhi: function(f){
		var time = '';
		for(var i = 0; i < 5; ++i){
			time += this.dates[i] + this.formats[f][i];
		}
		return time.substring(0, time.length - 1);
	},
	ymdhis: function(f){
		var time = '';
		for(var i = 0; i < 6; ++i){
			time += this.dates[i] + this.formats[f][i];
		}
		return time;
	},
	mdhi: function(f){
		var time = '';
		for(var i = 1; i < 5; ++i){
			time += this.dates[i] + this.formats[f][i];
		}
		return time.substring(0, time.length - 1);
	},
	mdhis: function(f){
		var time = '';
		for(var i = 1; i < 6; ++i){
			time += this.dates[i] + this.formats[f][i];
		}
		return time;
	},
	notice: function(f){
		now = new Date();
		if(now.getYear() == this.date.getYear() && now.getMonth() == this.date.getMonth()){
			var day = now.getDate() - this.date.getDate();
			if(day == 3){
				return '3天前';
			}else if(day == 2){
				return '2天前';
			}else if(day == 1){
				return '1天前';
			}else if(day == 0){
				var hours = now.getHours() - this.date.getHours();
				if(hours == 3){
					return '3小时以前';
				}else if(hours == 2){
					return '2小时以前';
				}else if(hours == 1){
					return '1小时以前';
				}else if(hours == 0){
					var minutes = now.getMinutes() - this.date.getMinutes();
					if(minutes >= 20){
					    return '20分钟以前';
					}else if(minutes < 20 && minutes>=10){
					    return '10分钟以前';
					}else if(minutes < 10){
					    return '刚刚';
					}else{
					    return '1小时以内';
					}
				}else{
					return '24小时以内';
				}
			}else{
				return this.ymdhi(1);
			}
	    }else{
	    	return this.ymdhi(1);
	    }
	}
};