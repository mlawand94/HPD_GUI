<script type="text/javascript">
    function signup() {
        var confirmModal = $('<div class="modal fade">' +
                '<div class="modal-dialog">' +
                '<div class="modal-content">' +
                '<div class="modal-header bg-default">' +
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                '<div class="text-center"><p style="font-size:18pt"><span class="label label-primary">Signup</span>&nbsp;' +
                '</div>' +
                '<div class="modal-body">' +
                '<div class="row">' +
                '<div class="col-md-12">' +
                '<div class="form-horizontal">' +
                '<div class="form-group">' +
                '<label class="col-md-4 control-label">First Name</label>' +
                '<div class="col-md-8">' +
                '<input type="text" class="form-control" id="usr_fname" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="col-md-4 control-label">Last Name</label>' +
                '<div class="col-md-8">' +
                '<input type="text" class="form-control" id="usr_lname" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="col-md-4 control-label">Email</label>' +
                '<div class="col-md-8">' +
                '<input type="email" class="form-control" id="usr_email" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="col-md-4 control-label">Username</label>' +
                '<div class="col-md-8">' +
                '<input type="text" class="form-control" id="usr_name" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="col-md-4 control-label">Password</label>' +
                '<div class="col-md-8">' +
                '<input type="password" class="form-control" id="usr_pass" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="col-md-4 control-label">Password Confirm</label>' +
                '<div class="col-md-8">' +
                '<input type="password" class="form-control" id="usr_pass_confirm" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-md-offset-4 col-md-8">' +
                '<button class="btn btn-success" id="signup">Submit</button>&nbsp;' +
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
        confirmModal.find('#signup').click(function () {
            var usr_name = confirmModal.find('#usr_name').val();
            var usr_pass = confirmModal.find('#usr_pass').val();
            var usr_pass_confirm = confirmModal.find('#usr_pass_confirm').val();
            var usr_fname = confirmModal.find('#usr_fname').val();
            var usr_lname = confirmModal.find('#usr_lname').val();
            var usr_email = confirmModal.find('#usr_email').val();
            if ((usr_pass === usr_pass_confirm) && (usr_pass !== '' && usr_pass !== null && usr_pass !== undefined)) {

                var postData = {
                    action: "signup",
                    usr_name: usr_name,
                    usr_pass: usr_pass,
                    usr_fname: usr_fname,
                    usr_lname: usr_lname,
                    usr_email: usr_email
                }
                $.post('controllers/df_user_c.php', postData, function (e) {
                    if (parseInt(e.msgType) == 1) {
                        alertify.success(e.msg, 1350);
                        setTimeout(function () {
                            confirmModal.modal('hide')
                        }, 1400);
                    } else {
                        alertify.error(e.msg, 1300);
                    }
                }, "json");

            } else {
                alertify.error('password mis matched.be carefull and re-check your password', 1300);
            }

        });


        confirmModal.modal('show');
    }



    function login() {
        var usr_name = $('#uname').val();
        var usr_pass = $('#upass').val();
        var postData = {
            action: "login",
            usr_name: usr_name,
            usr_pass: usr_pass
        }
        $.post('controllers/df_user_c.php', postData, function (e) {
            if (parseInt(e.msgType) == 1) {                
                alertify.success(e.msg, 1300);
                setTimeout(function () {
                    $('<form action="dashboard.php" method="POST"/>')
                            .append($('<input type="hidden" name="login" value ="1">'))
                            .appendTo($(document.body))
                            .submit();
                }, 1400);
            } else {
                alertify.error(e.msg, 1300);
            }
        }, "json");
    }


    function forgotpassword() {
        var confirmModal = $('<div class="modal fade">' +
                '<div class="modal-dialog">' +
                '<div class="modal-content">' +
                '<div class="modal-header bg-default">' +
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                '<div class="text-center"><p style="font-size:18pt"><span class="label label-primary">Request password reset</span>&nbsp;' +
                '</div>' +
                '<div class="modal-body">' +
                '<div class="row">' +
                '<div class="col-md-12">' +
                '<div class="form-horizontal">' +
                '<div class="form-group">' +
                '<label class="col-md-4 control-label">Email</label>' +
                '<div class="col-md-8">' +
                '<input type="email" class="form-control" id="usr_email" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<div class="col-md-offset-4 col-md-8">' +
                '<button class="btn btn-success" id="sendfpassreq">Submit</button>&nbsp;' +
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
        confirmModal.find('#sendfpassreq').click(function () {
            var usr_email = confirmModal.find('#usr_email').val();

            var postData = {
                action: "forgotpassword",                
                usr_email: usr_email
            }
            $.post('controllers/df_user_c.php', postData, function (e) {
                if (parseInt(e.msgType) == 1) {
                    alertify.success(e.msg, 1800);
                    setTimeout(function () {
                        confirmModal.modal('hide')
                    }, 1850);
                } else {
                    alertify.error(e.msg, 1800);
                }
            }, "json");



        });


        confirmModal.modal('show');
    }

</script>

