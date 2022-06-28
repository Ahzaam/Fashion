$(document).ready(function() {


      $('#feedbacksubmit').click(function() {
        let proid = $('#hiddenid').val();
        let feedback =  $('#feedbackinput').val();
        if(feedback.length > 2) {

          $.post({
            url: 'api/questions.php',
            data: {feedback: feedback, proid: proid},
            success: function(data, status){
              console.log(data)
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
