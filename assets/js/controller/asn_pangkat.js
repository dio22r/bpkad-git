function asn_pangkat(config) {
	this.urlData = "";

	this.init = function(config) {
		this.urlData = config.urlData;
		that = this;

		$(".datepicker").datepicker({
			orientation: "bottom auto",
			autoclose: true
		});

		$('.select2').select2({
		  selectOnClose: true
		});

		$('.asn').on('select2:select', function (e) {
			var urlData = that.urlData
		    var data = e.params.data;
		    var curEl = $(this);

			$.ajax({
	            type: "POST",
	            url: urlData,
	            data: {'id':data.id},
	            dataType: "json",
	            cache: false,
	            success: function(data) {
	                console.log(data);
            		var thiselement = $(".asn-detail");
					thiselement.fadeIn();

					thiselement.find(".data-nip").html("<b>NIP. :</b> " + data.arr_data.ta_nip);
					thiselement.find(".data-pangkat").html("<b>Pangkat :</b> " + data.arr_data.ta_pangkat);
					thiselement.find(".data-jabatan").html("<b>Jabatan :</b> " + data.arr_data.ta_jabatan);
	            },
	            error: function() {
	                console.log("error");
	            }
	        });
		});
	};
	
	this.init(config);
}


$(document).ready(function() {
	var asnPangkat = new asn_pangkat(config);
});