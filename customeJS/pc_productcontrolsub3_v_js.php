<script type="text/javascript">
    function AddProCatSub3(pcatsub3_name, pcatsub2_id, confirmModal) {
        $.post('controllers/pc_productcontrolsub3_c.php', {action: 'save', pcatsub3_name: pcatsub3_name, pcatsub2_id: pcatsub2_id}, function (e) {
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

    function item4DescLoad(itmsub4_id, pcatsub3_id, pcatsub3_name) {
        var itemdata = "";
        var imgFilename = [];
        var postData = {
            action: "getItem4Desc",
            itmsub4_id: itmsub4_id
        }
        var dir = '../img/item4/' + itmsub4_id + '/';
        $.post('controllers/pc_productitems_c.php', {action: 'readfolderimages', dir: dir}, function (x) {
            if (x === undefined || x.length === 0 || x === null) {
                imgFilename.push('no_image_thumb.gif');
                itemdata += '<img src="img/' + imgFilename + '" alt="No image found" class="img-rounded" style="width:60%">';
            } else {
                $.each(x, function (index2, imgFile) {
                    imgFilename.push(imgFile);
                });
                itemdata += '<img src="img/item4/' + itmsub4_id + '/' + imgFilename + '" alt="No image found" class="img-rounded" style="width:80%">';
            }


            $.post('controllers/pc_productitems4_c.php', postData, function (e) {

                itemdata += '<br><br><table class="table-bordered table-striped" id="desctable">';
                itemdata += '<tbody>';
                itemdata += '<tr>';
                itemdata += '<th> Name </th>';
                itemdata += '<td><h4 id="tbl_itmsub4_name"></h5></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Quantity </th>';
                itemdata += '<td id="tbl_itmsub4_qty"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Price </th>';
                itemdata += '<td id="tbl_itmsub4_price"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Description </th>';
                itemdata += '<td id="tbl_itmsub4_desc" style="overflow:hidden"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Site </th>';
                itemdata += '<td id="tbl_itemsub4_site"></td>';
                itemdata += '</tr>';
                itemdata += '</tbody>';
                itemdata += '</table>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left text-left" id="item4edit"><i class="fa fa-edit"></i> Edit</button>';

                //If inventory selection screen from Cashier POS system
                if(Screen = 5){
                    itemdata += '<button onclick="selectInventoryItem('+itmsub4_id+', 6)" class="col-md-offset-1 btn btn-primary pull-left text-left" id="item5edit"><i class="fa fa-edit"></i> Select</button>';
                }
                
                //table edit
                itemdata += '<div class="form-horizontal hidden" id="editItem4desc">';

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
                itemdata += '<input type="text" name="itmsub4_name" class="form-control" id="itmsub4_name">';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Quantity</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub4_qty" class="form-control" id="itmsub4_qty">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Price ( $ )</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub4_price" class="form-control" id="itmsub4_price">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Description</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<textarea name="itmsub4_desc" class="form-control" id="itmsub4_desc"></textarea>';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<div class="col-md-11 col-md-offset-1">';
                itemdata += '<div class="checkbox">';
                itemdata += '<label>';
                itemdata += '<input type="checkbox" name="itemsub4_site" id="itemsub4_site"> <span style="color:white">Display On Site</span>';
                itemdata += '</label>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left hidden" id="item4editdone"><i class="fa fa-edit"></i> Done</button>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-right hidden" id="item4editcancel"><i class="fa fa-edit"></i> Cancel</button><br><br>';
                $('.itemdesc').html('').append(itemdata);


                $.each(e, function (index, qd) {
                    $('#tbl_itmsub4_name').html('').append(qd.itmsub4_name);
                    $('#tbl_itmsub4_qty').html('').append(qd.itmsub4_qty);
                    $('#tbl_itmsub4_price').html('').append('$' + qd.itmsub4_price);
                    $('#tbl_itmsub4_desc').html('').append(qd.itmsub4_desc);
                    if (parseInt(qd.itemsub4_site) == 0) {
                        $('#tbl_itemsub4_site').html('').append('False');
                    } else {
                        $('#tbl_itemsub4_site').html('').append('True');

                    }
                });

                $('#imgEditstatus').click(function () {
                    if ($(this).is(':checked')) {
                        $('#frmaddimage').removeClass('hidden');
                    } else {
                        $('#frmaddimage').addClass('hidden');
                    }
                });

                $('#item4edit').click(function () {
                    $('#desctable').addClass('hidden');
                    $(this).addClass('hidden');
                    $('#editItem4desc').removeClass('hidden');
                    $('#item4editdone').removeClass('hidden');
                    $('#item4editcancel').removeClass('hidden');
                    var postDataEditdesc = {
                        action: "getItem4Desc",
                        itmsub4_id: itmsub4_id
                    }
                    $.post('controllers/pc_productitems4_c.php', postDataEditdesc, function (e) {
                        $.each(e, function (index, qd) {
                            $('#itmsub4_name').val(qd.itmsub4_name);
                            $('#itmsub4_qty').val(qd.itmsub4_qty);
                            $('#itmsub4_price').val(qd.itmsub4_price);
                            $('#itmsub4_desc').val(qd.itmsub4_desc);
                            if (parseInt(qd.itemsub4_site) == 0) {
                                $('#itemsub4_site').attr("checked", false);
                            } else {
                                $('#itemsub4_site').attr("checked", true);
                            }
                        });
                    }, "json");
                });

                $('#item4editcancel').click(function () {
                    $('#desctable').removeClass('hidden');
                    $(this).addClass('hidden');
//                            $('#editItemdesc').removeClass('hidden');
                    $('#item4editdone').addClass('hidden');
                    $('#editItem4desc').addClass('hidden');
                    $('#item4edit').removeClass('hidden');
                });

                $('#item4editdone').click(function () {

                    alertify.confirm("Are You Sure Want Edit Item Description. ?", function (event) {
                        if (event) {
                            var itmsub4_name = $('#itmsub4_name').val();
                            var itmsub4_qty = $('#itmsub4_qty').val();
                            var itmsub4_price = $('#itmsub4_price').val();
                            var itmsub4_desc = $('#itmsub4_desc').val();
//                    var item_site = confirmModal.find('#item_site').val();
                            var itemsub4_site = 0;
                            if ($('#itemsub4_site').is(':checked')) {
                                itemsub4_site = 1;
                            } else {
                                itemsub4_site = 0;
                            }
                            postData = {
                                action: "editItem4",
                                itmsub4_name: itmsub4_name,
                                itmsub4_qty: itmsub4_qty,
                                itmsub4_price: itmsub4_price,
                                itmsub4_desc: itmsub4_desc,
                                itmsub4_id: itmsub4_id,
                                itemsub4_site: itemsub4_site,
                                pcatsub3_id: pcatsub3_id
                            }
                            $.post('controllers/pc_productitems4_c.php', postData, function (e) {
                                if (parseInt(e.msgType) == 1) {
                                    alertify.success(e.msg, 1200);
                                    if ($('#imgEditstatus').is(':checked')) {
                                        var ft = $('#fileToUpload')[0].files[0];
                                        //Image Edited
                                        var oMyForm = new FormData();
                                        oMyForm.append("fileToUpload", ft);
                                        oMyForm.append("itmsub4_id", itmsub4_id);
                                        var oReq = new XMLHttpRequest();
                                        oReq.open("POST", "controllers/imguploadEditItem4.php", true);
                                        oReq.onload = function (oEvent) {
                                            if (oReq.status == 200) {
                                                alertify.log(oReq.response, false, 1200);
                                                setTimeout(function () {
                                                    item4DescLoad(itmsub4_id, pcatsub3_id, pcatsub3_name);
                                                }, 1450);
                                            } else {
                                                alert('failed');
                                            }
                                        };
                                        oReq.send(oMyForm);
                                        //End of image edited
                                    } else {
                                        setTimeout(function () {
                                            item4DescLoad(itmsub4_id, pcatsub3_id, pcatsub3_name);
                                        }, 1400);
                                    }
                                    $('#frmaddimage').addClass('hidden');

                                    var postDataEditdesc = {
                                        action: "getItem4Desc",
                                        itmsub4_id: itmsub4_id
                                    }
                                    $.post('controllers/pc_productitems4_c.php', postDataEditdesc, function (e) {
                                        $.each(e, function (index, qd) {

                                            $('#tbl_itmsub4_name').html('').append(qd.itmsub4_name);
                                            $('#tbl_itmsub4_qty').html('').append(qd.itmsub4_qty);
                                            $('#tbl_itmsub4_price').html('').append('$' + qd.itmsub4_price);
                                            $('#tbl_itmsub4_desc').html('').append(qd.itmsub4_desc);
                                            if (parseInt(qd.itemsub4_site) == 0) {
                                                $('#tbl_itemsub4_site').html('').append('False');
                                            } else {
                                                $('#tbl_itemsub4_site').html('').append('True');

                                            }

                                            $('#itmsub4_name').val(qd.itmsub4_name);
                                            $('#itmsub4_qty').val(qd.itmsub4_qty);
                                            $('#itmsub4_price').val(qd.itmsub4_price);
                                            $('#itmsub4_desc').val(qd.itmsub4_desc);
                                            if (parseInt(qd.itemsub4_site) == 0) {
                                                $('#itemsub4_site').attr("checked", false);
                                            } else {
                                                $('#itemsub4_site').attr("checked", true);
                                            }
                                        });
                                    }, "json");
                                    loadSub3Items(pcatsub3_id, pcatsub3_name);
                                    $('#desctable').removeClass('hidden');
                                    $(this).addClass('hidden');
                                    $('#item4editcancel').addClass('hidden');
                                    $('#item4editdone').addClass('hidden');
                                    $('#editItem4desc').addClass('hidden');
                                    $('#item4edit').removeClass('hidden');

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

    function loadSub3Items(pcatsub3_id, pcatsub3_name) {
        var menudata = '';
        menudata += '<h4><u> ' + pcatsub3_name + ' </u></h4>';
        menudata += '<ul>';
        $.post('controllers/pc_productitems4_c.php', {action: 'loadsub3categoryitems', pcatsub3_name: pcatsub3_name, pcatsub3_id: pcatsub3_id}, function (e) {
            $.post('controllers/pc_productcontrolsub4_c.php', {action: 'getAllByPcatSub3ID', pcatsub3_id: pcatsub3_id}, function (sub4Array) {
                if (sub4Array === undefined || sub4Array.length === 0 || sub4Array === null) {
                    //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
                } else {
                    $.each(sub4Array, function (index, sub4Arrayqd) {
                        menudata += '<li class="sub4itemLi" id="pcatsub4_id_' + sub4Arrayqd.pcatsub4_id + '"><a href="#">' + sub4Arrayqd.pcatsub4_name + '<pcatsub4_id class="hidden">' + sub4Arrayqd.pcatsub4_id + '</pcatsub4_id><pcatsub4_name class="hidden">' + sub4Arrayqd.pcatsub4_name + '</pcatsub4_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                    });
                }
                if (e === undefined || e.length === 0 || e === null) {
                    //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
                } else {
                    $.each(e, function (index, qd) {
                        menudata += '<li class="item4Li"><a href="#">' + qd.itmsub4_name + '<itmsub4_id class="hidden">' + qd.itmsub4_id + '</itmsub4_id><itmsub4_name class="hidden">' + qd.itmsub4_name + '</itmsub4_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                    });
                }
                menudata += '<li class="pull-right" id="addSubItem4"><i class="fa fa-lg fa-plus"></i></li>';
                menudata += '</ul>';

                $('.subItems4').html('').append(menudata);
                
                 $('.sub4itemLi').click(function () {
                    $('.subItems4 li').css('background-color', '#333333');
                    $(this).css('background-color', '#cc0000');
                    $('.itemdesc').html('');
                    if ($('.subItems5').hasClass('hidden')) {
                        $('.subItems5').removeClass('hidden');
                    }
                    var pcatsub4_id = parseInt($(this).find('pcatsub4_id').html());
                    var pcatsub4_name = $(this).find('pcatsub4_name').html();
                    $.post('controllers/session-store.php', {sessionstore: 'store', pcatsub4_id: pcatsub4_id}, function (e) {
                        console.log(e);
                    });
                    loadSub4Items(pcatsub4_id, pcatsub4_name);
                });


                $('.item4Li').click(function () {
                    $('.subItems4 li').css('background-color', '#333333');
                    $(this).css('background-color', '#cc0000');
                    var itmsub4_id = parseInt($(this).find('itmsub4_id').html());
                    item4DescLoad(itmsub4_id, pcatsub3_id, pcatsub3_name);
                    // console.log("ITEM $ SUB ID: " + itmsub4_id);
                    echoProductID(itmsub4_id);
                     $('.itemdesc').html('');
                    if (!$('.subItems5').hasClass('hidden')) {
                        $('.subItems5').addClass('hidden');
                    }
                });

                $('#addSubItem4').click(function () {
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
                            '<input type="text" name="pcatsub4_name" class="form-control" id="pcatsub4_name">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="col-md-12">' +
                            '<button class="btn btn-success" id="addSub4CatMenu">Submit</button>&nbsp;' +
                            '<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-12 modelItemDiv hidden">' +
                            '<div class="form-horizontal">' +
                            '<input type="hidden" name="pcatsub3_id" class="form-control" value="' + pcatsub3_id + '">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Name</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itmsub4_name" class="form-control" id="itmsub4_name">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Quantity</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itmsub4_qty" class="form-control" id="itmsub4_qty">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Price ( $ )</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itmsub4_price" class="form-control" id="itmsub4_price">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Description</label>' +
                            '<div class="col-md-8">' +
                            '<textarea name="itmsub4_desc" class="form-control" id="itmsub4_desc"></textarea>' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="col-md-offset-4 col-md-8">' +
                            '<div class="checkbox">' +
                            '<label>' +
                            '<input type="checkbox" name="itemsub4_site" id="itemsub4_site"> Display On Site' +
                            '</label>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<form id="frmaddimage4" enctype="multipart/form-data">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">File Upload</label>' +
                            '<div class="col-md-8">' +
                            '<input type="file" name="fileToUpload4" id="fileToUpload4">' +
                            '</div>' +
                            '</div>' +
                            '</form>' +
                            '<div class="form-group">' +
                            '<div class="col-md-12">' +
                            '<button class="btn btn-success" id="addSubCatItem4">Submit</button>&nbsp;' +
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

                    confirmModal.find('#addSub4CatMenu').click(function () {
                        var pcatsub4_name = confirmModal.find('#pcatsub4_name').val();
                        AddProCatSub4(pcatsub4_name, pcatsub3_id, confirmModal);
                    });


                    confirmModal.find('#fileToUpload4').change(function () {
                        var ft = $('#fileToUpload4')[0].files[0];
                        confirmModal.find('#addSubCatItem4').click(function () {
                            var itmsub4_name = confirmModal.find('#itmsub4_name').val();
                            var itmsub4_qty = confirmModal.find('#itmsub4_qty').val();
                            var itmsub4_price = confirmModal.find('#itmsub4_price').val();
                            var itmsub4_desc = confirmModal.find('#itmsub4_desc').val();
                            var itemsub4_site = 0;
                            if (confirmModal.find('#itemsub4_site').is(':checked')) {
                                itemsub4_site = 1;
                            } else {
                                itemsub4_site = 0;
                            }
                            var oMyForm = new FormData();
                            oMyForm.append("fileToUpload4", ft);
                            oMyForm.append("action", "addSubItem4");
                            oMyForm.append("itmsub4_name", itmsub4_name);
                            oMyForm.append("itmsub4_qty", itmsub4_qty);
                            oMyForm.append("itmsub4_price", itmsub4_price);
                            oMyForm.append("itmsub4_desc", itmsub4_desc);
                            oMyForm.append("pcatsub3_id", pcatsub3_id);
                            oMyForm.append("itemsub4_site", itemsub4_site);
                            var oReq = new XMLHttpRequest();
                            oReq.open("POST", "controllers/pc_productitems4_c.php", true);

                            oReq.onload = function (oEvent) {
                                if (oReq.status == 200) {
                                    alertify.log(oReq.response, false, 1200);
                                    confirmModal.modal('hide');
                                    loadSub3Items(pcatsub3_id, pcatsub3_name);
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

