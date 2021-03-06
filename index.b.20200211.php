<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Faculty of Medicine Expertise Database
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="./node_modules/preload.js/dist/css/preload.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="./assets/demo/demo.css" rel="stylesheet" />

</head>

<body class="">
  <div class="wrapper ">

    <div class="main-panel" style="float:left; width: 100%">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" style="background: #51cbce !important;">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand text-white" href="index" style="font-weight: 400;">MedExpertise.DB</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-rotate text-white" href="login">
                  <i class="nc-icon nc-single-02"></i> Login
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->
      <div class="content">

        <div class="row">
          <div class="col-12 text-center d-block d-sm-none">
            <button class="btn btn-primary">Keywords</button>
            <button class="btn btn-primary">Firstname</button>
          </div>
          <div class="col-md-12">
            <div class="card d-none d-sm-block">
              <div class="card-header ">
                <h5 class="card-title"><span class="text-primary">Method 1</span> : Search by keywords</h5>
              </div>
              <div class="card-body ">
                <form onsubmit="return false;" class="keyword-form">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter search keyword : fistname / lastname / research title / expertise" id="txtKeyword" autofocus>
                  </div>
                  <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit"><i class="nc-icon nc-zoom-split"></i> Search</button>
                  </div>
                </form>
              </div>
            </div>

            <div class="card d-none d-sm-block ">
              <div class="card-header ">
                <h5 class="card-title"><span class="text-primary">Method 2</span> : Listed by First Name</h5>
              </div>
              <div class="card-body pt-0">
                  <a href="Javascript:search('2', 'A')">A</a> |
                  <a href="Javascript:search('2', 'B')">B</a> |
                  <a href="Javascript:search('2', 'C')">C</a> |
                  <a href="Javascript:search('2', 'D')">D</a> |
                  <a href="Javascript:search('2', 'E')">E</a> |
                  <a href="Javascript:search('2', 'F')">F</a> |
                  <a href="Javascript:search('2', 'G')">G</a> |
                  <a href="Javascript:search('2', 'H')">H</a> |
                  <a href="Javascript:search('2', 'I')">I</a> |
                  <a href="Javascript:search('2', 'J')">J</a> |
                  <a href="Javascript:search('2', 'K')">K</a> |
                  <a href="Javascript:search('2', 'L')">L</a> |
                  <a href="Javascript:search('2', 'M')">M</a> |
                  <a href="Javascript:search('2', 'N')">N</a> |
                  <a href="Javascript:search('2', 'O')">O</a> |
                  <a href="Javascript:search('2', 'P')">P</a> |
                  <a href="Javascript:search('2', 'Q')">Q</a> |
                  <a href="Javascript:search('2', 'R')">R</a> |
                  <a href="Javascript:search('2', 'S')">S</a> |
                  <a href="Javascript:search('2', 'T')">T</a> |
                  <a href="Javascript:search('2', 'U')">U</a> |
                  <a href="Javascript:search('2', 'V')">V</a> |
                  <a href="Javascript:search('2', 'W')">W</a> |
                  <a href="Javascript:search('2', 'X')">X</a> |
                  <a href="Javascript:search('2', 'Y')">Y</a> |
                  <a href="Javascript:search('2', 'Z')">Z</a>
              </div>
            </div>

            <div class="card d-none d-sm-block ">
              <div class="card-header ">
                <h5 class="card-title"><span class="text-primary">Method 3</span> : Listed by Department</h5>
              </div>
              <div class="card-body text-primary pt-0">
                <a href="Javascript:search('3', '8')" class="text-dark">Anesthesiology</a> ||
                <a href="Javascript:search('3', '4')" class="text-dark">Biomedical Sciences</a> ||

                <a href="Javascript:search('3', '20')" class="text-dark">Emergency</a> ||
                <a href="Javascript:search('3', '9')" class="text-dark">Family Medicine and Preventive Medicine</a> ||
                <a href="Javascript:search('3', '14')" class="text-dark">Internal Medicine</a> ||
                <a href="Javascript:search('3', '12')" class="text-dark">Obstetrics and Gynaecology</a> ||
                <a href="Javascript:search('3', '2')" class="text-dark">Ophthalmology</a> ||
                <a href="Javascript:search('3', '11')" class="text-dark">Orthopedics</a> ||
                <a href="Javascript:search('3', '13')" class="text-dark">Otolaryngology Head and Neck Surgery</a> ||
                <a href="Javascript:search('3', '5')" class="text-dark">Pathology</a> ||
                <a href="Javascript:search('3', '1')" class="text-dark">Pediatrics</a> ||
                <a href="Javascript:search('3', '3')" class="text-dark">Phychiatry</a> ||
                <a href="Javascript:search('3', '30')" class="text-dark">Physical Therapy</a> ||
                <a href="Javascript:search('3', '7')" class="text-dark">Radiology</a> ||
                <a href="Javascript:search('3', '10')" class="text-dark">Surgery</a> ||

                <a href="Javascript:search('3', '18')" class="text-dark">Epidemiology Unit</a> ||
                <a href="Javascript:search('3', '19')" class="text-dark">External</a> ||

                <a href="Javascript:search('3', '25')" class="text-dark">Institute of Biomedical Engineeing</a> ||
                <a href="Javascript:search('3', '21')" class="text-dark">Institute of Gastroenterology and Hepatology</a> ||

                <a href="Javascript:search('3', '15')" class="text-dark">Nursing Services Division</a>

              </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pl-3 pr-3">
            <h5>Search result</h5>
            <div class="row n-none-d-sm-block" id="result-panal-card">
              <div class="col-12 pt-5 pb-5 text-center">
                <i class="nc-icon nc-alert-circle-i text-muted" style="font-size: 4em;"></i>
                <div class="pt-3">No result found or please select search method.</div>
              </div>
            </div>

            <div class="result-panal d-block d-sm-none">
              <div class="pt-5 pb-5 text-center">
                <i class="nc-icon nc-alert-circle-i text-muted" style="font-size: 4em;"></i>
                <div class="pt-3">No result found or please select search method.</div>
              </div>
            </div>

            <!-- <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Search result</h5>
              </div>
              <div class="card-body">
                <div class="row n-none-d-sm-block" id="result-panal-card">
                  <div class="col-12 pt-5 pb-5 text-center">
                    <i class="nc-icon nc-alert-circle-i text-muted" style="font-size: 4em;"></i>
                    <div class="pt-3">No result found or please select search method.</div>
                  </div>
                </div>

                <div class="result-panal d-block d-sm-none">
                  <div class="pt-5 pb-5 text-center">
                    <i class="nc-icon nc-alert-circle-i text-muted" style="font-size: 4em;"></i>
                    <div class="pt-3">No result found or please select search method.</div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white pt-0">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <!-- <ul>
                <li>
                  <a href="https://www.creative-tim.com" target="_blank">How to</a>
                </li>
                <li>
                  <a href="http://blog.creative-tim.com/" target="_blank">Blog</a>
                </li>
                <li>
                  <a href="https://www.creative-tim.com/license" target="_blank">Licenses</a>
                </li>
                <li>
                  <a href="https://www.creative-tim.com/license" target="_blank">Contact</a>
                </li>
              </ul> -->
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, <i class="fa fa-heart heart"></i> by Wisnior, Co., Ltd. | Design By Create TIM
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <script src="./node_modules/preload.js/dist/js/preload.js"></script>

  <script src="./assets/custom/js/expert-db.1.0.1.js?token=<?php echo date('U'); ?>"></script>

  <script>
    $(document).ready(function() {
      preload.hide()
    });

    $(function(){
      $('.keyword-form').submit(function(){
        let key = $('#txtKeyword').val()
        search('1', key)
      })
    })
  </script>
</body>

</html>
