
<?php include 'includes/includes.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Product Adding Script</title>


    </head>
    <body>        
        <br>
        <div class="container-fluid bodycontent">  
            <?php
//           print_r($_SESSION);
            ?>
            <!--main dashboard display option-->
            <div class="row mainDH hidden">                
                <div class="col-xs-12 col-sm-12 col-md-2 bg-menu mainmenu"></div>
                <div class="col-xs-12 col-sm-12 col-md-3 dashMain">
                    <h1>Welcome <?php echo $_SESSION['df_usr_fname'] ?></h1>
                    <br>
                    <h3>Select a Store</h3>
                    <br>
                    <ul id="mainDHMenu">
                        <li><i class="fa fa-lg fa-square pull-left" style="color: #339900"></i> Sample at Some Mail <i class="fa fa-lg fa-arrow-right pull-right"></i></li>
                        <li><i class="fa fa-lg fa-square pull-left" style="color: #339900"></i> Express at Another Mail <i class="fa fa-lg fa-arrow-right pull-right"></i></li>
                        <li><i class="fa fa-lg fa-square pull-left" style="color: #339900"></i> Express in a City <i class="fa fa-lg fa-arrow-right pull-right"></i></li>
                    </ul>
                </div>               
            </div>
            <!--sub dashboard display option-->
            <div class="row subDH hidden">               
                <div class="col-xs-12 col-sm-12 col-md-2 bg-menu mainmenu"></div>                  
                <div class="col-xs-12 col-sm-12 col-md-2 bg-menu procategory"></div>
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <div class="col-xs-12 col-sm-12 col-md-3 bg-menu items"></div>                    
                    <div class="col-xs-12 col-sm-12 col-md-3 bg-menu subItems1 hidden"></div>                   
                    <div class="col-xs-12 col-sm-12 col-md-3 bg-menu subItems2 hidden"></div>                   
                    <div class="col-xs-12 col-sm-12 col-md-3 bg-menu subItems3 hidden"></div>    
                    <div class="col-xs-12 col-sm-12 col-md-3 bg-menu subItems4 hidden"></div>                   
                    <div class="col-xs-12 col-sm-12 col-md-3 bg-menu subItems5 hidden"></div>         
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 bg-menuitemdesc itemdesc"></div>  


            </div>
            <!--            <div class="row subDH hidden">
                            <div class="col-xs-12 col-sm-12 col-md-2"></div>                  
                            <div class="col-xs-12 col-sm-12 col-md-2"></div>
                            <div class="col-xs-12 col-sm-12 col-md-5">
                                <div class="col-xs-12 col-sm-12 col-md-3 bg-menu subItems4 hidden"></div>                    
                                <div class="col-xs-12 col-sm-12 col-md-3 bg-menu subItems5 hidden"></div>                   
            
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4"></div>
                        </div>-->
        </div>


        <?php include 'includes/JS.php'; ?>
        <?php include 'customeJS/pc_productitems_v_js.php'; ?>
        <?php include 'customeJS/pc_productcontrol_v_js.php'; ?>
        <?php include 'customeJS/pc_mainmenu_v_js.php'; ?>
        <?php include 'customeJS/pc_productcontrolsub_v_js.php'; ?>
        <?php include 'customeJS/pc_productcontrolsub1_v_js.php'; ?>
        <?php include 'customeJS/pc_productcontrolsub2_v_js.php'; ?>
        <?php include 'customeJS/pc_productcontrolsub3_v_js.php'; ?>
        <?php include 'customeJS/pc_productcontrolsub4_v_js.php'; ?>
        <script type="text/javascript">
            function loaduserStore() {
                $.post('controllers/df_user_c.php', {action: "loadUserStores"}, function (e) {
                    $('#mainDHMenu').html('').append(e);
                });
            }

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
                                if (e === undefined || e.length === 0 || e === null) {
                                    menudata += '<li><a href="#"> No Menu Item Found </a></li>';
                                } else {
                                    $.each(e, function (index, qd) {

                                        // console.log(qd.pm_id + qd.pm_name);

                                        if (parseInt(qd.pm_id) == 3) {
                                            menudata += '<li id="proctrl"><a href="#">' + qd.pm_name + '</a><i class="fa fa-arrow-right pull-right"></i></li>';
                                        } 
                                        if(parseInt(qd.pm_id) == 4){
                                            menudata += '<li id="staff"><a href="#">' + qd.pm_name + '</a><i class="fa fa-arrow-right pull-right"></i></li>';
                                        }
                                        else {
                                            menudata += '<li class="mmother"><a href="#">' + qd.pm_name + '</a><i class="fa fa-arrow-right pull-right"></i>';
                                        }
                                    });
                                }
                                menudata += '</ul>';
                                menudata += '<button class="btn btn-primary btn-block gohome"><i class="fa fa-home fa-lg"></i> GO Home</button>';
                                menudata += '<button class="btn btn-success btn-block logout"><i class="fa fa-sign-out fa-lg"></i> Logout</button>';
                                menudata += '<button class="btn btn-default btn-block addStore"><i class="fa fa-plus-circle fa-lg"></i> Add Store</button>';
                                menudata += '<button class="btn btn-default btn-block setStoretoUser"><i class="fa fa-plus-circle fa-lg"></i> Set User Store</button>';
                                $('.mainmenu').html('').append(menudata);
                                $('#proctrl').css('background-color', '#cc0000');

                                $('.addStore').click(function () {
                                    window.location = "addStore.php";
                                });
                                $('.setStoretoUser').click(function () {
                                    window.location = "setUserStore.php";
                                });

                                $('.gohome').click(function () {
                                    $.post('controllers/item_session_clear.php', false, function (e) {
                                        if (parseInt(e) == 1) {
                                            setTimeout(function () {
                                                location.reload()
                                            }, 100);
                                        }
                                    });
                                });

                                $('.logout').click(function () {
                                    alertify.confirm("Are You Sure Want Edit Logout", function (event) {
                                        if (event) {
                                            $.post('controllers/df_user_c.php', {action: "logout"}, function (e) {
                                                if (parseInt(e) == 1) {
                                                    setTimeout(function () {
                                                   location.reload()
                                                    }, 100);
                                                }
                                            });
                                        }
                                    });

                                });

                            }, "json");


                            $('.procategory').removeClass('hidden');
                            $('.items').removeClass('hidden');
                            $('.itemdesc').html('');

                            loadProCategory();
                            loadItems(<?php echo $_SESSION['pcat_id'] ?>, <?php echo "'" . $_SESSION['pcat_name'] . "'" ?>);

                            $('.procategory li').css('background-color', '#333333');
                            $('.items li').css('background-color', '#333333');

        <?php
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