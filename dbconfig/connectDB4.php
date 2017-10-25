<?php
error_reporting(0);
@ini_set('display_errors', 0);
/**
 * Description of dbconnect
 *
 * @author vertexsolution
 */
class ConnectDB {
    
    /**
     *
     * @var String HostName
     */
    private $host = 'localhost';

    /**
     *
     * @var int database Port
     */
    private $port = '3306';

    /**
     *
     * @var String Database Name
     */
    private $dbname = "productchooser_20160131";

    /**
     *
     * @var String Username
     */
    private $username = "root";

    /**
     *
     * @var String Password
     */
    private $password = "";

    /**
     *
     * @var String MySQL Charset
     */
    private $charset = "utf8";

    /**
     *
     * @var PDO
     */
    protected $con = false;

    public function getHost() {
        return $this->host;
    }

    public function getPort() {
        return $this->port;
    }

    public function getDbname() {
        return $this->dbname;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getCharset() {
        return $this->charset;
    }

    public function getCon() {
        return $this->con;
    }

    public function setHost(String $host) {
        $this->host = $host;
    }

    public function setPort($port) {
        $this->port = $port;
    }

    public function setDbname(String $dbname) {
        $this->dbname = $dbname;
    }

    public function setUsername(String $username) {
        $this->username = $username;
    }

    public function setPassword(String $password) {
        $this->password = $password;
    }

    public function setCharset(String $charset) {
        $this->charset = $charset;
    }

    public function setCon(PDO $con) {
        $this->con = $con;
    }

    public function __construct() {
        $this->getConnect();
    }

    public function getConnect() {
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try{
            $db = new PDO(
                "mysql:" . 
                "host="     . $this->getHost()      . ";" . 
                "dbname="   . $this->getDbname()    . ";" .
                "port="     . $this->getPort()      . ";" . 
                "charset="  . $this->getCharset()
                );
        }catch(PDOException $ex){
            echo "Failed to connect to the database: " . $ex->getMessage();
        }

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()){
            function undo_magic_quotes_gpc(&$array){
                foreach($array as &$value){
                    if(is_array($value)){
                        undo_magic_quotes_gpc($value);
                    }else{
                        $value = stripslashes($value);
                    }
                }
            }

            undo_magic_quotes_gpc($_POST); 
            undo_magic_quotes_gpc($_GET); 
            undo_magic_quotes_gpc($_COOKIE);            
            
            header('Content-Type: text/html; charset=utf-8');
            // session_start();
        }
        
    }

}
