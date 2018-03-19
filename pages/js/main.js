var url   = "php/main.php";

$('#reg_pass, #reg_pass2').on('keyup', function () {
    if ($('#reg_pass').val() == $('#reg_pass2').val()) {
        $('#mess').html('Password Match').css('color', 'green');
    } else {
        $('#mess').html('Password Mismatch').css('color', 'red');
    }
});

$('#new_pass, #new_pass2').on('keyup', function () {
    if ($('#new_pass').val() == $('#new_pass2').val()) {
        $('#mess2').html('Password Match').css('color', 'green');
    } else {
        $('#mess2').html('Password Mismatch').css('color', 'red');
    }
});



/* LOGOUT */

$('.logoutBtn').on('click',function(){

  swal({

    title: 'Logout',
    text: "Are you sure you want to exit",
    type: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm!'
  }).then(function () {
    window.location.href = '../php/logout.php';
  })
});

/* LOGOUT */

/* LOGOUT */

$('.logoutBtn2').on('click',function(){

  swal({

    title: 'Logout',
    text: "Are you sure you want to exit",
    type: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm!'
  }).then(function () {
    window.location.href = 'php/logout.php';
  })
});

/* LOGOUT */

/* LOGIN CUSTOMER */

 $('.customerLoginForm').submit(function(e){

  e.preventDefault()

  var email = $('#email').val();
  var pass  = $('#pass').val();

  $.ajax({

    type: "POST",
    data: "email="+email+"&pass="+pass+"&customerLoginBtn=",
    url: url,

    success: function(data){

      $('.result-signin').html(data);

    }

  });

});

/* LOGIN CUSTOMER */

/* SIGNUP CUSTOMER */

 $('.customerSignupForm').submit(function(e){

  e.preventDefault()

  var reg_fname   = $('#reg_fname').val();
  var reg_lname   = $('#reg_lname').val();
  var reg_email   = $('#reg_email').val();
  var reg_address = $('#reg_address').val();
  var reg_contact = $('#reg_contact').val();
  var reg_pass    = $('#reg_pass').val();
  var reg_pass2   = $('#reg_pass2').val();

  $.ajax({

    type: "POST",
    data: "reg_fname="+reg_fname+"&reg_lname="+reg_lname+"&reg_email="+reg_email+"&reg_address="+reg_address+"&reg_contact="+reg_contact+"&reg_pass="+reg_pass+"&reg_pass2="+reg_pass2+"&customerSignupBtn=",
    url: url,

    success: function(data){

      $('.result-signup').html(data);

    }

  });

});

/* SIGNUP CUSTOMER */

/* UPDATE CUSTOMER ACCOUNT */

$('.updateAccountForm').submit(function(e){

  e.preventDefault()

  var fname    = $('#fname').val();
  var lname    = $('#lname').val();
  var pswd     = $('#pswd').val();
  var hid_user = $('#hid_user').val();

  $.ajax({  

    type: "POST",
    data: "fname="+fname+"&lname="+lname+"&pswd="+pswd+"&hid_user="+hid_user+"&updateAccountBtn=",
    url: url,

    success: function(data){

      $('.result').html(data);

    }

  });

});

$('.updateAddressForm').submit(function(e){

  e.preventDefault()

  var address    = $('#address').val();
  var contact    = $('#contact').val();
  var passy      = $('#passy').val();
  var hid_user   = $('#hid_user').val();

  $.ajax({  

    type: "POST",
    data: "address="+address+"&contact="+contact+"&passy="+passy+"&hid_user="+hid_user+"&updateAddressBtn=",
    url: url,

    success: function(data){

      $('.result').html(data);

    }

  });

});

/* UPDATE CUSTOMER ACCOUNT */

/* CHANGE PASSWORD */

$('.updatePasswordForm').submit(function(e){

  e.preventDefault()

  var old_pass   = $('#old_pass').val();
  var new_pass   = $('#new_pass').val();
  var new_pass2  = $('#new_pass2').val();
  var hid_user   = $('#hid_user').val();

  $.ajax({  

    type: "POST",
    data: "old_pass="+old_pass+"&new_pass="+new_pass+"&new_pass2="+new_pass2+"&hid_user="+hid_user+"&updatePasswordBtn=",
    url: url,

    success: function(data){

      $('.result').html(data);

    }

  });

});

/* CHANGE PASSWORD */

/* CANCEL ORDER */

$('.cancelOrderForm').submit(function(e){

  e.preventDefault()

  var canOrder    = $('#canOrder').val();
  var canUser     = $('#canUser').val();
  var canReason   = $('#canReason').val();
  var canComment  = $('#canComment').val();

  if(canReason == "Select Reason"){
    $('.result').html('<div class="alert alert-danger text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Please choose Reason</div>');
  }else{

  $.ajax({  

    type: "POST",
    data: "canOrder="+canOrder+"&canUser="+canUser+"&canReason="+canReason+"&canComment="+canComment+"&cancelOrderBtn=",
    url: url,

    success: function(data){

      $('.result').html(data);

    }

  });

  }

});

/* CANCEL ORDER */



/* ADD TO CART :3  */

$(document).on('ready',function(){

  loadcartcount();

});

function loadcartcount(){

  $.ajax({

    type: "POST",
    url: "../php/main.php",
    data: {loadcartcount:0},

    success: function(data){

      $('#cartcount').html(data);
      $('#cartcount2').html(data);

    }

  })

}


