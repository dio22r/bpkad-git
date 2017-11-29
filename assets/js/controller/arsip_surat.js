var arsip_surat = {
	init: function() {
		// declare event for diteruskan kepada
		$("input.dit-others").on("click", function (e) {
			var len = $("input.dit-others:checked").length;
			if (len == 1) {
				$(this).parent().parent().siblings(".hidden-warper").show();
			} else {
				$(this).parent().parent().siblings(".hidden-warper").hide();
			}
		});

		var as_diteruskan = $("select[name='as_diteruskan']").val();
		if (as_diteruskan == "Lain-lain ...") {
			$("select[name='as_diteruskan']").siblings(".hidden-warper").show();
		}


		// declare event for dengan hormat harap
		$("input.ket-others").on("click", function (e) {
			var len = $("input.ket-others:checked").length;
			if (len == 1) {
				$(this).parent().parent().siblings(".hidden-warper").show();
			} else {
				$(this).parent().parent().siblings(".hidden-warper").hide();
			}
		});

		var as_ket = $("select[name='as_ket']").val();
		if (as_ket == "Lain-lain ...") {
			$("select[name='as_ket']").siblings(".hidden-warper").show();
		}

		// deklarasi datepicker
		$( "#tgl-surat" ).datepicker({
			dateFormat : 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		});

		$( "#tgl-terima" ).datepicker({
			dateFormat : 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		});
	},

	form_validation: function() {
		
	}
};


$(document).ready(function() {
    arsip_surat.init();

});
