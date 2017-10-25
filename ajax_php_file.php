<?php
session_start();
if(isset($_FILES["file"]["type"]))
{
	$validextensions = array("jpeg", "jpg", "png", "PDF", "pdf");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable

include '/var/www/html/models/credential_management_m.php';

$ctrl = new credential_management_m();


$targetPath = "upload/".$_SESSION['usrId']."/".$_FILES['file']['name']; // Target path where file is to be stored
if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    die("Upload failed with error " . $_FILES['file']['error']);
}
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['file']['tmp_name']);
$ok = false;
// echo $mime;
// echo "       ---        ";
// echo $finfo;
// echo "Document ID: ";
// echo $_POST['document_id'];

if(	$mime == 'application/pdf' 	|| $mime == 'image/jpg' || $mime == 'image/png' ||	$mime == 'image/jpeg'){

// switch ($_POST['document_id']) {
//     case 1:
//         // echo "CASE IS 1";
//         // $ctrl->setCVFilePath($targetPath, $_POST['document_id'], $_SESSION['usr_id']);
//         break;
//     case 2:
//         echo "CASE IS 2";
//         break;
//     case 3:
//         echo "CASE IS 3";
//         break;
    
//     default:
//         echo "An error has occured";
// }

	if(strpos(basename($_FILES['file']['name']), '.pdf') || strpos((string)$mime, 'pdf')){
			if(move_uploaded_file($sourcePath,$targetPath)){

			switch ($_POST['document_id']) {
			    case 1:
			    	$ctrl->setCVFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			        echo "CASE IS 1";
			        break;
			    case 2:
			    	$ctrl->setProfilePicFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			        echo "CASE IS 2";
			        break;
			    case 3:
			    	$ctrl->setDLFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			        echo "CASE IS 3";
			        break;
			    case 4:
			    	$ctrl->setDiplomaFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 4";
			    	break;
				case 5:
					$ctrl->setPostGradFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 5";				    	
			    	break;
				case 6:
					$ctrl->setLifeSupport1FilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 6";				    	
			    	break;	
				case 7:
					$ctrl->setFluRecordFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 7";				    	
			    	break;			
				case 8:
					$ctrl->setTBFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 8";				    	
			    	break;			
			    case 9:
					$ctrl->setInsuranceCertFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 9";
			    	break;			
			    case 10:
					$ctrl->setStateLicenseFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 10";
			    	break;								    	
			    case 11:
					$ctrl->setDEAFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 11";
			    	break;
				case 12:
					$ctrl->setCSRFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 12";
			    	break;			    	
			    case 13:
					$ctrl->setBoardFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 13";
			    	break;
			    case 14:
					$ctrl->setMalpracticeFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 14";
			    	break;			    	
				case 15:
					$ctrl->setImmunizationFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 15";
			    	break;	
				case 16:
					$ctrl->setPassportFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 16";
			    	break;
			    case 17:
					$ctrl->setReference1FilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 17";
			    	break;	
			    case 18:
					$ctrl->setReference2FilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 18";
			    	break;	
			    case 19:
					$ctrl->setReference3FilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 19";
			    	break;					    	

			    default:
			        echo "An error has occured";
			}				

				// $ctrl->setFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);	
			}else{
				echo "An error has occured uploading PDF";
			}			
	}


		if(strpos(basename($_FILES['file']['name']), '.jpg') || strpos((string)$mime, 'jpg')){

			if(move_uploaded_file($sourcePath,$targetPath)){
				$ctrl->setFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);	
			switch ($_POST['document_id']) {
			    case 1:
			    	$ctrl->setCVFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			        echo "CASE IS 1";
			        break;
			    case 2:
			    	$ctrl->setProfilePicFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			        echo "CASE IS 2";
			        break;
			    case 3:
			    	$ctrl->setDLFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			        echo "CASE IS 3";
			        break;
			    case 4:
			    	$ctrl->setDiplomaFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 4";
			    	break;
				case 5:
					$ctrl->setPostGradFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 5";				    	
			    	break;
				case 6:
					$ctrl->setLifeSupport1FilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 6";				    	
			    	break;	
				case 7:
					$ctrl->setFluRecordFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 7";				    	
			    	break;			
				case 8:
					$ctrl->setTBFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 8";				    	
			    	break;			
			    case 9:
					$ctrl->setInsuranceCertFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 9";
			    	break;			
			    case 10:
					$ctrl->setStateLicenseFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 10";
			    	break;								    	
			    case 11:
					$ctrl->setDEAFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 11";
			    	break;
				case 12:
					$ctrl->setCSRFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 12";
			    	break;			    	
			    case 13:
					$ctrl->setBoardFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 13";
			    	break;
			    case 14:
					$ctrl->setMalpracticeFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 14";
			    	break;			    	
				case 15:
					$ctrl->setImmunizationFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 15";
			    	break;	
				case 16:
					$ctrl->setPassportFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 16";
			    	break;
			    case 17:
					$ctrl->setReference1FilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 17";
			    	break;	
			    case 18:
					$ctrl->setReference2FilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 18";
			    	break;	
			    case 19:
					$ctrl->setReference3FilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);
			    	echo "CASE IS 19";
			    	break;					    	

			    default:
			        echo "An error has occured";
			}								
			}else{
				echo "An error has occured uploading jpg";
			}

		} 

		// if(strpos(basename($_FILES['file']['name']), '.jpeg') || strpos((string)$mime, 'jpeg')){

		// 	if(move_uploaded_file($sourcePath,$targetPath)){
		// 		$ctrl->setFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);	
		// 	}else{
		// 		echo "An error has occured uploading jpeg";
		// 	}			
		
		// }

		// if(strpos(basename($_FILES['file']['name']), '.png') || strpos((string)$mime, 'png')){
			
		// 	if(move_uploaded_file($sourcePath,$targetPath)){
		// 		$ctrl->setFilePath($targetPath, $_POST['document_id'], $_SESSION['usrId']);	
		// 	}else{
		// 		echo "An error has occured uploading png";
		// 	}			
		// }

	}else{

		echo "Invalid file type";
	}
}
?>