$(document).ready(function() {

  $('#change1').click(function() {
    $('#formContentregister').show()
    $('#formContentsignin').hide()
  });

  $('#change2').click(function(){
    $('#formContentregister').hide()
    $('#formContentsignin').show()
  })

  // Login


  $('#loginbtn').click(function (e) {
    e.preventDefault();

    let data = $('#logform').serialize();

    $.post({
      url:'api/validate.php',
      data: data,
      success: function (data, status) {

        if(data === '204') {
          $('#logemailerror').html('Account Doesnt Exist')
          $('#logemail').addClass('is-invalid')
        }else if(data === '401'){

          $('#logemailerror').html('Email or Password Incorrect')
          $('#logemail').addClass('is-invalid')
          $('#logpassword').addClass('is-invalid')
        }else if(data === '200'){

          window.location.href = '../'
        }
      }
    })

  })

  // Register

  $('#registerbtn').click(function (e) {
    e.preventDefault();

    if($('#email').val().length > 0) {
      if($('#nameper').val() != ''){
        if($('#regpassword').val().length > 6){

          if($('#regpassword').val() === $('#checkpassword').val()) {
            let data = $('#regform').serialize()
            if($('#inputcity').val() === ''){
                $('#inputcity').addClass('is-invalid')
            }else{
              $('#registerbtn').addClass('')

              $.post({
                url: 'api/reg_val.php',
                data: data,
                success: function (data, status){

                  if(data === '226'){
                    $('#email').addClass('is-invalid')
                    $('#emailerror').html('Email Already Exist')
                    $('#registerbtn').removeClass('disabled')
                  }
                  if(data === '200'){
                    $('#regredirect').removeClass('d-none')
                    $('#sucname').html($('#nameper').val())
                    $('#sucemail').html($('#email').val())
                  }else{
                    alert('Something went wrong')
                  }
                }
              })
            }



          }else{

            $('#passworderror').html('Password Doesnt Match');
            $('#regpassword').addClass('is-invalid')
            $('#checkpassword').addClass('is-invalid')
          }


        }else{
          $('#passworderror').html('Password is too short')
          $('#regpassword').addClass('is-invalid')

        }
      }else{
        $('#nameper').addClass('is-invalid')
      }
    }else{
      $('#email').addClass('is-invalid')
    }

    $('#confotpbtn').click(function (e) {
      e.preventDefault()
      $('#confotpbtn').addClass('disabled')
      let otpveri = $('#otpform').serialize()

      $.post({
        url: '/auth/user/verify/otp',
        data: otpveri,
        success: function (data, status){
        
          if(data.status === 200 ){
            name = $('#nameper').val()
            email = $('#email').val()
            $('#sucname').html(name)
            $('#sucemail').html(email)
            $('#form-container').addClass('d-none')
            $('#regredirect').removeClass('d-none')
          }else{
            $('#confotp').addClass('is-invalid')
            $('#confotpbtn').removeClass('disabled')
          }

        }
      })
    })


  })

})
