

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
 <div class="modal-dialog">

   <!-- Modal content-->
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" id="closing" data-dismiss="modal">&times;</button>
       <h4 id="modal-title-view" class="modal-title"></h4>
     </div>
     <div class="modal-body"  id="modal-body-view">
     
              <!-- page content -->
       <div class="right_col" role="main" >
        <div class="">
          <div class="row">
            
              <div id="credentialPreview" ></div>
              

              <br />
              <br />
              <br />
              <br />
            </div>
          </div>
        </div>

        <!-- /page content -->
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default"  class="close" id="close" data-dismiss="modal">Close</button>
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
   <div class="modal-content" style="margin-right: auto; margin-left: auto;">
     <div class="modal-header">
       <button type="button" id="closing" class="close" onclick="refreshPage();" data-dismiss="modal">&times;</button>
       <h4 id="modal-title" class="modal-title"></h4>
     </div>
     <div id="modal-description-upload"></div>
     <div class="modal-body">


       <!-- page content -->
       <div class="right_col" role="main" >
        <div class="">
          <div class="row">
            <form id="uploadimage" action="" method="post" enctype="multipart/form-data" >
              <div id="image_preview" ></div>
              <div id="selectImage">
                
              </div>

              <br />
              <br />
              <br />
              <br />
            </div>
          </div>
        </div>

        <!-- /page content -->
      </div>
      <input style="margin-left: auto;" type="file" name="file" id="file" required />
      <h4 id='loading' ></h4>
      <div id="message"></div>
      <div class="modal-footer">

        <!-- <input type="submit" value="Upload" class="submit" /> -->
        <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Upload</button> -->
        <input type="submit" class="btn btn-success" value="Upload" class="submit" />
        <button type="button" id="closing" class="btn btn-default" onclick="refreshPage();" data-dismiss="modal">Close</button>
      </form>

    </div>
  </div>

</div>
</div>

 <!-- /Upload Document Modal -->



<script type="text/javascript">
function refreshPage(){
  location.reload();
}


    // Clearing the attributes set when it was last opened then closed

    $("#close").click(function()
  {
     console.log("Close has been clicked");
      // location.reload();      
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
      // location.reload();      
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


</script>








            