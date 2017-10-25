<script type="text/javascript">
    function AddProCatSub2(pcatsub2_name, pcatsub1_id, confirmModal) {
        $.post('controllers/pc_productcontrolsub2_c.php', {action: 'save', pcatsub2_name: pcatsub2_name, pcatsub1_id: pcatsub1_id}, function (e) {
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

    function item3DescLoad(itmsub3_id, pcatsub2_id, pcatsub2_name) {
        var itemdata = "";
        var imgFilename = [];
        var postData = {
            action: "getItem3Desc",
            itmsub3_id: itmsub3_id
        }
        var dir = '../img/item3/' + itmsub3_id + '/';
        $.post('controllers/pc_productitems_c.php', {action: 'readfolderimages', dir: dir}, function (x) {
            if (x === undefined || x.length === 0 || x === null) {
                imgFilename.push('no_image_thumb.gif');
                itemdata += '<img src="img/' + imgFilename + '" alt="No image found" class="img-rounded" style="width:60%">';
            } else {
                $.each(x, function (index2, imgFile) {
                    imgFilename.push(imgFile);
                });
                itemdata += '<img src="img/item3/' + itmsub3_id + '/' + imgFilename + '" alt="No image found" class="img-rounded" style="width:80%">';
            }


            $.post('controllers/pc_productitems3_c.php', postData, function (e) {

                itemdata += '<br><br><table class="table-bordered table-striped" id="desctable">';
                itemdata += '<tbody>';
                itemdata += '<tr>';
                itemdata += '<th> Name </th>';
                itemdata += '<td><h4 id="tbl_itmsub3_name"></h5></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Quantity </th>';
                itemdata += '<td id="tbl_itmsub3_qty"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Price </th>';
                itemdata += '<td id="tbl_itmsub3_price"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Description </th>';
                itemdata += '<td id="tbl_itmsub3_desc" style="overflow:hidden"></td>';
                itemdata += '</tr>';
                itemdata += '<tr>';
                itemdata += '<th> Site </th>';
                itemdata += '<td id="tbl_itemsub3_site"></td>';
                itemdata += '</tr>';
                itemdata += '</tbody>';
                itemdata += '</table>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left text-left" id="item3edit"><i class="fa fa-edit"></i> Edit</button>';


                //If inventory selection screen from Cashier POS system
                if(Screen = 5){
                    itemdata += '<button onclick="selectInventoryItem('+itmsub3_id+', 5)" class="col-md-offset-1 btn btn-primary pull-left text-left" id="item5edit"><i class="fa fa-edit"></i> Select</button>';
                }

                //table edit
                itemdata += '<div class="form-horizontal hidden" id="editItem3desc">';

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
                itemdata += '<input type="text" name="itmsub3_name" class="form-control" id="itmsub3_name">';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Quantity</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub3_qty" class="form-control" id="itmsub3_qty">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Price ( $ )</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<input type="text" name="itmsub3_price" class="form-control" id="itmsub3_price">';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<div class="form-group">';
                itemdata += '<label class="col-md-4 control-label" style="color:white">Description</label>';
                itemdata += '<div class="col-md-5">';
                itemdata += '<textarea name="itmsub3_desc" class="form-control" id="itmsub3_desc"></textarea>';
                itemdata += '</div>';
                itemdata += '</div>';

                itemdata += '<div class="form-group">';
                itemdata += '<div class="col-md-11 col-md-offset-1">';
                itemdata += '<div class="checkbox">';
                itemdata += '<label>';
                itemdata += '<input type="checkbox" name="itemsub3_site" id="itemsub3_site"> <span style="color:white">Display On Site</span>';
                itemdata += '</label>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '</div>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-left hidden" id="item3editdone"><i class="fa fa-edit"></i> Done</button>';
                itemdata += '<button class="col-md-offset-1 btn btn-primary pull-right hidden" id="item3editcancel"><i class="fa fa-edit"></i> Cancel</button><br><br>';
                $('.itemdesc').html('').append(itemdata);


                $.each(e, function (index, qd) {
                    $('#tbl_itmsub3_name').html('').append(qd.itmsub3_name);
                    $('#tbl_itmsub3_qty').html('').append(qd.itmsub3_qty);
                    $('#tbl_itmsub3_price').html('').append('$' + qd.itmsub3_price);
                    $('#tbl_itmsub3_desc').html('').append(qd.itmsub3_desc);
                    if (parseInt(qd.itemsub3_site) == 0) {
                        $('#tbl_itemsub3_site').html('').append('False');
                    } else {
                        $('#tbl_itemsub3_site').html('').append('True');

                    }
                });

                $('#imgEditstatus').click(function () {
                    if ($(this).is(':checked')) {
                        $('#frmaddimage').removeClass('hidden');
                    } else {
                        $('#frmaddimage').addClass('hidden');
                    }
                });

                $('#item3edit').click(function () {
                    $('#desctable').addClass('hidden');
                    $(this).addClass('hidden');
                    $('#editItem3desc').removeClass('hidden');
                    $('#item3editdone').removeClass('hidden');
                    $('#item3editcancel').removeClass('hidden');
                    var postDataEditdesc = {
                        action: "getItem3Desc",
                        itmsub3_id: itmsub3_id
                    }
                    $.post('controllers/pc_productitems3_c.php', postDataEditdesc, function (e) {
                        $.each(e, function (index, qd) {
                            $('#itmsub3_name').val(qd.itmsub3_name);
                            $('#itmsub3_qty').val(qd.itmsub3_qty);
                            $('#itmsub3_price').val(qd.itmsub3_price);
                            $('#itmsub3_desc').val(qd.itmsub3_desc);
                            if (parseInt(qd.itemsub3_site) == 0) {
                                $('#itemsub3_site').attr("checked", false);
                            } else {
                                $('#itemsub3_site').attr("checked", true);
                            }
                        });
                    }, "json");
                });

                $('#item3editcancel').click(function () {
                    $('#desctable').removeClass('hidden');
                    $(this).addClass('hidden');
//                            $('#editItemdesc').removeClass('hidden');
                    $('#item3editdone').addClass('hidden');
                    $('#editItem3desc').addClass('hidden');
                    $('#item3edit').removeClass('hidden');
                });

                $('#item3editdone').click(function () {

                    alertify.confirm("Are You Sure Want Edit Item Description. ?", function (event) {
                        if (event) {
                            var itmsub3_name = $('#itmsub3_name').val();
                            var itmsub3_qty = $('#itmsub3_qty').val();
                            var itmsub3_price = $('#itmsub3_price').val();
                            var itmsub3_desc = $('#itmsub3_desc').val();
//                    var item_site = confirmModal.find('#item_site').val();
                            var itemsub3_site = 0;
                            if ($('#itemsub2_site').is(':checked')) {
                                itemsub3_site = 1;
                            } else {
                                itemsub3_site = 0;
                            }
                            postData = {
                                action: "editItem3",
                                itmsub3_name: itmsub3_name,
                                itmsub3_qty: itmsub3_qty,
                                itmsub3_price: itmsub3_price,
                                itmsub3_desc: itmsub3_desc,
                                itmsub3_id: itmsub3_id,
                                itemsub3_site: itemsub3_site,
                                pcatsub2_id: pcatsub2_id
                            }
                            $.post('controllers/pc_productitems3_c.php', postData, function (e) {
                                if (parseInt(e.msgType) == 1) {
                                    alertify.success(e.msg, 1200);
                                    if ($('#imgEditstatus').is(':checked')) {
                                        var ft = $('#fileToUpload')[0].files[0];
                                        //Image Edited
                                        var oMyForm = new FormData();
                                        oMyForm.append("fileToUpload", ft);
                                        oMyForm.append("itmsub3_id", itmsub3_id);
                                        var oReq = new XMLHttpRequest();
                                        oReq.open("POST", "controllers/imguploadEditItem3.php", true);
                                        oReq.onload = function (oEvent) {
                                            if (oReq.status == 200) {
                                                alertify.log(oReq.response, false, 1200);
                                                setTimeout(function () {
                                                    item3DescLoad(itmsub3_id, pcatsub2_id, pcatsub2_name);
                                                }, 1450);
                                            } else {
                                                alert('failed');
                                            }
                                        };
                                        oReq.send(oMyForm);
                                        //End of image edited
                                    } else {
                                        setTimeout(function () {
                                            item3DescLoad(itmsub3_id, pcatsub2_id, pcatsub2_name);
                                        }, 1400);
                                    }
                                    $('#frmaddimage').addClass('hidden');

                                    var postDataEditdesc = {
                                        action: "getItem3Desc",
                                        itmsub3_id: itmsub3_id
                                    }
                                    $.post('controllers/pc_productitems3_c.php', postDataEditdesc, function (e) {
                                        $.each(e, function (index, qd) {

                                            $('#tbl_itmsub3_name').html('').append(qd.itmsub3_name);
                                            $('#tbl_itmsub3_qty').html('').append(qd.itmsub3_qty);
                                            $('#tbl_itmsub3_price').html('').append('$' + qd.itmsub3_price);
                                            $('#tbl_itmsub3_desc').html('').append(qd.itmsub3_desc);
                                            if (parseInt(qd.itemsub3_site) == 0) {
                                                $('#tbl_itemsub3_site').html('').append('False');
                                            } else {
                                                $('#tbl_itemsub3_site').html('').append('True');

                                            }

                                            $('#itmsub3_name').val(qd.itmsub3_name);
                                            $('#itmsub3_qty').val(qd.itmsub3_qty);
                                            $('#itmsub3_price').val(qd.itmsub3_price);
                                            $('#itmsub3_desc').val(qd.itmsub3_desc);
                                            if (parseInt(qd.itemsub3_site) == 0) {
                                                $('#itemsub3_site').attr("checked", false);
                                            } else {
                                                $('#itemsub3_site').attr("checked", true);
                                            }
                                        });
                                    }, "json");
                                    loadSub2Items(pcatsub2_id, pcatsub2_name);
                                    $('#desctable').removeClass('hidden');
                                    $(this).addClass('hidden');
                                    $('#item3editcancel').addClass('hidden');
                                    $('#item3editdone').addClass('hidden');
                                    $('#editItem3desc').addClass('hidden');
                                    $('#item3edit').removeClass('hidden');

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
        console.log("selected item from pc_productcontrolsub2_v_js");
    }    

    function loadSub2Items(pcatsub2_id, pcatsub2_name) {
        var menudata = '';
        menudata += '<h4><u> ' + pcatsub2_name + ' </u></h4>';
        menudata += '<ul>';
        $.post('controllers/pc_productitems3_c.php', {action: 'loadsub2categoryitems', pcatsub2_name: pcatsub2_name, pcatsub2_id: pcatsub2_id}, function (e) {
            $.post('controllers/pc_productcontrolsub3_c.php', {action: 'getAllByPcatSub2ID', pcatsub2_id: pcatsub2_id}, function (sub3Array) {
                if (sub3Array === undefined || sub3Array.length === 0 || sub3Array === null) {
                    //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
                } else {
                    $.each(sub3Array, function (index, sub3Arrayqd) {
                        menudata += '<li class="sub3itemLi" id="pcatsub3_id_' + sub3Arrayqd.pcatsub3_id + '"><a href="#">' + sub3Arrayqd.pcatsub3_name + '<pcatsub3_id class="hidden">' + sub3Arrayqd.pcatsub3_id + '</pcatsub3_id><pcatsub3_name class="hidden">' + sub3Arrayqd.pcatsub3_name + '</pcatsub3_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                    });
                }
                if (e === undefined || e.length === 0 || e === null) {
                    //  menudata += '<li><a href="#"> No Menu Item Found </li></a>';
                } else {
                    $.each(e, function (index, qd) {
                        menudata += '<li class="item3Li"><a href="#">' + qd.itmsub3_name + '<itmsub3_id class="hidden">' + qd.itmsub3_id + '</itmsub3_id><itmsub3_name class="hidden">' + qd.itmsub3_name + '</itmsub3_name></a><i class="fa fa-arrow-right pull-right"></i></li>';
                    });
                }
                menudata += '<li class="pull-right" id="addSubItem3"><i class="fa fa-lg fa-plus"></i></li>';
                menudata += '</ul>';

                $('.subItems3').html('').append(menudata);

                $('.sub3itemLi').click(function () {
                    $('.subItems3 li').css('background-color', '#333333');
                    $(this).css('background-color', '#cc0000');
                    $('.itemdesc').html('');
                    if ($('.subItems4').hasClass('hidden')) {
                        $('.subItems4').removeClass('hidden');
                    }
                    if (!$('.subItems5').hasClass('hidden')) {
                        $('.subItems5').addClass('hidden');
                    }
                    var pcatsub3_id = parseInt($(this).find('pcatsub3_id').html());
                    var pcatsub3_name = $(this).find('pcatsub3_name').html();
                    $.post('controllers/session-store.php', {sessionstore: 'store', pcatsub3_id: pcatsub3_id}, function (e) {
                        console.log(e);
                    });
                    loadSub3Items(pcatsub3_id, pcatsub3_name);
                });


                $('.item3Li').click(function () {
                    if (!$('.subItems4').hasClass('hidden')) {
                        $('.subItems4').addClass('hidden');
                    }
                    if (!$('.subItems5').hasClass('hidden')) {
                        $('.subItems5').addClass('hidden');
                    }
                    $('.subItems3 li').css('background-color', '#333333');
                    $(this).css('background-color', '#cc0000');
                    var itmsub3_id = parseInt($(this).find('itmsub3_id').html());
                    item3DescLoad(itmsub3_id, pcatsub2_id, pcatsub2_name);
                    // console.log("Item 3 SUB ID: " + itmsub3_id);
                    echoProductID(itmsub3_id);
                    
                });


                $('#addSubItem3').click(function () {
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
                            '<input type="text" name="pcatsub3_name" class="form-control" id="pcatsub3_name">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="col-md-12">' +
                            '<button class="btn btn-success" id="addSub3CatMenu">Submit</button>&nbsp;' +
                            '<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-md-12 modelItemDiv hidden">' +
                            '<div class="form-horizontal">' +
                            '<input type="hidden" name="pcatsub2_id" class="form-control" value="' + pcatsub2_id + '">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Name</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itmsub3_name" class="form-control" id="itmsub3_name">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Quantity</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itmsub3_qty" class="form-control" id="itmsub3_qty">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Price ( $ )</label>' +
                            '<div class="col-md-8">' +
                            '<input type="text" name="itmsub3_price" class="form-control" id="itmsub3_price">' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">Description</label>' +
                            '<div class="col-md-8">' +
                            '<textarea name="itmsub3_desc" class="form-control" id="itmsub3_desc"></textarea>' +
                            '</div>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '<div class="col-md-offset-4 col-md-8">' +
                            '<div class="checkbox">' +
                            '<label>' +
                            '<input type="checkbox" name="itemsub3_site" id="itemsub2_site"> Display On Site' +
                            '</label>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<form id="frmaddimage3" enctype="multipart/form-data">' +
                            '<div class="form-group">' +
                            '<label class="col-md-4 control-label">File Upload</label>' +
                            '<div class="col-md-8">' +
                            '<input type="file" name="fileToUpload3" id="fileToUpload3">' +
                            '</div>' +
                            '</div>' +
                            '</form>' +
                            '<div class="form-group">' +
                            '<div class="col-md-12">' +
                            '<button class="btn btn-success" id="addSubCatItem3">Submit</button>&nbsp;' +
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

                    confirmModal.find('#addSub3CatMenu').click(function () {
                        var pcatsub3_name = confirmModal.find('#pcatsub3_name').val();
                        AddProCatSub3(pcatsub3_name, pcatsub2_id, confirmModal);
                    });


                    confirmModal.find('#fileToUpload3').change(function () {
                        var ft = $('#fileToUpload3')[0].files[0];
                        confirmModal.find('#addSubCatItem3').click(function () {
                            var itmsub3_name = confirmModal.find('#itmsub3_name').val();
                            var itmsub3_qty = confirmModal.find('#itmsub3_qty').val();
                            var itmsub3_price = confirmModal.find('#itmsub3_price').val();
                            var itmsub3_desc = confirmModal.find('#itmsub3_desc').val();
//                    var item_site = confirmModal.find('#item_site').val();
                            var itemsub3_site = 0;
                            if (confirmModal.find('#itemsub3_site').is(':checked')) {
                                itemsub3_site = 1;
                            } else {
                                itemsub3_site = 0;
                            }
                            var oMyForm = new FormData();
                            oMyForm.append("fileToUpload3", ft);
                            oMyForm.append("action", "addSubItem3");
                            oMyForm.append("itmsub3_name", itmsub3_name);
                            oMyForm.append("itmsub3_qty", itmsub3_qty);
                            oMyForm.append("itmsub3_price", itmsub3_price);
                            oMyForm.append("itmsub3_desc", itmsub3_desc);
                            oMyForm.append("pcatsub2_id", pcatsub2_id);
                            oMyForm.append("itemsub3_site", itemsub3_site);
                            var oReq = new XMLHttpRequest();
                            oReq.open("POST", "controllers/pc_productitems3_c.php", true);

                            oReq.onload = function (oEvent) {
                                if (oReq.status == 200) {
                                    alertify.log(oReq.response, false, 1200);
                                    confirmModal.modal('hide');
                                    loadSub2Items(pcatsub2_id, pcatsub2_name);
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

