let sys = 'expertdb_'
var curr_user = window.localStorage.getItem(sys + 'uid')
var curr_role = window.localStorage.getItem(sys + 'role')
var page_index = 'index'

// var api_url = 'http://localhost/apduexpert/controller/'
// var root_domain = 'http://localhost/apduexpert/'

var api_url = 'http://apdu.medicine.psu.ac.th/expert/controller/'
var root_domain = 'http://apdu.medicine.psu.ac.th/expert/'

var app = {
  init_chart_profile_view: function(expert_id){
    var jxr = $.post(api_url + 'set_stat_view_profile.php', {epid: expert_id, method: 'view_stat'}, function(){}, 'json')
               .always(function(snap){
                 console.log(snap);

                 if((snap != '') && (snap.length > 0)){
                   snap.forEach(i=>{
                     var speedCanvas = document.getElementById("speedChart");

                     var dataFirst = {
                       data: i.data,
                       fill: false,
                       borderColor: '#fbc658',
                       backgroundColor: 'transparent',
                       pointBorderColor: '#fbc658',
                       pointRadius: 2,
                       pointHoverRadius: 2,
                       pointBorderWidth: 1,
                     };

                     var speedData = {
                       labels: i.label,
                       datasets: [dataFirst]
                     };

                     var chartOptions = {
                       legend: {
                         display: false,
                         position: 'top'
                       },
                       scales: {
                         yAxes: [{
                           ticks: {
                                min: 0,
                                max: 100,
                                stepSize: 20
                            }
                         }]
                       }
                     };

                     var lineChart = new Chart(speedCanvas, {
                       type: 'line',
                       hover: false,
                       data: speedData,
                       options: chartOptions
                     });
                   })
                 }

               })
  },
  set_view_stat: function(expert_id){
    var jxr = $.post(api_url + 'set_stat_view_profile.php', {epid: expert_id, method: 'add'}, function(){})
  },
  deleteEducation: function(id){
    preload.show()
    var param = {
      ept_id: id,
      uid: curr_user
    }
    var jxr = $.post(api_url + 'del_curr_education.php', param, function(){})
               .always(function(snap){
                 if(snap == 'Y'){
                   app.get_curr_user_education('get_curr_user_education')
                 }else{
                   preload.hide()
                   alert('Can not delete education.')
                 }
               })
  },
  deleteExpertise: function(id){
    preload.show()
    var param = {
      ept_id: id,
      uid: curr_user
    }
    var jxr = $.post(api_url + 'del_curr_expertise.php', param, function(){})
               .always(function(snap){
                 console.log(snap);
                 if(snap == 'Y'){
                   app.get_curr_user_expertise('get_curr_user_expertise')
                 }else{
                   preload.hide()
                   alert('Can not delete expertise.')
                 }
               })
  },
  get_curr_user_research_portal(check, a){
    var param = {
      epid: curr_expert,
      uid: curr_user
    }

    var jxr = $.post(api_url + 'get_curr_portal_list.php', param, function(){}, 'json')
               .always(function(snap){
                 if((snap != '') && (snap.length > 0)){
                   $('#headerPortal').removeClass('dn')
                   snap.forEach(i=>{
                     $('.p_portal_1').html(i.researchgate)
                     $('.p_portal_2').html(i.googlescholar)
                     $('.p_portal_3').html(i.scopus)
                     $('.p_portal_4').html(i.pubmed)

                     $('#txtPortal_1').val(i.researchgate)
                     $('#txtPortal_2').val(i.googlescholar)
                     $('#txtPortal_3').val(i.scopus)
                     $('#txtPortal_4').val(i.pubmed)

                     if((i.researchgate != '') && (i.researchgate != '-') && (i.researchgate != null)){
                       $('#btnPortal_1').removeClass('dn')
                     }

                     if((i.googlescholar != '') && (i.googlescholar != '-') && (i.googlescholar != null)){
                       $('#btnPortal_2').removeClass('dn')
                     }

                     if((i.scopus != '') && (i.scopus != '-') && (i.scopus != null)){
                       $('#btnPortal_3').removeClass('dn')
                     }

                     if((i.pubmed != '') && (i.pubmed != '-') && (i.pubmed != null)){
                       $('#btnPortal_4').removeClass('dn')
                     }
                   })
                 }else{
                   $('.p_portal_1').html('-')
                   $('.p_portal_2').html('-')
                   $('.p_portal_3').html('-')
                   $('.p_portal_4').html('-')
                 }
               })

    if(check == 'get_curr_user_education'){
      setTimeout(function(){ preload.hide() }, 500)
    }
  },
  get_curr_user_education: function(check, a){
    // expertise-ul
    var param = {
      epid: curr_expert,
      uid: curr_user
    }

    var jxr = $.post(api_url + 'get_curr_education_list.php', param, function(){}, 'json')
               .always(function(snap){
                 $('.education-ul').empty()
                 if((snap != '') && (snap.length > 0)){
                   snap.forEach(i=>{
                     $data = '<li><i class="fa fa-circle text-muted mr-2" style="font-size: 0.6em;"></i>' + i.edu_info + '</li>'
                     if(a){
                       $data = '<li><a href="Javascript:app.deleteEducation(\'' + i.edu_id + '\')"><i class="fa fa-times-circle text-danger mr-2" style="font-size: 1.3em;"></i></a>' + i.edu_info + '</li>'
                     }
                     $('.education-ul').append($data)
                   })
                 }else{
                   $('.education-ul').html('No data')
                 }
               })

    if(check == 'get_curr_user_education'){
      setTimeout(function(){ preload.hide() }, 500)
    }
  },
  get_curr_user_expertise: function(check, a){
    // expertise-ul
    var param = {
      epid: curr_expert,
      uid: curr_user
    }

    var jxr = $.post(api_url + 'get_curr_expertise_list.php', param, function(){}, 'json')
               .always(function(snap){
                 $('.expertise-ul').empty()
                 if((snap != '') && (snap.length > 0)){
                   snap.forEach(i=>{
                     $data = '<li><i class="fa fa-circle text-muted mr-2" style="font-size: 0.6em;"></i>' + i.ept_expertize + '</li>'
                     if(a){
                       $data = '<li><a href="Javascript:app.deleteExpertise(\'' + i.ept_id + '\')"><i class="fa fa-times-circle text-danger mr-2" style="font-size: 1.3em;"></i></a>' + i.ept_expertize + '</li>'
                     }
                     $('.expertise-ul').append($data)
                   })
                 }else{
                   $('.expertise-ul').html('No data')
                 }
               })

    if(check == 'get_curr_user_expertise'){
      setTimeout(function(){ preload.hide() }, 500)
    }

  },
  get_curr_user_publication: function(check){
    var param = {
      epid: curr_expert,
      uid: curr_user
    }

    var jxr = $.post(api_url + 'get_publication_list.php', param, function(){}, 'json')
               .always(function(snap){
                 $('.pub-list').empty()
                 if((snap != '') && (snap.length > 0)){
                   snap.forEach(i=>{
                     $sc = '<i class="fa fa-minus text-muted" style="font-size: 0.8em;"></i>', $pub = '<i class="fa fa-minus text-muted" style="font-size: 0.8em;"></i>', $isi = '<i class="fa fa-minus text-muted" style="font-size: 0.8em;"></i>', $tci = '<i class="fa fa-minus text-muted" style="font-size: 0.8em;"></i>'

                     if(i.pub_scopus == 1){ $sc = '<i class="fa fa-check-circle text-primary" style="font-size: 1.3em;"></i>' }
                     if(i.pub_pubmed == 1){ $pub = '<i class="fa fa-check-circle text-primary" style="font-size: 1.3em;"></i>' }
                     if(i.pub_isi == 1){ $isi = '<i class="fa fa-check-circle text-primary" style="font-size: 1.3em;"></i>' }
                     if(i.pub_tci == 1){ $tci = '<i class="fa fa-check-circle text-primary" style="font-size: 1.3em;"></i>' }

                     $data = '<div class="p-4"><div class="row"><div class="col-1"><i class="fa fa-circle text-muted mr-2" style="font-size: 0.6em;"></i></div>' +
                     '<div class="col-11 pl-0"><div class="row">' +
                       '<div class="col-12" id="rTitle"><b>' + i.pub_research_title + '</b></div>' +
                       '<div class="col-12" id="rAuthor"><b>Author</b> : ' + i.pub_author + '</div>' +
                       '<div class="col-12" id="rYear"><b>Year</b> : ' + i.pub_year + '</div>' +
                       '<div class="col-3 mt-2" id="rScopus">' + $sc + ' SCOPUS</div>' +
                       '<div class="col-3 mt-2" id="rPubmed">' + $pub + ' PUBMED</div>' +
                       '<div class="col-3 mt-2" id="rIsi">' + $isi+ ' ISI</div>' +
                       '<div class="col-3 mt-2" id="rTci">' + $tci + ' TCI</div>' +
                     '</div></div></div>'
                     // console.log($data);
                     $('.pub-list').append($data)
                   })
                 }else{
                   $data = '<div class="text-center pt-5 pb-5">' +
                     '<div class="pb-3">' +
                       '<i class="nc-icon nc-alert-circle-i text-muted" style="font-size: 4em;"></i>' +
                     '</div>' +
                     'No publication found.' +
                   '</div>'
                   $('.pub-list').html($data)
                 }
               })

    if(check == 'get_curr_user_publication'){
      setTimeout(function(){ preload.hide() }, 2000)
    }
  },
  createPortal: function(){
    var param = {
      portal_1: $('#txtPortal_1').val(),
      portal_2: $('#txtPortal_2').val(),
      portal_3: $('#txtPortal_3').val(),
      portal_4: $('#txtPortal_4').val(),
      method: 'add',
      epid: curr_expert,
      uid: curr_user
    }

    preload.show()

    var jxr = $.post(api_url + 'set_research_portal.php', param, function(){})
               .always(function(resp){
                 console.log(resp);
                 if(resp == 'Y'){
                   window.location.reload()
                 }else{
                   preload.hide()
                   alert('Can not update research portal information')
                 }
               })

  },
  createContact: function(){
    $check = 0
    $('.form-control').removeClass('is-invalid')

    if($('#txtEmail').val() == ''){ $check++; $('#txtEmail').addClass('is-invalid')}
    if($('#txtDept').val() == ''){ $check++; $('#txtDept').addClass('is-invalid')}

    if($check != 0){
      return ;
    }

    var param = {
      email: $('#txtEmail').val(),
      dept: $('#txtDept').val(),
      method: 'add',
      epid: curr_expert,
      uid: curr_user
    }

    preload.show()

    var jxr = $.post(api_url + 'set_contact.php', param, function(){})
               .always(function(resp){
                 console.log(resp);
                 if(resp == 'Y'){
                   window.location.reload()
                 }else{
                   preload.hide()
                   alert('Can not update contact information')
                 }
               })


  },
  createEducation: function(){
    $check = 0
    $('.form-control').removeClass('is-invalid')

    if($('#txtEducationInfo').val() == ''){ $check++; $('#txtEducationInfo').addClass('is-invalid')}

    if($check != 0){
      return ;
    }

    var param = {
      keyword: $('#txtEducationInfo').val(),
      method: 'add',
      epid: curr_expert,
      uid: curr_user
    }

    preload.show()

    var jxr = $.post(api_url + 'set_education.php', param, function(){})
               .always(function(resp){
                 if(resp == 'Y'){
                   $('#txtEducationInfo').val('')
                   $('.btnCloseModal').trigger('click')
                   app.get_curr_user_education('get_curr_user_education')
                 }else{
                   preload.hide()
                   alert('Can not add education')
                 }
               })
  },
  createExpertise: function(){
    $check = 0
    $('.form-control').removeClass('is-invalid')

    if($('#txtKeyword').val() == ''){ $check++; $('#txtKeyword').addClass('is-invalid')}

    if($check != 0){
      return ;
    }

    var param = {
      keyword: $('#txtKeyword').val(),
      method: 'add',
      epid: curr_expert,
      uid: curr_user
    }

    preload.show()

    var jxr = $.post(api_url + 'set_expertise.php', param, function(){})
               .always(function(resp){
                 if(resp == 'Y'){
                   $('#txtKeyword').val('')
                   $('.btnCloseModal').trigger('click')
                   app.get_curr_user_expertise('get_curr_user_expertise')
                 }else{
                   preload.hide()
                   alert('Can not add expertise')
                 }
               })
  },
  createPublication: function(){
    $check = 0
    $('.form-control').removeClass('is-invalid')

    if($('#txtTitle').val() == ''){ $check++; $('#txtTitle').addClass('is-invalid')}
    if($('#txtAuthor').val() == ''){ $check++; $('#txtAuthor').addClass('is-invalid')}
    if($('#txtYear').val() == ''){ $check++; $('#txtYear').addClass('is-invalid')}

    if($check != 0){
      return ;
    }

    var scopus = 0
    var pubmed = 0
    var isi = 0
    var tci = 0

    if($('#defaultCheck1').is(":checked")){ scopus = 1 }
    if($('#defaultCheck2').is(":checked")){ pubmed = 1 }
    if($('#defaultCheck3').is(":checked")){ isi = 1 }
    if($('#defaultCheck4').is(":checked")){ tci = 1 }

    var param = {
      title: $('#txtTitle').val(),
      author: $('#txtAuthor').val(),
      year: $('#txtYear').val(),
      cat1: scopus,
      cat2: pubmed,
      cat3: isi,
      cat4: tci,
      method: 'add',
      epid: curr_expert,
      uid: curr_user
    }

    preload.show()

    var jxr = $.post(api_url + 'set_publication.php', param, function(){})
               .always(function(resp){
                 if(resp == 'Y'){

                   $('#txtTitle').val('')
                   $('#txtAuthor').val('')
                   $('#txtYear').val('')
                   $('#defaultCheck1').prop('checked', false);
                   $('#defaultCheck2').prop('checked', false);
                   $('#defaultCheck3').prop('checked', false);
                   $('#defaultCheck4').prop('checked', false);

                   $('.btnCloseModal').trigger('click')
                   app.get_curr_user_publication('get_curr_user_publication')
                 }else{
                   preload.hide()
                   alert('Can not add publication')
                 }
               })
  },
  deletePersinInfo: function(i){
    var r = confirm("Are you sure?");
    if (r == true) {
      var param = {
        pid: i,
        uid: curr_user
      }
      preload.show()
      var jxr = $.post(api_url + 'del_expertise_person.php', param, function(){})
                 .always(function(resp){
                   console.log(resp);
                   if(resp == 'Y'){
                     app.getPerson('getPerson')
                   }else{
                     preload.hide()
                     alert('Error')
                   }
                 })
    }
  },
  getPersinInfo: function(i){
    window.localStorage.setItem(sys + '_selected_expert', i)
    window.location = 'manage_expert.html'
  },
  getPerson: function(check){
    var param = {
      uid: curr_user
    }
    var jxr = $.post(api_url + 'get_expertise_list.php', param, function(){}, 'json')
               .always(function(snap){
                 console.log(snap);
                 if((snap != '') && (snap.length > 0)){
                   $('#staff-list').empty()
                   snap.forEach(i=>{
                     $dept = i.dept_name_en
                     if(i.p_dept == null){
                       $dept = '-'
                     }
                     $data = '<tr>' +
                                '<td>' + i.p_pid + '</td>' +
                                '<td>' + i.p_fname_en + ' ' + i.p_lname_en + '</td>' +
                                '<td>' + $dept + '</td>' +
                                 '<td class="text-right">' +
                                   '<div style="font-size: 0.8em;" class="pt-2">' +
                                     '<a href="Javascript:app.getPersinInfo(\'' + i.pid + '\')" class="btn btn-primary btn-icon btn-sm mr-1"><i class="nc-icon nc-zoom-split"></i></a>' +
                                     '<a href="Javascript:app.deletePersinInfo(\'' + i.pid + '\')" class="btn btn-sm btn-danger btn-icon"><i class="nc-icon nc-simple-remove"></i></a>' +
                                   '</div>' +
                                 '</td>' +
                               '</tr>'
                      $('#staff-list').append($data)
                   })

                   $("#table-1").dataTable({
                     "columnDefs": [
                       { "sortable": false, "targets": [2,3] }
                     ]
                   });
                 }else{

                 }
                 if(check == 'getPerson'){
                   setTimeout(function(){ preload.hide() }, 2000)
                 }
               })
  },
  showModal(id){
    $('#' + id).modal()
  },
  get_expert_info(check){
    var param = {
      p_id: curr_expert,
      uid: curr_user
    }
    var jxr = $.post(api_url + 'get_expertise.php', param, function(){}, 'json')
               .always(function(snap){
                 if((snap != '') && (snap.length > 0)){
                   snap.forEach(i=>{

                     $('#txtEid').val(i.pid)
                     $('.exp_fullname_en').html(i.p_fname_en + ' ' + i.p_lname_en)
                     $('.exp_fullname_th').html(i.p_fname_th + ' ' + i.p_lname_th)

                     $('.exp_position_en').html(i.p_position_en)
                     $('.exp_position_th').html(i.p_position_th)

                     $('.p_dept_name').html(i.dept_name_en)
                     $('.p_email').html(i.p_email)

                     $('#txtEmail').val(i.p_email)
                     $('#txtDept').val(i.p_dept)

                     if(i.profile_filename != null){
                       // root_domain
                       // root_domain + i.profile_filename
                       $('.exp_profile').html('<img src="' + root_domain + i.profile_filename + '" alt="" class="img-fluid" id="profile_img">')
                     }

                   })
                 }else{
                   alert('Unknown error')
                   window.location = './'
                   return ;
                 }
               })
    if(check == 'get_expert_info'){
      setTimeout(function(){ preload.hide() }, 500)
    }
  },
  createExpert(){

    $check = 0;
    $('.form-control').removeClass('is-invalid')

    if($('#txtFname_en').val() == ''){
      $check++
      $('#txtFname_en').addClass('is-invalid')
    }

    if($('#txtFname_th').val() == ''){
      $check++
      $('#txtFname_th').addClass('is-invalid')
    }

    if($('#txtLname_en').val() == ''){
      $check++
      $('#txtLname_en').addClass('is-invalid')
    }

    if($('#txtLname_th').val() == ''){
      $check++
      $('#txtLname_th').addClass('is-invalid')
    }

    if($check != 0){
      return ;
    }

    preload.show()

    var param = {
      per_id: $('#txtPersonal_id').val(),
      position_en: $('#txtPosition_en').val(),
      position_th: $('#txtPosition_th').val(),
      fname_en: $('#txtFname_en').val(),
      fname_th: $('#txtFname_th').val(),
      lname_en: $('#txtLname_en').val(),
      lname_th: $('#txtLname_th').val(),
      uid: curr_user
    }

    var jxr = $.post(api_url + 'create_expertise.php', param, function(){}, 'json')
               .always(function(snap){
                 // console.log(snap);
                 // preload.hide()
                 // return ;
                 if((snap != '') && (snap.length > 0)){

                   snap.forEach(i=>{
                     if(i.status == 'Y'){
                       window.localStorage.setItem(sys + '_selected_expert', i.p_id)
                       window.location = 'manage_expert.html'
                     }else if(i.status == 'D'){
                       aler('Duplicate')
                     }else{
                       // Can not create
                       aler('Error')
                     }
                   })

                   preload.hide()
                 }else{
                   // Can not create
                   preload.hide()
                 }
               })

  }
}

$(function(){

})

function search(method, key){

  if(key == ''){
    $default = '<div class="pt-5 pb-5 text-center">' +
                  '<i class="nc-icon nc-alert-circle-i text-muted" style="font-size: 4em;"></i>' +
                  '<div class="pt-3">No result found or please select search method.</div>' +
               '</div>'
    $('.result-panal').html($default)

    $default = '<div class="col-12 pt-5 pb-5 text-center">' +
                  '<i class="nc-icon nc-alert-circle-i text-muted" style="font-size: 4em;"></i>' +
                  '<div class="pt-3">No result found or please select search method.</div>' +
               '</div>'
    $('#result-panal-card').html($default)

    return ;
  }
  var param = {
    meth: method,
    searchkey: key
  }
  preload.show()
  var jxr = $.post(api_url + 'search.php', param, function(){}, 'json')
             .always(function(snap){

               $('.result-panal').empty()
               $('#result-panal-card').empty()

               if((snap != '') && (snap.length > 0)){
                 $data = '<div class="person_r d-none d-sm-block"><div class="row">' +
                             '<div class="col-12 col-sm-4"><span class="text-dark" style="font-weight: 700;">Full name</span></div>' +
                             '<div class="col-12 col-sm-8"><span class="text-dark" style="font-weight: 700;">Expertise</span></div>' +
                           '</div></div>';
                 $('.result-panal').append($data)

                 snap.forEach(i=>{

                   console.log(i);
                   $data = '<div class="person_r"><div class="row">' +
                               '<div class="col-12 col-sm-4"><a href="Javascript:viewInfo(\'' + i.pid + '\')" class="text-primary" style="font-weight: 700;">' + i.p_fname_en + ' ' +  i.p_lname_en + '</a></div>' +
                               '<div class="col-12 col-sm-8">' + i.expertise + '</div>' +
                             '</div></div>';
                   $('.result-panal').append($data)

                   var profile_cover = '<img src="' + root_domain + i.profile_filename + '" alt="..." style="-webkit-filter-: blur(5px); filter-: blur(5px);">'
                   var profile = '<img class="avatar border-gray" src="' + root_domain + i.profile_filename + '" alt="..." style="width: 150px; height: 150px;">'
                   if(i.profile_filename == null){
                     profile_cover = '<img src="./img/tmp-user-img.png" style="-webkit-filter: blur(5px); filter: blur(5px);">'
                     profile = '<img class="avatar border-gray" src="./img/tmp-user-img.png"  style="width: 150px; height: 150px;">'
                   }

                   $data = '<div class="col-12 col-sm-4 col-md-3">' +
                     '<div class="card card-user">' +
                       // '<div class="image" style="height: 100px; background: #fff;">' +
                         // profile_cover +
                       // '</div>' +
                       '<div class="card-header"></div>' +
                       '<div class="card-body">' +
                         '<div class="author" style="padding-top: 80px;">' +
                           '<a href="Javascript:viewInfo(\'' + i.pid + '\')">' +
                             profile +
                             '<h5 class="title">' + i.p_fname_en + ' ' +  i.p_lname_en + '</h5>' +
                           '</a>' +
                           '<p class="description text-dark" style="font-weight: 400;">' + i.dept_name_en +'</p>' +
                         '</div>' +
                         '<p class="description text-center text-dark" style="font-weight: 400; font-size: 1em;">' + i.expertise + '</p>' +
                       '</div>' +
                     '</div>' +
                   '</div>'

                   $('#result-panal-card').append($data)
                 })
                 $('html,body').animate({ scrollTop: 9999 }, 'slow');
                 preload.hide()
               }else{
                 $default = '<div class="pt-5 pb-5 text-center">' +
                               '<i class="nc-icon nc-alert-circle-i text-muted" style="font-size: 4em;"></i>' +
                               '<div class="pt-3">No result found or please select search method.</div>' +
                            '</div>'
                 $('.result-panal').html($default)

                 $default = '<div class="col-12 pt-5 pb-5 text-center">' +
                               '<i class="nc-icon nc-alert-circle-i text-muted" style="font-size: 4em;"></i>' +
                               '<div class="pt-3">No result found or please select search method.</div>' +
                            '</div>'
                 $('#result-panal-card').html($default)
                 preload.hide()
               }

               $('#result-panal-card')[0].scrollIntoView(true);
             })
}

function viewInfo(id){
  window.localStorage.setItem(sys + '_selected_expert', id)
  window.location = 'view_expert'
}
