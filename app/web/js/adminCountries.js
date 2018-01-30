var jQuery_1_4_2 = $.noConflict();
(function ($) {
	$(function () {
		if ($('#frmCreateCountry').length > 0) {
			$('#frmCreateCountry').validate();
		}
		if ($('#frmUpdateCountry').length > 0) {
			$('#frmUpdateCountry').validate();
		}
		$('a.status').live("click", function (e) {
			e.preventDefault();
			var $this = $(this);
			$.ajax({
				type: "POST",
				data: {id: $this.attr("rev")},
				url: "index.php?controller=AdminCountries&action=set",
				success: function (result) {
					$("#middle_right").html(result);
				}
			});		
		});
	});
})(jQuery_1_4_2);