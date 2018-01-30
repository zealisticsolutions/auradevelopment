var jQuery_1_4_2 = $.noConflict();
(function ($) {
	$(function () {
		if ($('#frmCreateCategory').length > 0) {
			$('#frmCreateCategory').validate();
		}
		if ($('#frmUpdateCategory').length > 0) {
			$('#frmUpdateCategory').validate();
		}
		$('a.status').live("click", function (e) {
			e.preventDefault();
			var $this = $(this);
			$.ajax({
				type: "POST",
				data: {id: $this.attr("rev")},
				url: "index.php?controller=AdminCategories&action=set",
				success: function (result) {
					$("#middle_right").html(result);
				}
			});		
		});
	});
})(jQuery_1_4_2);