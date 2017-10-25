
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
                <h3>Request Physician Credential Access <!-- <small>Listing design</small> --></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by NPI# or Name">
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
                    <h2>Request Dashboard <small>Physicians</small></h2>
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
                    <p class="text-muted font-13 m-b-30">
                      Request access to a physicians credentials.
                    </p>
                    <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="Search by NPI# or Name" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                      <thead>
                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 171px;">Name</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 278px;">Primary Specialty</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 127px;">NPI #</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 66px;">Status</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 128px;">Date Requested</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 98px;">Action</th></tr>
                      </thead>


                      <tbody>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                      <tr role="row" class="odd">
                          <td class="sorting_1">Airi Satou</td>
                          <td>Some Specialty</td>
                          <td>1234</td>
                          <td>Request Sent</td>
                          <!-- <td>33</td> -->
                          <td>2017/11/28</td>
                          <td><button>Remind</button><button>Remove</button></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">Angelica Ramos</td>
                          <td>Some Specialty</td>
                          <td>43211234</td>
                          <td>Request Sent</td>
                          <!-- <td>47</td> -->
                          <td>2017/10/09</td>
                          <td><button>Remind</button><button>Remove</button></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">Ashton Cox</td>
                          <td>Some Specialty</td>
                          <td>3245234</td>
                          <td>Request Sent</td>
                          <td>2017/01/12</td>
                          <td><button>Remind</button><button>Remove</button></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">Bradley Greer</td>
                          <td>Some Specialty</td>
                          <td>5432452345</td>
                          <td></td>
                          <td></td>
                          <td><button>Request</button></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">Brenden Wagner</td>
                          <td>Some Specialty</td>
                          <td>65436563</td>
                          <td></td>
                          <td></td>
                          <td><button>Request</button></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">Brielle Williamson</td>
                          <td>Some Specialty</td>
                          <td>34563456654</td>
                          <td></td>
                          <td></td>
                          <td><button>Request</button></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">Bruno Nash</td>
                          <td>Some Specialty</td>
                          <td>4564363456</td>
                          <td></td>
                          <td></td>
                          <td><button>Request</button></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">Caesar Vance</td>
                          <td>Some Specialty</td>
                          <td>34565643</td>
                          <td></td>
                          <td></td>
                          <td><button>Request</button></td>
                        </tr><tr role="row" class="odd">
                          <td class="sorting_1">Cara Stevens</td>
                          <td>Some Specialty</td>
                          <td>643563453</td>
                          <td></td>
                          <td></td>
                          <td><button>Request</button></td>
                        </tr><tr role="row" class="even">
                          <td class="sorting_1">Cedric Kelly</td>
                          <td>Some Specialty</td>
                          <td>657856785</td>
                          <td></td>
                          <td></td>
                          <td><button>Request</button></td>
                        </tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
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









































































