  $(document).ready(function(){

    $('#uploadimgicon').click(function(){
      $('#upload_image').click( )
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
        aspectRatio: 1,
        viewMode:1,
        preview:'.preview'
      });
    }).on('hidden.bs.modal', function(){
      cropper.destroy();
      cropper = null;
    });

    // test_image
    $('#crop').click(function(){
      if($('#upload_image').width() > $('#upload_image').height()){
        let min = $('#upload_image').height()
      }else{
        min = $('#upload_image').width()
      }

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
