<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Consulta
 *
 * @author jhaco
 */
class Consulta {
    var $idConsulta;
    var $fecha;
    var $paciente;
    var $medico;
    var $estado;
    
    public function __construct($fecha = "", $paciente = 0, $medico = 0, $estado = "") {
        $this->fecha = $fecha;
        $this->paciente = $paciente;
        $this->medico = $medico;
        $this->estado = $estado;
    }
    
    function agendarConsulta(){  
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }

        $sql = "INSERT INTO consulta(fecha_atencion, rut_paciente, rut_medico, estado) VALUES('$this->fecha'"
                . ", $this->paciente, $this->medico, 'Agendada');";
        $resultado = $db->query($sql);
    }
    
    function modificarConsulta(){   
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }
        
        $sql = "UPDATE consulta SET estado = '$this->estado' WHERE idConsulta=$this->idConsulta;";
        $resultado = $db->query($sql);
    }
}
