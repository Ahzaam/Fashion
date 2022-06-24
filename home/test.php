<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Light Box</title>
    <style media="screen">
      body{
        margin:0;
      }

      .lbgrid{
        display: grid;
        grid-template-columns: repeat(3, 200px);
        justify-content: center;
        align-items: center;
        grid-gap:10px;
        height:100vh;
      }

      .lbgrid img{
        width: 200px;
        height: 200px;
      }

      #lightbox{
        position: fixed;
        z-index:1000;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(146, 141, 152, 0.64);

        display: none;
      }

      #lightbox.active{
        display: flex;
        justify-content: center;
        align-items: center;
      }

    </style>
  </head>
  <body>
    <div class="lbgrid">
      <img src="https://source.unsplash.com/400x400?mountain" alt="">
      <img src="https://source.unsplash.com/400x400?nature" alt="">
      <img src="https://source.unsplash.com/400x400?valley" alt="">
      <img src="https://source.unsplash.com/400x400?beach" alt="">
      <img src="https://source.unsplash.com/400x400?tree" alt="">
      <img src="https://source.unsplash.com/400x400?lake" alt="">
      <img src="https://source.unsplash.com/400x400?cliff" alt="">
      <img src="https://source.unsplash.com/400x400?water" alt="">
      <img src="https://source.unsplash.com/400x400?a380" alt="">
    </div>


    <script type="text/javascript">
      



    </script>
  </body>
</html>
