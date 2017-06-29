<?php
    include '../../librerias.php';
?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente
 *
 * @author cetecom
 */
class Paciente {
    var $rut;
    var $nombres;
    var $ape_pat;
    var $ape_mat;
    var $direccion;
    var $tel;
    
    
    public function __construct($rut="",$nombres="", $ape_pat="", $ape_mat="", $direccion="", $tel=0) {
        $this->rut=$rut;
        $this->nombres=$nombres;
        $this->ape_pat=$ape_pat;
        $this->ape_mat=$ape_mat;
        $this->direccion=$direccion;
        $this->tel=$tel;
    }
    
    function agregarPaciente(){
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }
        
        $sql ="INSERT INTO paciente(rut_paciente, nombres, ape_pat, ape_mat, direccion, telefono) VALUES('$this->rut', '$this->nombres', "
                . "'$this->ape_pat', '$this->ape_mat', '$this->direccion', $this->tel);";
        $resultado = $db->query($sql);
    }
}
