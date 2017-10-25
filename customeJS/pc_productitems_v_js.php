<script type="text/javascript">

    function itemDescLoad(itm_id) {
        var itemdata = "";
        var imgFilename = [];
        var postData = {
            action: "getItemDesc",
            itm_id: itm_id
        }
        var dir = '../img/' + itm_id + '/';
        $.post('controllers/pc_productitems_c.php', {action: 'readfolderimages', dir: dir}, function (x) {
            if (x === undefined || x.length === 0 || x === null) {
                imgFilename.push('no_image_thumb.gif');
                itemdata += '<img src="img/' + imgFilename + '" alt="No image found" class="img-rounded" style="width:60%">';
            } else {
                $.each(x, function (index2, imgFile) {
                    imgFilename.push(imgFile);
                });
                itemdata += '<img src="img/' + itm_id + '/' + imgFilename + '" alt="No image found" class="img-rounded" style="width:80%">';
            }


            $.post('controllers/pc_productitems_c.php', postData, function (e) {

                itemdata += '<br><br><table class="table-bordered table-striped" id="desctable">';
                itemdata += '<tbody>';
                itemdata += '<tr>';
                itemdata += '<th> Name </th>';
                itemdata += '<td><h4 id="tbl_itm_name"></h5></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Quantity </th>';
                itemdata += '<td id="tbl_itm_qty"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Price </th>';
                itemdata += '<td id="tbl_itm_price"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Description </th>';
                itemdata += '<td id="tbl_itm_desc" style="overflow:hidden"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Site </th>';
                itemdata += '<td id="tbl_item_site"></td>';
                itemdata += '</tr>';
                itemdata += '</tbody>';
                itemdata += '</table>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left text-left" id="itemedit"><i class="fa fa-edit"></i> Edit</button>';

                //If inventory selection screen from Cashier POS system
                // if(Screen = 5){
                    itemdata += '<button onclick="selectInventoryItem('+itm_id+', 2)"class="col-md-offset-1 btn btn-primary pull-left text-left" id="item5edit"><i class="fa fa-edit"></i> Select</button>';
                // }
                
                //table edit
                itemdata += '<div class="form-horizontal hidden" id="editItemdesc">';

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
                itemdata += '<input type="text" name="itm_name" class="form-control" id="itm_name">';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Quantity</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itm_qty" class="form-control" id="itm_qty">';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Price ( $ )</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itm_price" class="form-control" id="itm_price">';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Description</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<textarea name="itm_desc" class="form-control" id="itm_desc"></textarea>';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<div class="col-md-11 col-md-offset-1">';
                itemdata += '<div class="checkbox">';
                itemdata += '<label>';
                itemdata += '<input type="checkbox" name="item_site" id="item_site"> <span style="color:white">Display On Site</span>';
                itemdata += '</label>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '</div>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left hidden" id="itemeditdone"><i class="fa fa-edit"></i> Done</button>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-right hidden" id="itemeditcancel"><i class="fa fa-edit"></i> Cancel</button><br><br>';
                $('.itemdesc').html('').append(itemdata);


                $.each(e, function (index, qd) {
                    $('#tbl_itm_name').html('').append(qd.itm_name);
                    $('#tbl_itm_qty').html('').append(qd.itm_qty);
                    $('#tbl_itm_price').html('').append('$' + qd.itm_price);
                    $('#tbl_itm_desc').html('').append(qd.itm_desc);
                    if (parseInt(qd.item_site) == 0) {
                        $('#tbl_item_site').html('').append('False');
                    } else {
                        $('#tbl_item_site').html('').append('True');

                    }
                });

                $('#imgEditstatus').click(function () {
                    if ($(this).is(':checked')) {
                        $('#frmaddimage').removeClass('hidden');
                    } else {
                        $('#frmaddimage').addClass('hidden');
                    }
                });

                $('#itemedit').click(function () {
                    $('#desctable').addClass('hidden');
                    $(this).addClass('hidden');
                    $('#editItemdesc').removeClass('hidden');
                    $('#itemeditdone').removeClass('hidden');
                    $('#itemeditcancel').removeClass('hidden');
                    var postDataEditdesc = {
                        action: "getItemDesc",
                        itm_id: itm_id
                    }
                    $.post('controllers/pc_productitems_c.php', postDataEditdesc, function (e) {
                        $.each(e, function (index, qd) {
                            $('#itm_name').val(qd.itm_name);
                            $('#itm_qty').val(qd.itm_qty);
                            $('#itm_price').val(qd.itm_price);
                            $('#itm_desc').val(qd.itm_desc);
                            if (parseInt(qd.item_site) == 0) {
                                $('#item_site').attr("checked", false);
                            } else {
                                $('#item_site').attr("checked", true);
                            }
                        });
                    }, "json");
                });

                $('#itemeditcancel').click(function () {
                    $('#desctable').removeClass('hidden');
                    $(this).addClass('hidden');
//                            $('#editItemdesc').removeClass('hidden');
                    $('#itemeditdone').addClass('hidden');
                    $('#editItemdesc').addClass('hidden');
                    $('#itemedit').removeClass('hidden');
                });
                $('#itemeditdone').click(function () {


                    alertify.confirm("Are You Sure Want Edit Item Description. ?", function (event) {
                        if (event) {
                            var itm_name = $('#itm_name').val();
                            var itm_qty = $('#itm_qty').val();
                            var itm_price = $('#itm_price').val();
                            var itm_desc = $('#itm_desc').val();
//                    var item_site = confirmModal.find('#item_site').val();
                            var item_site = 0;
                            if ($('#item_site').is(':checked')) {
                                item_site = 1;
                            } else {
                                item_site = 0;
                            }
                            postData = {
                                action: "editItem",
                                itm_name: itm_name,
                                itm_qty: itm_qty,
                                itm_price: itm_price,
                                item_site: item_site,
                                itm_id: itm_id,
                                itm_desc: itm_desc,
                            }
                            $.post('controllers/pc_productitems_c.php', postData, function (e) {
                                if (parseInt(e.msgType) == 1) {
                                    alertify.success(e.msg, 1200);
                                    if ($('#imgEditstatus').is(':checked')) {
                                        var ft = $('#fileToUpload')[0].files[0];
                                        //Image Edited
                                        var oMyForm = new FormData();
                                        oMyForm.append("fileToUpload", ft);
                                        oMyForm.append("itm_id", itm_id);
                                        var oReq = new XMLHttpRequest();
                                        oReq.open("POST", "controllers/imguploadEdit.php", true);
                                        oReq.onload = function (oEvent) {
                                            if (oReq.status == 200) {
                                                alertify.log(oReq.response, false, 1200);
                                                setTimeout(function () {
                                                    itemDescLoad(itm_id);
                                                }, 1450);
                                            } else {
                                                alert('failed');
                                            }
                                        };
                                        oReq.send(oMyForm);
                                        //End of image edited
                                    } else {
                                        setTimeout(function () {
                                            itemDescLoad(itm_id);
                                        }, 1400);
                                    }
                                    $('#frmaddimage').addClass('hidden');

                                    var postDataEditdesc = {
                                        action: "getItemDesc",
                                        itm_id: itm_id
                                    }
                                    $.post('controllers/pc_productitems_c.php', postDataEditdesc, function (e) {
                                        $.each(e, function (index, qd) {

                                            $('#tbl_itm_name').html('').append(qd.itm_name);
                                            $('#tbl_itm_qty').html('').append(qd.itm_qty);
                                            $('#tbl_itm_price').html('').append('$' + qd.itm_price);
                                            $('#tbl_itm_desc').html('').append(qd.itm_desc);
                                            if (parseInt(qd.item_site) == 0) {
                                                $('#tbl_item_site').html('').append('False');
                                            } else {
                                                $('#tbl_item_site').html('').append('True');

                                            }

                                            $('#itm_name').val(qd.itm_name);
                                            $('#itm_qty').val(qd.itm_qty);
                                            $('#itm_price').val(qd.itm_price);
                                            $('#itm_desc').val(qd.itm_desc);
                                            if (parseInt(qd.item_site) == 0) {
                                                $('#item_site').attr("checked", false);
                                            } else {
                                                $('#item_site').attr("checked", true);
                                            }
                                        });
                                    }, "json");
                                    loadItems(pcat_id, pcat_name);
                                    $('#desctable').removeClass('hidden');
                                    $(this).addClass('hidden');
                                    $('#itemeditcancel').addClass('hidden');
                                    $('#itemeditdone').addClass('hidden');
                                    $('#editItemdesc').addClass('hidden');
                                    $('#itemedit').removeClass('hidden');

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
    
    function loadItems(pcat_id, pcat_name) {
        var menudata = '';
        var postData = {
            action: "loadProCategory",
            pcat_id: pcat_id
        }

        menudata += '<h4><u> ' + pcat_name + ' </u></h4>';
        menudata += '<ul>';
        $.post('controllers/pc_productitems_c.php', postData, function (e) {
            $.post('controllers/pc_productcontrolsub_c.php', {action: "loadSubCat", pcat_id: pcat_id}, function (subcatArray) {

                if (subcatArray === undefined || subcatArray.length === 0 || subcatArray === null) {
                    //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
                } else {
                    $.each(subcatArray, function (index, qdsubCat) {
                        menudata += '<li class="itemSubCatLi" id="pcatsub_id_' + qdsubCat.pcatsub_id + '"><a href="#">' + qdsubCat.pcatsub_name + '<pcatsub_id class="hidden">' + qdsubCat.pcatsub_id + '</pcatsub_id><pcatsub_name class="hidden">' + qdsubCat.pcatsub_name + '</pcatsub_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                    });
                }

                if (e === undefined || e.length === 0 || e === null) {
                    //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
                } else {
                    $.each(e, function (index, qd) {
                        menudata += '<li class="itemLi" id="itm_id_' + qd.itm_id + '"><a href="#">' + qd.itm_name + '<itm_id class="hidden">' + qd.itm_id + '</itm_id></a><i class="fa fa-arrow-right pull-right"></i></li>';
                    });
                }

                menudata += '<li class="pull-right" id="addItem"><i class="fa fa-lg fa-plus"></i></li>';
                menudata += '</ul>';

                $('.items').html('').append(menudata);

<?php
//if (isset($_SESSION) && !empty($_SESSION) && (isset($_SESSION['itm_id']) || isset($_SESSION['pcatsub_id']))) {
//   
//    if (isset($_SESSION['pcatsub_id']) && !empty($_SESSION['pcatsub_id'])) {
?>
//                        $('.items li').css('background-color', '#333333');
//                        $('#pcatsub_id_<?php // echo $_SESSION['pcatsub_id'];                ?>').css('background-color', '#cc0000');
//                         loadSubItems(<?php // echo $_SESSION['pcatsub_id'];                ?>, $('#pcatsub_id_<?php // echo $_SESSION['pcatsub_id'];                ?>').find('pcatsub_name').html());
<?php
//    }
//}
?>




                $('.itemSubCatLi').click(function () {
                    var pcatsub_id = parseInt($(this).find('pcatsub_id').html());
                    var pcatsub_name = $(this).find('pcatsub_name').html();
                    $('.items li').css('background-color', '#333333');
                    $(this).css('background-color', '#cc0000');
                    $('.itemdesc').html('');
                    if ($('.subItems1').hasClass('hidden')) {
                        $('.subItems1').removeClass('hidden');
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
                    $.post('controllers/session-store.php', {sessionstore: 'store', pcatsub_id: pcatsub_id}, function (e) {
                        console.log(e);
                    });
                    loadSubItems(pcatsub_id, pcatsub_name);
                });

                $('.itemLi').click(function () {
                    //ITEM SELECTON EFFECT
                    $('.items li').css('background-color', '#333333');
                    $(this).css('background-color', '#cc0000');
                    //ITEM SELECTON EFFECT END
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
                    $('.itemdesc').removeClass('hidden');
                    $('.itemdesc').addClass('col-md-6');
                    var itm_id = parseInt($(this).find('itm_id').html());
                    $.post('controllers/session-store.php', {sessionstore: 'store', itm_id: itm_id}, function (e) {
                        console.log("ITEM ID: " + itm_id);
                        // echoProductID(itm_id);
                        // clickedInventory("20");    
                    });
                    itemDescLoad(itm_id);
                    
                });


                $('#addItem').click(function () {
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
                            '<input type="text" name="itm_name" class="form-control" id="pcatsub_name">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="col-md-12">' +
                            '<button class="btn btn-success" id="addCatMenu">Submit</button>&nbsp;' +
                            '<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-12 modelItemDiv hidden">' +
                            '<div class="form-horizontal">' +
                            '<input type="hidden" name="pcat_id" class="form-control" value="' + pcat_id + '">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Name</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itm_name" class="form-control" id="itm_name">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Quantity</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itm_qty" class="form-control" id="itm_qty">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Price ( $ )</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itm_price" class="form-control" id="itm_price">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Description</label>' +
                            '<div class="col-md-8">' +
                            '<textarea name="itm_desc" class="form-control" id="itm_desc"></textarea>' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="col-md-offset-4 col-md-8">' +
                            '<div class="checkbox">' +
                            '<label>' +
                            '<input type="checkbox" name="item_site" id="item_site"> Display On Site' +
                            '</label>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<form id="frmaddimage0" enctype="multipart/form-data">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">File Upload</label>' +
                            '<div class="col-md-8">' +
                            '<input type="file" name="fileToUpload0" id="fileToUpload0">' +
                            '</div>' +
                            '</div>' +
                            '</form>' +
                            '<div class="form-group">' +
                            '<div class="col-md-12">' +
                            '<button class="btn btn-success" id="addCat">Submit</button>&nbsp;' +
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



                    confirmModal.find('#addCatMenu').click(function () {
                        var pcatsub_name = confirmModal.find('#pcatsub_name').val();
                        AddProCatSub(pcatsub_name, pcat_id, confirmModal);
                    });


                    confirmModal.find('#fileToUpload0').change(function () {
                        var ft = $('#fileToUpload0')[0].files[0];
                        confirmModal.find('#addCat').click(function () {
                            var itm_name = confirmModal.find('#itm_name').val();
                            var itm_qty = confirmModal.find('#itm_qty').val();
                            var itm_price = confirmModal.find('#itm_price').val();
                            var itm_desc = confirmModal.find('#itm_desc').val();
//                    var item_site = confirmModal.find('#item_site').val();
                            var item_site = 0;
                            if (confirmModal.find('#item_site').is(':checked')) {
                                item_site = 1;
                            } else {
                                item_site = 0;
                            }
                            var oMyForm = new FormData();
                            oMyForm.append("fileToUpload0", ft);
                            oMyForm.append("action", "additem");
                            oMyForm.append("itm_name", itm_name);
                            oMyForm.append("itm_qty", itm_qty);
                            oMyForm.append("itm_price", itm_price);
                            oMyForm.append("item_site", item_site);
                            oMyForm.append("pcat_id", pcat_id);
                            oMyForm.append("itm_desc", itm_desc);
                            var oReq = new XMLHttpRequest();
                            oReq.open("POST", "controllers/pc_productitems_c.php", true);

                            oReq.onload = function (oEvent) {
                                if (oReq.status == 200) {
                                    alertify.log(oReq.response, false, 1200);
                                    confirmModal.modal('hide');
                                    loadItems(pcat_id, pcat_name);
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