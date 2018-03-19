var url   = "php/main.php";

$(document).on('ready',function(){

  loadcartcount();

});

$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });
});

  
$('.termsBtn').on('click',function(){
  $('.terms').show(300);
  $('.termsBtn2').show();
  $('.termsBtn').hide();
});

$('.termsBtn2').on('click',function(){
  $('.terms').hide(300);
  $('.termsBtn2').hide();
  $('.termsBtn').show();
});

$('#reg_pass, #reg_pass2').on('keyup', function () {
    if ($('#reg_pass').val() == $('#reg_pass2').val()) {
        $('#mess').html('Password Match').css('color', 'green');
    } else {
        $('#mess').html('Password Mismatch').css('color', 'red');
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


/* ADD TO CART :3  */

$(document).on('click','.add-cart', function(){

  var product = $(this).attr('id').substr(1);


  $.ajax({

    type: "POST",
    url: url,
    data: {product:product, addtocart:0},

    success: function(){
      swal(
      'My Cart',
      'Item is successfully added',
      'success'
    )

      loadcartcount();
  

    }


  });

});


function loadcartcount(){

  $.ajax({

    type: "POST",
    url: url,
    data: {loadcartcount:0},

    success: function(data){

      $('#cartcount').html(data);
      $('#cartcount2').html(data);

    }

  })

}



