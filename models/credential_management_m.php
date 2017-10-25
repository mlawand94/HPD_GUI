<?php

include '/var/www/html/dbconfig/connectDB.php';

class credential_management_m extends ConnectDB {

    

    const DB_TABLE = 'absoluteDocRequirements';

    public function loadNewUserDocs($usr_id){
        $sql = "select * from absoluteDocRequirements;";
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

    public function getUserDocs($usr_id) {
        //1
        $cvTable = "hpd_cv";
        //2        
        $portraitTable = "hpd_portrait";
        //3        
        $dlTable = "hpd_dl";
        //4        
        $diplomaTable = "hpd_diploma";
        //5        
        $pgradCertTable = "hpd_postGradCert";
        //6        
        $lifeSupportCertTable = "hpd_lifeSupportCert";
        //7        
        $fluRecordTable = "hpd_fluRecord";
        //8
        $tbTable = "hpd_tb";
        //9
        $insuranceCertTable = "hpd_insuranceCert";
        //10        
        $stateLicenseTable = "hpd_stateLicense";
        //11
        $deaTable = "hpd_dea";
        //12
        $csrTable = "hpd_csr";
        //13
        $boardCert = "hpd_board";
        //14
        $malPracticeTable = "hpd_malpractice";
        //15
        $immunizationTable = "hpd_immunization";
        //16
        $passportTable = "hpd_passport";
        //17
        $reference1Table = "hpd_reference1";
        //18
        $reference2Table = "hpd_reference2";
        //19
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


        $data = array();
        $sql = "";

$i = 0;

        $sql = "

        (select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, ".$creds[$i].".dateUploaded as uploadDate
    from ".$creds[$i]."
    INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = ".$creds[$i].".document_id
    WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)
union all

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_portrait.dateUploaded as uploadDate
from hpd_portrait
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_portrait.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_dl.dateUploaded as uploadDate
from hpd_dl
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_dl.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_diploma.dateUploaded as uploadDate
from hpd_diploma
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_diploma.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_postGradCert.dateUploaded as uploadDate
from hpd_postGradCert
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_postGradCert.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_board.dateUploaded as uploadDate
from hpd_board
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_board.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 


(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_lifeSupportCert.dateUploaded as uploadDate
from hpd_lifeSupportCert
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_lifeSupportCert.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_fluRecord.dateUploaded as uploadDate
from hpd_fluRecord
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_fluRecord.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_tb.dateUploaded as uploadDate
from hpd_tb
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_tb.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_insuranceCert.dateUploaded as uploadDate
from hpd_insuranceCert
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_insuranceCert.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_stateLicense.dateUploaded as uploadDate
from hpd_stateLicense
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_stateLicense.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_dea.dateUploaded as uploadDate
from hpd_dea
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_dea.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)


union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_csr.dateUploaded as uploadDate
from hpd_csr
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_csr.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 


(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_malpractice.dateUploaded as uploadDate
from hpd_malpractice
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_malpractice.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_immunization.dateUploaded as uploadDate
from hpd_immunization
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_immunization.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_passport.dateUploaded as uploadDate
from hpd_passport
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_passport.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_reference1.dateUploaded as uploadDate
from hpd_reference1
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_reference1.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_reference2.dateUploaded as uploadDate
from hpd_reference2
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_reference2.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)

union all 

(select absoluteDocRequirements.document_id as document_id, absoluteDocRequirements.document as document, hpd_reference3.dateUploaded as uploadDate
from hpd_reference3
INNER JOIN absoluteDocRequirements ON absoluteDocRequirements.document_id = hpd_reference3.document_id
WHERE dateUploaded < NOW() AND usr_id = ".$usr_id." ORDER BY dateUploaded desc limit 1)


        ";



        // $sql = "SELECT * FROM absoluteDocRequirements";
        
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


public function setCVFilePath($targetPath, $document_id, $user_id){

    $sql = "INSERT INTO hpd_cv (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }

}
public function setProfilePicFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_portrait (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }

}

public function setDLFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_dl (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setDiplomaFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_diploma (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setPostGradFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_postGradCert (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setLifeSupport1FilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_lifeSupportCert (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setFluRecordFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_fluRecord (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setTBFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_tb (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setInsuranceCertFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_insuranceCert (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setStateLicenseFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_stateLicense (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setDEAFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_dea (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setCSRFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_csr (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setBoardFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_board (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setMalpracticeFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_malpractice (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setImmunizationFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_immunization (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setPassportFilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_passport (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setReference1FilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_reference1 (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setReference2FilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_reference2 (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}
public function setReference3FilePath($targetPath, $document_id, $user_id){
    
    $sql = "INSERT INTO hpd_reference3 (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            // while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
            //     $data[] = $row;
            // }
            // echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($exc);
        }
}

    public function setFilePath($targetPath, $document_id, $user_id){
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

        $sql = "";

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


        // $sql = "INSERT INTO ".$creds[$document_id - 1]." (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  


        echo "about to make sql statement to upload";
        // if($document_id == 1){
        //     $sql = "INSERT INTO ".$cvTable." (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  
        // }
        // if($document_id == 2){
        //     $sql = "INSERT INTO " . $portraitTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 3){
        //     $sql = "INSERT INTO " . $dlTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 4){
        //     $sql = "INSERT INTO " . $diplomaTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 5){
        //     $sql = "INSERT INTO " . $pgradCertTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 6){
        //     $sql = "INSERT INTO " . $lifeSupportCertTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 7){
        //     $sql = "INSERT INTO " . $fluRecordTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 8){
        //     $sql = "INSERT INTO " . $tbTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 9){
        //     $sql = "INSERT INTO " . $insuranceCertTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 10){
        //     $sql = "INSERT INTO " . $stateLicenseTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 11){
        //     $sql = "INSERT INTO " . $deaTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 12){
        //     $sql = "INSERT INTO " . $csrTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 13){
        //     $sql = "INSERT INTO " . $boardCert . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 14){
        //     $sql = "INSERT INTO " . $malPracticeTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 15){
        //     $sql = "INSERT INTO " . $immunizationTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 16){
        //     $sql = "INSERT INTO " . $passportTable . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 17){
        //     $sql = "INSERT INTO " . $reference1Table . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 18){
        //     $sql = "INSERT INTO " . $reference2Table . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }
        // if($document_id == 19){
        //     $sql = "INSERT INTO " . $reference3Table . " (usr_id, document_id, filePath, dateUploaded) VALUES (" . $user_id . ", " . $document_id  . ", '" . $targetPath . "', NOW());";
        // }


        // $sql = "INSERT INTO hpd_cv (usr_id, document_id, filePath, dateUploaded) VALUES ( " . $user_id . "," . $document_id . ", '" . $targetPath . "', NOW());";  
        // echo $sql;        

            try{
                $readstmt = $this->con->prepare($sql);

                $readstmt->execute();
                // while($row = $readstmt->fetch(PDO::FETCH_ASSOC)){
                //     $data[] = $row;
                // }                   
                echo json_encode("File upload success. Document: " . $document_id . ". sql: " . $sql);
            }catch(Exception $exc){
                echo json_encode($exc);
            }        
    }

    public function retrieveDocument($document_id, $usr_id){

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

        $sql = "";
        // $sql = "
        //             SELECT  *
        //             FROM ".$creds[$document_id-1]." 
        //             WHERE dateUploaded < NOW()
        //             AND usr_id = ".$usr_id."
        //             ORDER BY dateUploaded DESC
        //             LIMIT 1;

        //         ";    


        if($document_id == 1){
            $sql =  "
                    SELECT  *
                    FROM ".$cvTable." 
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }
        if($document_id == 2){
            $sql =  "
                    SELECT  *
                    FROM ".$portraitTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

        //         ";    
        }
        if($document_id == 3){
            $sql =  "
                    SELECT  *
                    FROM ".$dlTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }  
        if($document_id == 4){
            $sql =  "
                    SELECT  *
                    FROM ".$diplomaTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }                
        if($document_id == 5){
            $sql =  "
                    SELECT  *
                    FROM ".$pgradCertTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }                
        if($document_id == 6){
            $sql =  "
                    SELECT  *
                    FROM ".$lifeSupportCertTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }                                
        if($document_id == 7){
            $sql =  "
                    SELECT  *
                    FROM ".$fluRecordTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }                
        if($document_id == 8){
            $sql =  "
                    SELECT  *
                    FROM ".$tbTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }                
        if($document_id == 9){
            $sql =  "
                    SELECT  *
                    FROM ".$insuranceCertTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }                
        if($document_id == 10){
            $sql =  "
                    SELECT  *
                    FROM ".$stateLicenseTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }                
        if($document_id == 11){
            $sql =  "
                    SELECT  *
                    FROM ".$deaTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }                
        if($document_id == 12){
            $sql =  "
                    SELECT  *
                    FROM ".$csrTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }                
        if($document_id == 13){
            $sql =  "
                    SELECT  *
                    FROM ".$boardCert."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }       
        if($document_id == 14){
            $sql =  "
                    SELECT  *
                    FROM ".$malPracticeTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }       
        if($document_id == 15){
            $sql =  "
                    SELECT  *
                    FROM ".$immunizationTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }       
        if($document_id == 16){
            $sql =  "
                    SELECT  *
                    FROM ".$passportTable."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }       
        if($document_id == 17){
            $sql =  "
                    SELECT  *
                    FROM ".$reference1Table."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }       
        if($document_id == 18){
            $sql =  "
                    SELECT  *
                    FROM ".$reference2Table."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }       
        if($document_id == 19){
            $sql =  "
                    SELECT  *
                    FROM ".$reference3Table."
                     WHERE dateUploaded < NOW()
                     AND usr_id = ".$usr_id." 
                    ORDER BY dateUploaded DESC
                    LIMIT 1;

                ";    
        }       

        

        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            // echo json_encode($sql);
            echo json_encode($data);

        } catch (Exception $exc) {
            echo json_encode($data);
        }                
    }
}
