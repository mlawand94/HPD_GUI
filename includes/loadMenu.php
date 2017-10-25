
<script type="text/javascript">
$(function () {
                $(window).load(function () {
                    // loaduserStore();
// var perm="";

//     $.ajax({
//           url:  "controllers/df_user_c.php",
//           type: "POST",
//           data: {action: "loadType"},
//           async:false,
//           success: function(data){
//              console.log(data[14]);
//              perm = data;
//           }
//        },"json"
//     );
// menuPerm = perm.indexOf(2);
//     if(menuPerm == 14){
        
//     }else{
//         alert("Something went wrong. Please contact systems administrator.");
//     }

                            if ($('.mainDH').hasClass('hidden')) {
                                $('.mainDH').removeClass('hidden')
                            }
                            if (!$('.subDH').hasClass('hidden')) {
                                $('.subDH').addClass('hidden')
                            }
                            loadMainMenu();
                           
<?php
if (isset($_SESSION) && !empty($_SESSION)) {
    if (isset($_SESSION['pcat_id']) && $_SESSION['pcat_id'] != 0) {
            
        ?>
                            // var menudata = '';
                            // var postData = {
                            //     action: "loadMainMenu"
                            // }
                            // menudata += '<ul>';     

                    
                            // $.post('controllers/pc_mainmenu_c.php', postData, function (e) {
                            //     console.log("Hello");
                            //     if (e === undefined || e.length === 0 || e === null) {
                                    
                            //         menudata += '<li><a href="#"> No dashMainenu Item Found </a></li>';
                            //     } else {
                            //         $.each(e, function (index, qd) {
                            //         });
                            //     }
                            //     menudata += '</ul>';
                            //     menudata += '<button class="btn btn-primary btn-block gohome"><i class="fa fa-home fa-lg"></i> GO Home</button>';
                            //     menudata += '<button class="btn btn-success btn-block logout"><i class="fa fa-sign-out fa-lg"></i> Logout</button>';
                            //     if(menuPerm == 14){
                            //     menudata += '<button class="btn btn-default btn-block addStore"><i class="fa fa-plus-circle fa-lg"></i> Add Store</button>';
                            //     menudata += '<button class="btn btn-default btn-block setStoretoUser"><i class="fa fa-plus-circle fa-lg"></i> Set User Store</button>';
                            //     }
                            //     $('.mainmenu').html('').append(menudata);
                            //     $('#proctrl').css('background-color', '#cc0000');

                            //     $('#proctrl').click(function () {
                            //         console.log("product control clicked");
                            //         // window.location = "staff.php";
                            //     });
                            //     $('#Staff').click(function () {
                            //         window.location = "staff.js.php";
                            //         console.log("Staff clicked");
                            //     });

                            //     $('.addStore').click(function () {
                            //         window.location = "addStore.php";
                            //     });
                            //     $('.setStoretoUser').click(function () {
                            //         window.location = "setUserStore.php";
                            //     });

                            //     $('.gohome').click(function () {
                            //         $.post('controllers/item_session_clear.php', false, function (e) {
                            //             if (parseInt(e) == 1) {
                            //                 setTimeout(function () {
                            //                     location.reload()
                            //                 }, 100);
                            //             }
                            //         });
                            //     });

                            //     $('.logout').click(function () {
                            //         alertify.confirm("Are You Sure Want Edit Logout", function (event) {
                            //             if (event) {
                            //                 $.post('controllers/df_user_c.php', {action: "logout"}, function (e) {
                            //                     if (parseInt(e) == 1) {
                            //                         setTimeout(function () {
                            //                        location.reload()
                            //                         }, 100);
                            //                     }
                            //                 });
                            //             }
                            //         });

                            //     });

                            // }, "json");


                            // $('.procategory').removeClass('hidden');
                            // $('.items').removeClass('hidden');
                            // $('.itemdesc').html('');

                            // loadProCategory();
                            // loadItems(<?php echo $_SESSION['pcat_id'] ?>, <?php echo "'" . $_SESSION['pcat_name'] . "'" ?>);

                            // $('.procategory li').css('background-color', '#333333');
                            // $('.items li').css('background-color', '#333333');

        <?php
    } else {
        ?>
                            // if ($('.mainDH').hasClass('hidden')) {
                            //     $('.mainDH').removeClass('hidden')
                            // }
                            // if (!$('.subDH').hasClass('hidden')) {
                            //     $('.subDH').addClass('hidden')
                            // }
                            // loadMainMenu();
        <?php
    }
} else {
    ?>
                        // if ($('.mainDH').hasClass('hidden')) {
                        //     $('.mainDH').removeClass('hidden')
                        // }
                        // if (!$('.subDH').hasClass('hidden')) {
                        //     $('.subDH').addClass('hidden')
                        // }
                        // loadMainMenu();

    <?php
}
?>


                });
            });
</script>