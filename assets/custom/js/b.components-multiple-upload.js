"use strict";

var myDropzone = new Dropzone("#mydropzone", {
  // url: "#"
  url: '../controller/upload-profile.php',
  addRemoveLinks: true,
  method: 'put',
  chunking: true,
  forceChunking: true,
  autoQueue: true,
  autoProcessQueue: true,
  maxFiles: 1,
  // acceptedFiles: 'application/pdf, .docx, .doc'
  acceptedFiles: 'image/jpeg,image/png'
});

var minSteps = 6, maxSteps = 60, timeBetweenSteps = 100, bytesPerStep = 100000;

myDropzone.autoDiscover = false;

myDropzone.on("addedfile", function(file) {
    var reader = new FileReader();
    if (myDropzone.files.length < 4) {
        reader.onload = function(event) {
            console.log("file being uploaded ")
            $('.pg-bar').removeClass('dn')
            $('.upload-form').addClass('dn')

            var storageRef = firebase.storage().ref("submission/" + current_user + '/' + file.name);
            var task = storageRef.put(file);

            task.on('state_changed', function(snap){
              var pct = (snap.bytesTransferred/snap.totalBytes) * 100
              $('#loadding_bar').css('width', pct + "%");
            }, function error(err){
              // console.log();
              alert(err)
              $('.pg-bar').addClass('dn')
              $('.upload-form').removeClass('dn')
              $('#loadding_bar').css('width', "0%");
            }, function complete(){
              console.log('Complete');
              $('.btnCloseModal').trigger('click')
              // console.log(file.getDownloadUrl());
              // return ;

              // -------- Add file name to database
              //
              // var param = {
              //   file_uid: current_user,
              //   file_upload_datetime: main_function.get_current_datetime(),
              //   file_name: file.name,
              //   file_category: 'abstract_submission',
              //   file_abs_session: current_abstract_sess_id
              // }
              //
              // let firestore = firebase.firestore()
              // firestore.collection("File_upload").add(param).then(function(){
              //   checkUploadedfile(current_user)
              //
              //   setTimeout(function(){
              //     myDropzone.removeFile(file);
              //     $('.pg-bar').addClass('dn')
              //     $('.upload-form').removeClass('dn')
              //     $('#loadding_bar').css('width', "0%");
              //   }, 500)
              //
              // });

              // --------------------


            })

            return ;
        };
        reader.readAsDataURL(file);
    } else {
        console.log('skipping file as we are excceding the upload limit')
    }
});
