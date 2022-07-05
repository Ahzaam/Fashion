$(document).ready(function() {

  $('.remove').click(function() {

      let cartid = $(this).attr('data-cart-id')
      const parent = $(this).closest('.card')
      $.post({
        url: 'api/removecart.php',
        data: {cartid: cartid},
        success: function(data){
          if(data === '200') {
            parent.remove()
          }else{
            alert('Something went wrong')
          }


        }
      })


  })

  $('.incquantity').click(function() {

    let available = parseInt($(this).attr('data-availablestock'));
    let input = '#' + $(this).attr('data-input')
    let cartid = $(this).attr('data-cart-id');
    let newq = parseInt($(input).val())
    if(available <= newq) {
      alert('We Dont Have More Stock')
      return false
    }else{
      quantity = newq + 1
      $.post({
        url: 'api/cart.php',
        data: {quantity: quantity, cartid: cartid},
        success: function(data){

          if(data === '200') {

            $(input).val(quantity)
          }else{
            // alert('Something went wrong')
          }

        }
      })

    }

  })


  $('.decquantity').click(function() {

    let input = '#' + $(this).attr('data-input')
    let newq = parseInt($(input).val())
    let cartid = $(this).attr('data-cart-id');


    if(1 >= newq) {
      alert('Quantity Cannot Be 0')
      return false
    }else{
      quantity = newq - 1
      $.post({
        url: 'api/cart.php',
        data: {quantity: quantity, cartid: cartid},
        success: function(data){
          console.log(data)
          if(data === '200') {

            $(input).val(quantity)
          }else{
            // alert('Something went wrong')
          }
        }
      })

    }
  })

})
