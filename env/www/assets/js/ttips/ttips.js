	
var ttips = {
	articleIds : {},
	currArticleId: 0,
	isOverToolOn: false,
	isInited: false, 
	isDebug: false,
	host: "http://localhost",
	init: function(showDebug,environment) {

		//
		if(typeof showDebug === "undefined") {
			ttips.isDebug = false;
		} else {
			ttips.isDebug = showDebug;
			ttips.log('ttips.isDebug:'+showDebug);			
		}

		//
		if(typeof environment === "undefined") {
			ttips.host = "http://localhost";
		} else {
			ttips.host = environment;			
		}
		ttips.log('ttips.host is:'+ttips.host);


		if(ttips.isInited){
			ttips.log('ttips.isInited already inited');			
			return;
		}

		ttiphtml ='';
		ttiphtml += '<div id="tooltip"><a class="tooltip-head-a" href="#" target="_blank" ><div id="tooltip-head" class="tooltip-head">';
		ttiphtml += '<img id="tooltip-head-img" src="" class="tooltip-img" ></div>';
		ttiphtml += '<div id="tooltip-cont" class="tooltip-cont">';
		ttiphtml += '<h4 id="tooltip-cont-h4" class="tooltip-tit" >&nbsp;</h4>';
		ttiphtml += '<p id="tooltip-cont-p" class="tooltip-txt">&nbsp;</p>';
		ttiphtml += '<div class="tooltip-cont-button"> <div class="tooltip-button">ver+</div></div>'
		ttiphtml += '</div><div id="tooltip-cont-div" class="tooltip-foot">';
		ttiphtml += '</div></a></div>';
		$('body').append(ttiphtml);
		
		//Hide Event
		window.addEventListener("click", e => {
			ttips.log('ttips.init > add window.click event');
		  	if(ttips.isOverToolOn) {
		  		$('#tooltip').hide();
		  		ttips.isOverToolOn = false;
				ttips.log('ttips.init > tooltip hidden');
		  	}
		});

		ttips.isInited = true;
		ttips.log('ttips.isInited inited');			
	},
	lookupArticle: function(articleId) {
		var u = ttips.host+"/api/article/"+articleId;
		ttips.log("ttip.lookupArticle "+ u);
		$.ajax({
			dataType: "json",
			url: u,
			success: function(data) {
				ttips.log("ttip.lookupArticle.ajax: success "+ u);
				ttips.articleIds[data.d.id] = data.d;
				ttips.addTooltip(data.d.id,data.d.postId,data.d.image,data.d.title,data.d.text,data.d.url);		
			},
			error: function( jqXHR, textStatus, errorThrown ) {
				ttips.logXHRError(jqXHR, textStatus, errorThrown);
		    },
		});	
	},
	hidrate: function(id,postId,image,title,text,url) {
		ttips.log("ttips.hidrate:",id,postId,image,title,text,url);
		var link = 'http://help.embluemail.com/?p='+postId;
		$('#tooltip > a.tooltip-head-a > div > img').attr('src',image);
		$('#tooltip > a.tooltip-head-a > div > h4').html(title);
		$('#tooltip > a.tooltip-head-a > div > p').html(text+'...');
		$('#tooltip > a.tooltip-head-a').attr('href',url);
	},
	addTooltip: function(id,postId,image,title,text,url) {
		ttips.log('ttips.addTooltip '+id);
		$('img[data-articleid="'+id+'"]').click(function(ev) {
			ttips.log('ttips.hidrate: id:'+id+', postId:'+postId+', image:'+image+', title:'+title+', text:'+text+', url:'+url); 
			ttips.hidrate(id,postId,image,title,text,url);
			ttips.currArticleId = id;
			if (id == "60" || id == "61" || id == "65" || id == "66") {
				altura = 250;
			} else {
				altura = 5;
			}
			ttips.log('event x:'+ev.pageX+' y:'+ev.pageY+' ttips.isOverToolOn:'+ttips.isOverToolOn);
			$('#tooltip').css({
		        left: ev.pageX + 5,
		        top: ev.pageY - altura
		    }).stop().show(400, function(ev) {
				ttips.isOverToolOn = true;
		    	ttips.log('ttips.addTooltip.click.show.isOverToolOn'+ttips.isOverToolOn);
		    });
		});
	},
	log: function(s){
		if(ttips.isDebug){
			console.log(s);
		}
	},
	logXHRError: function(jqXHR, textStatus, errorThrown) {
    	if (jqXHR.status === 0) {
			ttips.log('Not connect: Verify Network.');
		} else if (jqXHR.status == 404) {
			ttips.log('Requested page not found [404]');
		} else if (jqXHR.status == 500) {
			ttips.log('Internal Server Error [500].');
		} else if (textStatus === 'parsererror') {
			ttips.log('Requested JSON parse failed.');
		} else if (textStatus === 'timeout') {
			ttips.log('Time out error.');
		} else if (textStatus === 'abort') {
			ttips.log('Ajax request aborted.');
		} else {
			ttips.log('Uncaught Error: ' + jqXHR.responseText);
		}
	}
}

/*
function updateLabel(id,src){
	console.log(id);
	console.log(src);
	$(id).html($(src).val());
}*/

