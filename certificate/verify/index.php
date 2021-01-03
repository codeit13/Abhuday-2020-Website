<!DOCTYPE html>
<html lang="en">

<head>
  <title>Abhuday | Team</title>
  <meta property="og:title" content="Abhuday 2020" />
  <meta property="og:type" content="video.movie" />
  <meta property="og:url" content="https://www.abhuday.birlainstitute.co.in/" />
  <meta property="og:image" content="images/abhuday-2k20.webp" />

  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="/css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <style media="screen">
    .form-inline .custom-select,
    .form-inline .input-group {
      width: -webkit-fill-available;
    }
    .form-group > label {
      font-size: 20px;
      color: #fff;
    }
  </style>

  <script src="/js/jquery-1.6.js"></script>
  <script src="/js/cufon-yui.js"></script>
  <script src="/js/cufon-replace.js"></script>
  <script src="/js/NewsGoth_BT_400.font.js"></script>
  <script src="/js/NewsGoth_BT_700.font.js"></script>
  <script src="/js/atooltip.jquery.js"></script>
  <!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="all">
<![endif]-->
</head>

<body id="page4">
  <div class="bg1">
    <div class="main">
      <!--header -->
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/header.php' ?>
      <!--header end-->
      <div class="">
        <!--content -->
        <article id="content" style="text-align: center;">
          <div class="wrapper">
            <h2>Cerificates</h2>
            <div class="row justify-content-center">
              <div class="col-md-3">

              </div>
              <div class="col-md-6">
                <form method="POST" id="findCertificateForm">
                  <div class="form-row">
                    <label for="certificateId">Certificate Id</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"> <b>ID</b> </div>
                      </div>
                      <input type="text" class="form-control" id="certificateId" name="certificateId" placeholder="Enter the Certificate Id">
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">
                        <b>
                          Please enter the correct Certificate ID
                        </b>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="action" value="getCertificate">
                  <button class="btn btn-block btn-info" type="button" name="button" id="findCertificate">Check</button>
                </form>
              </div>
              <div class="col-md-3">

              </div>
              <div class="mt-4">
                <a id="certificateImageUrl" download>
                  <img width="450" id="certificateImage" src="/images/imgs/certification.svg" class="img-fluid">
                  <div class="logs" style="font-size: larger;">

                  </div>
                </a>
              </div>
            </div>
          </div>
        </article>
        <!--content end-->
        <!--footer -->
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php' ?>
        <!--footer end-->
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>
    Cufon.now();
  </script>

  <script type="text/javascript">
    $('#certificateId').on("keyup", function() {
      let certificateId = $('#certificateId').val();
      let certificateIdValidity;

      jQuery.ajax({
        type: 'POST',
        url: 'verify.php',
        data: {
          action: "validateCertificate",
          certificateId: certificateId
        },
        dataType: 'json',
        success: function(res) {
          if (res.status == 'success') {
            certificateIdValidity = true;
          } else if (res.status == 'failed') {
            certificateIdValidity = false;
          }

          if (!certificateIdValidity) {
            $('#certificateId').removeClass('is-valid');
            $('#certificateId').addClass('is-invalid');
          } else {
            $('#certificateId').removeClass('is-invalid');
            $('#certificateId').addClass('is-valid');
          }

        },
        error: function(xhr, ajaxOptions, thrownError) {
          console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
      });
    });


    $("#findCertificate").on('click', (function(event) {
      event.preventDefault();

      let certificateId = $('#certificateId').val();
      let certificateIdValidity = $('#certificateId').hasClass('is-valid');
      console.log(certificateIdValidity);

      if (certificateIdValidity) {
        $('#certificateId').removeClass('is-invalid');
        $('#certificateId').addClass('is-valid');

        let fd = new FormData(document.querySelector('#findCertificateForm'));
        $.ajax({
          url: "verify.php",
          type: "POST",
          data: fd,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {},
          success: function(data) {
            if (data.status == "success") {
              $('#certificateId').removeClass('is-invalid');
              $('#certificateId').addClass('is-valid');

              $('#certificateImage').attr('width', '850');
              certificateImageUrl
              $('#certificateImage').attr('src', '/certificate/certificates/' + data.image);
              $('#certificateImageUrl').attr('href', '/certificate/certificates/' + data.image);

              $('.logs').html(``);
            } else if (data.status == "failed") {
              $('#certificateId').removeClass('is-valid');
              $('#certificateId').addClass('is-invalid');

              $('#certificateImage').attr('width', '450');
              $('#certificateImage').attr('src', '/images/imgs/empty.svg');
              $('#certificateImageUrl').attr('href', '/images/imgs/empty.svg');

              $('.logs').html(`<h3 class="text-bold text-danger text-center">This Certificate ID does not exists.</h3>`);
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
      } else {
        $('#certificateId').removeClass('is-valid');
        $('#certificateId').addClass('is-invalid');

        $('#certificateImage').attr('width', '450');
        $('#certificateImage').attr('src', '/images/imgs/empty.svg');
        $('#certificateImageUrl').attr('href', '/images/imgs/empty.svg');

        $('.logs').html(`<h3 class="text-bold text-danger text-center">This Certificate ID does not exists.</h3>`);
      }
    }));
  </script>
</body>

</html>
