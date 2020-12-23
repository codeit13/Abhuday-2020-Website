<!DOCTYPE html>
<html lang="en">

<head>
  <title>Abhuday | Gallery</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <script src="js/jquery-1.6.js"></script>
  <script src="js/cufon-yui.js"></script>
  <script src="js/cufon-replace.js"></script>
  <script src="js/NewsGoth_BT_400.font.js"></script>
  <script src="js/NewsGoth_BT_700.font.js"></script>
  <script src="js/atooltip.jquery.js"></script>
  <!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
<![endif]-->
</head>

<style media="screen">
  .folio dt {
  overflow: hidden;
  }
</style>

<body id="page3">
  <div class="bg1">
    <div class="main">
      <!--header -->
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/header.php' ?>
      <!--header end-->
      <div class="box">
        <!--content -->
        <article id="content">
          <div class="wrapper">
            <h2>Abhuday Gallery</h2>
            <dl class="folio">
              <dt>
                <img src="images/gallery/img-01.png" alt="" id="img1">
                <img src="images/gallery/img-03.png" alt="" id="img2">
                <img src="images/gallery/img-06.png" alt="" class="active" id="img3">
                <img src="images/gallery/img-09.png" alt=""id="img4">
                <img src="images/gallery/img-12.png" alt="" id="img5">
                <img src="images/gallery/img-15.png" alt="" id="img6">
                <img src="images/gallery/img-18.png" alt="" id="img7">
                <img src="images/gallery/img-21.png" alt="" id="img8">
                <img src="images/gallery/img-24.jpeg" alt="" id="img9">
              </dt>
              <dd>
                <ul class="marg_right1">
                  <li><a href="#img1"><img src="images/gallery/img-01.png" alt="" width="260" height="171"></a></li>
                  <li><a href="#img2"><img src="images/gallery/img-03.png" alt="" width="260" height="171"></a></li>
                  <li><a href="#img3"><img src="images/gallery/img-06.png" alt="" width="260" height="171"></a></li>
                </ul>
                <ul class="marg_right1">
                  <li><a href="#img4"><img src="images/gallery/img-09.png" alt="" width="260" height="171"></a></li>
                  <li><a href="#img5"><img src="images/gallery/img-12.png" alt="" width="260" height="171"></a></li>
                  <li><a href="#img6"><img src="images/gallery/img-15.png" alt="" width="260" height="171"></a></li>
                </ul>
                <ul>
                  <li><a href="#img7"><img src="images/gallery/img-18.png" alt="" width="260" height="171"></a></li>
                  <li><a href="#img8"><img src="images/gallery/img-21.png" alt="" width="260" height="171"></a></li>
                  <li><a href="#img9"><img src="images/gallery/img-24.jpeg" alt="" width="260" height="171"></a></li>
                </ul>
              </dd>
            </dl>
          </div>
        </article>
        <!--content end-->
        <!--footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php' ?>
        <!--footer end-->
      </div>
    </div>
  </div>
  <script>
    Cufon.now();
  </script>
  <script>
    $(document).ready(function() {
      var Img = '#' + $(".folio .active").attr('id')
      $(".folio dt img").css({
        opacity: '0'
      });
      $(".folio dt img.active").css({
        opacity: '1'
      });
      $(".folio ul li a").click(function() {
        var ImgId = $(this).attr("href");
        if (ImgId != Img) {
          $(".folio dt .active").animate({
            opacity: "0"
          }, 600, function() {
            $(this).removeClass('active');
          })
          $(ImgId).animate({
            opacity: "1"
          }, 600).addClass('active');
        }
        Img = ImgId;
        return false;
      })
    });
  </script>
</body>

</html>
