$(document).ready(function() {
  $('#doneformsubmit').hide()
  let changes = [];
  $('.deafultinput').change(function() {
    if($(this).attr('data-prev-data') !== $(this).val()){
      $(this).addClass('is-valid')
      $(this).next().html('Previous value: ' + $(this).attr('data-prev-data'))
      console.log($(this).attr('name'))

    }else{
        $(this).removeClass('is-valid')
    }

    console.log($(this).attr('data-prev-data'));
    console.log($(this).val())
  })

  $('#modeltogller').click(function () {
    $('.is-valid').each(function (index) {
      changes.push($(this).attr('name'))

    })


  $('#clearchanges').click(function () {

    changes = []

  })
  $('#doneformsubmit').hide()
  $('#formsubmitbtn').show()
    $('#updatingitems').html('Are you sure you want to update '+changes.toString())
  })

  $('#editformsubmit').click(function (e) {
    e.preventDefault();
    let data = $('#editform').serialize();
    console.log(data)

    $.post({
      url: 'api/saveedit.php',
      data:data,
      success: function (data, status) {
        $('#updatingitems').html(data)
        console.log(data)
        $('#doneformsubmit').show()
        $('#formsubmitbtn').hide()
      }
    })
  })


  $('#deleteitem').click(function () {
    let id = $('#hiddenid').val();
    console.log(id)
    $.post({
      url: 'api/delete.php',
      data: {id: id},
      success: function (data, status) {
        console.log(data);
          history.back()
      }
    })
  })
})
