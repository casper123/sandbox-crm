var grand_total = 0;
var url = $("#site_url").val();
$("#send-invoice").on("click",function(){
	var url = $("#site_url").val();
	var invoice_details = create_invoice_form_data();
	var data = [];
	if(invoice_details){
		data.push({
				"reciept_no" : $("#receipt_no").html().trim(),
				"billed_amount" : $("#grand_total").html().trim(),
				"team_id" : $("#team_id").html().trim(),
				"generated_for_month" : $("#generated_for_month").html().trim()
			});
	}
	
	swal({ title: "Sending Invoice!", text: "Process Start.....", timer: 20000, showConfirmButton: false });
	
	$.ajax({
	  type: "POST",
	  url: url+"invoice/send/"+$("#team_id").html().trim(),
	  data: {"data" : data, "invoice_details" : invoice_details},
	  dataType : 'json',
	  success: function(data){
	  	if(data.success == true){
	  		swal("Invoice Has Been Send!", "", "success");
	  		window.location.href = $("#site_url").val()+"/teams";
	  	}else{
	  		swal("Info!", "Unknown Error", "info");
	  	}
	  	return;
	  }
	});
});

$(".quantity").on("keyup", function(){
	var id_temp = this.id.split("_");
	var id = id_temp[1];
	var price = $("#price_"+id).val();
	var quantity = this.value;
	$("#amount_"+id).val(quantity*price);
	grand_total = 0;
	recalculate_grand_total();
	return;
});

$(".price").on("keyup", function(){
	var id_temp = this.id.split("_");
	var id = id_temp[1];
	var price = this.value;
	var quantity =  $("#quantity_"+id).val();
	$("#amount_"+id).val(quantity*price);
	grand_total = 0;
	recalculate_grand_total();
	return;
});

function recalculate_grand_total(){
	$(".amount").each(function() {
		console.log(parseInt($(this).val()));
		if(parseInt($(this).val()) > 0)
	   		grand_total = parseInt(grand_total) + parseInt($(this).val());
	});	
	$("#grand_total").html(grand_total);
}


function create_invoice_form_data(){
	var data = [];
	$(".product_name").each(function(){
		var id_temp = this.id.split("_");
		var id = id_temp[1];

		if((parseInt($("#amount_"+id).val()) > 0) && (parseInt($("#price_"+id).val()) > 0)){
			data.push({
				"category" : $("#category_"+id).val(),
				"product_name" : $("#product_"+id).val(),
				"quantity" : $("#quantity_"+id).val(),
				"price" : $("#price_"+id).val(),
				"amount" : $("#amount_"+id).val()
			});
		}
	});
	console.log(data);
	return data;
}

function load_recieved_info(invoice_id){
	$.ajax({
		  type: "POST",
		  url: url+"invoice/ajax",
		  data: {"invoice_id" : invoice_id,"load_invoice" : 1},
		  dataType : 'json',
		  success: function(response){
		  	if(response){
		  		$("#billed_amount").val(response.billed_amount);
		  		$("#team_name").val(response.team_name);
		  		$("#generated_for_month").val(response.generated_for_month);
		  		$("#reciept_no").val(response.reciept_no);
		  		$("#invoice_id").val(response.id);
		  	}
		  	return;
		  }
	});
}

function save_invoice(){
	if($("#recived_amount").val() == ''){
		swal({ title: "Alert!", text: "Recived amount required.", timer: 2000, showConfirmButton: false });
		return;
	}
	swal({ title: "Sending Invoice!", text: "Process Start.....", timer: 200000, showConfirmButton: false });
	$.ajax({
		  type: "POST",
		  url: url+"invoice/ajax",
		  data: {"save_invoice" : 1,"invoice_id" : $("#invoice_id").val(), "desc" : $("#description").val(),"recived_amount" : $("#recived_amount").val(), "reciept_no" : $("#reciept_no").val()},
		  dataType : 'json',
		  success: function(response){
		  	location.reload();
		  	return;
		  }
	});
}

$("#custom_invoice_team_id").on("change",function(){
	if(this.value == "other"){
		$(".other_fields").show();
	}else{
		$(".other_fields").hide();
	}
});

$(".request_id_name").on("click", function(){
	var id = $(this).attr("id");
	var currentDisplay = $("#followup_" + id).css("display");

	if (currentDisplay == "none")
		$("#followup_" + id).css("display", "block");
	else
	$("#followup_" + id).css("display", "none");

});