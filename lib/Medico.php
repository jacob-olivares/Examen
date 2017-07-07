<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Medico
 *
 * @author jhaco
 */
class Medico {
    var $rut;
    var $nombres;
    var $ape_pat;
    var $ape_mat;
    var $fecha;
    var $especialidad;
    var $valor_consulta;
    
    public function __construct($rut = 0, $nombres = "", $ape_pat = "", $ape_mat = "", $fecha = "", $especialidad = "",$valor_consulta = 0) {
        $this->rut = $rut;
        $this->nombres = $nombres;
        $this->ape_pat = $ape_pat;
        $this->ape_mat = $ape_mat;
        $this->fecha = $fecha;
        $this->especialidad = $especialidad;
        $this->valor_consulta = $valor_consulta;
    }
    
    function agregarMedico(){     
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }

        $sql = "INSERT INTO medico(rut_medico, nombres, ape_pat, ape_mat, fecha_contratacion ,especialidad, valor_consulta) VALUES($this->rut, '$this->nombres', "
                . "'$this->ape_pat', '$this->ape_mat', '$this->fecha','$this->especialidad', $this->valor_consulta);";
        $resultado = $db->query($sql);
    }
    
    function eliminarMedico(){   
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }

        $sql = "DELETE FROM medico WHERE rut_medico=$this->rut;";
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
