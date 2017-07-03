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
        
        $sql ="INSERT INTO paciente(rut_paciente, nombres, ape_pat, ape_mat, sexo,direccion, telefono) VALUES($this->rut, '$this->nombres', "
                . "'$this->ape_pat', '$this->ape_mat', 'M','$this->direccion', $this->tel);";
        $resultado = $db->query($sql);
    }
    
    function eliminarPaciente(){
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }
        
        $sql="DELETE FROM paciente WHERE rut_paciente=$this->rut";
        $resultado = $db->query($sql);
        
    }
    function validarRut($rut){
        if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
        return false;
    }
    $rut = preg_replace('/[\.\-]/i', '', $rut);
    $dv = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut) - 1);
    $i = 2;
    $suma = 0;
    foreach (array_reverse(str_split($numero)) as $v) {
        if ($i == 8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    if ($dvr == 11)
        $dvr = 0;
    if ($dvr == 10)
        $dvr = 'K';
    if ($dvr == strtoupper($dv))
        return true;
    else
        return false;
    }

}
