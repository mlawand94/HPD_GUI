<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Product Adding Script</title>

        <!-- Bootstrap -->
        <?php include 'includes/CSS.php'; ?>   

    </head>
    <body>
        <div class="container-fluid">
             <div class="row">
               <div class="form-horizontal" id="formstyle" style="">
                    <div class="col-xs-12 col-sm-offset-4 col-sm-3 col-md-offset-4 col-md-3 col-lg-offset-4 col-lg-4">
                        <h3 style="color: #ffffff"><i class="fa fa-lg fa-book"></i> HPDox</h3>
                    </div>
                    <div class="col-xs-12 col-sm-offset-4 col-sm-3 col-md-offset-4 col-md-3 col-lg-offset-4 col-lg-3">                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" autocomplete="off" class="inputstyle form-control" id="uname" placeholder="Username " required >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" autocomplete="off" class="inputstyle form-control" id="upass" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 pull-right">
                                <!-- <a id="forgotpass" class="btn btn-link  pull-right" style="color: #333333;font-size: medium">Forgot Password</a> -->
                                <a id="signup" class="btn btn-link pull-right" style="color: #ffffff;font-size: medium">Signup Now!</a>
                            </div>
                        </div>

                    </div>                    
                    <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btnstyle btn btn-success btn-block btn-lg" id="login"><i class="fa fa-lock fa-lg"></i></button>
                            </div>
                        </div>
                    </div>                    
                </div>
                </div>




<!-- <header class="main-header">
  <h1>Login to your account</h1>
  <nav>
    <ul>
     <li>Sign Up</li>
    </ul>
  </nav>
</header>
<br>
<body>
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Login</h1><link async href="https://fonts.googleapis.com/css?family=Raleway"  rel="stylesheet" type="text/css"/>
            </div>

            <div class="login-form">
                <div class="control-group">
                <input type="text" class="login-field" value="" placeholder="Account #" id="login-name">
                <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                <input type="password" class="login-field" value="" placeholder="Password" id="login-pass">
                <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div> <br>

                <a class="btn btn-primary btn-large btn-block" href="#">Login</a>
        <div align="right"><a class="login-link" href="#">Lost your password?</a></div>

            </div>
        </div>
</div> -->

        <?php include 'includes/JS.php'; ?>               
        <?php include 'customeJS/df_user_v_js.php'; ?>               
        <script type="text/javascript">
            $(document).keypress(function(e) {
                if(e.which == 13) {
                    login();
                }
            });        
            $(function () {
                $('#signup').click(function () {
                    signup();
                });

                $('#login').click(function () {
                    login();
                });

                $('#forgotpass').click(function () {
                    forgotpassword();
                });                                
            });
        </script>
    </body>
</html>
        <style type="text/css">
            
            /*body {
    background-image: url("https://newevolutiondesigns.com/images/freebies/city-wallpaper-32.jpg");
}*/
            body{
                background-image: url(img/background.jpg);
                background-repeat: repeat;
            }

            #formstyle{
                margin-top: 10%;
                background-color: #000000;
            }

            .inputstyle {
                padding: 16px !important;
                border-radius: 7px !important;
                border: 0px !important;
                background: rgba(255,255,255,.5) !important;
                display: block !important;
                // margin: 0px !important;
                // width: 300px !important;
                color: white !important;
                font-size: 18px !important;
                height: 54px !important;
            }

            .btnstyle {
                float: right;
                height: 121px;

                // width: 1%;
                border: 0px;
                // background: green;
                opacity: .8;
                border-radius: 7px;
                padding: 10px;
                color: white;
                font-size: 22px;
            }

            ::-webkit-input-placeholder {
                color:#333333 !important;
            }

            :-moz-placeholder { /* Firefox 18- */
                color: #333333 !important;  
            }

            ::-moz-placeholder {  /* Firefox 19+ */
                color: #333333 !important;  
            }

            :-ms-input-placeholder {  
                color: #333333 !important;  
            }




/*@import url('https://fonts.googleapis.com/css?family=Raleway');


.main-header {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 50px;
  color: white;
  background: rgba(0, 0, 0, 0.8);
  line-height: 3rem;
  transform: translateY(0);
  transform: translate3d(0,0,0);
  transition: .25s transform;
  backface-visibility: hidden;
  border-bottom: 1px solid white;
  box-shadow: 1px 2px 1px #000000;
    
  
}
.main-header h1 {
  float: left;

  font-size: 2.5rem;
  margin: 1rem 1rem 1rem 2rem;
  text-transform: ;
}
.main-header nav {
  float: right;
  font-size: 1rem;
}

.main-header nav ul { 
  margin: 0; 
  padding: 0; 
}
.main-header nav li {
  display: inline-block;
  padding: 0 2rem;
  font-size: 2rem;
  border-left: .1rem solid #555;
  margin: 1rem 1rem 1rem 2rem;
}
body {
font-family: Arial;
background-color: none;
padding: 100px;
}
.login {
margin: 20px auto;
width: 300px;

}
.login-screen {
background:rgba(0,0,0, .9);
padding: 20px;
border-radius: 5px
}

.app-title {
text-align: center;
 -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  border: none;
  font: normal 17px/2 "Raleway", Helvetica, sans-serif;
  color: #ffffff;
  text-align: center;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;

}

.login-form {
text-align: center;
}
.control-group {
margin-bottom: 10px;
}

input {
text-align: center;
background-color: #ffffff;
border: 1px solid #d3d3d3;
border-radius: 3px;
font-size: 16px;
font-weight: 200;
padding: 10px 0;
width: 250px;
transition: border .5s;
}

input:focus {
border: 2px solid #3498DB;
box-shadow: none;
}

.btn {
  border: 2px solid transparent;
  background: #3498DB;
  color: #ffffff;
  font-size: 16px;
  line-height: 25px;
  padding: 10px 0;
  text-decoration: none;
  text-shadow: none;
  border-radius: 3px;
  box-shadow: none;
  transition: 0.25s;
  display: block;
  width: 250px;
  margin: 0 auto;
}

.btn:hover {
  background-color: rgba(32,99,143, 0.3);
  border: 2px solid rgb(52,152,219);
}

.login-link {
  font-size: 11px;
  color: #ffffff;
  display: block;
    margin-top: 12px;
  text-decoration: none;
}*/

input {
text-align: center;
background-color: #ffffff;
border: 1px solid #d3d3d3;
border-radius: 3px;
font-size: 16px;
font-weight: 200;
padding: 10px 0;
width: 250px;
transition: border .5s;
}


.login {
margin: 20px auto;
width: 300px;

}
.login-screen {
background:rgba(0,0,0, .9);
padding: 20px;
border-radius: 5px
}




        </style>
