var url = "../assets/php/sitdshop.php";
var url2 = "../../../assets/php/sitdshop.php";
var type = "POST";
var preloader = "<img src='../assets/images/preloader.gif' height='50px' width='50px'>";

var imghold = '';

$('#emplogin').on('submit',function(e){

	e.preventDefault();

	if ($('input[name=username]').val().length == 7){



	var data = $('#emplogin').serialize();


	$.ajax({

		type: type,
		url: url,
		data: data+"&emplogin=",

		beforeSend : function(){

			$('#error').html(preloader);
			$('#login-button').hide();

		},

		success: function(data){

			if (data=="0"){

				$('#login-button').show();
				$('#error').html('<b>Incorrect username or password</b>');

			}else{

				$('#welcomename').html(data);
				$('#welcomename').addClass('form-success');

				$('form').fadeOut(500);
	 			$('.wrapper').addClass('form-success');

	 			setTimeout(function(){
	 				window.location.href = 'assets/pages/home.php';
	 			},1800);

			}

		}


	});


	}else{

		$('#error').html('Username must be 7 characters	');

	}

});

$('#newproductform').on('submit', function(e){


	e.preventDefault();

	var form_data = new FormData(this);
	var gross = $('#gross').val();
	var net = $('#net').val();

	net = parseInt(net);
	gross = parseInt(gross);

	console.log(gross);
	console.log(net);

	if (net>gross){
		$("#error").html('');
		var data = $('#newproductform').serialize();

		$.ajax({

			type: "POST",
			url: url2,
			data: data+"&newproduct=",

			success: function(data){

				if (data==1){

					$.ajax({

						type: "POST",
						url: "../../../assets/php/upload.php?pname="+$('input[name=pname]').val(),
						dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,

                        success: function(datax){

                        	if (datax=='OK'){
                        		$('#producttable').DataTable().ajax.reload();
								$('#newproductform')[0].reset();
                        	}else{
                        		$('#error').html(datax);
                        		$('#producttable').DataTable().ajax.reload();
                        		$('#newproductform')[0].reset();
                        		$('#imgprev').attr('src', '#');
                        	}

                        }

					});

				}else{
					$('#error').html(data);
				}
			}

		});

	}else{

		$("#error").html('Net Cost must be higher than Gross Cost');

	}

	

});

$('#editproductform').on('submit', function(e){


	e.preventDefault();

	var xxx = $('#eeditImg').val();


	var form_data = new FormData(this);
	var gross = $('#egross').val();
	var net = $('#enet').val();
 
	net = parseInt(net);
	gross = parseInt(gross);
 
	if (net>=gross){
		$("#eerror").html('');

		if (xxx == ''){
			var data = $('#editproductform').serialize();
		}else{
			var data = $('#editproductform').serialize();
			data = data+"&img="+imghold;
		}



		$.ajax({

			type: "POST",
			url: url2,
			data: data+"&product="+product+"&editproduct=",

			success: function(data){

				if (data==1){

					if (xxx != ''){

						$.ajax({

							type: "POST",
							url: "../../../assets/php/upload.php?pname="+$('input[name=ename]').val(),
							dataType: 'text',
	                        cache: false,
	                        contentType: false,
	                        processData: false,
	                        data: form_data,

	                        success: function(datax){

	                        	if (datax=='OK'){
	                        		$('#producttable').DataTable().ajax.reload();
									$('#editproductform')[0].reset();
	                        	}else{
	                        		$('#error').html(datax);
	                        		$('#editproductform')[0].reset();
	                        		$('#eimgprev').attr('src', '#');
	                        	}

	                        }

						});

					}
					$('#producttable').DataTable().ajax.reload();

				}else{
					$('#eerror').html(data);
				}
			}

		});

	}else{

		$("#error").html('Net Cost must be higher than Gross Cost');

	}

	

});


$('#edit').on('click', function(){

	var img =  $('#row'+product).find('td').eq(0).html();
	var name = $('#row'+product).find('td').eq(1).html();
	var desc = $('#row'+product).find('td').eq(2).html();
	var categ = $('#row'+product).find('td').eq(3).html();
	var gross = $('#row'+product).find('td').eq(4).html();
	var net = $('#row'+product).find('td').eq(5).html();
	var ini = $('#row'+product).find('td').eq(6).html();
	var qty = $('#row'+product).find('td').eq(7).html();

	$('#ename').val(name);
	$('#edesc').parent().parent().find('.jqte_editor').html(desc);
	$('#ecateg option[value="'+categ+'"]').prop('selected', true);
	$('input[name=egross]').val(gross);
	$('input[name=enet]').val(net);
	$('input[name=eqty]').val(qty);

	img = img.substr(10);
	img = img.slice(0, -80);

	$('#eimgprev').attr('src',img);

	imghold = img;



});


$('#delete').on('click', function(){

	swal({
	        title: "Are you sure?",
	        text: "You will not be able to recover this transaction record!",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Pull Out",
	        cancelButtonText: "No, cancel!",
	        closeOnConfirm: false,
	        closeOnCancel: false
	    }, function (isConfirm) {
	        if (isConfirm) {
	        	
	        	$.ajax({
	        		url: url2,
	        		type: 'POST',
	        		data: {product:product, deleteitem:0},
	        		success: function(data){
	        			if(data == 1){
	        				swal("Removed!", "Your transaction record has been remove.", "success");
	        				$('#producttable').DataTable().ajax.reload();
	        			}else{
	        				swal("Failed!", "Your transaction record is failed to remove.", "error");
	        			}
	        		}
	        	});
	        } else {
	            swal("Cancelled", "Your transaction record is safe :)", "success");
	        }
	    });


});


function loadProduct(){
   $('#producttable').dataTable( {
    responsive: true,
    "processing": true,
    "serverSide": true,
    "ajax": "../../../assets/php/productData.php",
    "order": [1, 'asc'],
    createdRow: function (row, data, index) {
            $(row).attr('id', 'row'+data[10]);
       
    }
   
    
    
  });
}


function loadNotifCount(){

	$.ajax({

		type: "POST",
		url: url2,
		data: {loadnotif:1},

		success: function(data){

			$('#notifcount').html(data);

		}

	});


}


$(document).ready(function(){

	loadNotifCount();

})