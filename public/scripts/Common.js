/*定义请求地址*/
var url = "http://127.0.0.1";
url = self.location.protocol + "//" + self.location.hostname;
if (self.location.port!='')
	url = url + ":" + self.location.port;

/*开启调试*/
var isDebug = true;

//这里加载框提示到top上去。
if (typeof top.GetPostCount==='undefined') {
	top.GetPostCount = 0;
}
function showWaitloading() {
	top.GetPostCount++;
	top.$('.waitforload').show();
}

function hideWaitloading() {
	top.GetPostCount--;
	if (top.GetPostCount<=0) {
		top.GetPostCount = 0;
		top.$('.waitforload').hide();
	}
}

function myGet () {
	showWaitloading();
	var parms = ['GET', true];
	for (var i = 0; i < arguments.length; i++) {
		parms.push(arguments[i]);
	}
	var xhr = myHttpRequest.apply(this, parms);
	if (xhr==null) {
		hideWaitloading();
		return null;
	}

	// 完成
	xhr.addEventListener("loadend", function(e){
		hideWaitloading();
	}, false);  

	return xhr;
}
function myGetnoloading () {
	var parms = ['GET', true];
	for (var i = 0; i < arguments.length; i++) {
		parms.push(arguments[i]);
	}
	var xhr = myHttpRequest.apply(this, parms);
	if (xhr==null) {
		return null;
	}

	return xhr;
}
function myGetSync() {
	var parms = ['GET', false];
	for (var i = 0; i < arguments.length; i++) {
		parms.push(arguments[i]);
	}
	var xhr = myHttpRequest.apply(this, parms);
	if (xhr==null) {
		return null;
	}

	return xhr;
}
function myPost () {
	showWaitloading();

	var parms = ['POST', true];
	for (var i = 0; i < arguments.length; i++) {
		parms.push(arguments[i]);
	}
	var xhr = myHttpRequest.apply(this, parms);
	if (xhr==null) {
		hideWaitloading();
		return null;
	}

	// 完成
	xhr.addEventListener("loadend", function(e){
		hideWaitloading();
	}, false);  

	return xhr;
}
function myPostnoloading () {
	var parms = ['POST', true];
	for (var i = 0; i < arguments.length; i++) {
		parms.push(arguments[i]);
	}
	var xhr = myHttpRequest.apply(this, parms);
	if (xhr==null) {
		return null;
	}

	return xhr;
}
function myPostSync () {
	var parms = ['POST', false];
	for (var i = 0; i < arguments.length; i++) {
		parms.push(arguments[i]);
	}
	var xhr = myHttpRequest.apply(this, parms);
	if (xhr==null) {
		return null;
	}

	return xhr;
}
function myHttpRequest () {
	var rtype = arguments[0];
	var async = arguments[1];
	var url = arguments[2];
	var parm = '',Callback = null,onProgress = null;
	if (arguments.length==4) {
		Callback = arguments[3];
	} else if (arguments.length==5) {
		parm = arguments[3];
		Callback = arguments[4];
	} else if (arguments.length==6) {
		parm = arguments[3];
		Callback = arguments[4];
		onProgress = arguments[5];
	} else {
		return null;
	}
	if(rtype=='GET' && parm!='') {
		url += '&' + parm;
	}

	var xhr = $.ajaxSettings.xhr();//new XMLHttpRequest();
	// 绑定上传事件 进度
	xhr.upload.addEventListener("progress",	 function(e){
		// 回调到外部
		if (onProgress) {
			onProgress(e.total, e.loaded);
		}
	}, false); 
	// 成功
	xhr.addEventListener("load", function(e){
		try {
			var json = JSON.parse(this.responseText);
			if (json.status=='SessionTimeOut') {
				jAlert("<h4>您登录过期，请重新登录<h4>", '', function() {
					if (window.sessionStorage.getItem('isFront')=='false')
						top.location.href = '/admin/login.html';
					else
						top.location.href = '/login.html';
				});
				return;
			} else if(json.status=="SystemUpgrade"){
				modal_select_system(parent.$('body'),json.title,json.errmsg);
			}else {
				Callback(json);
			}
		} catch (ex) {
			console.log(ex);
		}
	}, false);  
	// 错误
	xhr.addEventListener("error", function(e){
		// 回调到外部
		console.log(e);
	}, false); 

	xhr.open(rtype,url, async);

	xhr.setRequestHeader("cache-control","no-cache");
	xhr.setRequestHeader("contentType","text/html;charset=uft-8"); //指定发送的编码
	if (rtype=='POST') {
		if (typeof parm=='string')
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;");  //设置请求头信息
		xhr.send(parm);
	} else {
		xhr.send(null);
	}
	return xhr;
}
function isArray(arr) {
	return Object.prototype.toString.call(arr) === "[object Array]";
}
