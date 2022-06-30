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
      url = 'api/search.php';
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



    $('.lightboxsupport').click(function (e) {

      let id = $(this).attr('id')

      let data = {id: id, event:'lightbox'}
      let url = 'api/search.php'
      $.post({
        url,data,
        success: function (data, status){

          let item = JSON.parse(data)


          $(lightbox).addClass('active')

          const img = document.createElement('img');
          $(img).attr('src', '../'+item[0].image)
          $(img).css('max-width', '600px')
          $(img).addClass('w-100 ')
          $(img).addClass('img-fluid')


          while(lightbox.firstChild){
            lightbox.removeChild(lightbox.firstChild)
          }


          const contdiv = document.createElement('div')


          const bodydiv = document.createElement('div')
          $(bodydiv).css('background-color', 'white')
          $(bodydiv).css('border-radius', ' 20px 20px 20px 20px')
          $(bodydiv).addClass('bodydiv ')
          $(bodydiv).css('position', 'relative')
          const name = document.createElement('h5')
          $(name).addClass('h4')
          $(name).html(item[0].name)

          const body = document.createElement('p')
          $(body).addClass('lead')
          $(body).html(item[0].description)
          const closebutton = document.createElement('div')
          $(closebutton).css('position', 'absolute')

          $(closebutton).css('top', '8px')
          $(closebutton).css('left', '16px')
          $(closebutton).html('<i class="fa-solid fa-2x fa-xmark"></i>')
          $(closebutton).css('cursor', 'pointer')
          $(closebutton).addClass('closelightbox')

          $(closebutton).click(function (e) {

            $(lightbox).removeClass('active');

          })

          bodydiv.appendChild(closebutton)
          bodydiv.appendChild(name)
          bodydiv.appendChild(body)
          bodydiv.appendChild(img)

          const abutton = document.createElement('a')
          abutton.setAttribute('href','view.php?product='+id)
          $(abutton).html('Buy Now')
          $(abutton).addClass('btn btn-primary rounded-pill  mx-sm-5')

          const cartbutton = document.createElement('button')
          cartbutton.setAttribute('data-pro-id', id)
          $(cartbutton).html('<i class="fa fa-shopping-cart"></i>')
          $(cartbutton).addClass('add-cart btn btn-primary mx-2 rounded-pill my-2 ')

          const wishbutton = document.createElement('button')
          wishbutton.setAttribute('data-pro-id', id)
          $(wishbutton).html('<i class="fa fa-heart"></i>')
          $(wishbutton).addClass('add-wish btn btn-danger rounded-pill my-2 ')

          $(cartbutton).click(function () {
              addtocart($(this).attr('data-pro-id') );
          })
          $(wishbutton).click(function () {
              addtowish($(this).attr('data-pro-id') );
          })

          const topleft = document.createElement('div')
          $(topleft).addClass('top-left mx-5')
          topleft.appendChild(abutton)
          topleft.appendChild(cartbutton)
          topleft.appendChild(wishbutton)



          bodydiv.appendChild(topleft)
          contdiv.appendChild(bodydiv)

          lightbox.appendChild(contdiv)


        }
      })
      $(lightbox).click(function (e) {
        if(e.target !== e.currentTarget) return
        $(this).removeClass('active');

      })



    })


  }


      function addtocart(id) {
        $.post({
          url: 'api/addtocart.php',
          data: {id: id},
          success: function (data, status) {
            if(data === '200' ){


              $('#numofcart').html(parseInt($('#numofcart').html()) +1)
              $('#cart-'+id).addClass(' text-danger')
            }else if(data === '201'){

                  $('#cart-'+id).addClass(' text-danger')
            }
          }
        })




      }

      function addtowish(id) {

        $.post({
          url: 'api/wishlist.php',
          data: {id: id},
          success: function (data, status) {
            if(data === '200' ){


              $('#numofwish').html(parseInt($('#numofwish').html()) +1)
              $('#wish-'+id).addClass(' text-danger')
            }else if(data === '201'){

                $('#wish-'+id).addClass(' text-danger')
            }
          }
        })





})
