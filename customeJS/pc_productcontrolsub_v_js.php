
<script type="text/javascript">

    function AddProCatSub(pcatsub_name, pcat_id, confirmModal) {
        $.post('controllers/pc_productcontrolsub_c.php', {action: 'save', pcatsub_name: pcatsub_name, pcat_id: pcat_id}, function (e) {
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

    function item1DescLoad(itmsub1_id, pcatsub_id, pcatsub_name) {
        var itemdata = "";
        var imgFilename = [];
        var postData = {
            action: "getItem1Desc",
            itmsub1_id: itmsub1_id
        }
        var dir = '../img/item1/' + itmsub1_id + '/';
        $.post('controllers/pc_productitems_c.php', {action: 'readfolderimages', dir: dir}, function (x) {
            if (x === undefined || x.length === 0 || x === null) {
                imgFilename.push('no_image_thumb.gif');
                itemdata += '<img src="img/' + imgFilename + '" alt="No image found" class="img-rounded" style="width:60%">';
            } else {
                $.each(x, function (index2, imgFile) {
                    imgFilename.push(imgFile);
                });
                itemdata += '<img src="img/item1/' + itmsub1_id + '/' + imgFilename + '" alt="No image found" class="img-rounded" style="width:80%">';
            }


            $.post('controllers/pc_productitems1_c.php', postData, function (e) {

                itemdata += '<br><br><table class="table-bordered table-striped" id="desctable">';
                itemdata += '<tbody>';
                itemdata += '<tr>';
                itemdata += '<th> Name </th>';
                itemdata += '<td><h4 id="tbl_itmsub1_name"></h5></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Quantity </th>';
                itemdata += '<td id="tbl_itmsub1_qty"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Price </th>';
                itemdata += '<td id="tbl_itmsub1_price"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Description </th>';
                itemdata += '<td id="tbl_itmsub1_desc" style="overflow:hidden"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Site </th>';
                itemdata += '<td id="tbl_itemsub1_site"></td>';
                itemdata += '</tr>';
                itemdata += '</tbody>';
                itemdata += '</table>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left text-left" id="item1edit"><i class="fa fa-edit"></i> Edit</button>';

                //If inventory selection screen from Cashier POS system
                // if(Screen = 5){
                    itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left text-left" onclick="selectInventoryItem('+itmsub1_id+', 3)" id="item5edit"><i class="fa fa-edit"></i> Select</button>';
                // }

                //table edit
                itemdata += '<div class="form-horizontal hidden" id="editItem1desc">';

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
                itemdata += '<input type="text" name="itmsub1_name" class="form-control" id="itmsub1_name">';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Quantity</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub1_qty" class="form-control" id="itmsub1_qty">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Price ( $ )</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub1_price" class="form-control" id="itmsub1_price">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Description</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<textarea name="itmsub1_desc" class="form-control" id="itmsub1_desc"></textarea>';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<div class="col-md-11 col-md-offset-1">';
                itemdata += '<div class="checkbox">';
                itemdata += '<label>';
                itemdata += '<input type="checkbox" name="item_site" id="itemsub1_site"> <span style="color:white">Display On Site</span>';
                itemdata += '</label>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left hidden" id="item1editdone"><i class="fa fa-edit"></i> Done</button>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-right hidden" id="item1editcancel"><i class="fa fa-edit"></i> Cancel</button><br><br>';
                $('.itemdesc').html('').append(itemdata);



                $.each(e, function (index, qd) {
                    $('#tbl_itmsub1_name').html('').append(qd.itmsub1_name);
                    $('#tbl_itmsub1_qty').html('').append(qd.itmsub1_qty);
                    $('#tbl_itmsub1_price').html('').append('$' + qd.itmsub1_price);
                    $('#tbl_itmsub1_desc').html('').append(qd.itmsub1_desc);
                    if (parseInt(qd.itemsub1_site) == 0) {
                        $('#tbl_itemsub1_site').html('').append('False');
                    } else {
                        $('#tbl_itemsub1_site').html('').append('True');

                    }
                });

                $('#imgEditstatus').click(function () {
                    if ($(this).is(':checked')) {
                        $('#frmaddimage').removeClass('hidden');
                    } else {
                        $('#frmaddimage').addClass('hidden');
                    }
                });

                $('#item1edit').click(function () {
                    $('#desctable').addClass('hidden');
                    $(this).addClass('hidden');
                    $('#editItem1desc').removeClass('hidden');
                    $('#item1editdone').removeClass('hidden');
                    $('#item1editcancel').removeClass('hidden');
                    var postDataEditdesc = {
                        action: "getItem1Desc",
                        itmsub1_id: itmsub1_id
                    }
                    $.post('controllers/pc_productitems1_c.php', postDataEditdesc, function (e) {
                        $.each(e, function (index, qd) {
                            $('#itmsub1_name').val(qd.itmsub1_name);
                            $('#itmsub1_qty').val(qd.itmsub1_qty);
                            $('#itmsub1_price').val(qd.itmsub1_price);
                            $('#itmsub1_desc').val(qd.itmsub1_desc);
                            if (parseInt(qd.itemsub1_site) == 0) {
                                $('#itemsub1_site').attr("checked", false);
                            } else {
                                $('#itemsub1_site').attr("checked", true);
                            }
                        });
                    }, "json");
                });

                $('#item1editcancel').click(function () {
                    $('#desctable').removeClass('hidden');
                    $(this).addClass('hidden');
//                            $('#editItemdesc').removeClass('hidden');
                    $('#item1editdone').addClass('hidden');
                    $('#editItem1desc').addClass('hidden');
                    $('#item1edit').removeClass('hidden');
                });
                $('#item1editdone').click(function () {

                    alertify.confirm("Are You Sure Want Edit Item Description. ?", function (event) {
                        if (event) {
                            var itmsub1_name = $('#itmsub1_name').val();
                            var itmsub1_qty = $('#itmsub1_qty').val();
                            var itmsub1_price = $('#itmsub1_price').val();
                            var itmsub1_desc = $('#itmsub1_desc').val();
//                    var item_site = confirmModal.find('#item_site').val();
                            var itemsub1_site = 0;
                            if ($('#itemsub1_site').is(':checked')) {
                                itemsub1_site = 1;
                            } else {
                                itemsub1_site = 0;
                            }
                            postData = {
                                action: "editItem1",
                                itmsub1_name: itmsub1_name,
                                itmsub1_qty: itmsub1_qty,
                                itmsub1_price: itmsub1_price,
                                itmsub1_desc: itmsub1_desc,
                                itmsub1_id: itmsub1_id,
                                itemsub1_site: itemsub1_site,
                                pcatsub_id: pcatsub_id
                            }
                            $.post('controllers/pc_productitems1_c.php', postData, function (e) {
                                if (parseInt(e.msgType) == 1) {
                                    alertify.success(e.msg, 1200);
                                    if ($('#imgEditstatus').is(':checked')) {
                                        var ft = $('#fileToUpload')[0].files[0];
                                        //Image Edited
                                        var oMyForm = new FormData();
                                        oMyForm.append("fileToUpload", ft);
                                        oMyForm.append("itmsub1_id", itmsub1_id);
                                        var oReq = new XMLHttpRequest();
                                        oReq.open("POST", "controllers/imguploadEditItem1.php", true);
                                        oReq.onload = function (oEvent) {
                                            if (oReq.status == 200) {
                                                alertify.log(oReq.response, false, 1200);
                                                setTimeout(function () {
                                                    item1DescLoad(itmsub1_id);
                                                }, 1450);
                                            } else {
                                                alert('failed');
                                            }
                                        };
                                        oReq.send(oMyForm);
                                        //End of image edited
                                    } else {
                                        setTimeout(function () {
                                            item1DescLoad(itmsub1_id);
                                        }, 1400);
                                    }
                                    $('#frmaddimage').addClass('hidden');

                                    var postDataEditdesc = {
                                        action: "getItem1Desc",
                                        itmsub1_id: itmsub1_id
                                    }
                                    $.post('controllers/pc_productitems1_c.php', postDataEditdesc, function (e) {
                                        $.each(e, function (index, qd) {

                                            $('#tbl_itmsub1_name').html('').append(qd.itmsub1_name);
                                            $('#tbl_itmsub1_qty').html('').append(qd.itmsub1_qty);
                                            $('#tbl_itmsub1_price').html('').append('$' + qd.itmsub1_price);
                                            $('#tbl_itmsub1_desc').html('').append(qd.itmsub1_desc);
                                            if (parseInt(qd.itemsub1_site) == 0) {
                                                $('#tbl_itemsub1_site').html('').append('False');
                                            } else {
                                                $('#tbl_itemsub1_site').html('').append('True');

                                            }

                                            $('#itmsub1_name').val(qd.itmsub1_name);
                                            $('#itmsub1_qty').val(qd.itmsub1_qty);
                                            $('#itmsub1_price').val(qd.itmsub1_price);
                                            $('#itmsub1_desc').val(qd.itmsub1_desc);
                                            if (parseInt(qd.itemsub1_site) == 0) {
                                                $('#itemsub1_site').attr("checked", false);
                                            } else {
                                                $('#itemsub1_site').attr("checked", true);
                                            }
                                        });
                                    }, "json");
                                    loadSubItems(pcatsub_id, pcatsub_name);
                                    $('#desctable').removeClass('hidden');
                                    $(this).addClass('hidden');
                                    $('#item1editcancel').addClass('hidden');
                                    $('#item1editdone').addClass('hidden');
                                    $('#editItem1desc').addClass('hidden');
                                    $('#item1edit').removeClass('hidden');



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
    console.log("Selected inventory Item in pc_productcontrolsub_v_js");
    function selectInventoryItem(){
    console.log("Selected inventory Item"+document.getElementById("image"));
    // console.log("Doucment.getelement(): " + document.getElementById("image"));
    // console.log("After getElementById");
}

function clockedInventory(){
    console.log("Selected what we want");
}
}
    function loadSubItems(pcatsub_id, pcatsub_name) {
        var menudata = '';
        menudata += '<h4><u> ' + pcatsub_name + ' </u></h4>';
        menudata += '<ul>';
        $.post('controllers/pc_productitems1_c.php', {action: 'loadsubcategoryitems', pcatsub_name: pcatsub_name, pcatsub_id: pcatsub_id}, function (e) {
            $.post('controllers/pc_productcontrolsub1_c.php', {action: 'getAllByPcatSubID', pcatsub_id: pcatsub_id}, function (sub1Array) {
                if (sub1Array === undefined || sub1Array.length === 0 || sub1Array === null) {
                    //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
                } else {
                    $.each(sub1Array, function (index, sub1Arrayqd) {
                        menudata += '<li  onclick="clickedInventory()" class="sub1itemLi" id="pcatsub1_id_' + sub1Arrayqd.pcatsub1_id + '"><a href="#">' + sub1Arrayqd.pcatsub1_name + '<pcatsub1_id class="hidden">' + sub1Arrayqd.pcatsub1_id + '</pcatsub1_id><pcatsub1_name class="hidden">' + sub1Arrayqd.pcatsub1_name + '</pcatsub1_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                    });
                }
                if (e === undefined || e.length === 0 || e === null) {
                    //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
                } else {
                    $.each(e, function (index, qd) {
                        menudata += '<li class="item1Li" id="itmsub1_id_' + qd.itmsub1_id + '"><a href="#">' + qd.itmsub1_name + '<itmsub1_id class="hidden">' + qd.itmsub1_id + '</itmsub1_id><itmsub1_name class="hidden">' + qd.itmsub1_name + '</itmsub1_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                    });
                }

                menudata += '<li class="pull-right" id="addSubItem1"><i class="fa fa-lg fa-plus"></i></li>';
                menudata += '</ul>';                
                $('.subItems1').html('').append(menudata);


<?php
//if (isset($_SESSION) && !empty($_SESSION) && (isset($_SESSION['itmsub1_id']) || isset($_SESSION['pcatsub1_id']))) {
//   
//    if (isset($_SESSION['pcatsub1_id']) && !empty($_SESSION['pcatsub1_id'])) {
?>
//                        $('.subItems1 li').css('background-color', '#333333');
//                        $('#pcatsub1_id_<?php // echo $_SESSION['pcatsub1_id'];       ?>').css('background-color', '#cc0000');
//                        loadSub1Items(<?php // echo $_SESSION['pcatsub1_id'];       ?>, $('#pcatsub1_id_<?php // echo $_SESSION['pcatsub1_id'];       ?>').find('pcatsub1_name').html());
<?php
//    }
//   
//    if (isset($_SESSION['pcatsub_id']) && !empty($_SESSION['pcatsub_id'])) {
?>
//                        $('.items li').css('background-color', '#333333');
//                        $('#pcatsub_id_<?php // echo $_SESSION['pcatsub_id'];       ?>').css('background-color', '#cc0000');

<?php
//    }
//}
?>


                $('.sub1itemLi').click(function () {
                    var pcatsub1_id = parseInt($(this).find('pcatsub1_id').html());
                    var pcatsub1_name = $(this).find('pcatsub1_name').html();
                    $('.subItems1 li').css('background-color', '#333333');
                    $(this).css('background-color', '#cc0000');
                    $('.itemdesc').html('');
                    if ($('.subItems2').hasClass('hidden')) {
                        $('.subItems2').removeClass('hidden');
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
                    $.post('controllers/session-store.php', {sessionstore: 'store', pcatsub1_id: pcatsub1_id}, function (e) {
                        console.log(e);
                    });

                    loadSub1Items(pcatsub1_id, pcatsub1_name);
                });

                $('.item1Li').click(function () {
                    $('.subItems1 li').css('background-color', '#333333');
                    $(this).css('background-color', '#cc0000');
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
                    var itmsub1_id = parseInt($(this).find('itmsub1_id').html());
                    $.post('controllers/session-store.php', {sessionstore: 'store', itmsub1_id: itmsub1_id}, function (e) {
                        console.log(e);
                    });
                    console.log("Item sub ID: " + itmsub1_id);

                    // clickedInventory(itmsub1_id);
                    echoProductID(itmsub1_id);
                    item1DescLoad(itmsub1_id, pcatsub_id, pcatsub_name);
                });

                $('#addSubItem1').click(function () {
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
                            '<input type="text" name="itm_name" class="form-control" id="pcatsub1_name">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="col-md-12">' +
                            '<button class="btn btn-success" id="addSub1CatMenu">Submit</button>&nbsp;' +
                            '<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-12 modelItemDiv hidden">' +
                            '<div class="form-horizontal">' +
                            '<input type="hidden" name="pcatsub_id" class="form-control" value="' + pcatsub_id + '">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Name</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itm_name" class="form-control" id="itmsub1_name">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Quantity</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itm_qty" class="form-control" id="itmsub1_qty">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Price ( $ )</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itm_price" class="form-control" id="itmsub1_price">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Description</label>' +
                            '<div class="col-md-8">' +
                            '<textarea name="itm_desc" class="form-control" id="itmsub1_desc"></textarea>' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="col-md-offset-4 col-md-8">' +
                            '<div class="checkbox">' +
                            '<label>' +
                            '<input type="checkbox" name="item_site" id="itemsub1_site"> Display On Site' +
                            '</label>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<form id="frmaddimage1" enctype="multipart/form-data">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">File Upload</label>' +
                            '<div class="col-md-8">' +
                            '<input type="file" name="fileToUpload1" id="fileToUpload1">' +
                            '</div>' +
                            '</div>' +
                            '</form>' +
                            '<div class="form-group">' +
                            '<div class="col-md-12">' +
                            '<button class="btn btn-success" id="addSubCatItem1">Submit</button>&nbsp;' +
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



                    confirmModal.find('#addSub1CatMenu').click(function () {
                        var pcatsub1_name = confirmModal.find('#pcatsub1_name').val();
                        AddProCatSub1(pcatsub1_name, pcatsub_id, confirmModal);
                    });


                    confirmModal.find('#fileToUpload1').change(function () {
                        var ft = $('#fileToUpload1')[0].files[0];

                        confirmModal.find('#addSubCatItem1').click(function () {
                            var itmsub1_name = confirmModal.find('#itmsub1_name').val();
                            var itmsub1_qty = confirmModal.find('#itmsub1_qty').val();
                            var itmsub1_price = confirmModal.find('#itmsub1_price').val();
                            var itmsub1_desc = confirmModal.find('#itmsub1_desc').val();
                            var itemsub1_site = 0;
                            if (confirmModal.find('#itemsub1_site').is(':checked')) {
                                itemsub1_site = 1;
                            } else {
                                itemsub1_site = 0;
                            }
                            var oMyForm = new FormData();
                            oMyForm.append("fileToUpload1", ft);
                            oMyForm.append("action", "addSubItem1");
                            oMyForm.append("itmsub1_name", itmsub1_name);
                            oMyForm.append("itmsub1_qty", itmsub1_qty);
                            oMyForm.append("itmsub1_price", itmsub1_price);
                            oMyForm.append("itmsub1_desc", itmsub1_desc);
                            oMyForm.append("pcatsub_id", pcatsub_id);
                            oMyForm.append("itemsub1_site", itemsub1_site);
                            var oReq = new XMLHttpRequest();
                            oReq.open("POST", "controllers/pc_productitems1_c.php", true);

                            oReq.onload = function (oEvent) {
                                if (oReq.status == 200) {
                                    alertify.log(oReq.response, false, 1200);
                                    confirmModal.modal('hide');
                                    loadSubItems(pcatsub_id, pcatsub_name);
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

