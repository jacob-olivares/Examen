<?php
class Conexion{
    var $objconn;
    
    /*Metodo de conexion*/
    
    var $dbusr= "root";
    var $dbpwd= "avaras08";
    var $dbhots= "localhost";
    var $dbname= "simplycolors";
    public function  Conectar()
            {
       // $miconn = new myqli("localhost","root","","simplycolors");
        
                $this->objconn = new mysqli( $this->dbhots, 
                                             $this->dbusr, 
                                             $this->dbpwd,
                                             $this->dbname);
           if($this->objconn ->connect_errno){
            echo "fallo al conectar a MySQL: (". $this->objconn-> connect_errno . ") " .$miconn->connect_errno;
        }   
        return true;
    }
}