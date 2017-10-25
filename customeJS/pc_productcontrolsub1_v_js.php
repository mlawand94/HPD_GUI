<script type="text/javascript">
    function AddProCatSub1(pcatsub1_name, pcatsub_id, confirmModal) {
        $.post('controllers/pc_productcontrolsub1_c.php', {action: 'save', pcatsub1_name: pcatsub1_name, pcatsub_id: pcatsub_id}, function (e) {
            if (parseInt(e.msgType) == 1) {
                alertify.success(e.msg, 1200);
                confirmModal.modal('hide');
//                loadItems(pcat_id, pcat_name);
                setTimeout(function () {
                    location.reload()
                }, 1350);
            } else {
                alertify.error(e.msg, 1200);
            }
        }, "json");
    }

    function item2DescLoad(itmsub2_id, pcatsub1_id, pcatsub1_name) {
        var itemdata = "";
        var imgFilename = [];
        var postData = {
            action: "getItem2Desc",
            itmsub2_id: itmsub2_id
        }
        var dir = '../img/item2/' + itmsub2_id + '/';
        $.post('controllers/pc_productitems_c.php', {action: 'readfolderimages', dir: dir}, function (x) {
            if (x === undefined || x.length === 0 || x === null) {
                imgFilename.push('no_image_thumb.gif');
                itemdata += '<img src="img/' + imgFilename + '" alt="No image found" class="img-rounded" style="width:60%">';
            } else {
                $.each(x, function (index2, imgFile) {
                    imgFilename.push(imgFile);
                });
                itemdata += '<img src="img/item2/' + itmsub2_id + '/' + imgFilename + '" alt="No image found" class="img-rounded" style="width:80%">';
            }


            $.post('controllers/pc_productitems2_c.php', postData, function (e) {

                itemdata += '<br><br><table class="table-bordered table-striped" id="desctable">';
                itemdata += '<tbody>';
                itemdata += '<tr>';
                itemdata += '<th> Name </th>';
                itemdata += '<td><h4 id="tbl_itmsub2_name"></h5></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Quantity </th>';
                itemdata += '<td id="tbl_itmsub2_qty"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Price </th>';
                itemdata += '<td id="tbl_itmsub2_price"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Description </th>';
                itemdata += '<td id="tbl_itmsub2_desc" style="overflow:hidden"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Site </th>';
                itemdata += '<td id="tbl_itemsub2_site"></td>';
                itemdata += '</tr>';
                itemdata += '</tbody>';
                itemdata += '</table>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left text-left" id="item2edit"><i class="fa fa-edit"></i> Edit</button>';


                //If inventory selection screen from Cashier POS system
                // if(Screen = 5){
                    itemdata += '<button onclick="selectInventoryItem('+itmsub2_id+', 4)" class="col-md-offset-1 btn btn-primary pull-left text-left" id="item5edit"><i class="fa fa-edit"></i> Select</button>';
                // }
                
                //table edit
                itemdata += '<div class="form-horizontal hidden" id="editItem2desc">';

                itemdata += '<div class="form-group">';
                itemdata += '<div class="col-md-11 col-md-offset-1">';

                itemdata += '<div class="checkbox">';
                itemdata += '<lable>';
                itemdata += '<input type="checkbox" name="imgEditstatus" id="imgEditstatus"> <span style="color:white">Do you want to edit image</span>';
                itemdata += '</lable>';
                itemdata += '</div>';

                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<form class="hidden" id="frmaddimage" enctype="multipart/form-data">';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">File Upload</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="file" name="fileToUpload" class="form-control" id="fileToUpload">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</form>';

                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Name</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub2_name" class="form-control" id="itmsub2_name">';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Quantity</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub2_qty" class="form-control" id="itmsub2_qty">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Price ( $ )</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub2_price" class="form-control" id="itmsub2_price">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Description</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<textarea name="itmsub2_desc" class="form-control" id="itmsub2_desc"></textarea>';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<div class="col-md-11 col-md-offset-1">';
                itemdata += '<div class="checkbox">';
                itemdata += '<label>';
                itemdata += '<input type="checkbox" name="itemsub2_site" id="itemsub2_site"> <span style="color:white">Display On Site</span>';
                itemdata += '</label>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left hidden" id="item2editdone"><i class="fa fa-edit"></i> Done</button>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-right hidden" id="item2editcancel"><i class="fa fa-edit"></i> Cancel</button><br><br>';
                $('.itemdesc').html('').append(itemdata);


                $.each(e, function (index, qd) {
                    $('#tbl_itmsub2_name').html('').append(qd.itmsub2_name);
                    $('#tbl_itmsub2_qty').html('').append(qd.itmsub2_qty);
                    $('#tbl_itmsub2_price').html('').append('$' + qd.itmsub2_price);
                    $('#tbl_itmsub2_desc').html('').append(qd.itmsub2_desc);
                    if (parseInt(qd.itemsub2_site) == 0) {
                        $('#tbl_itemsub2_site').html('').append('False');
                    } else {
                        $('#tbl_itemsub2_site').html('').append('True');

                    }
                });

                $('#imgEditstatus').click(function () {
                    if ($(this).is(':checked')) {
                        $('#frmaddimage').removeClass('hidden');
                    } else {
                        $('#frmaddimage').addClass('hidden');
                    }
                });

                $('#item2edit').click(function () {
                    $('#desctable').addClass('hidden');
                    $(this).addClass('hidden');
                    $('#editItem2desc').removeClass('hidden');
                    $('#item2editdone').removeClass('hidden');
                    $('#item2editcancel').removeClass('hidden');
                    var postDataEditdesc = {
                        action: "getItem2Desc",
                        itmsub2_id: itmsub2_id
                    }
                    $.post('controllers/pc_productitems2_c.php', postDataEditdesc, function (e) {
                        $.each(e, function (index, qd) {
                            $('#itmsub2_name').val(qd.itmsub2_name);
                            $('#itmsub2_qty').val(qd.itmsub2_qty);
                            $('#itmsub2_price').val(qd.itmsub2_price);
                            $('#itmsub2_desc').val(qd.itmsub2_desc);
                            if (parseInt(qd.itemsub2_site) == 0) {
                                $('#itemsub2_site').attr("checked", false);
                            } else {
                                $('#itemsub2_site').attr("checked", true);
                            }
                        });
                    }, "json");
                });

                $('#item2editcancel').click(function () {
                    $('#desctable').removeClass('hidden');
                    $(this).addClass('hidden');
//                            $('#editItemdesc').removeClass('hidden');
                    $('#item2editdone').addClass('hidden');
                    $('#editItem2desc').addClass('hidden');
                    $('#item2edit').removeClass('hidden');
                });

                $('#item2editdone').click(function () {

                    alertify.confirm("Are You Sure Want Edit Item Description. ?", function (event) {
                        if (event) {
                            var itmsub2_name = $('#itmsub2_name').val();
                            var itmsub2_qty = $('#itmsub2_qty').val();
                            var itmsub2_price = $('#itmsub2_price').val();
                            var itmsub2_desc = $('#itmsub2_desc').val();
//                    var item_site = confirmModal.find('#item_site').val();
                            var itemsub2_site = 0;
                            if ($('#itemsub2_site').is(':checked')) {
                                itemsub2_site = 1;
                            } else {
                                itemsub2_site = 0;
                            }
                            postData = {
                                action: "editItem2",
                                itmsub2_name: itmsub2_name,
                                itmsub2_qty: itmsub2_qty,
                                itmsub2_price: itmsub2_price,
                                itmsub2_desc: itmsub2_desc,
                                itmsub2_id: itmsub2_id,
                                itemsub2_site: itemsub2_site,
                                pcatsub1_id: pcatsub1_id
                            }
                            $.post('controllers/pc_productitems2_c.php', postData, function (e) {
                                if (parseInt(e.msgType) == 1) {
                                    alertify.success(e.msg, 1200);
                                    if ($('#imgEditstatus').is(':checked')) {
                                        var ft = $('#fileToUpload')[0].files[0];
                                        //Image Edited
                                        var oMyForm = new FormData();
                                        oMyForm.append("fileToUpload", ft);
                                        oMyForm.append("itmsub2_id", itmsub2_id);
                                        var oReq = new XMLHttpRequest();
                                        oReq.open("POST", "controllers/imguploadEditItem2.php", true);
                                        oReq.onload = function (oEvent) {
                                            if (oReq.status == 200) {
                                                alertify.log(oReq.response, false, 1200);
                                                setTimeout(function () {
                                                    item2DescLoad(itmsub2_id, pcatsub1_id, pcatsub1_name);
                                                }, 1450);
                                            } else {
                                                alert('failed');
                                            }
                                        };
                                        oReq.send(oMyForm);
                                        //End of image edited
                                    } else {
                                        setTimeout(function () {
                                            item2DescLoad(itmsub2_id, pcatsub1_id, pcatsub1_name)
                                        }, 1400);
                                    }
                                    $('#frmaddimage').addClass('hidden');

                                    var postDataEditdesc = {
                                        action: "getItem2Desc",
                                        itmsub2_id: itmsub2_id
                                    }
                                    $.post('controllers/pc_productitems2_c.php', postDataEditdesc, function (e) {
                                        $.each(e, function (index, qd) {

                                            $('#tbl_itmsub2_name').html('').append(qd.itmsub2_name);
                                            $('#tbl_itmsub2_qty').html('').append(qd.itmsub2_qty);
                                            $('#tbl_itmsub2_price').html('').append('$' + qd.itmsub2_price);
                                            $('#tbl_itmsub2_desc').html('').append(qd.itmsub2_desc);
                                            if (parseInt(qd.itemsub2_site) == 0) {
                                                $('#tbl_itemsub2_site').html('').append('False');
                                            } else {
                                                $('#tbl_itemsub2_site').html('').append('True');

                                            }

                                            $('#itmsub2_name').val(qd.itmsub2_name);
                                            $('#itmsub2_qty').val(qd.itmsub2_qty);
                                            $('#itmsub2_price').val(qd.itmsub2_price);
                                            $('#itmsub2_desc').val(qd.itmsub2_desc);
                                            if (parseInt(qd.itemsub2_site) == 0) {
                                                $('#itemsub2_site').attr("checked", false);
                                            } else {
                                                $('#itemsub2_site').attr("checked", true);
                                            }
                                        });
                                    }, "json");
                                    loadSub1Items(pcatsub1_id, pcatsub1_name);
                                    $('#desctable').removeClass('hidden');
                                    $(this).addClass('hidden');
                                    $('#item2editcancel').addClass('hidden');
                                    $('#item2editdone').addClass('hidden');
                                    $('#editItem2desc').addClass('hidden');
                                    $('#item2edit').removeClass('hidden');

                                } else {
                                    alertify.error(e.msg, 1200);
                                }
                            }, "json");
                        }
                    });

                });
            }, "json");
        }, "json");
    }
    function selectInventoryItem(){
        console.log("selected item from pc_productcontrolsub3_v_js");
    }
    function loadSub1Items(pcatsub1_id, pcatsub1_name) {
        var menudata = '';
        menudata += '<h4><u> ' + pcatsub1_name + ' </u></h4>';
        menudata += '<ul>';
        $.post('controllers/pc_productitems2_c.php', {action: 'loadsub1categoryitems', pcatsub1_name: pcatsub1_name, pcatsub1_id: pcatsub1_id}, function (e) {
            $.post('controllers/pc_productcontrolsub2_c.php', {action: 'getAllByPcatSub1ID', pcatsub1_id: pcatsub1_id}, function (sub2Array) {
                if (sub2Array === undefined || sub2Array.length === 0 || sub2Array === null) {
                    //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
                } else {
                    $.each(sub2Array, function (index, sub2Arrayqd) {
                        menudata += '<li class="sub2itemLi" id="pcatsub2_id_' + sub2Arrayqd.pcatsub2_id + '"><a href="#">' + sub2Arrayqd.pcatsub2_name + '<pcatsub2_id class="hidden">' + sub2Arrayqd.pcatsub2_id + '</pcatsub2_id><pcatsub2_name class="hidden">' + sub2Arrayqd.pcatsub2_name + '</pcatsub2_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                    });
                }
                if (e === undefined || e.length === 0 || e === null) {
                    //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
                } else {
                    $.each(e, function (index, qd) {
                        menudata += '<li class="item2Li" id="itmsub2_id_' + qd.itmsub2_id + '"><a href="#">' + qd.itmsub2_name + '<itmsub2_id class="hidden">' + qd.itmsub2_id + '</itmsub2_id><itmsub2_name class="hidden">' + qd.itmsub2_name + '</itmsub2_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                    });
                }

                menudata += '<li class="pull-right" id="addSubItem2"><i class="fa fa-lg fa-plus"></i></li>';
                menudata += '</ul>';

                $('.subItems2').html('').append(menudata);

<?php
//if (isset($_SESSION) && !empty($_SESSION) && (isset($_SESSION['itmsub1_id']) || isset($_SESSION['pcatsub1_id']))) {
//   
//    if (isset($_SESSION['pcatsub1_id']) && !empty($_SESSION['pcatsub1_id'])) {
?>
//                        $('.subItems1 li').css('background-color', '#333333');
//                        $('#pcatsub1_id_<?php // echo $_SESSION['pcatsub1_id'];   ?>').css('background-color', '#cc0000');                       
<?php
//    }
//   
//    if (isset($_SESSION['pcatsub_id']) && !empty($_SESSION['pcatsub_id'])) {
?>
//                        $('.items li').css('background-color', '#333333');
//                        $('#pcatsub_id_<?php // echo $_SESSION['pcatsub_id'];   ?>').css('background-color', '#cc0000');

<?php
//    }
//    
//    
//    if (isset($_SESSION['pcatsub2_id']) && !empty($_SESSION['pcatsub2_id'])) {
?>
//                        $('.subItems2 li').css('background-color', '#333333');
//                        $('#pcatsub2_id_<?php // echo $_SESSION['pcatsub2_id'];   ?>').css('background-color', '#cc0000');
//                         loadSub2Items(<?php // echo $_SESSION['pcatsub2_id'];   ?>, $('#pcatsub2_id_<?php // echo $_SESSION['pcatsub2_id'];   ?>').find('pcatsub2_name').html());

<?php
//    }
//}
?>


                $('.sub2itemLi').click(function () {
                    $('.subItems2 li').css('background-color', '#333333');
                    $(this).css('background-color', '#cc0000');
                    $('.itemdesc').html('');
                    if ($('.subItems3').hasClass('hidden')) {
                        $('.subItems3').removeClass('hidden');
                    }
                     if (!$('.subItems4').hasClass('hidden')) {
                        $('.subItems4').addClass('hidden');
                    }
                    if (!$('.subItems5').hasClass('hidden')) {
                        $('.subItems5').addClass('hidden');
                    }
                    var pcatsub2_id = parseInt($(this).find('pcatsub2_id').html());
                    var pcatsub2_name = $(this).find('pcatsub2_name').html();
                    $.post('controllers/session-store.php', {sessionstore: 'store', pcatsub2_id: pcatsub2_id}, function (e) {
                        console.log(e);
                    });
                    loadSub2Items(pcatsub2_id, pcatsub2_name);
                });

                $('.item2Li').click(function () {
                    $('.subItems2 li').css('background-color', '#333333');
                    $(this).css('background-color', '#cc0000');
                    if (!$('.subItems3').hasClass('hidden')) {
                        $('.subItems3').addClass('hidden');
                    }
                     if (!$('.subItems4').hasClass('hidden')) {
                        $('.subItems4').addClass('hidden');
                    }
                    if (!$('.subItems5').hasClass('hidden')) {
                        $('.subItems5').addClass('hidden');
                    }
                    var itmsub2_id = parseInt($(this).find('itmsub2_id').html());
                    $.post('controllers/session-store.php', {sessionstore: 'store', itmsub2_id: itmsub2_id}, function (e) {
                        console.log(e);
                    });
                    // console.log("Item 2 sub ID: " + itmsub2_id);
                    echoProductID(itmsub2_id);
                    item2DescLoad(itmsub2_id, pcatsub1_id, pcatsub1_name)
                });

                $('#addSubItem2').click(function () {
                    var confirmModal = $('<div class="modal fade">' +
                            '<div class="modal-dialog">' +
                            '<div class="modal-content">' +
                            '<div class="modal-header bg-default">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                            '<div class="text-center"><p style="font-size:18pt"><span class="label label-default" id="catselector">Category</span>&nbsp;' +
                            '<span class="label label-default" id="itemselector">Item</span></p><div>' +
                            '</div>' +
                            '<div class="modal-body">' +
                            '<div class="row">' +
                            '<div class="col-md-12">' +
                            '<div class="col-md-12 modelCatDiv">' +
                            '<div class="form-horizontal">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Field Name</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="pcatsub2_name" class="form-control" id="pcatsub2_name">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="col-md-12">' +
                            '<button class="btn btn-success" id="addSub2CatMenu">Submit</button>&nbsp;' +
                            '<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-12 modelItemDiv hidden">' +
                            '<div class="form-horizontal">' +
                            '<input type="hidden" name="pcatsub1_id" class="form-control" value="' + pcatsub1_id + '">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Name</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itmsub2_name" class="form-control" id="itmsub2_name">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Quantity</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itmsub2_qty" class="form-control" id="itmsub2_qty">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Price ( $ )</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itmsub2_price" class="form-control" id="itmsub2_price">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Description</label>' +
                            '<div class="col-md-8">' +
                            '<textarea name="itmsub2_desc" class="form-control" id="itmsub2_desc"></textarea>' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="col-md-offset-4 col-md-8">' +
                            '<div class="checkbox">' +
                            '<label>' +
                            '<input type="checkbox" name="itemsub2_site" id="itemsub2_site"> Display On Site' +
                            '</label>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<form id="frmaddimage2" enctype="multipart/form-data">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">File Upload</label>' +
                            '<div class="col-md-8">' +
                            '<input type="file" name="fileToUpload2" id="fileToUpload2">' +
                            '</div>' +
                            '</div>' +
                            '</form>' +
                            '<div class="form-group">' +
                            '<div class="col-md-12">' +
                            '<button class="btn btn-success" id="addSubCatItem2">Submit</button>&nbsp;' +
                            '<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>' +
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

                    confirmModal.modal('show');

                    confirmModal.find('#catselector').click(function () {
                        if (confirmModal.find('.modelCatDiv').hasClass('hidden')) {
                            confirmModal.find('.modelCatDiv').removeClass('hidden')
                        }
                        if (!confirmModal.find('.modelItemDiv').hasClass('hidden')) {
                            confirmModal.find('.modelItemDiv').addClass('hidden')
                        }
                        if ($(this).hasClass('label-default')) {
                            $(this).removeClass('label-default');
                            $(this).addClass('label-primary');
                        }
                        if (!confirmModal.find('#itemselector').hasClass('label-default')) {
                            if (confirmModal.find('#itemselector').hasClass('label-primary')) {
                                confirmModal.find('#itemselector').removeClass('label-primary')
                            }
                            confirmModal.find('#itemselector').addClass('label-default');
                        }


                    });
                    confirmModal.find('#itemselector').click(function () {
                        if (!confirmModal.find('.modelCatDiv').hasClass('hidden')) {
                            confirmModal.find('.modelCatDiv').addClass('hidden')
                        }
                        if (confirmModal.find('.modelItemDiv').hasClass('hidden')) {
                            confirmModal.find('.modelItemDiv').removeClass('hidden')
                        }
                        if ($(this).hasClass('label-default')) {
                            $(this).removeClass('label-default');
                            $(this).addClass('label-primary');
                        }
                        if (!confirmModal.find('#catselector').hasClass('label-default')) {
                            if (confirmModal.find('#catselector').hasClass('label-primary')) {
                                confirmModal.find('#catselector').removeClass('label-primary')
                            }
                            confirmModal.find('#catselector').addClass('label-default');
                        }
                    });



                    confirmModal.find('#addSub2CatMenu').click(function () {
                        var pcatsub2_name = confirmModal.find('#pcatsub2_name').val();
                        AddProCatSub2(pcatsub2_name, pcatsub1_id, confirmModal);
                    });


                    confirmModal.find('#fileToUpload2').change(function () {
                        var ft = $('#fileToUpload2')[0].files[0];
                        confirmModal.find('#addSubCatItem2').click(function () {
                            var itmsub2_name = confirmModal.find('#itmsub2_name').val();
                            var itmsub2_qty = confirmModal.find('#itmsub2_qty').val();
                            var itmsub2_price = confirmModal.find('#itmsub2_price').val();
                            var itmsub2_desc = confirmModal.find('#itmsub2_desc').val();
//                    var item_site = confirmModal.find('#item_site').val();
                            var itemsub2_site = 0;
                            if (confirmModal.find('#itemsub2_site').is(':checked')) {
                                itemsub2_site = 1;
                            } else {
                                itemsub2_site = 0;
                            }
                            var oMyForm = new FormData();
                            oMyForm.append("fileToUpload2", ft);
                            oMyForm.append("action", "addSubItem2");
                            oMyForm.append("itmsub2_name", itmsub2_name);
                            oMyForm.append("itmsub2_qty", itmsub2_qty);
                            oMyForm.append("itmsub2_price", itmsub2_price);
                            oMyForm.append("itmsub2_desc", itmsub2_desc);
                            oMyForm.append("itemsub2_site", itemsub2_site);
                            oMyForm.append("pcatsub1_id", pcatsub1_id);
                            var oReq = new XMLHttpRequest();
                            oReq.open("POST", "controllers/pc_productitems2_c.php", true);

                            oReq.onload = function (oEvent) {
                                if (oReq.status == 200) {
                                    alertify.log(oReq.response, false, 1200);
                                    confirmModal.modal('hide');
                                    loadSub1Items(pcatsub1_id, pcatsub1_name);
                                    var url = window.location.href;
                                    var arr = url.split("/");
                                    var path = arr[arr.length - 1];
                                    setTimeout(function () {
                                        if (path === 'dashboard1.php') {
                                            window.location = "dashboard.php";
                                        } else {
                                            window.location = "dashboard1.php";
                                        }
                                    }, 1450);
                                } else {
                                    alert('failed');
                                }
                            };
                            oReq.send(oMyForm);
                        });
                    });
                });
            }, "json");
        }, "json");
    }
</script>

