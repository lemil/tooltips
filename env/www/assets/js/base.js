


$(document).ready(function() {
	basejs.init(false);
 });

var basejs = {
	isDebug: false,
	isInited: false,
	init: function (showDebug) {
		//
		if(typeof showDebug === "undefined") {
			basejs.isDebug = false;
		} else {
			basejs.isDebug = showDebug;
			basejs.log('basejs.isDebug:'+showDebug);			
		}
		//
		if(basejs.isInited){
			basejs.log('basejs.isInited already inited');			
			return;
		}

		//Add Clippy
		clippy.addClipboardCopy();

		//
		
	},
	log: function(s){
		if(basejs.isDebug){
			console.log(s);
		}
	}
};


var clippy = {
	addClipboardCopy: function() {
		var mnuhtml = '';
		mnuhtml += "<input type='text' style='display:none' value='Hello World' id='clipboardtxt'>";
		$('body').after(mnuhtml);
	},
	copyToClipboard: function (text) {
	  var copyText = $("#clipboardtxt").val(text);
	  copyText.select();
	  document.execCommand("copy");
	  basejs.log("clippy.copyToClipboard : " + copyText.value);
	}
};