function fileQueueError(file, errorCode, message) {
	try {
		var imageName = "error.gif";
		var errorName = "";
		if (errorCode === SWFUpload.errorCode_QUEUE_LIMIT_EXCEEDED) {
			errorName = "You have attempted to queue too many files.";
		}

		if (errorName !== "") {
			alert(errorName);
			return;
		}

		switch (errorCode) {
		case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
			imageName = "zerobyte.gif";
			break;
		case SWFUpload.QUEUE_ERROR.FILE_EXCEEDS_SIZE_LIMIT:
			try {
				file.name='';
				progress = new FileProgress(file,  this.customSettings.upload_target);
				progress.setCancelled();
				progress.setStatus("<font color='red'>文件不能大于2MB.</font>");
				progress.toggleCancel(true);
			}
			catch (ex2) {
				this.debug(ex2);
			}
			break;
		case SWFUpload.QUEUE_ERROR.ZERO_BYTE_FILE:
		case SWFUpload.QUEUE_ERROR.INVALID_FILETYPE:
		default:
			alert(message);
			break;
		}

		//addImage("/script/upload/images/" + imageName,file);

	} catch (ex) {
		this.debug(ex);
	}

}

function fileDialogComplete(numFilesSelected, numFilesQueued) {
	try {
		if (numFilesQueued > 0) {
			this.startUpload();
		}
	} catch (ex) {
		this.debug(ex);
	}
}

function uploadProgress(file, bytesLoaded) {

	try {
		var percent = Math.ceil((bytesLoaded / file.size) * 100);

		var progress = new FileProgress(file,  this.customSettings.upload_target);
		progress.setProgress(percent);
		if (percent === 100) {
			progress.setStatus("Creating thumbnail...");
			progress.toggleCancel(false, this);
		} else {
			progress.setStatus("Uploading...");
			progress.toggleCancel(true, this);
		}
	} catch (ex) {
		this.debug(ex);
	}
}

function uploadSuccess( file, serverData ){

	try {
		var progress = new FileProgress(file,  this.customSettings.upload_target);
		var tempStr = 'var data = ' + serverData; 
		var i=0;var j=0;
		//alert(tempStr);
		eval(tempStr);
		if(data.info)
			alert(data.info);
		if(data.FILEID) {
			var upload_name=data.FILEID+'.'+data.extention;
			addImage( data.thumb_img,file,upload_name,data.size);
			progress.setStatus("Thumbnail Created.");
			progress.toggleCancel(false);
		}else{
			progress.setStatus("Error.");
			progress.toggleCancel(false);
		}
	} catch (ex) {
		this.debug(ex);
	}
}

function uploadComplete(file) {
	try {
		/*  I want the next upload to continue automatically so I'll call startUpload here */
		if (this.getStats().files_queued > 0) {
			this.startUpload();
		} else {
			var progress = new FileProgress(file,  this.customSettings.upload_target);
			progress.setComplete();
			progress.setStatus("上传完成.");
			progress.toggleCancel(false);
		}
	} catch (ex) {
		this.debug(ex);
	}
}

function uploadError(file, errorCode, message) {
	var imageName =  "error.gif";
	var progress;
	try {
		switch (errorCode) {
		case SWFUpload.UPLOAD_ERROR.FILE_CANCELLED:
			try {
				progress = new FileProgress(file,  this.customSettings.upload_target);
				progress.setCancelled();
				progress.setStatus("Cancelled");
				progress.toggleCancel(false);
			}
			catch (ex1) {
				this.debug(ex1);
			}
			break;
		case SWFUpload.UPLOAD_ERROR.UPLOAD_STOPPED:
			try {
				progress = new FileProgress(file,  this.customSettings.upload_target);
				progress.setCancelled();
				progress.setStatus("Stopped");
				progress.toggleCancel(true);
			}
			catch (ex2) {
				this.debug(ex2);
			}
		case SWFUpload.UPLOAD_ERROR.UPLOAD_LIMIT_EXCEEDED:
			imageName = "uploadlimit.gif";
			break;
		default:
			alert(message);
			break;
		}

		//addImage("/script/upload/images/" + imageName);

	} catch (ex3) {
		this.debug(ex3);
	}

}
function getAttr(o,attr)
{
	return navigator.userAgent.indexOf("MSIE")>0?o.attr:o.getAttribute(attr);	
}
function addImage(src,file,name,size) {
	var nails = document.getElementById("thumbnails").getElementsByTagName('li');
	for(var i=0;i<nails.length;i++)
	{
		var addStatu = navigator.userAgent.indexOf("MSIE")>0?nails[i].uploadstatu:nails[i].getAttribute('uploadstatu');	
		if(addStatu==0){
			if(i+1==nails.length)
			{
				swfu.setButtonDisabled(true);
			}else{}
			navigator.userAgent.indexOf("MSIE")>0?nails[i].uploadstatu=1:nails[i].setAttribute('uploadstatu',1);
			var newImg = document.createElement("img");
			newImg.style.margin = "1px";
			newImg.alt=filename;newImg.title=file.name;
			var picBox=nails[i].getElementsByTagName('div');
			picBox[0].appendChild(newImg);
			var nameBox = nails[i].getElementsByTagName('h4');
			var filename =file.name;
			var input_0 = document.createElement("input");
			input_0.type ='hidden';
			input_0.name ='attach_file['+i+'][name]';
			input_0.value =filename.substr(0,filename.lastIndexOf('.'));
			nails[i].appendChild(input_0);
			filename=filename.length>10?filename.substring(0,4)+'...'+filename.substring(filename.lastIndexOf('.')-3):filename;
			nameBox[0].innerHTML= filename;		
			var commendBtn = document.createElement('a');
			commendBtn.href='javascript:void(0);';
			commendBtn.appendChild(document.createTextNode('删除'));
			nails[i].appendChild(commendBtn);
			var input1 = document.createElement("input");
			input1.type ='hidden';
			input1.name ='attach_file['+i+'][url]';
			input1.value =name;
			nails[i].appendChild(input1);
			var input2 = document.createElement("input");
			input2.type ='hidden';
			input2.name ='attach_file['+i+'][size]';
			input2.value =size;
			nails[i].appendChild(input2);
			commendBtn.onclick = function(){
				picBox[0].innerHTML='';
				nameBox[0].innerHTML='';
				nails[i].removeChild(input_0);
				nails[i].removeChild(input1);
				nails[i].removeChild(input2);
				navigator.userAgent.indexOf("MSIE")>0?nails[i].uploadstatu=0:nails[i].setAttribute('uploadstatu',0);
				nails[i].removeChild(this);
				swfu.setButtonDisabled(false);
			}
			if (newImg.filters) {
				try {
					newImg.filters.item("DXImageTransform.Microsoft.Alpha").opacity = 0;
				} catch (e) {
					newImg.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + 0 + ')';
				}
			} else {
				newImg.style.opacity = 0;
			}
		
			newImg.onload = function () {
				fadeIn(newImg, 0);
			};
			newImg.src = src;
			return;
	  	}
	}
}
function initEditImg(src,fileid,filename)
{//alert(2);
	var nails = document.getElementById("thumbnails").getElementsByTagName('li');
	for(var i=0;i<nails.length;i++)
	{
		var addStatu = navigator.userAgent.indexOf("MSIE")>0?nails[i].uploadstatu:nails[i].getAttribute('uploadstatu');	
		if(addStatu==0){
			navigator.userAgent.indexOf("MSIE")>0?nails[i].uploadstatu=1:nails[i].setAttribute('uploadstatu',1);
			var newImg = document.createElement("img");
			newImg.style.margin = "1px";
			newImg.alt=filename;newImg.title=filename;
			var picBox=nails[i].getElementsByTagName('div');
			picBox[0].appendChild(newImg);
			var nameBox = nails[i].getElementsByTagName('h4');
			var input_0 = document.createElement("input");
			input_0.type = 'hidden';
			input_0.name = 'edit_file_id[]';
			input_0.value =  fileid;
			nails[i].appendChild(input_0);
			nameBox[0].title = filename;
			filename=filename.length>10?filename.substring(0,4)+'...'+filename.substring(filename.lastIndexOf('.')-3):filename;
			nameBox[0].innerHTML = filename;
			var commendBtn = document.createElement('a');
			commendBtn.href='javascript:void(0);';
			commendBtn.appendChild(document.createTextNode('删除'));
			nails[i].appendChild(commendBtn);
			commendBtn.onclick = function(){
				picBox[0].innerHTML='';
				nameBox[0].innerHTML='';
				nails[i].removeChild(input_0);
				navigator.userAgent.indexOf("MSIE")>0?nails[i].uploadstatu=0:nails[i].setAttribute('uploadstatu',0);
				nails[i].removeChild(this);
				swfu.setButtonDisabled(false);
			}
			if (newImg.filters) {
				try {
					newImg.filters.item("DXImageTransform.Microsoft.Alpha").opacity = 0;
				} catch (e) {
					newImg.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + 0 + ')';
				}
			} else {
				newImg.style.opacity = 0;
			}
		
			newImg.onload = function () {
				fadeIn(newImg, 0);
			};
			newImg.src = src;
			return;
	  	}
	}
}
function fadeIn(element, opacity) {
	var reduceOpacityBy = 5;
	var rate = 30;	// 15 fps


	if (opacity < 100) {
		opacity += reduceOpacityBy;
		if (opacity > 100) {
			opacity = 100;
		}

		if (element.filters) {
			try {
				element.filters.item("DXImageTransform.Microsoft.Alpha").opacity = opacity;
			} catch (e) {
				// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
				element.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(opacity=' + opacity + ')';
			}
		} else {
			element.style.opacity = opacity / 100;
		}
	}

	if (opacity < 100) {
		setTimeout(function () {
			fadeIn(element, opacity);
		}, rate);
	}
}



/* ******************************************
 *	FileProgress Object
 *	Control object for displaying file info
 * ****************************************** */

function FileProgress(file, targetID) {
	this.fileProgressID = "divFileProgress";

	this.fileProgressWrapper = document.getElementById(this.fileProgressID);
	if (!this.fileProgressWrapper) {
		this.fileProgressWrapper = document.createElement("div");
		this.fileProgressWrapper.className = "progressWrapper";
		this.fileProgressWrapper.id = this.fileProgressID;

		this.fileProgressElement = document.createElement("div");
		this.fileProgressElement.className = "progressContainer";

		var progressCancel = document.createElement("a");
		progressCancel.className = "progressCancel";
		progressCancel.href = "#";
		progressCancel.style.visibility = "hidden";
		progressCancel.appendChild(document.createTextNode(" "));

		var progressText = document.createElement("div");
		progressText.className = "progressName";
		progressText.appendChild(document.createTextNode(file.name));

		var progressBar = document.createElement("div");
		progressBar.className = "progressBarInProgress";

		var progressStatus = document.createElement("div");
		progressStatus.className = "progressBarStatus";
		progressStatus.innerHTML = "&nbsp;";

		this.fileProgressElement.appendChild(progressCancel);
		this.fileProgressElement.appendChild(progressText);
		this.fileProgressElement.appendChild(progressStatus);
		this.fileProgressElement.appendChild(progressBar);

		this.fileProgressWrapper.appendChild(this.fileProgressElement);

		document.getElementById(targetID).appendChild(this.fileProgressWrapper);
		fadeIn(this.fileProgressWrapper, 0);

	} else {
		this.fileProgressElement = this.fileProgressWrapper.firstChild;
		this.fileProgressElement.childNodes[1].firstChild.nodeValue = '';
	}

	this.height = this.fileProgressWrapper.offsetHeight;

}
FileProgress.prototype.setProgress = function (percentage) {
	this.fileProgressElement.className = "progressContainer green";
	this.fileProgressElement.childNodes[3].className = "progressBarInProgress";
	this.fileProgressElement.childNodes[3].style.width = percentage + "%";
};
FileProgress.prototype.setComplete = function () {
	this.fileProgressElement.className = "progressContainer blue";
	this.fileProgressElement.childNodes[3].className = "progressBarComplete";
	this.fileProgressElement.childNodes[3].style.width = "";

};
FileProgress.prototype.setError = function () {
	this.fileProgressElement.className = "progressContainer red";
	this.fileProgressElement.childNodes[3].className = "progressBarError";
	this.fileProgressElement.childNodes[3].style.width = "";

};
FileProgress.prototype.setCancelled = function () {
	this.fileProgressElement.className = "progressContainer";
	this.fileProgressElement.childNodes[3].className = "progressBarError";
	this.fileProgressElement.childNodes[3].style.width = "";

};
FileProgress.prototype.setStatus = function (status) {
	this.fileProgressElement.childNodes[2].innerHTML = status;
};

FileProgress.prototype.toggleCancel = function (show, swfuploadInstance) {
	this.fileProgressElement.childNodes[0].style.visibility = show ? "visible" : "hidden";
	if (swfuploadInstance) {
		var fileID = this.fileProgressID;
		this.fileProgressElement.childNodes[0].onclick = function () {
			swfuploadInstance.cancelUpload(fileID);
			return false;
		};
	}
};
