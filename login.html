<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Faculty of Medicine Expert Database
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
            <a class="navbar-brand text-white" href="index.html">MedExpertise.DB</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">


          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">

        <div class="row">
          <div class="col-12  col-sm-4 offset-sm-4" style="margin-top: 80px;">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Sign up</h5>
                <p class="card-category">Use you RMIS account</p>
              </div>
              <div class="card-body pb-0">
                <form onsubmit="return false;" class="login-form">
                  <div class="form-group">
                    <input type="email" id="txtUsername" class="form-control" placeholder="E-mail address ..." autofocus>
                  </div>

                  <div class="form-group">
                    <input type="password" id="txtPassword" class="form-control" placeholder="Password ...">
                  </div>

                  <div class="form-group mb-0">
                    <button class="btn btn-primary btn-block mb-0" type="submit">Log in</button>
                  </div>
                </form>
              </div>
              <div class="card-footer pt-3">
                <div class="stats" onclick="window.open('http://rmis2.medicine.psu.ac.th/rmis', target='_blank')" style="cursor: pointer;">
                  Forget password ?
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <footer class="footer footer-black  footer-white pt-0">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
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
              </ul>
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
  <script src="./assets/demo/demo.js"></script>
  <script src="./node_modules/preload.js/dist/js/preload.js"></script>

  <script src="./assets/custom/js/expert-db.1.0.1.js"></script>
  <!-- <script src="./assets/custom/js/expert-authen.1.0.1.js"></script> -->

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      preload.hide()
    });

    $(function(){
      $('.login-form').submit(function(){
        $check = 0
        $('.form-control').removeClass('is-invalid')
        if($('#txtUsername').val() == ''){
          $('#txtUsername').addClass('is-invalid')
          $check++
        }

        if($('#txtPassword').val() == ''){
          $('#txtPassword').addClass('is-invalid')
          $check++
        }

        if($check != 0){
          return ;
        }

        preload.show()

        var parm = {
          username: $('#txtUsername').val(),
          password: $('#txtPassword').val()
        }

        var jxr = $.post(api_url + 'check_user.php', parm, function(){}, 'json')
                   .always(function(snap){
                     if((snap != '') && (snap.length > 0)){
                      snap.forEach(i=>{
                        window.localStorage.setItem(sys + 'uid', i.per_id)
                        window.localStorage.setItem(sys + 'role', i.role)
                        window.location = './' + i.role + '/index.html';
                      })
                     }else{
                       // Check from rmis
                       var parm = {
                         username: $('#txtUsername').val(),
                         password: $('#txtPassword').val(),
                         role: 'pm'
                       }
                       var jxhr = $.post('http://rmis2.medicine.psu.ac.th/rmis/controller/authen.php', parm, function(){}, 'json')
                                   .always(function(rmis_snap){
                                     if((rmis_snap!='') && (rmis_snap.length > 0)){
                                       rmis_snap.forEach(function(i){
                                         if(i.authen_status == 'Already register'){
                                           preload.hide()
                                           alert('Invalid user account. (Code Ex-00101)')
                                           return ;
                                         }else if(i.authen_status == 'Found by useraccount'){

                                           var parm = {
                                             username: $('#txtUsername').val(),
                                             password: $('#txtPassword').val(),
                                             per_id: i.data.id_pm,
                                             rmis_id: i.data.id
                                           }

                                           var jxr2 = $.post(api_url + 'create_user.php', parm, function(){})
                                                       .always(function(resp){
                                                         console.log(resp);
                                                         if(resp == 'Y'){
                                                           window.localStorage.setItem(sys + 'uid', i.data.id_pm)
                                                           window.localStorage.setItem(sys + 'role', i.data.role)
                                                           window.location = './pm/index.html';
                                                         }else{
                                                           preload.hide()
                                                           alert('Invalid user account. (Code Ex-00102)')
                                                           return ;
                                                         }
                                                       })
                                         }else{
                                           preload.hide()
                                           alert('Invalid user account. (Code Ex-00103)')
                                           return ;
                                         }
                                       })

                                     }else{
                                       preload.hide()
                                       alert('Invalid user account. (Code Ex-00104)')
                                       return ;
                                     }
                                   })
                     }
                   })
      })
    })
  </script>
</body>

</html>
