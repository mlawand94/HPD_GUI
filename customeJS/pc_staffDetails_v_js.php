<meta charset="utf-8">
<?php 
include 'includes/includes.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="includes/css/main.css">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Staff Manager</title>

    </head>
    <body>        
        <br>
        <div class="container-fluid bodycontent">  
            <?php
          // print_r($_SESSION);
            ?>
            <!--main dashboard display option-->
            <div class="row mainDH hidden">                
                <div class="col-xs-12 col-sm-12 col-md-2 bg-menu mainmenu"></div>
                <div class="col-xs-12 col-sm-12 col-md-3 dashMain">
                    
                    <br>
                    <h3>Select an Employee</h3>
                    <br>
                    <ul id="mainDHMenu">
                        <!-- <li><i class="fa fa-lg fa-square pull-left" style="color: #339900"></i> Sample at Some Mail <i class="fa fa-lg fa-arrow-right pull-right"></i></li> -->

                    </ul>
                </div>               
            </div>           
           </div>
        </div>

        <script type="text/javascript">
            function loaduserStore() {
                var menudata = '';
                $.post('controllers/pc_staff_c.php', {action: "loadStaff"}, function (e) {
                    menudata += '<ul id="staffList">';
                    console.log(e);

                    $.each(e, function (index, qd){
                        menudata += '<li  onclick="staffClicked()" value="' + qd.usr_fname + qd.usr_lname +'"><i class="fa fa-lg fa-square pull-left" style="color: #339900"></i>' + qd.usr_fname + ' ' +qd.usr_lname +'<i class="fa fa-lg fa-arrow-right pull-right"></i></li>';
                        $('#mainDHMenu').html('').append(menudata);
                        // console.log(qd.usr_fname);
                        // onclick="staffClicked(' + qd.usr_fname + ',' +qd.usr_lname +')"
                    });
                    menudata += '</ul>';
                }, "json");
                // $('.mainmenu').html('').append(menudata);
                $('#mainDHMenu').html('').append(menudata);

            }

                        function staffClicked(){
                            $('#staffList li').click(function() {                            
                            value1 = $(this).attr('value');
                            console.log(value1);
                            // alert(value1);
                        });
                // console.log(usr_fname + " " +usr_lname);
                
            }

             $('#staff').click(function(){
                   console.log("staff function");
            });


            $(function () {
                $(window).load(function () {
                    loaduserStore();


<?php
if (isset($_SESSION) && !empty($_SESSION)) {
    if (isset($_SESSION['pcat_id']) && $_SESSION['pcat_id'] != 0) {
        ?>
                            var menudata = '';
                            var postData = {
                                action: "loadMainMenu"
                            }
                            menudata += '<ul>';
                            $.post('controllers/pc_mainmenu_c.php', postData, function (e) {
                                // if (e === undefined || e.length === 0 || e === null) {
                                //     menudata += '<li><a href="#"> No Menu Item Found </a></li>';
                                // } else {
                                    
                                // }
                                menudata += '</ul>';
                                menudata += '<button class="btn btn-primary btn-block gohome"><i class="fa fa-home fa-lg"></i> GO Home</button>';
                                menudata += '<button class="btn btn-success btn-block logout"><i class="fa fa-sign-out fa-lg"></i> Logout</button>';
                                menudata += '<button class="btn btn-default btn-block addStore"><i class="fa fa-plus-circle fa-lg"></i> Add Store</button>';
                                menudata += '<button class="btn btn-default btn-block setStoretoUser"><i class="fa fa-plus-circle fa-lg"></i> Set User Store</button>';
                                // $('.mainmenu').html('').append(menudata);
                                // $('#proctrl').css('background-color', '#cc0000');

        <?php
    }
} else {
    ?>
                        if ($('.mainDH').hasClass('hidden')) {
                            $('.mainDH').removeClass('hidden')
                        }
                        if (!$('.subDH').hasClass('hidden')) {
                            $('.subDH').addClass('hidden')
                        }
                        loadMainMenu();

    <?php
}
?>


                });
            });
        </script>           

    </body>
</html>