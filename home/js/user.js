$(document).ready(function() {
  console.log('Loading')
  $('.delivered').click(function () {

    if(confirm('Do you need to mark the product as delivered?')){
      let id = $(this).attr('data-order-id');
      let data = {orderid:id, status:'delivered'}
      let parent = $(this).closest('.items')

      $.post({url:'api/orderstatushome.php',
              data: data,
              success: function(data){
                  if(data === '200'){
                    parent.remove();
                  }else{
                    alert('Something went wrong')
                  }

              }
            })
    }else return



  })


  $('.remove').click(function () {
    let id = $(this).attr('data-order-id');
    let data = {orderid:id, status:'remove'}
    let parent = $(this).closest('.items')

    $.post({url:'api/orderstatushome.php',
            data: data,
            success: function(data){
              if(data === '200'){
                parent.remove();
              }else{
                alert('Something went wrong')
              }
            }
          })


  })




})
