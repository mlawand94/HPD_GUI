<script type="text/javascript">
var Screen = 0;
    function AddProCatSub4(pcatsub4_name, pcatsub3_id, confirmModal) {
        $.post('controllers/pc_productcontrolsub4_c.php', {action: 'save', pcatsub4_name: pcatsub4_name, pcatsub3_id: pcatsub3_id}, function (e) {
            if (parseInt(e.msgType) == 1) {
                alertify.success(e.msg, 1200);
                confirmModal.modal('hide');
                setTimeout(function () {
                    location.reload()
                }, 1350);
            } else {
                alertify.error(e.msg, 1200);
            }
        }, "json");
    }

    function item5DescLoad(itmsub5_id, pcatsub4_id, pcatsub4_name) {
        var itemdata = "";
        var imgFilename = [];
        var postData = {
            action: "getItem5Desc",
            itmsub5_id: itmsub5_id
        }
        var dir = '../img/item5/' + itmsub5_id + '/';
        $.post('controllers/pc_productitems_c.php', {action: 'readfolderimages', dir: dir}, function (x) {
            if (x === undefined || x.length === 0 || x === null) {
                imgFilename.push('no_image_thumb.gif');
                itemdata += '<div class="leImage"><img id="image" src="img/' + imgFilename + '"  alt="No image found" class="img-rounded" style="width:60%">';
            } else {
                $.each(x, function (index2, imgFile) {
                    imgFilename.push(imgFile);
                });
                itemdata += '<img src="img/item5/' + itmsub5_id + '/' + imgFilename + '" id="itemDescription" alt="No image found" class="img-rounded" style="width:80%"></div>';
                // console.log("ITEM SUB 5 ID: " + itmsub5_id);
                echoProductID(itmsub5_id);
            }


            $.post('controllers/pc_productitems5_c.php', postData, function (e) {

                itemdata += '<br><br><table class="table-bordered table-striped" id="desctable">';
                itemdata += '<tbody>';
                itemdata += '<tr>';
                itemdata += '<th> Name </th>';
                itemdata += '<td><h4 id="tbl_itmsub5_name"></h5></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Quantity </th>';
                itemdata += '<td id="tbl_itmsub5_qty"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Price </th>';
                itemdata += '<td id="tbl_itmsub5_price"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Description </th>';
                itemdata += '<td id="tbl_itmsub5_desc" style="overflow:hidden"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Site </th>';
                itemdata += '<td id="tbl_itemsub5_site"></td>';
                itemdata += '</tr>';
                itemdata += '</tbody>';
                itemdata += '</table>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left text-left" id="item5edit"><i class="fa fa-edit"></i> Edit</button>';


                //If inventory selection screen from Cashier POS system
                if(Screen = 5){
                    itemdata += '<button onclick="selectInventoryItem('+itmsub5_id+', 7)" class="col-md-offset-1 btn btn-primary pull-left text-left" id="item5edit"><i class="fa fa-edit"></i> Select</button>';
                }
                
                //table edit
                itemdata += '<div class="form-horizontal hidden" id="editItem5desc">';

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
                itemdata += '<input type="text" name="itmsub5_name" class="form-control" id="itmsub5_name">';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Quantity</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub5_qty" class="form-control" id="itmsub5_qty">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Price ( $ )</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub5_price" class="form-control" id="itmsub5_price">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Description</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<textarea name="itmsub5_desc" class="form-control" id="itmsub5_desc"></textarea>';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<div class="col-md-11 col-md-offset-1">';
                itemdata += '<div class="checkbox">';
                itemdata += '<label>';
                itemdata += '<input type="checkbox" name="itemsub5_site" id="itemsub5_site"> <span style="color:white">Display On Site</span>';
                itemdata += '</label>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left hidden" id="item5editdone"><i class="fa fa-edit"></i> Done</button>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-right hidden" id="item5editcancel"><i class="fa fa-edit"></i> Cancel</button><br><br>';
                $('.itemdesc').html('').append(itemdata);

                

                $.each(e, function (index, qd) {
                    $('#tbl_itmsub5_name').html('').append(qd.itmsub5_name);
                    $('#tbl_itmsub5_qty').html('').append(qd.itmsub5_qty);
                    $('#tbl_itmsub5_price').html('').append('$' + qd.itmsub5_price);
                    $('#tbl_itmsub5_desc').html('').append(qd.itmsub5_desc);
                    if (parseInt(qd.itemsub5_site) == 0) {
                        $('#tbl_itemsub5_site').html('').append('False');
                    } else {
                        $('#tbl_itemsub5_site').html('').append('True');

                    }
                });

                $('#imgEditstatus').click(function () {
                    if ($(this).is(':checked')) {
                        $('#frmaddimage').removeClass('hidden');
                    } else {
                        $('#frmaddimage').addClass('hidden');
                    }
                });

                $('#item5edit').click(function () {
                    $('#desctable').addClass('hidden');
                    $(this).addClass('hidden');
                    $('#editItem5desc').removeClass('hidden');
                    $('#item5editdone').removeClass('hidden');
                    $('#item5editcancel').removeClass('hidden');
                    var postDataEditdesc = {
                        action: "getItem5Desc",
                        itmsub5_id: itmsub5_id
                    }
                    $.post('controllers/pc_productitems5_c.php', postDataEditdesc, function (e) {
                        $.each(e, function (index, qd) {
                            $('#itmsub5_name').val(qd.itmsub5_name);
                            $('#itmsub5_qty').val(qd.itmsub5_qty);
                            $('#itmsub5_price').val(qd.itmsub5_price);
                            $('#itmsub5_desc').val(qd.itmsub5_desc);
                            if (parseInt(qd.itemsub5_site) == 0) {
                                $('#itemsub5_site').attr("checked", false);
                            } else {
                                $('#itemsub5_site').attr("checked", true);
                            }
                        });
                    }, "json");
                });

                $('#item5editcancel').click(function () {
                    $('#desctable').removeClass('hidden');
                    $(this).addClass('hidden');
//                            $('#editItemdesc').removeClass('hidden');
                    $('#item5editdone').addClass('hidden');
                    $('#editItem5desc').addClass('hidden');
                    $('#item5edit').removeClass('hidden');
                });

                $('#item5editdone').click(function () {

                    alertify.confirm("Are You Sure Want Edit Item Description. ?", function (event) {
                        if (event) {
                            var itmsub5_name = $('#itmsub5_name').val();
                            var itmsub5_qty = $('#itmsub5_qty').val();
                            var itmsub5_price = $('#itmsub5_price').val();
                            var itmsub5_desc = $('#itmsub5_desc').val();
//                    var item_site = confirmModal.find('#item_site').val();
                            var itemsub5_site = 0;
                            if ($('#itemsub5_site').is(':checked')) {
                                itemsub5_site = 1;
                            } else {
                                itemsub5_site = 0;
                            }
                            postData = {
                                action: "editItem5",
                                itmsub5_name: itmsub5_name,
                                itmsub5_qty: itmsub5_qty,
                                itmsub5_price: itmsub5_price,
                                itmsub5_desc: itmsub5_desc,
                                itmsub5_id: itmsub5_id,
                                itemsub5_site: itemsub5_site,
                                pcatsub4_id: pcatsub4_id
                            }
                            $.post('controllers/pc_productitems5_c.php', postData, function (e) {
                                if (parseInt(e.msgType) == 1) {
                                    alertify.success(e.msg, 1200);
                                    if ($('#imgEditstatus').is(':checked')) {
                                        var ft = $('#fileToUpload')[0].files[0];
                                        //Image Edited
                                        var oMyForm = new FormData();
                                        oMyForm.append("fileToUpload", ft);
                                        oMyForm.append("itmsub5_id", itmsub5_id);
                                        var oReq = new XMLHttpRequest();
                                        oReq.open("POST", "controllers/imguploadEditItem5.php", true);
                                        oReq.onload = function (oEvent) {
                                            if (oReq.status == 200) {
                                                alertify.log(oReq.response, false, 1200);
                                                setTimeout(function () {
                                                    item5DescLoad(itmsub5_id, pcatsub4_id, pcatsub4_name);
                                                }, 1450);
                                            } else {
                                                alert('failed');
                                            }
                                        };
                                        oReq.send(oMyForm);
                                        //End of image edited
                                    } else {
                                        setTimeout(function () {
                                            item5DescLoad(itmsub5_id, pcatsub4_id, pcatsub4_name);
                                        }, 1400);
                                    }
                                    $('#frmaddimage').addClass('hidden');

                                    var postDataEditdesc = {
                                        action: "getItem5Desc",
                                        itmsub5_id: itmsub5_id
                                    }
                                    $.post('controllers/pc_productitems5_c.php', postDataEditdesc, function (e) {
                                        $.each(e, function (index, qd) {

                                            $('#tbl_itmsub5_name').html('').append(qd.itmsub5_name);
                                            $('#tbl_itmsub5_qty').html('').append(qd.itmsub5_qty);
                                            $('#tbl_itmsub5_price').html('').append('$' + qd.itmsub5_price);
                                            $('#tbl_itmsub5_desc').html('').append(qd.itmsub5_desc);
                                            if (parseInt(qd.itemsub5_site) == 0) {
                                                $('#tbl_itemsub5_site').html('').append('False');
                                            } else {
                                                $('#tbl_itemsub5_site').html('').append('True');

                                            }

                                            $('#itmsub5_name').val(qd.itmsub5_name);
                                            $('#itmsub5_qty').val(qd.itmsub5_qty);
                                            $('#itmsub5_price').val(qd.itmsub5_price);
                                            $('#itmsub5_desc').val(qd.itmsub5_desc);
                                            if (parseInt(qd.itemsub5_site) == 0) {
                                                $('#itemsub5_site').attr("checked", false);
                                            } else {
                                                $('#itemsub5_site').attr("checked", true);
                                            }
                                        });
                                    }, "json");
                                    loadSub4Items(pcatsub4_id, pcatsub4_name);
                                    $('#desctable').removeClass('hidden');
                                    $(this).addClass('hidden');
                                    $('#item5editcancel').addClass('hidden');
                                    $('#item5editdone').addClass('hidden');
                                    $('#editItem5desc').addClass('hidden');
                                    $('#item5edit').removeClass('hidden');

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
//
function selectInventoryItem(){
    // console.log("Selected inventory Item "+ (document.getElementById("image").getAttribute('src')) + " in pc_productcontrolsub4_v_js");
    // console.log("Doucment.getelement(): " + document.getElementById("image"));
    // console.log("After getElementById");
    // console.log("Image: " + $( "itemDescription" ).text());
}
    function loadSub4Items(pcatsub4_id, pcatsub4_name) {
        var menudata = '';
        menudata += '<h4><u> ' + pcatsub4_name + ' </u></h4>';
        menudata += '<ul>';
        $.post('controllers/pc_productitems5_c.php', {action: 'loadsub4categoryitems', pcatsub4_name: pcatsub4_name, pcatsub4_id: pcatsub4_id}, function (e) {
            if (e === undefined || e.length === 0 || e === null) {
                //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
            } else {
                $.each(e, function (index, qd) {
                    menudata += '<li class="item5Li"><a href="#">' + qd.itmsub5_name + '<itmsub5_id class="hidden">' + qd.itmsub5_id + '</itmsub5_id><itmsub5_name class="hidden">' + qd.itmsub5_name + '</itmsub5_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                });
            }
            menudata += '<li class="pull-right" id="addSubItem5"><i class="fa fa-lg fa-plus"></i></li>';
            menudata += '</ul>';

            $('.subItems5').html('').append(menudata);


            $('.item5Li').click(function () {
                $('.subItems5 li').css('background-color', '#333333');
                $(this).css('background-color', '#cc0000');
                var itmsub5_id = parseInt($(this).find('itmsub5_id').html());
                item5DescLoad(itmsub5_id, pcatsub4_id, pcatsub4_name);
            });

            $('#addSubItem5').click(function () {
                var confirmModal = $('<div class="modal fade">' +
                        '<div class="modal-dialog">' +
                        '<div class="modal-content">' +
                        '<div class="modal-header bg-default">' +
                        '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                        '<div class="text-center"><p style="font-size:18pt">' +
                        '<span class="label label-primary" id="itemselector">Item</span></p><div>' +
                        '</div>' +
                        '<div class="modal-body">' +
                        '<div class="row">' +
                        '<div class="col-md-12">' +
                        '<div class="col-md-12 modelItemDiv">' +
                        '<div class="form-horizontal">' +
                        '<input type="hidden" name="pcatsub4_id" class="form-control" value="' + pcatsub4_id + '">' +
                        '<div class="form-group">' +
                        '<label class="col-md-4 control-label">Name</label>' +
                        '<div class="col-md-8">' +
                        '<input type="text" name="itmsub5_name" class="form-control" id="itmsub5_name">' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label class="col-md-4 control-label">Quantity</label>' +
                        '<div class="col-md-8">' +
                        '<input type="text" name="itmsub5_qty" class="form-control" id="itmsub5_qty">' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label class="col-md-4 control-label">Price ( $ )</label>' +
                        '<div class="col-md-8">' +
                        '<input type="text" name="itmsub5_price" class="form-control" id="itmsub5_price">' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<label class="col-md-4 control-label">Description</label>' +
                        '<div class="col-md-8">' +
                        '<textarea name="itmsub5_desc" class="form-control" id="itmsub5_desc"></textarea>' +
                        '</div>' +
                        '</div>' +
                        '<div class="form-group">' +
                        '<div class="col-md-offset-4 col-md-8">' +
                        '<div class="checkbox">' +
                        '<label>' +
                        '<input type="checkbox" name="itemsub5_site" id="itemsub5_site"> Display On Site' +
                        '</label>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<form id="frmaddimage4" enctype="multipart/form-data">' +
                        '<div class="form-group">' +
                        '<label class="col-md-4 control-label">File Upload</label>' +
                        '<div class="col-md-8">' +
                        '<input type="file" name="fileToUpload5" id="fileToUpload5">' +
                        '</div>' +
                        '</div>' +
                        '</form>' +
                        '<div class="form-group">' +
                        '<div class="col-md-12">' +
                        '<button class="btn btn-success" id="addSubCatItem5">Submit</button>&nbsp;' +
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

//                    confirmModal.find('#addSub4CatMenu').click(function () {
//                        var pcatsub4_name = confirmModal.find('#pcatsub4_name').val();
//                        AddProCatSub4(pcatsub4_name, pcatsub3_id, confirmModal);
//                    });


                confirmModal.find('#fileToUpload5').change(function () {
                    var ft = $('#fileToUpload5')[0].files[0];
                    confirmModal.find('#addSubCatItem5').click(function () {
                        var itmsub5_name = confirmModal.find('#itmsub5_name').val();
                        var itmsub5_qty = confirmModal.find('#itmsub5_qty').val();
                        var itmsub5_price = confirmModal.find('#itmsub5_price').val();
                        var itmsub5_desc = confirmModal.find('#itmsub5_desc').val();
                        var itemsub5_site = 0;
                        if (confirmModal.find('#itemsub5_site').is(':checked')) {
                            itemsub5_site = 1;
                        } else {
                            itemsub5_site = 0;
                        }
                        var oMyForm = new FormData();
                        oMyForm.append("fileToUpload5", ft);
                        oMyForm.append("action", "addSubItem5");
                        oMyForm.append("itmsub5_name", itmsub5_name);
                        oMyForm.append("itmsub5_qty", itmsub5_qty);
                        oMyForm.append("itmsub5_price", itmsub5_price);
                        oMyForm.append("itmsub5_desc", itmsub5_desc);
                        oMyForm.append("pcatsub4_id", pcatsub4_id);
                        oMyForm.append("itemsub5_site", itemsub5_site);
                        var oReq = new XMLHttpRequest();
                        oReq.open("POST", "controllers/pc_productitems5_c.php", true);

                        oReq.onload = function (oEvent) {
                            if (oReq.status == 200) {
                                alertify.log(oReq.response, false, 1200);
                                confirmModal.modal('hide');
                                loadSub4Items(pcatsub4_id, pcatsub4_name);
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
//
        }, "json");
    }
</script>

