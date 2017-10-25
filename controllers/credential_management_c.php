<?php
session_start();
include '../models/credential_management_m.php';

$ctrl = new credential_management_m();

if (array_key_exists("action", $_POST)) {
 
    if ($_POST['action'] == "loadUserDocs") {	   
		$ctrl->getUserDocs($_SESSION['usrId']);
	}
	
}

if (array_key_exists("action", $_POST)) {
 
    if ($_POST['action'] == "retrieveDocument") {	   
    	

    	
		$ctrl->retrieveDocument($_POST['document_id'], $_SESSION['usrId']);
	}
}

// if (array_key_exists("action", $_POST)) {
 
//     if ($_POST['action'] == "loadUserDocsDetails") {	   
// 		$ctrl->retrieveDocument($_POST['document_id'], $_SESSION['usrId']);
// 	}
// }

