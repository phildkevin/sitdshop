$(document).ready(function(){
	$(document).on('click','.viewOrder',function(){
		var id = $(this).attr('data-id');
		window.location.href = '../pages/transaction-review.php?r='+id;
	});

	$(document).on('click','.removeOrder',function(){
		var id = $(this).attr('data-id');
		swal({
	        title: "Are you sure?",
	        text: "You will not be able to recover this transaction record!",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes, remove it!",
	        cancelButtonText: "No, cancel!",
	        closeOnConfirm: false,
	        closeOnCancel: false
	    }, function (isConfirm) {
	        if (isConfirm) {
	        	$.ajax({
	        		url: '../../php/php-crud.php',
	        		type: 'POST',
	        		data: "id="+id+"&action=removeRecord",
	        		success: function(data){
	        			if(data == 1){
	        				swal("Removed!", "Your transaction record has been remove.", "success");
	        				window.location.href = "orders.php";
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

	$(document).on('click','.inactiveStatus',function(){
		var id = $(this).attr('data-id');
		swal({
	        title: "Ban?",
	        text: "Do you really want to ban this account?",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes, ban it!",
	        cancelButtonText: "No, cancel!",
	        closeOnConfirm: false,
	        closeOnCancel: false
	    }, function (isConfirm) {
	        if (isConfirm) {
	        	$.ajax({
	        		url: '../../php/php-crud.php',
	        		type: 'POST',
	        		data: "id="+id+"&action=inactiveStatus",
	        		success: function(data){
	        			swal("Deactivate!", "This account has been deactivated.", "success");
	        			window.location.href = "users.php";
	        		}
	        	});
	        } else {
	            swal("Cancelled", "Your user record is safe :)", "success");
	        }
	    });
	});

	$(document).on('click','.activeStatus',function(){
		var id = $(this).attr('data-id');
		swal({
	        title: "Activate?",
	        text: "Do you really want to activate this account?",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes, activate it!",
	        cancelButtonText: "No, cancel!",
	        closeOnConfirm: false,
	        closeOnCancel: false
	    }, function (isConfirm) {
	        if (isConfirm) {
	        	$.ajax({
	        		url: '../../php/php-crud.php',
	        		type: 'POST',
	        		data: "id="+id+"&action=activeStatus",
	        		success: function(data){
	        			swal("Activate!", "This account has been activated.", "success");
	        			window.location.href = "users.php";
	        		}
	        	});
	        } else {
	            swal("Cancelled", "Your user record is safe :)", "success");
	        }
	    });
	});

	$(document).on('click','.viewStatus',function(){
		var id = $(this).attr('data-id');
		$.ajax({
			url: '../../php/php-crud.php',
			type: 'POST',
			data: {id:id, action:"viewStatus"},
			success: function(data){
				$('.user-profile-content').html(data);
				$('#user_profile').modal('show');
			}
		});
	});

	//Transaction Review
	$('.btn-view-less').hide();
	$('#btn-view-more').on('click', function(){
		$('.btn-view-more').hide();
		$('.btn-view-less').show();
	});
	$('#btn-view-less').on('click', function(){
		$('.btn-view-less').hide();
		$('.btn-view-more').show();
	})
	$('#confirm-payment').on('click', function(){
		var order_id = document.getElementById('order-id').innerHTML;
		$.ajax({
			url: "../../php/php-crud.php",
			type: 'POST',
			data: "id="+order_id+"&action=confirmPayment",
			success: function(data){
				if(data == 1){
					swal("Confirmed!", "Your transaction record has been confirm.", "success");
				}else{
					swal("Failed!", "Your transaction record is failed to confirm.", "error");
				}
			}
		});
	});
	$('#hold-payment').on('click', function(){
		var order_id = document.getElementById('order-id').innerHTML;
		$.ajax({
			url: "../../php/php-crud.php",
			type: 'POST',
			data: "id="+order_id+"&action=holdPayment",
			success: function(data){
				if(data == 1){
					swal("Held!", "Your transaction record has been hold.", "success");
				}else{
					swal("Failed!", "Your transaction record is failed to hold.", "error");
				}
			}
		});
	});
	$('#decline-payment').on('click', function(){
		var order_id = document.getElementById('order-id').innerHTML;
		$.ajax({
			url: "../../php/php-crud.php",
			type: 'POST',
			data: "id="+order_id+"&action=declinePayment",
			success: function(data){
				if(data == 1){
					swal("Declined!", "Your transaction record has been decline.", "success");
				}else{
					swal("Failed!", "Your transaction record is failed to decline.", "error");
				}
			}
		});
	});

	//Edit Profile
	$("#cancel-function").hide();
	$("#save-function").hide();

	$('#edit-profile').on('click', function(){
		$(".profile-control").prop('disabled', false);
		$('#change-profile').prop('disabled', true);
		$("#edit-function").hide();
		$("#cancel-function").show();
		$("#save-function").show();
	});

	$("#cancel-edit").on('click', function(){
		$(".profile-control").prop('disabled', true);
		$('#change-profile').prop('disabled', false);
		$("#edit-function").show();
		$("#cancel-function").hide();
		$("#save-function").hide();
	});

	$("#form_advanced_validation").on('submit', function(e){
		e.preventDefault();
		var form_data = new FormData(this);
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var contact = $("#contact").val();
		var email = $("#email").val();
		var address = $("#address").val();
		$.ajax({
			url: "../../php/php-crud.php",
			type: "POST",
			data: "firstname="+firstname+"&lastname="+lastname+"&contact="+contact+"&email="+email+"&address="+address+"&action=validateProfile",
			success: function(data){
				if(data == "01"){
					swal("Failed!", "Email already exist.", "error");
				}else if(data == "10"){
					swal("Failed!", "Contact already exist.", "error");
				}else if(data == "11"){
					swal("Failed!", "Contact and Email already exist.", "error");
				}else{
					$.ajax({
						type: "POST",
						url: "../../php/php-upload.php",
						dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        success: function(datax){
							window.location.href = "profile.php";
                        }
					});
				}
			}
		});
	});

	$("#change-profile").on('click', function(){
		$('#change_password_modal').modal('show');
	});

	$("#form_change_password").on('submit', function(e){
		e.preventDefault();
		var password = $('#password').val();
		var new_p = $('#new_password').val();
		var confirm_p = $('#confirm_password').val();
		$.ajax({
			url: '../../php/php-crud.php',
			type: 'POST',
			data: "password="+password+"&new_p="+new_p+"&confirm_p="+confirm_p+"&action=confirmPassword",
			success: function(data){
				if(data == 1){
					swal("Failed!", "Your new password does not consist of alphanumeric characters and must have atleast 7 alphanumeric characters!", "error");
				}else if(data == 2){
					swal("Failed!", "Current password does not match!", "error");
				}else if(data == 3){
					swal("Failed!", "Confirm password!", "error");
				}else if(data == 4){
					swal("Failed!", "Your current password must not match to your new password!", "error");
				}else{
					swal("Success!", "Your successfully changed your password!", "success");
					$('#form_change_password')[0].reset();
					$('#change_password_modal').modal('hide');
				}
			}
		}); 
	});

	$('#new_employee').on('click', function(){
		$("#user_id").val("UR"+random());
		$("#username").val(random());
		$("#password").val(random_password());
		$('#new_employee_modal').modal('show');
	});

	$("#form_new_employee").on('submit', function(e){
		e.preventDefault();
		var user_id = $("#user_id").val();
		var username = $("#username").val();
		var password = $("#password").val();
		swal({
	        title: "New Employee?",
	        text: "Are you sure you want to add this employee?",
	        type: "warning",
	        showCancelButton: true,
	        confirmButtonColor: "#DD6B55",
	        confirmButtonText: "Yes, add it!",
	        cancelButtonText: "No, cancel!",
	        closeOnConfirm: false,
	        closeOnCancel: false
	    }, function (isConfirm) {
	        if (isConfirm) {
	        	$.ajax({
					url: "../../php/php-crud.php",
					type: "POST",
					data: "username="+username+"&user_id="+user_id+"&password="+password+"&action=newEmployee",
					success: function(data){
						if(data == 0){
							window.location.href = "users.php";
						}else{
							swal("Failed!", "Failed to add new employee!", "error");
						}
					}
				});
	        } else {
	            swal("Cancelled", "Your transaction record is safe :)", "success");
	        }
	    });
	});

	//Report Table Load
	$('#report-transaction').load("reports-table.php?action=report-transaction");
	$('#report-sales').load("reports-table.php?action=report-sales");
	$('#report-inventory').load("reports-table.php?action=report-inventory");
	var report = 'report-transaction';
	$(document).on('click','.menu-tab',function(){
		report = $(this).attr('data-id');
	});

	$('.form-report-sort').on('submit', function(e){
		e.preventDefault();
		var date_start = $('#start').val();
		var date_end = $('#end').val();
		$.ajax({
			url: "reports-table.php?action="+report,
			type: "POST",
			data: "start="+date_start+"&end="+date_end,
			success: function(data){
				$('#'+report).html(data);
			}
		});
	});

	$('#btn-view-all').on('click', function(){
		$('#report-transaction').load("reports-table.php?action=report-transaction");
		$('#report-sales').load("reports-table.php?action=report-sales");
		$('#report-inventory').load("reports-table.php?action=report-inventory");
	});

	$('#btn-print').on('click',function(){
		var date_start = $('#start').val();
		var date_end = $('#end').val();
		if(date_start == '' && date_end == ''){
			window.location.href = '../../php/php-to-print.php?action='+report;
		}else{
			window.location.href = '../../php/php-to-print.php?start='+date_start+'&end='+date_end+'&action='+report;
		}
	});
});

function random(){
	var number = "0123456789";
	var length = 7;
	var string = '';
	for(var i = 0; i<length; i++){
		var rnum = Math.floor(Math.random()*number.length);
		string += number.substring(rnum, rnum+1);
	}
	return string;
}

function random_password(){
	var number = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
	var length = 8;
	var string = '';
	for(var i = 0; i<length; i++){
		var rnum = Math.floor(Math.random()*number.length);
		string += number.substring(rnum, rnum+1);
	}
	return string;
}