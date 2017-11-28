// Usage:
//		jAlert( message, [title, callback] )
//		jConfirm( message, [title, callback] )
//		jPrompt( message, [value, title, callback] )
(function($) {
	
	$.alerts = {
		
		// These properties can be read/written by accessing $.alerts.propertyName from your scripts at any time
		
		verticalOffset: -75,                // vertical offset of the dialog from center screen, in pixels
		horizontalOffset: 0,                // horizontal offset of the dialog from center screen, in pixels/
		repositionOnResize: true,           // re-centers the dialog on window resize
		overlayOpacity: .01,                // transparency level of overlay
		overlayColor: '#FFF',               // base color of overlay
		draggable: true,                    // make the dialogs draggable (requires UI Draggables plugin)
		okButton: '&nbsp;确定&nbsp;',         // text for the OK button
		cancelButton: '&nbsp;取消&nbsp;', // text for the Cancel button
		dialogClass: null,                  // if specified, this class will be applied to all dialogs
		$popObj: null,
		
		// Public methods
		
		alert: function(message, title, callback) {
			if( title == null ) title = 'Alert';
			$.alerts._show(title, message, null, 'alert', function(result) {
				if( callback ) callback(result);
			});
		},
		
		success: function(message, title, callback) {
			if( title == null ) title = 'Success';
			$.alerts._show(title, message, null, 'success', function(result) {
				if( callback ) callback(result);
			});
		},
		
		confirm: function(message, title, callback, defaultbtn) {
			if( title == null ) title = 'Confirm';
			$.alerts._show(title, message, null, 'confirm', function(result) {
				if( callback ) callback(result);
			});
			//if (defaultbtn!=1) $("#popup_cancel").focus();
		},
			
		prompt: function(message, value, title, callback) {
			if( title == null ) title = 'Prompt';
			$.alerts._show(title, message, value, 'prompt', function(result) {
				if( callback ) callback(result);
			});
		},
		
		// Private methods
		
		_show: function(title, msg, value, type, callback) {
			
			$.alerts._hide();
			$.alerts._overlay('show');

			var doc = document.documentElement;
			var isSuportFullscreen = ('requestFullscreen' in doc) ||
				('mozRequestFullScreen' in doc && document.mozFullScreenEnabled) ||
				('webkitRequestFullScreen' in doc);

			var popDivstr = 
				  '<div id="popup_container">' +
				    '<div style="opacity: 0.3;" class="modal-backdrop"></div>' +
				    '<div id="popup_content" style="position: relative; background-color: white;">' +
				      '<div id="popup_message" style="font-size:18px;"></div>' +
					'</div>' +
				  '</div>';
			var $popObj = $(popDivstr);
			$.alerts.$popObj = $popObj;
			if (isSuportFullscreen && $('.fullscreenable').length>0) {
				$(window.top.document.body).find(".fullscreenable").append($popObj);
			} else {
				$(window.top.document.body).append($popObj);
			}
			//var $popObj = $("#popup_container");
			if( $.alerts.dialogClass ) $popObj.addClass($.alerts.dialogClass);
			
			// IE6 Fix
			var pos = 'fixed'; 
			
			$popObj.css({
				position: pos,
				zIndex: 99999,
				padding: 0,
				margin: 0
			});
			
			$popObj.find("#popup_content").addClass(type);
			//$popObj.find("#popup_message").text(msg);
			$popObj.find("#popup_message").html( msg.replace(/\n/g, '<br />') );
			
			$popObj.css({
				minWidth: $popObj.outerWidth(),
				maxWidth: $popObj.outerWidth()
			});
			
			$.alerts._reposition();
			$.alerts._maintainPosition(true);
			
			switch( type ) {
				case 'alert':
				case 'success':
					$popObj.find("#popup_message").after('<div id="popup_panel">'
						+ '<input class="modalbtn ok" type="button" value="' + $.alerts.okButton + '" id="popup_ok" />'
						+ '</div>');
					$popObj.find("#popup_ok").click( function() {
						$.alerts._hide();
						callback(true);
					});
					//$popObj.find("#popup_ok").focus();
					$popObj.find("#popup_ok").keypress( function(e) {
						if( e.keyCode == 13 || e.keyCode == 27 ) $popObj.find("#popup_ok").trigger('click');
					});
				break;
				case 'confirm':
					$popObj.find("#popup_message").after('<div id="popup_panel">'
						+ '<input class="modalbtn ok" style="" type="button" value="' + $.alerts.okButton + '" id="popup_ok" />'
						+ '<input class="modalbtn cancel" type="button" style="" value="' + $.alerts.cancelButton + '" id="popup_cancel" /></div>');
					$popObj.find("#popup_ok").click( function() {
						$.alerts._hide();
						if( callback ) callback(true);
					});
					$popObj.find("#popup_cancel").click( function() {
						$.alerts._hide();
						if( callback ) callback(false);
					});
					//$popObj.find("#popup_ok").focus();
					$popObj.find("#popup_ok, #popup_cancel").keypress( function(e) {
						if( e.keyCode == 13 ) $popObj.find("#popup_ok").trigger('click');
						if( e.keyCode == 27 ) $popObj.find("#popup_cancel").trigger('click');
					});
				break;
				case 'prompt':
					$popObj.find("#popup_message").append('<br /><input type="text" size="30" id="popup_prompt" />').after('<div id="popup_panel"><input type="button" style="background-color:#65bebe;border-color:#fff;color:#333;" value="' + $.alerts.okButton + '" id="popup_ok" /> <input type="button" style="background-color:#ececec;color:#000" value="' + $.alerts.cancelButton + '" id="popup_cancel" /></div>');
					$popObj.find("#popup_prompt").width( $("#popup_message").width() );
					$popObj.find("#popup_ok").click( function() {
						var val = $("#popup_prompt").val();
						$.alerts._hide();
						if( callback ) callback( val );
					});
					$popObj.find("#popup_cancel").click( function() {
						$.alerts._hide();
						if( callback ) callback( null );
					});
					$popObj.find("#popup_prompt, #popup_ok, #popup_cancel").keypress( function(e) {
						if( e.keyCode == 13 ) $popObj.find("#popup_ok").trigger('click');
						if( e.keyCode == 27 ) $popObj.find("#popup_cancel").trigger('click');
					});
					if( value ) $popObj.find("#popup_prompt").val(value);
					//$popObj.find("#popup_prompt").focus().select();
				break;
			}
			$popObj.find("#popup_ok, #popup_cancel").css({'height':'34px', 'line-height':'34px'});
			
			// Make draggable
			if( $.alerts.draggable ) {
				try {
					$popObj.draggable({ handle: $("#popup_content") });
				} catch(e) { /* requires jQuery UI draggables */ }
			}
		},
		
		_hide: function() {
			if (!!$.alerts.$popObj) {
				$.alerts.$popObj.remove();
			}
			$.alerts._overlay('hide');
			$.alerts._maintainPosition(false);
		},
		
		_overlay: function(status) {
			switch( status ) {
				case 'show':
					$.alerts._overlay('hide');
					$("BODY").append('<div id="popup_overlay"></div>');
					$("#popup_overlay").css({
						position: 'absolute',
						zIndex: 99998,
						top: '0px',
						left: '0px',
						width: '100%',
						height: $(document).height(),
						background: $.alerts.overlayColor,
						opacity: $.alerts.overlayOpacity
					});
				break;
				case 'hide':
					$("#popup_overlay").remove();
				break;
			}
		},
		
		_reposition: function() {
			if (!$.alerts.$popObj) return;
			var top = (($(window.top).height() / 2) - ($.alerts.$popObj.outerHeight() / 2)) + $.alerts.verticalOffset;
			var left = (($(window.top).width() / 2) - ($.alerts.$popObj.outerWidth() / 2)) + $.alerts.horizontalOffset;
			if( top < 0 ) top = 0;
			if( left < 0 ) left = 0;
			
			$.alerts.$popObj.css({
				top: top + 'px',
				left: left + 'px'
			});
			//$.alerts.$popObj.height( $(window.top.document).height() );
		},
		
		_maintainPosition: function(status) {
			if( $.alerts.repositionOnResize ) {
				switch(status) {
					case true:
						$(window).bind('resize', $.alerts._reposition);
					break;
					case false:
						$(window).unbind('resize', $.alerts._reposition);
					break;
				}
			}
		}
		
	}

	var alert_Timeout_Id = 0;
	var alert_Timeout_Inteval = 1300;

	$(window).unload(function() {
		if (alert_Timeout_Id!=0) {
			alert_Timeout_Id = 0;
			jClose();
		}
	});

	// Shortuct functions
	jAlert = function(message, title, callback) {
		$.alerts.alert(message, title, callback);
		alert_Timeout_Id = window.setTimeout(function () {
			alert_Timeout_Id = 0;
			jClose();
			if (callback) callback(true);
		}, alert_Timeout_Inteval);
	}
	
	// Shortuct functions
	jSuccess = function(message, title, callback) {
		$.alerts.success(message, title, callback);
		alert_Timeout_Id = window.setTimeout(function () {
			alert_Timeout_Id = 0;
			jClose();
			if (callback) callback(true);
		}, alert_Timeout_Inteval);
	}
	
	jConfirm = function(message, title, callback, defaultbtn) {
		if (defaultbtn==undefined)
			defaultbtn = 1;
		$.alerts.confirm(message, title, callback, defaultbtn);
	};
		
	jPrompt = function(message, value, title, callback) {
		$.alerts.prompt(message, value, title, callback);
	};

    jClose = function() {
		$.alerts._hide();
    }
	
})(jQuery);
