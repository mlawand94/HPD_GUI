

<!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
 <div class="modal-dialog">
 
 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">&times;</button>
 <h4 class="modal-title">Modal Header</h4>
 </div>
 <div class="modal-body">
 <p>Some text in the modal.</p>
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 </div>
 </div>
 
 </div>
 </div>
 <!-- /Modal -->    

 <!-- Upload Document Modal -->

 <!-- Modal -->
 <div class="modal fade" id="uploadDocModal" role="dialog">
 <div class="modal-dialog modal-lg">
 
 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">&times;</button>
 <h4 class="modal-title">Upload CV</h4>
 </div>
 <div class="modal-body">


         <!-- page content -->
        <div class="right_col" role="main" >
          <div class="">
<!--             <div class="page-title">
              <div class="title_left">
                <h3>Form Upload </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- <div class="clearfix"></div> -->

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- <div class="x_panel"> -->
                  <!-- <div class="x_title"> -->
                    <!-- <h2>Upload CV</h2> -->
                    <ul class="nav navbar-right panel_toolbox">
                      <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> -->
                      <li class="dropdown">
                        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a> -->
<!--                         <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul> -->
                      <!-- </li> -->
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> -->
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  <!-- </div> -->
                  <div class="x_content">
<!--                     <p>Drag multiple files to the box below for multi upload or click to select files. This is for demonstration purposes only, the files are not uploaded to any server.</p> -->
                    <form action="form_upload.html" class="dropzone"></form>
                    <br />
                    <br />
                    <br />
                    <br />
                  <!-- </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /page content -->
 </div>
 <div class="modal-footer">
  <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 </div>
 </div>
 
 </div>
 </div>

 <!-- /Upload Document Modal -->








<!--             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>CV Details <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type: </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; MD &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> DO
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                        </div>
                      </div>
                        


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
              <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div> -->






















 <!-- Upload Document Modal AJAX-->

 <!-- Modal -->
 <div class="modal fade" id="uploadDocModal" role="dialog">
 <div class="modal-dialog modal-lg">
 
 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">&times;</button>
 <h4 class="modal-title">Upload CV</h4>
 </div>
 <div class="modal-body">


         <!-- page content -->
        <div class="right_col" role="main" >
          <div class="">


            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav navbar-right panel_toolbox">                      
                      <!-- <li class="dropdown">                      
                      </li>
                    </ul>
                    <div class="clearfix"></div> -->
                  
                  <div class="x_content">
                    <form action="form_upload.html" class="dropzone"></form>
                    <br />
                    <br />
                    <br />
                    <br />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /page content -->
 </div>
 <div class="modal-footer">
  <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 </div>
 </div>
 
 </div>
 </div>

 <!-- /Upload Document Modal -->








            