<script type="text/javascript">
	
// loadCredentialManagementDocs();



  credentialDocs = "";
            function loadCredentialManagementDocs() {
                var stores = '';
                var menudata = '';
                
                $.post('controllers/credential_management_c.php', {action: "loadUserDocs"}, function (e) {
                    if (e === undefined || e.length === 0 || e === null) {
                                    menudata += '<li><a href="#"> There was an error processing your request. </a></li>';
                    }else{     
                    credentialDocs += '<div class="clearfix"></div>';
                    credentialDocs += '<div class="row"><div class="col-md-12"><div class="x_panel"><div class="x_title">';
                    credentialDocs += '<h2>Credentials</h2>';
                    credentialDocs += '<ul class="nav navbar-right panel_toolbox">';
                    credentialDocs += '<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>';
                    credentialDocs += '<li class="dropdown">';
                    // credentialDocs += '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i></a>';
                    // credentialDocs += '<ul class="dropdown-menu" role="menu"><li><a href="#">Settings 1</a></li><li><a href="#">Settings 2</a></li></ul>';
                    
                    // credentialDocs += '</li><li><a class="close-link"><i class="fa fa-close"></i></a></li>';

                    credentialDocs += '</ul>';
                    credentialDocs += '<div class="clearfix"></div>';
                    credentialDocs += '</div>';
                    credentialDocs += '<div class="x_content">';
                    credentialDocs += '<p>Upload your latest credentials. Please follow the instructions noted in each popup screen.</p>';


                    //Starting the table to list all the docs

                    credentialDocs += '<table class="table table-striped projects">';
                    credentialDocs += '<thead>';
                    credentialDocs += '<tr>';
                    credentialDocs += '<th style="width: 1%"></th><th style="width: 20%">Credential</th><th></th><th></th><th></th><th style="width: 30%">Action</th>';
                    credentialDocs += '</tr>';
                    credentialDocs += '</thead>';
                    credentialDocs += '<tbody id="tbody"';



                        $.each(e, function (index, qd){
                            
                          console.log(e);
                          credentialDocs += '<tr>';
                          credentialDocs += '<td></td>';
                          credentialDocs += '<td style="width: 50%">';
                            credentialDocs += '<large><a>'+qd.document+'</a></large>';
                            credentialDocs += '<br />';                            
                          credentialDocs += '</td>';
                          credentialDocs += '<td>';
                            credentialDocs += '<large>            </large>';

                           credentialDocs += '</td>';
                          credentialDocs += '<td class="project_progress">';
                            // credentialDocs += '<large>'+qd.uploadDate+'</large>';
                          credentialDocs += '</td>';
                          credentialDocs += '<td>';
                            credentialDocs += '<large></large>';

                          credentialDocs += '</td>';
                          credentialDocs += '<td>';

                          credentialDocs+= '<large> OFF </large>';

                         
                         credentialDocs += '<label class="switch">';
                              credentialDocs += '<input type="checkbox">';
                              credentialDocs += '<span class="slider round"></span></label>';
                              credentialDocs+= '<large> ON </large>';
                          // credentialDocs += '<button type="button" onclick="selectedDocument('+qd.document_id+')" class="btn btn-info btn-xs fa fa-user-plus" data-toggle="modal" data-target="#myModal"  data-backdrop="static" style ="background-color: green" id="'+qd.document_id+' "> Authorized Docs.</button>';
                            
                            // credentialDocs += '<button type="button" onclick="uploadDocModal('+qd.document_id+')" class="btn btn-info btn-xs fa fa-pencil" data-toggle="modal" data-target="#uploadDocModal" data-backdrop="static" style ="background-color: red" id="'+qd.document_id+'"> Revoke All</button>';
                          credentialDocs += '</td>';
                        credentialDocs += '</tr>';


                        });
                    }
                    $('#credentialPreviews').html('').append(credentialDocs);                     
                }, "json");

                      credentialDocs += '</tbody>';
                    credentialDocs += '</table>';
                    credentialDocs += '</div></div></div></div></div></div>';

                // $.post('controllers/credential_management_c.php', {action: "loadUserDocsDetails"}, function (e) {
                //     if (e === undefined || e.length === 0 || e === null) {
                //                     menudata += '<li><a href="#"> There was an error processing your request. </a></li>';
                //     }else{                    
                //         $.each(e, function (index, qd){
                            
                //           console.log(e);
  


                //         });
                //     }
                //     $('#tbody').html('').append(credentialDocs);                     
                // }, "json");
      
            }

    $("#close").click(function()
  {
     console.log("Close has been clicked");
      location.reload();      
      document.getElementById("file").value = "";

      $("#message").empty();

      $('#image_preview').attr('src', '');
      $('#image_preview').css("display", "none");
      $('#image_preview').attr('width', '0px');
      $('#image_preview').attr('height', '0px');

      $('#credentialPreview').attr('src', '');
      $('#credentialPreview').css("display", "none");
      $('#credentialPreview').attr('width', '0px');
      $('#credentialPreview').attr('height', '0px');      
      

  });

  // Clearing the attributes set when it was last opened then closed

    $("#closing").click(function()
  {
     console.log("Close has been clicked");
     location.reload();
      
      document.getElementById("file").value = "";

      $("#message").empty();

      $('#image_preview').attr('src', '');
      $('#image_preview').css("display", "none");
      $('#image_preview').attr('width', '0px');
      $('#image_preview').attr('height', '0px');

      $('#credentialPreview').attr('src', '');
      $('#credentialPreview').css("display", "none");
      $('#credentialPreview').attr('width', '0px');
      $('#credentialPreview').attr('height', '0px');
      


  });            

function uploadDocModal(document_id){



  console.log("Upload Doc modal document id: " + document_id);

switch(document_id) {
    case 1:
        console.log("Uploading CV");
        $('#modal-title').html('').append("Upload Current CV");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br><ul><li>Ensure work history AND education are in a month / year format.</li><li>Make sure there is explanation for any gaps in your education AND work history. (Even if you took a month off between Medical School and Residency)</li><li>Board Certifications, State Licenses, Perspective authorities, and life support certifications must show license number and expiration date.</li></ul>");
        break;
    case 2:
        console.log("Uploading profile pic");
        $('#modal-title').html('').append("Upload Professional Image");
        $('#modal-description-upload').html('').append("<p>***ONLY .jpg IS ACCEPTED***</p><br><ul><li>Passport size photo is best</li><li>Or, Take a selfie! Just make sure the image is not blurry.</li></ul>");
        break;
    case 3:
        console.log("Uploading profile DL");
        $('#modal-title').html('').append("Upload State Drivers License");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;
    case 4:
        console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload MD/DO Diploma");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;        
    case 5:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Post Graduation Certificate");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;        
    case 6:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Life Support Certification");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br><ul><li>American Heart Association documents preferred</li><li>BLS, ACLS, PALS, ATLS, NRP, etc..</li></ul>");        
        break;                        
    case 7:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Flu Record");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;        
    case 8:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Tuberculosis Vaccination Record");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;        
    case 9:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Insurance Certification");
        $('#modal-description-upload').html('').append('<p>***ONLY PDF IS ACCEPTED***</p><br><ul><li>Who were your liability insurance carriers?</li><li>You can request a "COI" form your places of employment.</li><li>It must show liability coverage, tail coverage, claims (if applicable), contact information.</li></ul>"');
        break;        
    case 10:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload State License Certifications");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        
        break;        
    case 11:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload DEA Certifications");
        $('#modal-description-upload').html('').append('<p>***ONLY PDF IS ACCEPTED***</p><br><ul><li>There is no longer a "federal" DEA.</li><li>Each state requires a DEA with a state-specific hospital address on it.</li></li></ul>"');
        break;        
    case 12:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload CSR Certification");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br><ul><li>Controlled substance registration.</li><li>Prescriptive authority in addition to the DEA.</li><li>Required in: ID, NM, UT, WY, NM, TX, OK, IA, MO, LA, IL, IN, AL, MI, HI, SC, MD, DC, DE, NJ, CT, RI, MA.</li><ul>");
        break;        
    case 13:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Board Certification");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;        
    case 14:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Malpractice Certification");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;        
    case 15:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Immunization Certification");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br><p>As recommended by the Center of Disease Control for Healthcare workers: </p><br><ul><li>MMR (Measles, Mumpls, Rubella)</li><li>Hepatitis B</li><li>Influenze</li><li>Varicella</li><li>Td/Tdap (Tetanus/Diphtheria/ Pertussis)</li><li>Flu (within last 12 months)</li></ul>");
        break;        
    case 16:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Passport ");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;        
    case 17:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Reference 1 (Peer)");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;        
    case 18:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Reference 2 (Peer)");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;        
    case 19:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title').html('').append("Upload Reference 3 (Supervisor)");
        $('#modal-description-upload').html('').append("<p>***ONLY PDF IS ACCEPTED***</p><br>");
        break;        

    default:
        console.log("Default case");
}








    $(document).ready(function (e) {    
      console.log("Upload image document ID: " + document_id);
      $("#uploadimage").on('submit',(function(e) {
        
        var postData = {
          action: "UploadDocFilePath",
          document_id: document_id
        }

        var formData = new FormData(this);
        formData.append("document_id", document_id);

        console.log("FORM DATA: ");
        console.log(formData.value);

// for (var value of formData.values()) {
//         var i = 0;
//         console.log(i++);

//         console.log(value);
//       }
        e.preventDefault();
        $("#message").empty();
        $('#loading').show();
          $.ajax({
            url: "ajax_php_file.php",   // Url to which the request is send
            type: "POST",               // Type of request to be send, called as method
            data: formData,             // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,         // The content type used when sending data to the server.
            cache: false,               // To unable request pages to be cached
            processData:false,          // To send DOMDocument or non processed data file it is set to false
            success: function(data){    // A function to be called if request succeeds{
            $('#loading').hide();
            $("#message").html(data);
            }
          });
      }));


      // $.post('controllers/df_user_c.php', postData, function (e) {
      //               if (parseInt(e.msgType) == 1) {
      //                   alertify.success(e.msg, 1350);
      //                   setTimeout(function () {
      //                       confirmModal.modal('hide')
      //                   }, 1400);
      //               } else {
      //                   alertify.error(e.msg, 1300);
      //               }
      // }, "json");

  // Function to preview image after validation
  $(function() {
    $("#file").change(function() {
        $("#message").empty(); // To remove the previous error message
        var file = this.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg","image/png","image/jpg","application/pdf"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3])))
        {
          $('#previewing').attr('src','noimage.png');
          $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
          return false;
        }else if((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])){
          var reader = new FileReader();
          reader.onload = imageIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }else if((imagefile==match[3])){
          var reader = new FileReader();
          reader.onload = pdfIsLoaded;
          reader.readAsDataURL(this.files[0]);
        }
      });
  });

  function imageIsLoaded(e) {  
      $('#image_preview').html('').append("<img id='previewing' src='' style='margin-left: auto;margin-right: auto;display: block;'/>");
      // $("#file").css("color","green");
      $('#image_preview').css("display", "block");
      $('#previewing').attr('src', e.target.result);
      $('#previewing').attr('width', '75%');
      $('#previewing').attr('height', '60%');
    };
  });

    function pdfIsLoaded(e){
      // $("#file").css("color","green");
      // $('#pdf_preview').css("display", "block");
      // console.log(e.target.result);

      $('#image_preview').html('').append("<embed src='' id='previewPDF' type='application/pdf' style='width: 100%;margin-right: auto; margin-left: auto;'>");    
      $('#image_preview').css("display", "block");                 
      $('#previewPDF').attr('src', e.target.result);

      $('#previewPDF').attr('width', '500px');
      $('#previewPDF').attr('height', '500px');
    }
}

function selectedDocument(document_id){

    $("#close").click(function()
  {
     console.log("Close has been clicked");

     location.reload();
      
      document.getElementById("file").value = "";

                            $('#credentialPreview').html('').append("<embed src='' id='credPreviewingPDF' type='application/pdf' style='width: 100%;margin-right: auto; margin-left: auto;'>");    
                            $('#credentialPreview').css("display", "block");
                            $('#credPreviewingPDF').attr('src', " ");
                            $('#credPreviewingPDF').attr('width', '75%');
                            $('#credPreviewingPDF').attr('height', '60%');        
      

  });

  // Clearing the attributes set when it was last opened then closed

    $("#closing").click(function()
  {
     console.log("Closing has been clicked");
     location.reload();
      
      document.getElementById("file").value = "";
$('#credentialPreview').html('').append("<embed src='' id='credPreviewingPDF' type='application/pdf' style='width: 100%;margin-right: auto; margin-left: auto;'>");    
                            $('#credentialPreview').css("display", "block");
                            $('#credPreviewingPDF').attr('src', " ");
                            $('#credPreviewingPDF').attr('width', '75%');
                            $('#credPreviewingPDF').attr('height', '60%');              

  });


  console.log("DOCUMENT ID: " + document_id);

  var postData = {
    action : "retrieveDocument",
    document_id : document_id
  };
  var credentialPreview = "";
  var menudata = "";
                  $.post('controllers/credential_management_c.php', postData, function (e) {
                    if (e === undefined ||  e === null) {
                                    menudata += '<li><a href="#"> There was an error processing your request. </a></li>';
                    }else{                    
                        $.each(e, function (index, qd){                            
                          console.log(e);        

                          if(qd.document_id == 1 || qd.document_id == 3|| qd.document_id == 4 || qd.document_id == 5 || qd.document_id == 6 || qd.document_id == 7 || qd.document_id == 8 || qd.document_id == 9 || qd.document_id == 10 || qd.document_id == 11 || qd.document_id == 12 || qd.document_id == 13 || qd.document_id == 14 || qd.document_id == 15 || qd.document_id == 16 || qd.document_id == 17 || qd.document_id == 18 || qd.document_id == 19){
                            $('#credentialPreview').html('').append("<embed src='' id='credPreviewingPDF' type='application/pdf' style='width: 100%;margin-right: auto; margin-left: auto;'>");    
                            $('#credentialPreview').html('').append("<embed src='' id='credPreviewingPDF' type='application/pdf' style='width: 100%;margin-right: auto; margin-left: auto;'>");    
                            $('#credentialPreview').css("display", "block");
                            $('#credPreviewingPDF').attr('src', qd.filePath);
                            $('#credPreviewingPDF').attr('width', '75%');
                            $('#credPreviewingPDF').attr('height', '60%');                            
                          }else if(qd.document_id == 2){
                            // $('#credentialPreview').html('').remove("<embed src='' id='credPreviewingPDF' type='application/pdf' style='width: 100%;margin-right: auto; margin-left: auto;'>");    
                            $('#credentialPreview').html('').append("<img id='credPreviewing' src='' style='margin-left: auto;margin-right: auto;display: block;'/>");
                            // $("#file").css("color","green");
                            $('#credentialPreview').css("display", "block");                          
                            $('#credPreviewing').attr('src', qd.filePath);

                            $('#credPreviewing').attr('width', '500px');
                            $('#credPreviewing').attr('height', '500px');  
                          }
                          // else if(qd.document_id == 3){
                          //   $('#credentialPreview').html('').append("<img id='credPreviewing' src='' style='margin-left: auto;margin-right: auto;display: block;'/>");
                          //   // $("#file").css("color","green");
                          //   $('#credentialPreview').css("display", "block");                          
                          //   $('#credPreviewing').attr('src', qd.filePath);

                          //   $('#credPreviewing').attr('width', '500px');
                          //   $('#credPreviewing').attr('height', '500px');  
                          // }else if(qd.document_id == 4){
                          //   $('#credentialPreview').html('').append("<embed src='' id='credPreviewingPDF' type='application/pdf' style='width: 100%;margin-right: auto; margin-left: auto;'>");    
                          //   $('#credentialPreview').css("display", "block");
                          //   $('#credPreviewingPDF').attr('src', qd.filePath);
                          //   $('#credPreviewingPDF').attr('width', '75%');
                          //   $('#credPreviewingPDF').attr('height', '60%');                             
                          // }
                          else{
                            $('#credentialPreview').html('').append("<img id='credPreviewing' src='' style='margin-left: auto;margin-right: auto;display: block;'/>");
                            $('#credentialPreview').css("display", "block");
                            $('#credPreviewingPDF').attr('src', qd.filePath);
                            $('#credPreviewingPDF').attr('width', '75%');
                            $('#credPreviewingPDF').attr('height', '60%');                            
                          }

                          // qd.filePath = " ";

                        });
                    }
                    // $('#tbody').html('').append(credentialDocs);                     
                }, "json");

switch(document_id) {
    case 1:
        console.log("Uploading CV");
        $('#modal-title-view').html('').append("Current CV");

        break;
    case 2:
        console.log("Uploading profile pic");
        $('#modal-title-view').html('').append("Photo");
        break;
    case 3:
        console.log("Uploading profile DL");
        $('#modal-title-view').html('').append("Drivers License");
        break;
    case 4:
        console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("MD/DO Diploma");
        break;        
    case 5:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Post Graduate Training Certificate");
        break;        
    case 6:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Current Life Support Certifications");
        break;                        
    case 7:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Flu Record");
        break;        
    case 8:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Tuberculosis Record (Last 12 Months)");
        break;        
    case 9:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Certificate of Insurance (Last 10 years)");
        break;        
    case 10:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("State Medical License Practice");
        break;        
    case 11:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("DEA Certification");
        break;        
    case 12:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("CSR Certification");
        break;        
    case 13:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Board Certification");
        break;        
    case 14:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Malpractice Certification");
        break;        
    case 15:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Immunization Record");
        break;        
    case 16:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Passport");
        break;        
    case 17:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Reference 1 (Peer)");
        break;        
    case 18:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Reference 2 (Peer)");
        break;        
    case 19:
        // console.log("Uploading MD/DO Diploma");
        $('#modal-title-view').html('').append("Reference 3 (Supervisor)");
        break;        

    default:
        console.log("Default case");
}                          
            }


        // $pgradCertTable = "hpd_postGradCert";
        // $lifeSupportCertTable = "hpd_lifeSupportCert";
        // $fluRecordTable = "hpd_fluRecord";
        // $tbTable = "hpd_tb";
        // $insuranceCertTable = "hpd_insuranceCert";
        // $stateLicenseTable = "hpd_stateLicense";
        // $deaTable = "hpd_dea";
        // $csrTable = "hpd_csr";
        // $boardCert = "hpd_board"
        // $malPracticeTable = "hpd_malpractice";
        // $immunizationTable = "hpd_immunization";
        // $passportTable = "hpd_passport";
        // $reference1Table = "hpd_reference1";
        // $reference2Table = "hpd_reference2";
        // $reference3Table = "hpd_reference3";


//       $.post('controllers/credential_management_c.php', postData, function (e) {
// if (e === undefined || e.length === 0 || e === null) {
//                                     menudata += '<li><a href="#"> There was an error processing your request. </a></li>';
//                     }else{                    
//                         $.each(e, function (index, qd){
//                           console.log(e);
//                         });
//       }
                    
//                 }, "json");

// }
	


</script>
