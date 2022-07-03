$(document).ready(function() {

  $.post({
    url:'api/getname.php',
    data: {data:'whats my name'},
    success: function(data, status) {
      let details = JSON.parse(data)

      if(data === '404'){
        $('#logintoggle').removeClass('d-none')
      }else{

        $('#holdersname').html(capitalizeFirstLetter(details.name))
          $('#emaildrp').html(details.email)
        $('#account').removeClass('d-none')
        $('#cart').removeClass('d-none')
          $('#cartandwish').removeClass('d-none')
      }
    }
  })

  function capitalizeFirstLetter(str) {

      // converting first letter to uppercase
      const capitalized = str.charAt(0).toUpperCase() + str.slice(1);

      return capitalized;
  }

  $('#search').click(function (e) {
    e.preventDefault();
  })
  let value = ''
  $('#searchinput').keyup(function (e ) {

    let search = $(this).val();
    if(value === search || String.fromCharCode(e.keyCode) === ' ' ) {
      return
    }else{
      value = search
      url = 'api/search.php';
      data = {search: search}
      $.post(url, data, function (data, status) {

        let results = JSON.parse(data);

        if(results[0].status === 'noresults'){
          $('#searchresultsdropdown').html('<p class="text-danger">No results found</p>')
        }else{
          $('#searchresultsdropdown').html('')
          for(let i = 0; i < results.length; i++) {
            resultdiv(results[i].name, results[i].image, results[i].description, results[i].id)

            findAndHighlight(search ,  'name'+results[i].id)

            let arr = search.split(' ')

            for (let j = 0; j < arr.length; j++){
              findAndHighlight(arr[j],  'des'+results[i].id)
            }
          }
        }
      })
    }


  })



  function resultdiv(name, src, description, id) {
    // Image DIV
    let img = document.createElement('img')
    $(img).attr('src', '../'+src)
    $(img).attr('alt', 'Image')
    $(img).attr('class', ' serchimg responsive-img')


    let imgdiv = document.createElement('div');
    $(imgdiv).attr('class', 'col-4')
    $(imgdiv).append(img)

    // Returns Image DIV =========================

    // Name
    let bodyh1 = document.createElement('h1');
    $(bodyh1).attr('class', 'h6')
    $(bodyh1).attr('id', 'name'+id)
    $(bodyh1).html(name)

    // Description
    let bodydes = document.createElement('p');
    $(bodydes).attr('class', 'text-muted searchdesc')
    $(bodydes).attr('id', 'des'+id)
    $(bodydes).css('white-space', 'nowrap')
    $(bodydes).css('overflow', 'hidden')
    $(bodydes).css('text-overflow', 'ellipsis')
    $(bodydes).html(description)



    let bodydiv = document.createElement('div');
    $(bodydiv).attr('class', 'col-7 text-start')
    $(bodydiv).append(bodyh1, bodydes)



    // Returns Body DIV ==============================

    let rowdiv = document.createElement('div');
    $(rowdiv).attr('class', 'row')
    $(rowdiv).append(imgdiv, bodydiv)

    // Returns Row DIV =============================


    let ahref = document.createElement('div');
    $(ahref).attr('class', 'dropdown-item')
    $(ahref).attr('id',  id)
    $(ahref).append(rowdiv)

    let searchcont = document.createElement('li');
    $(searchcont).append(ahref);


    const allcontdiv = document.createElement('div')
    $(allcontdiv).addClass('lightboxsupport')
    $(allcontdiv).attr('id',  id)
    $(allcontdiv).append(searchcont)


    $('#searchresultsdropdown').append(allcontdiv)

      displaylightbox()


  }

  function findAndHighlight(text, id) {
    var text = text
    var search = new RegExp("(\\b" + text + "\\b)", "gim");
    var e = document.getElementById(id).innerHTML;
    var enew = e.replace(/(<span>|<\/span>)/igm, "");
    document.getElementById(id).innerHTML = enew;
    var newe = enew.replace(search, "<span class='fw-bold'>$1</span>");
    document.getElementById(id).innerHTML = newe;
  }





displaylightbox()

function displaylightbox() {

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
        $(name).addClass('h4 ms-5')
        $(name).html(item[0].name)

        const body = document.createElement('p')
        $(body).addClass('lead ms-5')
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




   }


    $('.add-cart').click(function() {
    addtocart($(this).attr('data-pro-id'));

    })
    $('.wish').click(function() {
    addtowish($(this).attr('data-pro-id'));

    })


    $('#feedbacksubmit').click(function() {
      let feedback =  $('#feedbackinput').val();
      if(feedback.length > 2) {
        $.post({
          url: 'api/feedback.php',
          data: {feedback: feedback},
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




})
