<?php 
    include "header.php";
    include "nav.php";
?>

<link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Find Hospital Administrator <!-- <small>Listing design</small> --></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by NPI or Name">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hospital Administrators <small>Self-Authorize</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <p>Physicians by <code>NPI</code></p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Name</th>
                            <th class="column-title">ID # </th>
                            <th class="column-title">Organization</th>
                            <th class="column-title">Date Requested</th>
                            <!-- <th class="column-title">Order </th> -->
                            
                            <!-- <th class="column-title">Status </th> -->
                            <!-- <th class="column-title">Amount </th> -->
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody id="tbody">
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Shirin Virani</td>
                            <td class=" ">06261100</td>
                            <td class=" ">HPDox </td>
                            <td class=" ">09/07/1994 </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            <td class=" last"><button type="button" onclick="selectedDocument(1)" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" data-toggle="modal" data-target="#myModal" id="1"> Authorized Docs.</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Revoke</button></td>

                            
                            <!-- <td class=" last"><span style="color: green">Authorized</span>         <a href=""><span style="color: red">Revoke</span></a> -->
                        </td>

<tr>
<!--   <td></td>
  <td>
    <a> HA 1 </a>
    <br />    
  </td>
  <td>
    <large> 12345</large>
  </td>
  <td class="project_progress">
    <large> 09-07-1994 </large>
  </td>
  <td>
    <large></large>
  </td>
  <td>
    <button type="button" onclick="selectedDocument('+qd.document_id+')" class="btn btn-info btn-xs fa fa-user-plus" data-toggle="modal" data-target="#myModal"  data-backdrop="static" style ="background-color: green" id="'+qd.document_id+' "> Authorized Docs.</button>
    <button type="button" onclick="uploadDocModal('+qd.document_id+')" class="btn btn-info btn-xs fa fa-pencil" data-toggle="modal" data-target="#uploadDocModal" data-backdrop="static" style ="background-color: red" id="'+qd.document_id+'"> Revoke All</button>

  </td> -->
</tr>








                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Mouaffak Alkassar</td>
                            <td class=" ">69696969</td>                            
                            <td class=" ">HDVest Health Management</td>
                            <td class=" ">09/07/1994 </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            <td class=" last"><button type="button" onclick="selectedDocument(1)" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" data-toggle="modal" data-target="#myModal" id="1"> Authorized Docs.</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Revoke</button></td>

                            <!-- <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i> -->
                            </td>
                            
                           
                            <!-- <td class=" last"><a href="credentialManagement.php">Authorize</a> -->
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Mike Smith</td>
                            <td class=" ">121000038</td>
                            <td class=" ">Parkland Hospital</td>
                            <td class=" ">09/07/1994 </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            <td class=" last"><button type="button" onclick="selectedDocument(1)" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" data-toggle="modal" data-target="#myModal" id="1"> Authorized Docs.</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Revoke</button></td>
                            <!-- <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i> -->
                            </td>
                            
                            <!-- <td class=" last"><a href="credentialManagement.php">Authorize</a> -->
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Mike Smith</td>
                            <td class=" ">121000038</td>
                            <td class=" ">Kaiser Permanente</td>
                            <td class=" ">09/07/1994 </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            <td class=" last"><button type="button" onclick="selectedDocument(1)" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" data-toggle="modal" data-target="#myModal" id="1"> Authorized Docs.</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Revoke</button></td>
                            <!-- <td class=" ">121000204</td> -->
                           
                            <!-- <td class=" last"><a href="credentialManagement.php">Authorize</a> -->
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Abigail Johnson</td>
                            <td class=" ">321456921</td>
                            <td class=" ">Medical City of Plano</td>
                            <td class=" ">09/07/1994 </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            <td class=" last"><button type="button" onclick="selectedDocument(1)" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" data-toggle="modal" data-target="#myModal" id="1"> Authorized Docs.</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Revoke</button></td>
                            <!-- <td class=" ">121000210</td> -->
                            
                            <!-- <td class=" last"><a href="credentialManagement.php">Authorize</a> -->
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Abigail Johnson</td>
                            <td class=" ">321456921</td>
                            <td class=" ">Methodist</td>
                            <td class=" ">09/07/1994 </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            <td class=" last"><button type="button" onclick="selectedDocument(1)" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" data-toggle="modal" data-target="#myModal" id="1"> Authorized Docs.</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Revoke</button></td>
                            <!-- <td class=" ">121000208 <i class="error fa fa-long-arrow-down"></i> -->
                            </td>
                            
                            <!-- <td class=" last"><a href="credentialManagement.php">Authorize</a> -->
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Mike Smith</td>
                            <td class=" ">121000038</td>
                            <td class=" ">Medical Center of Plano</td>
                            <td class=" ">09/07/1994 </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            <td class=" last"><button type="button" onclick="selectedDocument(1)" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" data-toggle="modal" data-target="#myModal" id="1"> Authorized Docs.</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Revoke</button></td>
                            <!-- <td class=" ">121000203</td> -->
                            
                            <!-- <td class=" last"><span style="color: green">Authorized</span>         <a href=""><span style="color: red">Revoke</span></a>
                            </td> -->
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Mike Smith</td>
                            <td class=" ">121000038</td>
                            <td class=" ">Childrens Medical Center</td>
                            <td class=" ">09/07/1994 </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            <td class=" last"><button type="button" onclick="selectedDocument(1)" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" data-toggle="modal" data-target="#myModal" id="1"> Authorized Docs.</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Revoke</button></td>
                            <!-- <td class=" ">121000204</td> -->
                           
                            <!-- <td class=" last"><a href="credentialManagement.php">Authorize</a>
                            </td> -->
                          </tr>

                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Peter Griffin</td>
                            <td class=" ">121000069</td>
                            <td class=" ">Dermatology Center of Plano</td>
                            <td class=" ">09/07/1994 </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            <td class=" last"><button type="button" onclick="selectedDocument(1)" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" data-toggle="modal" data-target="#myModal" id="1"> Authorized Docs.</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Revoke</button></td>
                            <!-- <td class=" ">121000210</td> -->
                           
                            <!-- <td class=" last"><a href="credentialManagement.php">Authorize</a>
                            </td> -->
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Peter Griffin</td>
                            <td class=" ">121000069</td>
                            <td class=" ">Self-Organized</td>
                            <td class=" ">09/07/1994 </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            <td class=" last"><button type="button" onclick="selectedDocument(1)" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" data-toggle="modal" data-target="#myModal" id="1"> Authorized Docs.</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Revoke</button></td>
                            <!-- <td class=" ">121000208</td> -->
                           
                            <!-- <td class=" last"><span style="color: green">Authorized</span>         <a href=""><span style="color: red">Revoke</span></a>
                            </td> -->
                          </tr>
                        </tbody>
                      </table>
                    </div>
              
            
                  </div>
                </div>
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php 
    include "footer.php";
?>        


  </body>


</html>
<?php 
    include "js/credentialAuthorizationScript.js";
    include "credentialAuthorizationModal.php";
?>


<script type="text/javascript">
  
  
</script>

<script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
<!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


<?php 
    
?>

<style type="text/css">
  
 /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} 

  
</style>