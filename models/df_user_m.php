<?php
session_start();
include '/var/www/html/dbconfig/connectDB.php';

/**
 * Description of user_m
 *
 * @author vertexsolution
 */
class Df_User_M extends ConnectDB {

    const DB_TABLE = 'df_user';

    private $flag = false;
    private $usr_id;
    private $usr_name;
    private $usr_pass;
    private $usr_fname;
    private $usr_lname;
    private $usr_email;
    private $usr_status = 1;
    private $act_type;

    function getFlag() {
        return $this->flag;
    }

    function getUsr_id() {
        return $this->usr_id;
    }

    function getUsr_name() {
        return $this->usr_name;
    }

    function getUsr_pass() {
        return $this->usr_pass;
    }

    function getUsr_fname() {
        return $this->usr_fname;
    }

    function getUsr_lname() {
        return $this->usr_lname;
    }

    function getUsr_email() {
        return $this->usr_email;
    }

    function getUsr_status() {
        return $this->usr_status;
    }

    function setFlag($flag) {
        $this->flag = $flag;
    }

    function setUsr_id($usr_id) {
        // if($this->$usr_id){
            $this->usr_id = $usr_id;
        // }else{
        //     echo json_encode(array("msgType" => 2, "msg" => "There was an error registering username"));
        // }        
    }

    function setUsr_name($usr_name) {
        $this->usr_name = $usr_name;
    }


    function setUsr_pass($usr_pass) {
        $this->usr_pass = $usr_pass;
    }

    function setUsr_fname($usr_fname) {
        $this->usr_fname = $usr_fname;
    }

    function setUsr_lname($usr_lname) {
        $this->usr_lname = $usr_lname;
    }

    function setUsr_email($usr_email) {
        $this->usr_email = $usr_email;
    }

    function setUsr_status($usr_status) {
        $this->usr_status = $usr_status;
    }

    function get_actType() {
        return $this->act_type;
    }

    function set_actType($act_type) {
        $this->act_type = $act_type;
    }

    function createNewDirectory($usr_id){
        if (!file_exists("/var/www/html/upload/".$usr_id)) {
            mkdir("/var/www/html/upload/".$usr_id);

        }        
    }

    public function hashPassword() {
		$salt = "dvbruwan";
        /*$options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];*/
       // $hash = password_hash($this->getUsr_pass(), PASSWORD_BCRYPT, $options);
		$hash = hash('sha256', $this->getUsr_pass().$salt); 
		
        $this->setUsr_pass($hash);
    }

    public function getNextUserID() {
        $nextID = 0;
        $sql = "SHOW TABLE STATUS LIKE 'df_user'";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
                $nextID = $row->Auto_increment;
            }
            $this->setUsr_id($nextID);
        } catch (Exception $exc) {
            $this->setUsr_id($nextID);
        }
    }

    public function signup() {
        $this->getNextUserID();
        $this->hashPassword();



        
        $sql = "INSERT INTO `df_user` (`usr_name`, `usr_pass`) VALUES (:usr_name,:usr_pass );";
        $sql2 = "INSERT INTO `usr_info` (`usr_id`, `usr_fname`, `usr_lname`, `usr_email`, `usr_status`) VALUES (:usr_id, :usr_fname, :usr_lname, :usr_email, :usr_status);";
        $this->con->beginTransaction();
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':usr_name', $this->getUsr_name(), PDO::PARAM_STR);
            $createstmt->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
            if ($createstmt->execute()) {
                try {
                    $createstmt1 = $this->con->prepare($sql2);
                    $createstmt1->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
                    $createstmt1->bindParam(':usr_fname', $this->getUsr_fname(), PDO::PARAM_STR);
                    $createstmt1->bindParam(':usr_lname', $this->getUsr_lname(), PDO::PARAM_STR);
                    $createstmt1->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);
                    $createstmt1->bindParam(':usr_status', $this->getUsr_status(), PDO::PARAM_INT);
                    $this->initializeCredentials($this->getUsr_id());
                    $this->createNewDirectory($this->getUsr_id());
                    if ($createstmt1->execute()) {
                        $this->con->commit();

                        echo json_encode(array("msgType" => 1, "msg" => "Successfully Registerd.NOW You Can Access Your Account Using Your USERNAME And PASSWORD."));

                        
                    } else {
                        $this->con->rollBack();
                        echo json_encode(array("msgType" => 2, "msg" => "Sorry Could not be Registerd"));
                    }
                } catch (Exception $exc) {
                    $this->con->rollBack();
                    echo json_encode(array("msgType" => 2, "msg" => "Sorry Could not be Registerd"));
                }
            } else {
                $this->con->rollBack();
                echo json_encode(array("msgType" => 2, "msg" => "Sorry Could not be Registerd"));
            }
        } catch (Exception $exc) {
            $this->con->rollBack();
            echo json_encode(array("msgType" => 2, "msg" => "Sorry Could not be Registerd"));
        }
    }

    public function login() {
        $sql = "SELECT
df_user.usr_id,
df_user.usr_name,
df_user.usr_pass,
usr_info.usr_fname,
usr_info.usr_lname,
usr_info.usr_email,
usr_info.usr_status
FROM
df_user
INNER JOIN usr_info ON usr_info.usr_id = df_user.usr_id
WHERE
(usr_info.usr_email = :usr_email OR
df_user.usr_name = :usr_name) AND
usr_info.usr_status = 1";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':usr_name', $this->getUsr_name(), PDO::PARAM_STR);
            $readstmt->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);

            $readstmt->execute();
			$salt = "dvbruwan";
		    $hashCurrent = hash('sha256', $this->getUsr_pass().$salt); 
            while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
			   $hashAvailable = hash('sha256', $row->usr_pass.$salt); 
                if ($row->usr_pass == $hashCurrent) {
                    $this->setFlag(true);
                    $_SESSION['df_usr_id'] = $row->usr_id;
                    $_SESSION['df_usr_fname'] = $row->usr_fname;
                    
               }
            }
            if ($this->getFlag()) {
                echo json_encode(array("msgType" => 1, "msg" => "Welcome, you will be redirected in a few moments. "));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Invalid username or password.try again"));
            }
        } catch (Exception $exc) {
            //echo json_encode(array("msgType" => 2, "msg" => "system under construction"));
			echo $hashCurrent;
        }
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    public function forgotpassword() {
        $newpassword = $this->generateRandomString(6);
        $sql = "SELECT
df_user.usr_id,
df_user.usr_name,
df_user.usr_pass,
usr_info.usr_fname,
usr_info.usr_lname,
usr_info.usr_email,
usr_info.usr_status
FROM
df_user
INNER JOIN usr_info ON usr_info.usr_id = df_user.usr_id
WHERE
usr_info.usr_email = :usr_email AND
usr_info.usr_status = 1";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':usr_email', $this->getUsr_email(), PDO::PARAM_STR);
            $readstmt->execute();
            if ($readstmt->rowCount() > 0) {
                while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
                    $this->setUsr_email($row->usr_email);
                    $this->setUsr_pass($newpassword);
                    $this->hashPassword();
                    $this->setUsr_id($row->usr_id);
                    $upSQL = "UPDATE `df_user` SET `usr_pass`=:usr_pass WHERE (`usr_id`=:usr_id);";
                    try {
                        $updatestmt = $this->con->prepare($upSQL);
                        $updatestmt->bindParam(':usr_pass', $this->getUsr_pass(), PDO::PARAM_STR);
                        $updatestmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
                        if ($updatestmt->execute()) {
                            $to = $this->getUsr_email();
                            $subject = "Request password reset";
                            $txt = "hi..,<br>your new password is " . $newpassword . "<br>thank you";
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $headers .= 'From: <sample@sample.com>' . "\r\n";
                            $headers .= 'Cc: ' . $to;
                            if (mail($to, $subject, $txt, $headers)) {
                                echo json_encode(array("msgType" => 1, "msg" => "Email Sent Succussfully.login to your account and get your password.thank you"));
                            } else {
                                echo json_encode(array("msgType" => 2, "msg" => "Email Send error occred for reset password requiest"));
                            }
                        } else {
                            echo json_encode(array("msgType" => 2, "msg" => "Email Send error occred for reset password requiest"));
                        }
                    } catch (Exception $exc) {
                        echo json_encode(array("msgType" => 2, "msg" => "system under construction"));
                    }
                }
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "please check your email address.do not provide wrong details.re-check again"));
            }
        } catch (Exception $exc) {
            echo json_encode(array("msgType" => 2, "msg" => "system under construction"));
        }
    }

    function loadType($user_id){
        $data = array();
        $sql = "SELECT act_type FROM df_user WHERE usr_id =" . $user_id;
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    function DispUserStores($usr_id) {
        $returnString = "";
        $data = array();
        
        $sql = "SELECT  * FROM 
                usrr_stores 
                JOIN 
                pc_store 
                WHERE 
                usr_id = ".$usr_id."
                AND 
                usrr_stores.store_id = pc_store.store_id";

         try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
//         $sql = "SELECT
// usr_stores.usr_id,
// usr_stores.stores,
// usr_stores.permission
// FROM
// usr_stores
// WHERE
// usr_stores.usr_id = :usr_id";

//         $sqlStore = "SELECT
// pc_store.store_id,
// pc_store.store_name
// FROM
// pc_store";
        // try {
        //     $readstmt = $this->con->prepare($sql);
        //     $readstmt->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);
        //     $readstmt->execute();
        //     if ($readstmt->rowCount()) {
        //         while ($row = $readstmt->fetch(PDO::FETCH_OBJ)) {
        //             $storeString = $row->stores;
        //             $expladeArray = explode(",", $storeString);
        //             $expFilterArray = array_filter($expladeArray);
        //             try {
        //                 $readstmt1 = $this->con->prepare($sqlStore);
        //                 $readstmt1->execute();
        //                  while ($row = $readstmt1->fetch(PDO::FETCH_ASSOC)) {
        //                      foreach ($expFilterArray as $us) {
        //                          if ($row['store_id'] == $us) {
        //                              $returnString .= '<li><i class="fa fa-lg fa-square pull-left" style="color: #339900"></i> '.$row['store_name'].' <i class="fa fa-lg fa-arrow-right pull-right"></i></li>';
        //                          }
        //                      }
        //                  }
        //             } catch (Exception $exc) {
        //                 $returnString = '<li style="background-color:rgb(142, 40, 40);color:white"><i class="fa fa-lg fa-square pull-left" style="color: white"></i> No User Store Found <i class="fa fa-lg fa-arrow-right pull-right"></i></li>';
        //             }
        //         }
        //     } else {
        //         $returnString = '<li style="background-color:rgb(142, 40, 40);color:white"><i class="fa fa-lg fa-square pull-left" style="color: white"></i> No User Store Found <i class="fa fa-lg fa-arrow-right pull-right"></i></li>';
        //     }
        //     echo $returnString;
        // } catch (Exception $exc) {
        //    echo $returnString;
        // }
    }

    function initializeCredentials($usr_id){

        $data = array();

        $cvTable = "hpd_cv";
        $portraitTable = "hpd_portrait";
        $dlTable = "hpd_dl";
        $diplomaTable = "hpd_diploma";
        $pgradCertTable = "hpd_postGradCert";
        $lifeSupportCertTable = "hpd_lifeSupportCert";
        $fluRecordTable = "hpd_fluRecord";
        $tbTable = "hpd_tb";
        $insuranceCertTable = "hpd_insuranceCert";
        $stateLicenseTable = "hpd_stateLicense";
        $deaTable = "hpd_dea";
        $csrTable = "hpd_csr";
        $boardCert = "hpd_board";
        $malPracticeTable = "hpd_malpractice";
        $immunizationTable = "hpd_immunization";
        $passportTable = "hpd_passport";
        $reference1Table = "hpd_reference1";
        $reference2Table = "hpd_reference2";
        $reference3Table = "hpd_reference3";

        

        $creds = array($cvTable, 
                        $portraitTable, 
                        $dlTable, 
                        $diplomaTable, 
                        $pgradCertTable, 
                        $lifeSupportCertTable, 
                        $fluRecordTable, 
                        $tbTable,  
                        $insuranceCertTable, 
                        $stateLicenseTable, 
                        $deaTable, 
                        $csrTable, 
                        $boardCert, 
                        $malPracticeTable, 
                        $immunizationTable, 
                        $passportTable, 
                        $reference1Table, 
                        $reference2Table, 
                        $reference3Table);  

        // $this->con->beginTransaction();                       
        

        // $createstmt1->bindParam(':usr_id', $this->getUsr_id(), PDO::PARAM_INT);

        $sql = "INSERT INTO ".$creds[0]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 1 , 'upload/newUserFiles/error.pdf ', '00-00-00 00:00:00');";  
        $sql2 = "INSERT INTO ".$creds[1]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 2 , 'upload/newUserFiles/error.jpg', '00-00-00 00:00:00');";  
        $sql3 = "INSERT INTO ".$creds[2]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 3 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql4 = "INSERT INTO ".$creds[3]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 4 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql5 = "INSERT INTO ".$creds[4]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 5 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql6 = "INSERT INTO ".$creds[5]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 6 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql7 = "INSERT INTO ".$creds[6]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 7 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql8 = "INSERT INTO ".$creds[7]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 8 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql9 = "INSERT INTO ".$creds[8]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 9 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql10 = "INSERT INTO ".$creds[9]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 10 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql11 = "INSERT INTO ".$creds[10]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 11 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql12 = "INSERT INTO ".$creds[11]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 12 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql13 = "INSERT INTO ".$creds[12]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 13 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql14 = "INSERT INTO ".$creds[13]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 14 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql15 = "INSERT INTO ".$creds[14]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 15 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql16 = "INSERT INTO ".$creds[15]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 16 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql17 = "INSERT INTO ".$creds[16]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 17 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql18 = "INSERT INTO ".$creds[17]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 18 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  
        $sql19 = "INSERT INTO ".$creds[18]." (usr_id, document_id, filePath, dateUploaded) VALUES ( ".$usr_id." , 19 , 'upload/newUserFiles/error.pdf', '00-00-00 00:00:00');";  



        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql2);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql3);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql4);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql5);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql6);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql7);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql8);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql9);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql10);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql11);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql12);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql13);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql14);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql15);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql16);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql17);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql18);
            $readstmt->execute();
            $readstmt = $this->con->prepare($sql19);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $permission[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            // echo json_encode($data);
        }

    }

    function get_usr_permissions($usr_id){
        $permission = array();
        $sql = "SELECT permission FROM usrr_stores WHERE usr_id = " . $user_id;
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $permission[] = $row;
            }
            echo json_encode($permission);
        } catch (Exception $exc) {
            echo json_encode($permission);
        }
    }    

}