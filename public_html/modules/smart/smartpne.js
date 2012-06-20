function submitPager(a, id, order, element, pagerId, totalPageNum) {
	var url = "./?m=pc&a="+a+"&"+id+"&page="+page;
	if (order == "asc") {
		url += "&order="+order;
	}

	$.ajax({
        type: "GET",
        url: url,
        dataType: "json",
		cache:  false,
        beforeSend: function(xhr) {
			$.mobile.showPageLoadingMsg();
		},
        error: function(XMLHttpRequest, textStatus, errorThrown) {
			$.mobile.hidePageLoadingMsg();
			showDialog('ERROR', errorThrown);
			return false;
		},
        success: function(response) {
			// 出力
			// エラーの場合
			if (response['msg']) {
				showDialog('ERROR', response['msg']);
				return false;
			}

			// 本文
			if (order == "asc") {
	            $(element+":last").after(response['comment_list']);
			} else {
				var jumpId = $(element+":first").attr("id");
    	        $(element+":first").before(response['comment_list']);
			}


			// Pager
			if (totalPageNum > page) {
				page++;
			} else {
				$("#"+pagerId+" span.next").remove();
			}

			if (order != "asc") {
				jump_to(jumpId, '');
			}

			// 出力完了
			$.mobile.hidePageLoadingMsg();
			return false;
        }
	});
}

function jump_to(target, open){
	if ($("#"+open).attr("id")!==undefined) {
		$("#"+open).children().toggle(true);
	}

	if ($("#"+target).attr("id")!==undefined) {
		var p = $("#"+target).offset().top;
		$('html,body').animate({ scrollTop: p }, 'fast');
	}
}

function go_top(){
		var p = $("body").offset().top;
		$('html,body').animate({ scrollTop: p }, 'fast');
}

/* ダイアログの動的生成 */
function showDialog(header, msg) {
	// ダイアログの内容
	var dialog_html = [
		'<div data-role="page" id="Dialog">',
		'<div data-role="header"><h3>'+header+'</h3></div>',
		'<div data-role="content"><p>'+msg+'</p></div>',
		'</div>'
	].join('');

	// DOMに追加
	$('body').append($(dialog_html));
 
	// ダイアログを表示
	$.mobile.changePage('#Dialog', {
		transition: 'pop',
		role: 'dialog',
	});
}
