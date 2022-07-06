$(document).ready(function() {

  let i = 0
  $('.uniqclasses').each(function(index) {
    let classes = '.'+$(this).val()
    $(classes).addClass('bg' + i)
    i++
    if(i == 6){
      i=0
    }
  })



  $('.confirm').click(function () {
    let id = $(this).attr('data-order-id');
    let product = $(this).attr('data-product-id');
    let quantity = parseInt($(this).attr('data-quantity'))
    let data = {orderid:id, status:'confirmed', productid:product, quantity:quantity}
    let parent = $(this).closest('.parent')
    $.post({url:'api/orderstatus.php',
            data: data,
            success: function(data){

                if(data === '200'){
                  location.reload()
                }else{
                  alert('Something went wrong')
                }

            }
          })



  })
  $('.shipped').click(function () {
    let id = $(this).attr('data-order-id');
    let data = {orderid:id, status:'shipped'}
    let parent = $(this).closest('.parent')
    $.post({url:'api/orderstatus.php',
            data: data,
            success: function(data){
              if(data === '200'){
              location.reload()
              }else{
                alert('Something went wrong')
              }
            }
          })


  })

  $('.cancel').click(function () {
    let id = $(this).attr('data-order-id');
    let product = $(this).attr('data-product-id');
    let quantity = parseInt($(this).attr('data-quantity'))
    let data = {orderid:id, status:'cancelled', productid:product, quantity:quantity}
    let parent = $(this).closest('.parent')

    $.post({url:'api/orderstatus.php',
            data: data,
            success: function(data){
              if(data === '200'){
                location.reload()
              }else{
                alert('Something went wrong')
              }
            }
          })


  })


  // View Product
  $('.product').click(function () {
    let data = {orderid: $(this).attr('data-order-id')}
    $.post({
      url:'api/orderdetails.php',
      data:data,
      success: function (data) {

        let details = JSON.parse(data)
        $('#customer').html(details.name.name)
        $('#phone').html(details.address.phone)
        $('#state').html(details.address.state)
        $('#address_line1').html(details.address.address_line1)
        $('#address_line2').html(details.address.address_line2)
        $('#postalcode').html(details.address.postalcode)

        $('#proimg').attr('src', '../' + details.product.image)
        $('#name').html('Name: ' + details.product.name)
        $('#price').html('Price: ' + details.product.price)
        if(details.product.stock === "0" ){
          $('#stock').removeClass('bg-success')
          $('#stock').addClass('bg-danger px-2  text-white rounded-pill')
        }else{
          $('#stock').removeClass('bg-danger')
          $('#stock').addClass('bg-success px-2  text-white rounded-pill')
        }

        $('#stock').html('Stock left: ' + details.product.stock )


      }
    })
  })
// End Of View Product




})
