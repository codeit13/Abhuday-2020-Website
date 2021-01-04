<!DOCTYPE html>
<html lang="en">

<head>
  <title>Abhuday | Team</title>
  <meta property="og:title" content="Abhuday 2020" />
  <meta property="og:type" content="video.movie" />
  <meta property="og:url" content="https://www.abhuday.birlainstitute.co.in/" />
  <meta property="og:image" content="images/abhuday-2k20.webp" />

  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="/css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
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
          <div class="">
            <h2>Generate Certificates</h2>
            <div class="row justify-content-center">
              <div class="col-md-12">
                <form method="POST" id="generateCertificateForm">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="awardedTo">Awarded to</label>
                      <input type="text" class="form-control" name="awardedTo" id="awardedTo" placeholder="Enter the Awardee's Name" value="" required>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="position">Position</label>
                      <select class="form-control" id="position" name="position" required>
                        <option value="First">First</option>
                        <option value="Second">Second</option>
                        <option value="Third">Third</option>
                        <option value="Co-ordination">Co-ordination</option>
                        <option value="Participation">Participation</option>
                      </select>
                      <!-- <input type="text" class="form-control" name="position" id="position" placeholder="Enter the Position" value="" required> -->
                    </div>
                    <div class="form-group col-md-12">
                      <label for="competitionName">Competition Name</label>
                      <select class="form-control" id="competitionName" name="competitionName" required>
                        <option value="Alankar">Alankar</option>
                        <option value="Plot Twist">Plot Twist</option>
                        <option value="Shutter Up">Shutter Up</option>
                        <option value="Feel the Beat">Feel the Beat</option>
                        <option value="Nirvana">Nirvana</option>
                        <option value="Hikayat">Hikayat</option>
                        <option value="Literature Quiz">Literature Quiz</option>
                        <option value="How to get away with a Murder">How to get away with a Murder</option>
                      </select>
                      <!-- <input type="text" class="form-control" name="competitionName" id="competitionName" placeholder="Enter the Competition Name" value="" required> -->
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="email">Email Id</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Id" value="" required>
                    </div>
                    <!-- <div class="form-group col-md-12">
                      <label for="certificateId">Certificate ID</label>
                      <input type="text" class="form-control" name="certificateId" id="certificateId" placeholder="Enter the Certificate Id" value="" required>
                    </div> -->
                    <!-- <div class="form-group col-md-12">
                      <label for="competitionDate">Competition Date</label>
                      <input type="date" class="form-control" name="competitionDate" id="competitionDate" placeholder="Enter the Competition Date" value="" required>
                    </div> -->
                  </div>

                  <div class="form-group col-md-12">
                    <input type="hidden" name="action" value="generateCertificate">
                    <button type="submit" class="btn btn-primary btn-block" id="generateCertificate">Generate Certificate</button>
                  </div>

                </form>
              </div>
              <div class="mt-4 text-center">
                <a id="certificateImageUrl" download>
                  <img width="450" id="certificateImage" src="/images/imgs/empty_certificate.svg" class="img-fluid">
                  <div class="logs" style="font-size: larger;">

                  </div>
                </a>
              </div>
            </div>
          </div>
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

    $("#generateCertificate").on('click', (function(event) {
      event.preventDefault();

        let fd = new FormData(document.querySelector('#generateCertificateForm'));
        $.ajax({
          url: "make.php",
          type: "POST",
          data: fd,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {},
          success: function(data) {
            console.log(data);
            if(data.status == 'success') {
              $('#certificateImage').attr('width',  '850');
              $('#certificateImage').attr('src',  '/certificate/certificates/' + data.image);
              $('#certificateImageUrl').attr('href',  '/certificate/certificates/' + data.image);
              $('.logs').html(``);


              let mailUrl = data.url;
              let request = jQuery.ajax({
                crossDomain: true,
                url: mailUrl,
                method: "GET",
                dataType: "jsonp"
              });



            } else {
              $('#certificateImage').attr('width',  '450');
              $('#certificateImage').attr('src',  '/images/imgs/empty.svg');
              $('.logs').html(`<h1 class="text-bold text-danger text-center">This Certificate ID already exists.</h1>`);
            }
          },
          error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
          }
        });
    }));
  </script>
</body>

</html>
