//----------------------Number Convertor--------------------------
function ConvertNumberToPersion() {
	persian = { 0: '۰', 1: '۱', 2: '۲', 3: '۳', 4: '۴', 5: '۵', 6: '۶', 7: '۷', 8: '۸', 9: '۹' };
	function traverse(el) {
		if (el.nodeType == 3) {
			var list = el.data.match(/[0-9]/g);
			if (list != null && list.length != 0) {
				for (var i = 0; i < list.length; i++)
					el.data = el.data.replace(list[i], persian[list[i]]);
			}
		}
		for (var i = 0; i < el.childNodes.length; i++) {
			traverse(el.childNodes[i]);
		}
	}
	traverse(document.body);
}
ConvertNumberToPersion();
//------------------------------------------------

$(document).ready(function () {

	//----------------------Adding or Remove Classes--------------------------
	$("footer div").removeClass("panel panel-heading panel-body panel-default box well");
	$("footer h4").removeClass("panel-title");
	$(".sidebar .foot-title div").removeClass("clearfix");
	$(".sidebar .panel.links ul").removeClass("foot-archive");
	$(".sidebar .panel.visits ul").removeClass("foot-visit");
	$(".sidebar .panel.box ul").removeClass("foot-comment");
	$("#carousel-example-generic .carousel-indicators li:first").addClass("active");
	$("#carousel-example-generic .carousel-inner .item:first").addClass("active");
	$(".wpcf7-form input[type=submit]").addClass("btn btn-primary");
	$(".wpcf7-form input[type=text], .wpcf7-form textarea, .wpcf7-form input[type=email]").addClass("form-control");
	//------------------------------------------------

});