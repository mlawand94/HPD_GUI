
<?php 
    include "adminHeader.php";
    include "adminNav.php";
?>

<link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Authorization Requests <!-- <small>Listing design</small> --></h3>
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
                            <th class="column-title">NPI #</th>
                            <!-- <th class="column-title">Organization</th> -->
                            <th class="column-title">Date Requested </th>
                            
                            <!-- <th class="column-title">Status </th> -->
                            <!-- <th class="column-title">Amount </th> -->
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Shirin Virani</td>
                            <td class=" ">06261100</td>
                            <!-- <td class=" ">HPDox </td> -->
                            <td class=" ">May 2, 2017 12:45pm </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            
                            <td class=" last"><button type="button" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" id="1"> Accept</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Reject</button></td>

                            <!-- <span style="color: green">Authorized</span>         <a href=""><span style="color: red">Revoke</span></a> -->
                            
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Mouaffak Alkassar</td>
                            <td class=" ">234554</td>
                            <!-- <td class=" ">HDVest Health Management</td> -->
                            <!-- <td class=" ">121000208 <i class="success fa fa-long-arrow-up"></i> -->
                            </td>
                            
                           
                                                        <td class=" ">May 29, 2017 5:43am </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            
                            <td class=" last"><button type="button" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" id="1"> Accept</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Reject</button></td>
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Mike Smith</td>
                            <td class=" ">7545634</td>
                            <!-- <td class=" ">Parkland Hospital</td> -->
                            <!-- <td class=" ">121000203 <i class="success fa fa-long-arrow-up"></i> -->
                            </td>
                            
                                                        <td class=" ">May 5, 2017 1:00pm </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            
                            <td class=" last"><button type="button" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" id="1"> Accept</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Reject</button></td>
                            </td>
                          </tr>
                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Mike Smith</td>
                            <td class=" ">995356</td>
                            <!-- <td class=" ">Kaiser Permanente</td> -->
                            <!-- <td class=" ">121000204</td> -->
                           
                                                        <td class=" ">June 1, 2017 3:12pm </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            
                            <td class=" last"><button type="button" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" id="1"> Accept</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Reject</button></td>
                            </td>
                          </tr>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">Abigail Johnson</td>
                            <td class=" ">6699667</td>
                            <!-- <td class=" ">Medical City of Plano</td> -->
                            <!-- <td class=" ">121000210</td> -->
                            
                                                        <td class=" ">June 12, 2017 2:00pm </td>
                            <!-- <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td> -->
                            
                            
                            <td class=" last"><button type="button" style="background-color: green" class="btn btn-info btn-xs fa fa-user-plus"  data-backdrop="static" id="1"> Accept</button>
                            <button type="button"  style="background-color: red" class="btn btn-info btn-xs fa fa-user-times"  data-backdrop="static" id="1"> Reject</button></td>
                            </td>
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
    include "js/credentialManagementScript.js";
    include "credentialManagementModal.php";
?>


<script type="text/javascript">
  
  
</script>

<script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
<!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>


<?php 
    
?>