var jQuery_1_4_2 = $.noConflict();
(function ($) {
	$(function () {
		if ($('#frmLoginAdmin').length > 0) {
			$('#frmLoginAdmin').validate({
				rules: {
					login_username: "required",
					login_password: "required"
				}
			});
		}
	});
})(jQuery_1_4_2);