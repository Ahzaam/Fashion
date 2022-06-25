$(document).ready(function() {
  $('#search').click(function (e) {
    e.preventDefault();
  })
  let value = ''
  let prevresult = ''
  $('#searchingallery').keyup(function (e) {
    $('#gridcont').css('min-height', '500px')

    let search = $(this).val();
    if(value === search || String.fromCharCode(e.keyCode) === ' ' ) {

    }else{
      value = search
      url = '../home/api/search.php';
      data = {search: search}
      $.post(url, data, function (data, status) {
        let results = JSON.parse(data);

        if(results[0].status === 'noresults'){
          prevresult = results
          $('#gridcont').html('<p class="display-3 w-100">No results found</p>')
        }else{
          if(JSON.stringify(results) === JSON.stringify(prevresult)){

          }else{

            prevresult = results
            $('#gridcont').html('')
            for(var i = 0; i < results.length; i++) {
                resultdiv(i ,results[i].name, results[i].image, results[i].description, results[i].id)
            }


            // findAndHighlight(search ,  'des'+results[i].id)
            // findAndHighlight(search ,  'name'+results[i].id)
          }

        }
      })
    }

  })



  function resultdiv(i, name, src, description, id) {
    let div = "<div id='gridserchanimation"+i+"' style='' class='col gridserchanimation'><div class='card'><img src='../"+src+"' class='card-img-top' alt='Image'><div class='card-body text-start'><h5 class='card-title'>"+name +"</h5><p class='card-text'>"+ description +"</p></div></div></div>"
    // transform: translateX(-100px);
    $('#gridcont').append(div)
    let counter = 0.1;
    const interval = setInterval(function(){
      if(counter >= 1) {
        clearInterval(interval);
      }
      $('#gridserchanimation'+i).css('opacity', '1');
      counter+=0.1;


    }, 200);


  }


})
