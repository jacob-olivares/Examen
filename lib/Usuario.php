<?php

class Usuario {

    var $idUsuario;
    var $usuario;
    var $contrasena;
    var $idPrivilegio;

    /* VALIDA LA EXISTENCIA DEL USUARIO */

    function VerificarUsuarioClave() {
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }

        $clavemd5 = md5($this->contrasena);
        $sql = "SELECT * FROM usuario WHERE usuario='$this->usuario' AND contrasena='$clavemd5'";
        $resultado = $db->query($sql);

        if ($resultado->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }
    function VerificarUsuario() {
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }

        $sql = "SELECT * FROM usuario WHERE usuario='$this->usuario'";
        $resultado = $db->query($sql);

        if ($resultado->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }
    function agregarUsuario() {
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }

        $clavemd5 = md5($this->contrasena);
        $sql = "INSERT INTO usuario(usuario, contrasena, idPrivilegio) VALUES('$this->usuario', '$clavemd5', $this->idPrivilegio);";
        $resultado = $db->query($sql);
    }
    
    function eliminarUsuario() {
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }

        $sql = "DELETE FROM usuario WHERE idUsuario = '$this->idUsuario';";
        $resultado = $db->query($sql);
    }
}
