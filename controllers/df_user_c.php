<?php
include '../models/df_user_m.php';

$ctrl = new Df_User_M();

if (array_key_exists("action", $_POST)) {
 
    if ($_POST['action'] == "signup") {	   
        $ctrl->setUsr_name($_POST['usr_name']);
        $ctrl->setUsr_pass($_POST['usr_pass']);
        $ctrl->setUsr_fname($_POST['usr_fname']);
        $ctrl->setUsr_lname($_POST['usr_lname']);
        $ctrl->setUsr_email($_POST['usr_email']);
        $ctrl->signup();
    } else if ($_POST['action'] == "login") {    
        $ctrl->setUsr_name($_POST['usr_name']);
        $ctrl->setUsr_pass($_POST['usr_pass']);
        $ctrl->login();
    } else if ($_POST['action'] == "forgotpassword") {
        $ctrl->setUsr_email($_POST['usr_email']);
        $ctrl->forgotpassword();
    }else if($_POST['action'] == "logout"){
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['usrId']);
        unset($_SESSION['df_usr_id']);
        unset($_SESSION['df_usr_fname']);
        // unset($_SESSION['pcat_id']);
        // unset($_SESSION['pcat_name']);
        // echo "1";
        // $_SESSION =;
        // unset($_SESSION[]);
        
        // echo "1";
        header("location:../index.php");
        echo "1";
        exit();
                 
    }else if($_POST['action'] == "logoutSession"){


    }else if($_POST['action'] == "loadUserStores"){        
        $ctrl->setUsr_id($_SESSION['df_usr_id']);
        $ctrl->DispUserStores($_SESSION['df_usr_id']);
    }
    else if($_POST['action'] == "loadPermissions"){        
        $ctrl->get_usr_permissions($_SESSION['df_usr_id']);
    }
    else if($_POST['action'] == "loadType"){        
        $ctrl->loadType($_SESSION['df_usr_id']);
    }    
}
