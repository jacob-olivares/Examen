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

        $sql = "INSERT INTO consulta(fecha_atencion, estado) VALUES('$this->fecha','Agendada');";
        $resultado = $db->query($sql);
        $id = mysqli_insert_id($db); 
        $db->query("INSERT INTO PACIENTE_has_Consulta(Paciente_rut_paciente, Consulta_idConsulta) VALUES($this->paciente, $id);");
        $db->query("INSERT INTO MEDICO_has_Consulta(Medico_rut_medico, Consulta_idConsulta) VALUES($this->medico, $id);");
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
