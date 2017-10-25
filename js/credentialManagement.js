

//   credentialDocs = "";
//             function loadCredentialManagementDocs() {
//                 var stores = '';
//                 // var menudata = '';
                
//                 $.post('controllers/credential_management_c.php', {action: "loadUserDocs"}, function (e) {
//                     if (e === undefined || e.length === 0 || e === null) {
//                                     menudata += '<li><a href="#"> There was an error processing your request. </a></li>';
//                     }else{                    
//                         $.each(e, function (index, qd){
                            
//                           console.log(e);
//                           credentialDocs += '<tr>';
//                           credentialDocs += '<td></td>';
//                           credentialDocs += '<td>';
//                             credentialDocs += '<a>'+qd.document+'</a>';
//                             credentialDocs += '<br />';
//                             // <!-- <small>Created 01.01.2015</small> -->
//                           credentialDocs += '</td>';
//                           credentialDocs += '<td>';
//                             credentialDocs += '<large>01.01.201</large>';
// // <!--                             <ul class="list-inline">
// //                               <li>
// //                                 <img src="images/user.png" class="avatar" alt="Avatar">
// //                               </li>
// //                               <li>
// //                                 <img src="images/user.png" class="avatar" alt="Avatar">
// //                               </li>
// //                               <li>
// //                                 <img src="images/user.png" class="avatar" alt="Avatar">
// //                               </li>
// //                               <li>
// //                                 <img src="images/user.png" class="avatar" alt="Avatar">
// //                               </li>
// //                             </ul> -->
//                            credentialDocs += '</td>';
//                           credentialDocs += '<td class="project_progress">';
// // <!--                             <div class="progress progress_sm">
// //                               <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="99"></div>
// //                             </div> -->
//                             // <!-- <small>57% Complete</small> -->
//                             credentialDocs += '<large>01.01.2015</large>';
//                           credentialDocs += '</td>';
//                           credentialDocs += '<td>';
//                             credentialDocs += '<large>EXPIRED</large>';
//                             // <!-- <button type="button" class="btn btn-success btn-xs">Success</button> -->
//                           credentialDocs += '</td>';
//                           credentialDocs += '<td>';
//                             credentialDocs += '<button type="button"  class="btn btn-success btn-xs fa fa-folder" data-toggle="modal" data-target="#myModal" data-backdrop="static" id="'+qd.document_id+'" onclick="selectedDocument(25)"> View</button>';
//                             credentialDocs += '<button type="button" onclick="" class="btn btn-info btn-xs fa fa-pencil" data-toggle="modal" data-target="#uploadDocModal" data-backdrop="static" id="'+qd.document_id+'> Upload</button>';
//                             // credentialDocs += '<a href="#" class="btn btn-primary btn-xs dz-clickable""><i class="fa fa-folder"></i> View </a>';
//                             // credentialDocs += '<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Upload </a>';
//                             // <!-- <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> -->
//                           credentialDocs += '</td>';
//                         credentialDocs += '</tr>';


//                         });
//                     }
//                     $('#tbody').html('').append(credentialDocs);                     
//                 }, "json");
//             }



// 	