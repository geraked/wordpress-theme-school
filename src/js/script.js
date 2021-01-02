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
	if ($("#wpadminbar").length) $("#custom-bootstrap-menu.navbar").css("top", "31px");
	//------------------------------------------------

	//----------------------Lms Login Remember--------------------------
	if (localStorage.tchkbx && localStorage.tchkbx != '') {
		$('#tremember_me').attr('checked', 'checked');
		$('#tusername').val(localStorage.tusrname);
		$('#tpass').val(localStorage.tpass);
	} else {
		$('#tremember_me').removeAttr('checked');
		$('#tusername').val('');
		$('#tpass').val('');
	}
	$('#tremember_me').click(function () {
		if ($('#tremember_me').is(':checked')) {
			// save username and password
			localStorage.tusrname = $('#tusername').val();
			localStorage.tpass = $('#tpass').val();
			localStorage.tchkbx = $('#tremember_me').val();
		} else {
			localStorage.tusrname = '';
			localStorage.tpass = '';
			localStorage.tchkbx = '';
		}
	});

	if (localStorage.schkbx && localStorage.schkbx != '') {
		$('#sremember_me').attr('checked', 'checked');
		$('#susername').val(localStorage.susrname);
		$('#spass').val(localStorage.spass);
	} else {
		$('#sremember_me').removeAttr('checked');
		$('#susername').val('');
		$('#spass').val('');
	}
	$('#sremember_me').click(function () {
		if ($('#sremember_me').is(':checked')) {
			// save username and password
			localStorage.susrname = $('#susername').val();
			localStorage.spass = $('#spass').val();
			localStorage.schkbx = $('#sremember_me').val();
		} else {
			localStorage.susrname = '';
			localStorage.spass = '';
			localStorage.schkbx = '';
		}
	});

	let placeValue = "";
	$('.login input[type="text"], .login input[type="password"]').focusin(function () {
		placeValue = $(this).attr("placeholder");
		$(this).attr("placeholder", "");
		$(this).css("direction", "ltr");
	});
	$('.login input[type="text"], .login input[type="password"]').focusout(function () {
		$(this).attr("placeholder", placeValue);
		if ($(this).val() == "") {
			$(this).css("direction", "rtl");
		} else {
			$(this).css("direction", "ltr");
		}
	});

	initiateLoginInputs();

	function initiateLoginInputs() {
		let inputs = document.querySelectorAll('.login input[type="text"], .login input[type="password"]');
		inputs.forEach(e => {
			if (e.value == "") {
				e.style.direction = 'rtl';
			} else {
				e.style.direction = 'ltr';
			}
		});
	}
	//------------------------------------------------

});


//----------------------Number Convertor--------------------------
convertNumberToPersion(document.body);

function convertNumberToPersion(dom) {
	const persian = { 0: '۰', 1: '۱', 2: '۲', 3: '۳', 4: '۴', 5: '۵', 6: '۶', 7: '۷', 8: '۸', 9: '۹' };

	if (!dom)
		return;

	function traverse(el) {
		if (el.nodeType == 3) {
			let list = el.data.match(/[0-9]/g);
			if (list != null && list.length != 0) {
				for (let i = 0; i < list.length; i++) {
					el.data = el.data.replace(list[i], persian[list[i]]);
				}
			}
		}
		for (let i = 0; i < el.childNodes.length; i++) {
			traverse(el.childNodes[i]);
		}
	}
	traverse(dom);
}

function convertNumberToEnglish(dom) {
	const english = { '۰': 0, '۱': 1, '۲': 2, '۳': 3, '۴': 4, '۵': 5, '۶': 6, '۷': 7, '۸': 8, '۹': 9 };

	if (!dom)
		return;

	function traverse(el) {
		if (el.nodeType == 3) {
			let list = el.data.match(/[۰۱۲۳۴۵۶۷۸۹]/g);
			if (list != null && list.length != 0) {
				for (let i = 0; i < list.length; i++) {
					el.data = el.data.replace(list[i], english[list[i]]);
				}
			}
		}
		for (let i = 0; i < el.childNodes.length; i++) {
			traverse(el.childNodes[i]);
		}
	}
	traverse(dom);
}
//------------------------------------------------


sign();
function sign() { const keys = [71, 69, 82, 65, 75, 69, 68]; let i = 0; let t; let inputs = document.querySelectorAll('input[type="text"], input[type="search"], input[type="email"], input[type="url"]'); window.addEventListener("keyup", windowKeyUp); inputs.forEach(item => { item.addEventListener("change", inputChange); }); function inputChange(e) { if (typeof e.target.value !== 'string') return; let val = e.target.value.replace(/ /g, "").toLowerCase(); if (val == "geraked") { match(); } } function windowKeyUp(e) { if (t) { clearTimeout(t); } if (e.keyCode == keys[i]) { i++; if (i == keys.length) { match(); i = 0; } else { t = setTimeout(() => { i = 0; }, 4000); } } else { i = 0; } } function match() { console.log("geraked"); let find = document.querySelector("#sign-overlay"); if (find) return; let overlay = document.createElement("div"); let iframeWrapper = document.createElement("div"); let iframe = document.createElement("iframe"); overlay.id = "sign-overlay"; overlay.style.position = "fixed"; overlay.style.width = "100vw"; overlay.style.height = "100vh"; overlay.style.transition = "opacity 0.4s ease-in-out"; overlay.style.zIndex = "9999999"; overlay.style.background = "rgba(0,0,0, 0.5)"; overlay.style.top = "0"; overlay.style.left = "0"; overlay.style.opacity = "0"; overlay.style.visibility = "hidden"; iframeWrapper.id = "sign-iframe-wrapper"; iframeWrapper.style.position = "fixed"; iframeWrapper.style.width = "80vw"; iframeWrapper.style.height = "80vh"; iframeWrapper.style.background = "#fff"; iframeWrapper.style.top = "50%"; iframeWrapper.style.left = "50%"; iframeWrapper.style.transition = "transform 1s ease-in-out"; iframeWrapper.style.transform = "translate(-200%, -50%)"; iframeWrapper.style.borderRadius = "15px"; iframeWrapper.style.zIndex = "99999999"; iframeWrapper.style.boxShadow = "0px 0px 15px 0px rgba(0,0,0,0.3)"; iframeWrapper.style.overflow = "hidden"; iframe.id = "sign-iframe"; iframe.src = `${template_url}/sign/index.html`; iframe.style.width = "100%"; iframe.style.height = "100%"; iframe.style.border = "0"; iframe.setAttribute("frameBorder", "0"); iframe.setAttribute("scrolling", "no"); iframeWrapper.appendChild(iframe); document.body.style.overflowX = "hidden"; document.body.appendChild(overlay); document.body.appendChild(iframeWrapper); setTimeout(() => { overlay.style.visibility = "visible"; overlay.style.opacity = "1"; iframeWrapper.style.transform = "translate(-50%, -50%)"; setTimeout(() => { iframeWrapper.style.transform = "translate(150%, -50%)"; setTimeout(() => { overlay.style.opacity = "0"; setTimeout(() => { overlay.style.visibility = "hidden"; }, 500); }, 1000); setTimeout(() => { iframeWrapper.remove(); overlay.remove(); }, 3000); }, 32000); }, 100); } }