/*
 * 
 * Date:2016-09-16 17:00 
 * Author：sn
 * Describe：主要验证eamil,省份证,手机等验证
 * Version ： seajs版本
 * 
 */
define(function(require, exports, module){
    //是否开启测试模式默认关闭
    var _debug = false;
    
/*    var _d = console.log
    //重写console.log功能。
	console.log = (function(debug){
	    return function(s){
	    	if(_debug){
	    		debug.call(console,s);
	    	}else{
	    		return;
	    	}
	    }
	})(console.log);*/
	
    
    //引入jquery模块
	var $ = require('jquery-min');
    //验证正则表达式配置
    var regConfig = {
        'email' : /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/,
        'phone' : /^1(3|4|5|7|8)\d{9}$/, //以13,14,15,17,18开头的11位手机号码
        'idCard' : /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/, //这是验证身份证格式是否正确不代表身份证合法
    }
    //身份证合法性规则查询
    var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}; 
    /*验证邮箱格式
      @param str 邮箱
      @param reg  正则表达式 默认为regConfig配置中的规则
      @return  {boolean}
    */
    module.exports.is_Email = function(str,reg){
        var reg = reg ? reg : regConfig.email ;
        return reg.test(str);
    }
    /*验证手机格式
      @param phone 手机号码
      @param reg  正则表达式 默认为regConfig配置中的规则
      @return  {boolean}
    */
    module.exports.is_Phone = function(phone,reg){
        var reg = reg ? reg : regConfig.phone ;
        return reg.test(phone);
    }
    /*验证身份证格式
      @param idCard 手机号码
      @param reg  正则表达式 默认为regConfig配置中的规则
      @return  {boolean}
    */
    module.exports.is_IdCard = function(idCard,reg){
        var reg = reg ? reg : regConfig.idCard ;
        //验证格式是否正确
        if(!reg.test(idCard)){
            console.log('身份证格式不正确');
            return false;
        }
        
        //验证1-2位地址城市是否合法
        if(!vcity[idCard.substr(0,2)]){
            console.log('地址编码错误');
            return false;
        }
        //验证7-14出生日期是否合法
        var birthday = idCard.substr(6,4)+"/"+parseInt(idCard.substr(10,2))+"/"+parseInt(idCard.substr(12,2));
        var birDate = new Date(birthday);
        if(birthday != (birDate.getFullYear()+"/"+(parseInt(birDate.getMonth())+1)+"/"+birDate.getDate())){
            return false;
        }
        //验证最后校验位
        var sum = 0;
        for(var i=17 ; i>=0 ; i--){
            sum += (Math.pow(2,i)%11)*parseInt(idCard.replace(/x$/i,'a').charAt(17-i),11);
        }
        if(sum%11 != 1){
            console.log('你输入的身份证号非法');
            return false;
        }
        //解析身份证后可以得到 出生地,出生日期,性别
        var _birCity = vcity[idCard.substr(0,2)];
        var _birDate = birthday;
        var _sex = idCard.substr(16,1)%2 ?'男':'女';
        
        
        return true;
    }
    /*
      字符串长度验证
      @param str 需要验证的字符串
      @param min 字符串的最小长度
      @param max 字符串的最大长度
      @return  {boolean}
    */
    module.exports.str_Length = function(str,min,max){
        if(str == '' || min == '' || max == '' || min > max ){
            alert('str_length 参数正确');
            return false;
        }
        var min = parseInt(min);
        var min = parseInt(max);
        var reg = new RegExp("\^\\S{"+min+","+max+"}$");
        return reg.test(str);
    }
     /*
      字符串中是否有空格
      @param str 需要验证的字符串
      @return  {boolean}
    */
    module.exports.str_Space = function(str){
        var reg = /\s/;
        return reg.test(str);
    }
    /*
      字符串中是否有空格
      @param number 数字
      @return  {boolean}
    */
    module.exports.is_Number = function(number){
        var reg = /^[0-9]*$/;
        return reg.test(number);
    }
    /*
      只能由字母和数字组成的字符串
      @param str 需要验证的字符串
      @return  {boolean}
    */
    module.exports.str_Create = function(str){
        var reg = /^[a-zA-Z0-9]+$/;
        return reg.test(str);
    }
    /*
      判断IE
      @returns {boolean}
    */
    module.exports.is_Ie = function(){
        if (!!window.ActiveXObject || "ActiveXObject" in window) {
			return true;
		}
		return false;
    }
    /*
      判断IE8
      @returns {boolean}
    */
    module.exports.is_Ie8 = function(){
        var browser = navigator.appName;
		var b_version = navigator.appVersion;
        var version = b_version.split(";");
        if (browser == "Microsoft Internet Explorer") {
			var trim_Version = version[1].replace(/[ ]/g, "");
			return trim_Version == "MSIE8.0";
		}
		return false;
    }
    /*
      判断IE9
      @returns {boolean}
    */
    module.exports.is_Ie9 = function(){
        var browser = navigator.appName;
		var b_version = navigator.appVersion;
        var version = b_version.split(";");
        if (browser == "Microsoft Internet Explorer") {
			var trim_Version = version[1].replace(/[ ]/g, "");
			return trim_Version == "MSIE9.0";
		}
		return false;
    }
     /*
      判断IE10
      @returns {boolean}
    */
    module.exports.is_Ie10 = function(){
        var browser = navigator.appName;
		var b_version = navigator.appVersion;
        var version = b_version.split(";");
        if (browser == "Microsoft Internet Explorer") {
			var trim_Version = version[1].replace(/[ ]/g, "");
			return trim_Version == "MSIE10.0";
		}
		return false;
    }
    /*
      判断IE11
      @returns {boolean}
    */
    module.exports.is_Ie11 = function(){
        //var browser = navigator.appName;
		var b_version = navigator.appVersion.toLowerCase();
		return (b_version.indexOf("trident")>-1 && b_version.indexOf("rv")>-1);
    }
    /*
      判断是否为移动设备Mobile
      @returns flag{string}设备类型
    */
     module.exports.is_Mobile = function(){
        var userAgentInfo = navigator.userAgent.toLowerCase();
        var agents = new Array("android", "iphone", "symbianos", "windows phone", "ipad", "ipod","windows");
        var flag = '';
        for(var i in agents){
            if(userAgentInfo.indexOf(agents[i])> -1){
                flag = agents[i];
                break;
            }
        }
        return flag;
    }
     
});