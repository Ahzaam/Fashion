$(document).ready(function() {
  $('#search').click(function (e) {
    e.preventDefault();
  })
  let value = ''
  $('#searchinput').keyup(function (e ) {

    let search = $(this).val();
    if(value === search || String.fromCharCode(e.keyCode) === ' ' ) {

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
    $(img).attr('class', 'w-100 responsive-img')


    let imgdiv = document.createElement('div');
    $(imgdiv).attr('class', 'col-lg-4')
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
    $(bodydiv).attr('class', 'col-lg-8 text-start')
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
  const lightbox = document.createElement('div');
  lightbox.id = 'lightbox';
  document.body.appendChild(lightbox);
  $('.lightboxsupport').click(function (e) {
    console.log(e.target)
    console.log(e.currentTarget)
    // if( !== e.currentTarget) return
    console.log($(this).attr('id'));
    let id = $(this).attr('id')

    let data = {id: id, event:'lightbox'}
    let url = 'api/search.php'
    $.post({
      url,data,
      success: function (data, status){
        console.log(data)
        let item = JSON.parse(data)


        $(lightbox).addClass('active')

        const img = document.createElement('img');
        $(img).attr('src', '../'+item[0].image)
        $(img).css('max-width', '600px')
        $(img).addClass('w-100')
        $(img).addClass('img-fluid')
        console.log(item[0].image)

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

        bodydiv.appendChild(name)
        bodydiv.appendChild(body)
        bodydiv.appendChild(img)
        const abutton = document.createElement('a')
        abutton.setAttribute('href','view.php?product='+id)
        $(abutton).html('Buy Now')
        $(abutton).addClass('btn btn-primary rounded-pill my-2 mx-sm-5')



        const topleft = document.createElement('div')
        $(topleft).addClass('top-left')
        topleft.appendChild(abutton)



        bodydiv.appendChild(topleft)
        contdiv.appendChild(bodydiv)

        lightbox.appendChild(contdiv)


      }
    })

  })

  $(lightbox).click(function (e) {

    console.log(e.target)
    if(e.target !== e.currentTarget) return
    $(this).removeClass('active');
    console.log($(this))
  })
}



})
