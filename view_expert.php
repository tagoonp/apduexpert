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
      <div class="content" style="margin-top: 63px;">
        <div class="row">
          <div class="col-12">
            <div class="card card-plain p-0">
              <div class="card-header p-0 pt-2">
                <h4 class="card-title">Research Profile</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index"><i class="fa fa-home mr-2"></i>Home</a></li>
                    <li class="breadcrumb-item active exp_fullname_en" aria-current="page">Library</li>
                  </ol>
                </nav>
              </div>

              <div class="card mb-3">
                <div class="card-body pt-5 pb-5">
                  <div class="row">
                    <div class="col-12 col-sm-4 pl-5 pr-5 pb-4">
                      <span class="exp_profile">
                        <img src="../img/tmp-user-img.png" alt="" class="img-fluid" id="profile_img">
                      </span>
                    </div>
                    <div class="col-12 col-sm-8">
                      <div style="padding: 0px 13px;">
                        <div class="row">
                          <div class="col-12">
                            <div class="row">
                              <div class="col-12">
                                <h5 class="card-title text-primary" style="font-weight: 700;">Personal information</h5>
                              </div>
                              <div class="col-12">
                                <h6 class="text-warning mb-2">Demographic info.</h6>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12" style="font-size: 1.5em; font-weight: 700;"><span class="exp_fullname_en">NA</span></div>
                          <div class="col-12" style="font-size: 1.2em; font-weight: 700;"><span class="exp_fullname_th">NA</span></div>
                        </div>

                        <div class="row mt-2">
                          <div class="col-12" style="font-size: 1.1em;"><span class="exp_position_en">NA</span></div>
                          <div class="col-12"><span class="exp_position_th">NA</span></div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-12">
                            <hr class="mt-0">
                            <div class="row">
                              <div class="col-12">
                                <h6 class="text-warning mb-2">Contact information</h6>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12 col-sm-4">
                            Department :
                          </div>
                          <div class="col-12 col-sm-8">
                            <span class="p_dept_name">-</span>
                          </div>
                          <div class="col-12 col-sm-4">
                            E-mail address :
                          </div>
                          <div class="col-12 col-sm-8">
                            <span class="p_email">-</span>
                          </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-12">
                            <hr class="mt-0">
                            <div class="row">
                              <div class="col-12">
                                <h6 class="text-warning mb-2">Education</h6>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-12">
                            <ul class="info-ul education-ul">
                              No data
                            </ul>
                          </div>
                        </div>

                        <div class="row mt-3">
                          <div class="col-12">
                            <hr class="mt-0">
                            <div class="row">
                              <div class="col-12">
                                <h6 class="text-warning mb-2">Expertise</h6>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-12">
                            <div>
                              <ul class="info-ul expertise-ul">
                                No data
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="row mt-3 dn" id="headerPortal">
                          <div class="col-12">
                            <hr class="mt-0">
                            <div class="row">
                              <div class="col-12">
                                <h6 class="text-warning mb-2">Research profile on </h6>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-12">
                            <img src="./img/researchgate_icon.png" alt="" width="100" id="btnPortal_1" class="dn" style="cursor: pointer;">
                            <img src="./img/gs_icon.png" alt=""  width="100" id="btnPortal_2" class="dn" style="cursor: pointer;">
                            <img src="./img/sc_icon.png" alt=""  width="100" id="btnPortal_3" class="dn" style="cursor: pointer;">
                            <img src="./img/pubmed_icon.png" alt=""  width="100" id="btnPortal_4" class="dn" style="cursor: pointer;">
                          </div>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- .card basic info -->
              <!-- .card basic info -->



              <div class="card mb-3">
                <div class="card-header ">
                  <div class="row">
                    <div class="col-12 col-sm-8">
                      <h5 class="card-title text-primary" style="font-weight: 700;">Publications</h5>
                    </div>
                  </div>
                  <p class="card-category mb-0">Last of publications</p>
                </div>
                <div class="card-body ">
                  <div class="pub-list">
                    <div class="text-center pt-5 pb-5">
                      <div class="pb-3">
                        <i class="nc-icon nc-alert-circle-i text-muted" style="font-size: 4em;"></i>
                      </div>
                      No publication found.
                    </div>
                  </div>
                </div>
              </div>
              <!-- .card publication -->

              <div class="card mb-3 dn">
                <div class="card-header ">
                  <h5 class="card-title text-primary" style="font-weight: 700;">View statistic</h5>
                  <p class="card-category">Chart of amount of profile view last 15 days.</p>
                </div>
                <div class="card-body p-3">
                  <canvas id="speedChart" width="400" height="150"></canvas>
                </div>
              </div>
              <!-- .card view stat-->

            </div>
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
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <script src="./node_modules/preload.js/dist/js/preload.js"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <!-- <script src="./assets/demo/demo.js"></script> -->

  <script src="./assets/custom/js/expert-db.1.0.1.js"></script>
  <!-- <script src="./assets/custom/js/expert-authen.1.0.1.js"></script> -->

  <script>

    var curr_expert = window.localStorage.getItem(sys + '_selected_expert')

    $(document).ready(function() {
      app.get_expert_info('get_expert_info')
      app.get_curr_user_publication('', false)
      app.get_curr_user_expertise('', false)
      app.get_curr_user_education('', false)
      app.get_curr_user_research_portal('', false)
      app.set_view_stat(curr_expert)
      app.init_chart_profile_view(curr_expert)
    });

    $(function(){
      console.log(curr_expert);
      $('#btnPortal_1').click(function(){
          var jxr = $.post(api_url + 'get_curr_portal_link.php', {epid: curr_expert, par: 'researchgate'}, function(){})
                     .always(function(resp){
                       window.open(resp, target="_blank")
                     })
      })

      $('#btnPortal_2').click(function(){
          var jxr = $.post(api_url + 'get_curr_portal_link.php', {epid: curr_expert, par: 'googlescholar'}, function(){})
                     .always(function(resp){
                       window.open(resp, target="_blank")
                     })
      })

      $('#btnPortal_3').click(function(){
          var jxr = $.post(api_url + 'get_curr_portal_link.php', {epid: curr_expert, par: 'scopus'}, function(){})
                     .always(function(resp){
                       window.open(resp, target="_blank")
                     })
      })

      $('#btnPortal_4').click(function(){
          var jxr = $.post(api_url + 'get_curr_portal_link.php', {epid: curr_expert, par: 'pubmed'}, function(){})
                     .always(function(resp){
                       window.open(resp, target="_blank")
                     })
      })
    })
  </script>
</body>

</html>
