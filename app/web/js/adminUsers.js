var jQuery_1_4_2 = $.noConflict();
(function ($) {
	$(function () {
		if ($('#frmCreateUser').length > 0) {
			$('#frmCreateUser').validate();
		}
		if ($('#frmUpdateUser').length > 0) {
			$('#frmUpdateUser').validate();
		}
		
		$('a.status').live("click", function (e) {
			e.preventDefault();
			var $this = $(this);
			$.ajax({
				type: "POST",
				data: {id: $this.attr("rev")},
				url: "index.php?controller=AdminUsers&action=set",
				success: function (result) {
					$("#middle_right").html(result);
				}
			});		
		});
	});
})(jQuery_1_4_2);