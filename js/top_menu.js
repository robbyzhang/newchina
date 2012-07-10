$(document).ready(function() {
	$("#btn_login").click(function(){
		$("#div_top_menu").hide();
		$("#div_login_loading").show();
		$("#frm_login").ajaxSubmit(function(){
			$("#div_top_menu").show();
			$("#div_login_loading").hide();
		});
		return false;
	});
});