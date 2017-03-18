/*
 * 
 * Date:2016-09-16 17:00 
 * Author：sn
 * Describe：插件的一些基本配置信息，主要包含 路径 、站点等
 * Version ： seajs版本
 * 
 */
define(function(require, exports, module){
	//站点的ip地址(服务器访问)
    var __URL__ = "";
    
    //站点路径配置
    module.exports = {
    	//通用js
    	common : {
    		cssPath :"/public/common/",
    	},
    	//自定义弹窗
    	popup : {
    		cssPath : "/public/common/",
    		imgPath : "/public/common/",
    	},
    	//日期插件
    	date : {
    		cssPath : __URL__+"/public/common/",
    	},
    	//上传图片截图插件
    	photoClip : {
    		imgPath : "/public/common/",
    	}
    }
    
});