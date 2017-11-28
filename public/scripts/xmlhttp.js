var http = function(){
    
var quest = function(option, callback) {  
    var xhr;
    var url = option.url;
    var method = option.method;
    var data = option.data;
    var timeout = option.timeout || 0;
    
    if (window.XMLHttpRequest) {  
        xhr = new XMLHttpRequest();  
        if (xhr.overrideMimeType)  
            xhr.overrideMimeType('text/json');  
    } else if (window.ActiveXObject) {  
        try {  
            xhr = new ActiveXObject("Msxml2.XMLHTTP");  
        } catch (e) {  
            try {  
                xhr = new ActiveXObject("Microsoft.XMLHTTP");  
            } catch (e) {
                return false;
            }  
        }
        xhr.setRequestHeader("Content-Type","text/json;");
    }

    (timeout > 0) && (xhr.timeout = timeout);
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status >= 200 && xhr.status < 400) {
            var result = xhr.responseText;
            alert(result);
            try {result = JSON.parse(xhr.responseText);} catch (e) {}
                callback && callback(null, result);
            } else {
                callback && callback('status: ' + xhr.status);
            }
        }
    }.bind(this);
    
    xhr.open(method, url, true);
    if(typeof data === 'object'){
        try{
            data = JSON.stringify(data);
        }catch(e){}
    }
    xhr.send(data);
    
    xhr.ontimeout = function () {
        callback && callback('timeout');
        console.log('%c连%c接%c超%c时', 'color:red', 'color:orange', 'color:purple', 'color:green');
    };
};
this.get = function (url, callback) {
    var option = url.url ? url : { url: url };
    option.method = 'get';
    quest(option, callback);
};
this.post = function (option, callback) {
    option.method = 'post';
    quest(option, callback);
};

};


