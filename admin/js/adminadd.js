  $(document).ready(function(){

    $('#moreimages').change(function(){
      console.log(event.target.files.length)
      if(event.target.files.length > 4) {
        alert('Only 4 images are allowed')
        $('#moreimages').val('')
        return}
      for (var i = 0; i < event.target.files.length; i++) {
        const img = document.createElement('img')
        $(img).addClass('col')
        $(img).attr('src', URL.createObjectURL(event.target.files[i]))
        $('#imgprev2').append(img)
        console.log(event.target.files[i])
      }


    })

    var $modal = $('#modal');

    var image = document.getElementById('sample_image');

    var cropper;

    $('#upload_image').change(function(event){
      console.log($(event.target.files[0]))
      var files = event.target.files;
      // $('#test_image').val( window.URL.createObjectURL(event.target.files[0]));
      var done = function(url){
        image.src = url;
        $modal.modal('show');
      };

      if(files && files.length > 0)
      {
        reader = new FileReader();
        reader.onload = function(event)
        {
          done(reader.result);
        };
        reader.readAsDataURL(files[0]);
      }
    });



    $modal.on('shown.bs.modal', function() {
      cropper = new Cropper(image, {
        aspectRatio: 4/5,
        viewMode:1,
        preview:'.preview'
      });
    }).on('hidden.bs.modal', function(){
      cropper.destroy();
      cropper = null;
    });

    // test_image
    $('#crop').click(function(){


      canvas = cropper.getCroppedCanvas({
        width:900,
        height:900
      });

      canvas.toBlob(function(blob){
        url = URL.createObjectURL(blob);

        $('#img_prev').attr('src',url);
        let res =  Math.round($('#img_prev').width()) + ' x ' +  Math.round($('#img_prev').height());
        $('#resolution').html(res);
        $('#resdiv').removeClass('d-none');


        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function(){
          var base64data = reader.result;
          $('#hiddeninputimg').val(base64data);
          $modal.modal('hide');
          // $('#uploaded_image').attr('src', data);
        };
      });
    });

  });
