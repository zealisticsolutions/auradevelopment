var jQuery_1_4_2 = $.noConflict();
(function ($) {
	$(function () {
		if ($("#tabs").length > 0) {
			$("#tabs").tabs({
				select: function (event, ui) {
					$(":input[name='tab_id']").val(ui.panel.id);
				}
			});
		}
		if ($('#frmCreateListing').length > 0) {
			$('#frmCreateListing').validate();
		}
			
		if ($('#frmUpdateListing').length > 0) {
			
			var container = $('div.middle_errors');
			var validator = $("#frmUpdateListing").validate({
				errorContainer: container,
				errorLabelContainer: $("ol", container),
				wrapper: 'li',
				meta: "validate"
			});
			
			tinyMCE.init({
				// General options
				mode : "textareas",
				theme : "simple",
				editor_selector : "mceEditor",
				editor_deselector : "mceNoEditor",
				plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

				// Theme options
				theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left"
			});
	
			$("a.fancybox").fancybox();
			$("a.del-pic").live("click", function (e) {
				e.preventDefault();
				if (confirm("Are you sure you want to delete selected picture?")) {
					$this = $(this);
					$.ajax({
						type: "POST",
						data: {id: $this.attr("rev").split("-")[0], foreign_id: $this.attr("rev").split("-")[1]},
						url: $this.attr("href"),
						success: function (res) {
							var r = $(res).find("a.fancybox").fancybox().end();
							$($this.attr("rel")).html(r);
						}
					});
				}
			});
			$("a.status-pic").live("click", function (e) {
				e.preventDefault();
				$this = $(this);
				$.ajax({
					type: "POST",
					data: {id: $this.attr("rev").split("-")[0], foreign_id: $this.attr("rev").split("-")[1]},
					url: $this.attr("href"),
					success: function (res) {
						var r = $(res).find("a.fancybox").fancybox().end();
						$($this.attr("rel")).html(r);
					}
				});
			});			
		}
		$('a.status').live("click", function (e) {
			e.preventDefault();
			var $this = $(this);
			$.ajax({
				type: "POST",
				data: {id: $this.attr("rev")},
				url: "index.php?controller=AdminListings&action=set",
				success: function (result) {
					$("#middle_right").html(result);
				}
			});		
		});
	});
})(jQuery_1_4_2);