$(document).ready(function() {
  let available = parseInt($('#availablestock').html());
  $('#quantity').val(1)
  let initialurl = $('#buynow').attr('href')

  $('#incquantity').click(function() {
    let newq = parseInt($('#quantity').val())
    if(available <= newq) {
      alert('We Dont Have More Stock')
      return false
    }else{
      quantity = newq + 1
      $('#quantity').val(quantity)
      $('#buynow').attr('href', initialurl + quantity    )
    
    }

  })


  $('#decquantity').click(function() {
    let newq = parseInt($('#quantity').val())
    if(1 >= newq) {
      alert('Quantity Cannot Be 0')
      return false
    }else{
      quantity = newq - 1
      $('#quantity').val(quantity)
      $('#buynow').attr('href', initialurl + quantity    )

    }
  })



      $('#feedbacksubmit').click(function() {
        let proid = $('#hiddenid').val();
        let feedback =  $('#feedbackinput').val();
        if(feedback.length > 2) {

          $.post({
            url: 'api/questions.php',
            data: {feedback: feedback, proid: proid},
            success: function(data, status){

              if(data === '200'){
                alert('Message sent successful')
              }else if(data === '500'){
                alert('Something Wrong with the server')
              }else if(data === '401'){
                alert("Login Again")
              }else{
                alert("Something went wrong")
              }
              $('#feedbackinput').val('')
            }
          })
        }
      })


          $('.wish').click(function() {
            id = $('#hiddenid').val();

            $.post({
              url: 'api/wishlist.php',
              data: {id: id},
              success: function (data, status) {
                if(data === '200' ){
                  $('.wish').removeClass('btn-danger');
                  $('.wish').addClass(' btn-outline-danger')
                }else if(data === '201'){
                  $('.wish').removeClass('btn-danger');
                  $('.wish').addClass(' btn-outline-danger')
                }
              }
            })
          });




          $('.add-cart').click(function() {
            id = $('#hiddenid').val();
            $.post({
              url: 'api/addtocart.php',
              data: {id: id},
              success: function (data, status) {
                if(data === '200' ){

                  $('.add-cart').removeClass('btn-primary');
                  $('.add-cart').addClass(' btn-outline-primary')
                }else if(data === '201'){
                  $('.add-cart').removeClass('btn-primary');
                  $('.add-cart').addClass(' btn-outline-primary')
                }
              }
            })




          });
})
