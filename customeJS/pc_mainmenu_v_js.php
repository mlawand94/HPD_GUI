<script type="text/javascript">
    function loadMainMenu() {
        var menudata = '';
        var postData = {
            action: "loadMainMenu"
        }

        var perm="";

    $.ajax({
          url:  "controllers/df_user_c.php",
          type: "POST",
          data: {action: "loadType"},
          async:false,
          success: function(data){
             console.log("DATA YOU ARE LOOKING FOR" + data[14]);
             perm = data;
             console.log("Here is the actual data" + data.indexOf(1));
             menuPerm = data.indexOf(1);
          }
       },"json"
    );
    // menuPerm = perm.indexOf(2);
// menuPerm = perm.indexOf(2);
    if(menuPerm == 14){
        
    }else{
        alert("Something went wrong. Please contact your systems administrator.");
    }

        menudata += '<ul>';
        $.post('controllers/pc_mainmenu_c.php', postData, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                menudata += '<li><a href="#"> No Menu Item Found </a></li>';
            } else {
                $.each(e, function (index, qd) {
                  console.log(qd.pm_id + ' ' + qd.pm_name);
                    if (parseInt(qd.pm_id) == 3 && menuPerm == 14) {
                        menudata += '<li id="proctrl"><a href="proctrl.js.php">' + qd.pm_name + '</a><i class="fa fa-arrow-right pull-right"></i></li>';
                    }                           
                    if (parseInt(qd.pm_id) == 4 && menuPerm == 14){
                        menudata += '<li id="Staff"><a href="staff.js.php">' + qd.pm_name + '</a><i class="fa fa-arrow-right pull-right"></i></li>';
                        console.log("This is what I am looking for " + qd.pm_name);
                    }
                    if (parseInt(qd.pm_id) == 6 && menuPerm == 14){
                        menudata += '<li id="myaccount"><a href="myaccount.js.php">' + qd.pm_name + '</a><i class="fa fa-arrow-right pull-right"></i></li>';
                    }   
                    if (parseInt(qd.pm_id) == 7 && menuPerm == 14){
                        menudata += '<li id="settings"><a href="pc_customers.js.php">' + qd.pm_name + '</a><i class="fa fa-arrow-right pull-right"></i></li>';
                    }   
                    if (parseInt(qd.pm_id) == 5 && menuPerm == 14){
                        menudata += '<li id="settings"><a href="settings.js.php">' + qd.pm_name + '</a><i class="fa fa-arrow-right pull-right"></i></li>';
                    }
                    if (parseInt(qd.pm_id) == 8 && menuPerm == 14){
                        menudata += '<li id="settings"><a href="cashier.js.php">' + qd.pm_name + '</a><i class="fa fa-arrow-right pull-right"></i></li>';
                    } 

                    // else {
                    //     menudata += '<li class="mmother"><a href="#">' + qd.pm_name + '</a><i class="fa fa-arrow-right pull-right"></i>';
                    // }
                });
            }

            menudata += '</ul>';
            menudata += '<button class="btn btn-primary btn-block gohome"><i class="fa fa-home fa-lg"></i> GO Home</button>';
            menudata += '<button class="btn btn-success btn-block logout"><i class="fa fa-sign-out fa-lg"></i> Logout</button>';
            menudata += '<button class="btn btn-default btn-block addStore"><i class="fa fa-plus-circle fa-lg"></i> Add Store</button>';
            menudata += '<button class="btn btn-default btn-block setStoretoUser"><i class="fa fa-plus-circle fa-lg"></i> Set User Store</button>';
            $('.mainmenu').html('').append(menudata);
            $('.procategory').addClass('hidden');
            $('.items').addClass('hidden');

            $('.addStore').click(function () {
                window.location = "addStore.php";
            });
            $('.setStoretoUser').click(function () {
                window.location = "setUserStore.php";
            });
            $('#myaccount').click(function () {
                window.location = "myaccount.js.php";
            });
            $('.gohome').click(function () {
                $.post('controllers/item_session_clear.php', false, function (e) {
                  window.location="dashboard.php";
                    if (parseInt(e) == 1) {
                        setTimeout(function () {
                            location.reload()
                        }, 100);
                    }
                });
            });
            
            $('#Staff').click(function(){
                $.post('controllers/item_session_clear.php', false, function (e) {
                  window.location = "staff.js.php";
                    if (parseInt(e) == 1) {
                        setTimeout(function () {
                            location.reload()
                        }, 100);
                    }
                });
            });

            $('.logout').click(function () {
                alertify.confirm("Are you sure you would like to logout?", function (event) {
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

            $('#proctrl').click(function () {

                if (!$('.mainDH').hasClass('hidden')) {
                    $('.mainDH').addClass('hidden')
                }
                if ($('.subDH').hasClass('hidden')) {
                    $('.subDH').removeClass('hidden')
                }
                $(this).css('background-color', '#cc0000');
                $('.itemdesc').html('');
                if ($('.procategory').hasClass('hidden')) {
                    $('.procategory').removeClass('hidden');
                }
                if (!$('.items').hasClass('hidden')) {
                    $('.items').addClass('hidden');
                }
                if (!$('.subItems1').hasClass('hidden')) {
                    $('.subItems1').addClass('hidden');
                }
                if (!$('.subItems2').hasClass('hidden')) {
                    $('.subItems2').addClass('hidden');
                }
                if (!$('.subItems3').hasClass('hidden')) {
                    $('.subItems3').addClass('hidden');
                }
                if (!$('.subItems4').hasClass('hidden')) {
                    $('.subItems4').addClass('hidden');
                }
                if (!$('.subItems5').hasClass('hidden')) {
                    $('.subItems5').addClass('hidden');
                }
                loadProCategory();
            });

        }, "json");
    }

</script>