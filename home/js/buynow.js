$(document).ready(function() {
  $('#confirmorder').click(function() {
    let address = $('#address').val();
    if (address === 'notset') {
      alert('Please enter address')
      return
    }
    let type = $('#ordertype').val();
    let data = {type: type, id: $('#thisid').val()}
    $.post({
      url: 'api/order.php',
      data: data,
      success: function(data, status) {
        if(data === '200') {
          alert('Order was successfully')
          location.href = 'index.php'
        }else{
          alert('An error has occurred' + data)
        }
      }
    })
  })




})
