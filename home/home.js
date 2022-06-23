$(document).ready(function() {
    $('#search').click(function (e) {
        e.preventDefault();
    })
    $('#searchinput').keyup(function () {
        console.log($(this).val());
        let search = $(this).val();
        url = 'addcomment.php';
        data = {search: search}
        $.post(url, data, function (data, status) {
          let results = JSON.parse(data);

          if(results[0].status === 'noresults'){
            $('#searchresultsdropdown').html('<p class="text-danger">No results found</p>')
          }else{
            $('#searchresultsdropdown').html('')
            for(let i = 0; i < results.length; i++) {
              resultdiv(results[i].name, results[i].image, results[i].description, results[i].id)
              findAndHighlight(search ,  'des'+results[i].id)
              findAndHighlight(search ,  'name'+results[i].id)
            }
          }
        })

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


  let ahref = document.createElement('button');
  $(ahref).attr('class', 'dropdown-item')
  $(ahref).attr('id',  id)
  $(ahref).append(rowdiv)

  let searchcont = document.createElement('li');
  $(searchcont).append(ahref);

  $('#searchresultsdropdown').append(searchcont)

}

function findAndHighlight(text, id) {
    console.log(id)
    var text = text
    var search = new RegExp("(\\b" + text + "\\b)", "gim");
    var e = document.getElementById(id).innerHTML;
    var enew = e.replace(/(<span>|<\/span>)/igm, "");
    document.getElementById(id).innerHTML = enew;
    var newe = enew.replace(search, "<span class='fw-bold'>$1</span>");
    document.getElementById(id).innerHTML = newe;
}

})
