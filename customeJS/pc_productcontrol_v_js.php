<script type="text/javascript">

    function loadProCategory() {
        var menudata = '';
        var postData = {
            action: "loadProCategory"
        }
        // loadProCategory();
        menudata += '<h4><u> Product Control </u></h4>';
        menudata += '<ul>';
        $.post('controllers/pc_productcontrol_c.php', postData, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                //  menudata += '<li><a href="#"> No Menu Item Found </a></li>';
            } else {
                $.each(e, function (index, qd) {
                    menudata += '<li class="pctrlmenuitem" id="pc_' + qd.pcat_id + '"><a href="#">' + qd.pcat_name + '<pcat_id class="hidden">' + qd.pcat_id + '</pcat_id><pcat_name class="hidden">' + qd.pcat_name + '</pcat_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                });
            }
            menudata += '<li class="pull-right" id="addProCategory"><i class="fa fa-lg fa-plus"></i></li>';
            menudata += '</ul>';
            $('.procategory').html('').append(menudata);

<?php
if (isset($_SESSION['pcat_id']) && $_SESSION['pcat_id'] != 0) {
    ?>
                if (!$('.mainDH').hasClass('hidden')) {
                    $('.mainDH').addClass('hidden')
                }
                if ($('.subDH').hasClass('hidden')) {
                    $('.subDH').removeClass('hidden')
                }
                $(<?php echo "'#pc_" . $_SESSION['pcat_id'] . "'"; ?>).css('background-color', '#cc0000');
    <?php
}
?>


            $('.pctrlmenuitem').click(function () {
                $('.itemdesc').html('');
                $('.procategory li').css('background-color', '#333333');
                $(this).css('background-color', '#cc0000');
                $('.items').removeClass('hidden');
                if ($('.items').hasClass('hidden')) {
                    $('.items').removeClass('hidden');
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
                var pcat_id = $(this).find('pcat_id').html();
                var pcat_name = $(this).find('pcat_name').html();
                loadItems(pcat_id, pcat_name);
                $.post('controllers/session-store.php', {sessionstore: 'store', pcat_id: pcat_id, pcat_name: pcat_name}, function (e) {
                    console.log(e);
                });
            });

//            $('.pctrlmenuitem').mousedown(function (e) {
            $('.pctrlmenuitem').dblclick(function (e) {
                var pcat_id = $(this).find('pcat_id').html();
                // if (e.which === 3) {
                alertify.confirm("Are you sure want to delete product category ?", function (e) {
                    if (e) {
                        postData = {
                            action: "delProCategory",
                            pcat_id: pcat_id
                        }
                        $.post('controllers/pc_productcontrol_c.php', postData, function (e) {
                            if (parseInt(e.msgType) == 1) {
                                $('.items').addClass('hidden');
                                alertify.success(e.msg, 1200);
                                loadProCategory();
                            } else {
                                alertify.error(e.msg, 1200);
                            }
                        }, "json");
                    }
                });
                //   }
            });
            
            $('#addProCategory').click(function () {
                var confirmModal = $('<div class="modal fade">' +
                        '<div class="modal-dialog">' +
                        '<div class="modal-content">' +
                        '<div class="modal-header bg-default">' +
                        '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                        '<div class="text-center"><p style="font-size:18pt"><span class="label label-primary">Category</span>&nbsp;' +
                        '<span class="label label-default">Item</span></p><div>' +
                        '</div>' +
                        '<div class="modal-body">' +
                        '<div class="row">' +
                        '<div class="col-md-12">' +
                        '<div class="col-md-12">' +
                        '<div class="form-horizontal">' +
                        '<div class="form-group">' +
                        '<label class="col-md-4 control-label">Field Name</label>' +
                        '<div class="col-md-8">' +
                        '<input type="text" class="form-control" id="catName">' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<div class="col-md-offset-2 col-md-8">' +
                        '<button class="btn btn-success" id="addCat">Submit</button>&nbsp;' +
                        '<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</br>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>');
                confirmModal.find('#addCat').click(function () {
                    var pcat_name = confirmModal.find('#catName').val();
                    postData = {
                        action: "addProCategory",
                        pcat_name: pcat_name
                    }
                    $.post('controllers/pc_productcontrol_c.php', postData, function (e) {
                        if (parseInt(e.msgType) == 1) {
                            alertify.success(e.msg, 1200);
                            confirmModal.modal('hide');
                            loadProCategory();
                            $('.itemdesc').html('');
                            $('.items').html('');
                        } else {
                            alertify.error(e.msg, 1200);
                        }
                    }, "json");
                });


                confirmModal.modal('show');
            });


//            $('.procategory').addClass('hidden');
//            $('.items').addClass('hidden');
//            
//            $('#proctrl').mouseover(function(){
//                $(this).css('font-size','24px');
//            });
//            $('#proctrl').mouseleave(function(){
//                $(this).css('font-size','16px');
//            });
        }, "json");
    }

</script>