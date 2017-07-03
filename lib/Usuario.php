<?php

class Usuario {

    var $idusuario;
    var $user;
    var $pass;
    var $newPass;
    var $nombre;
    var $apellido;

    /* VALIDA LA EXISTENCIA DEL USUARIO */

    function VerificarUsuarioClave() {
        $oConn = new Conexion();
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }

        $clavemd5 = md5($this->pass);
        $sql = "SELECT * FROM usuario WHERE usuario='$this->user' AND contrasena='$clavemd5'";
        $resultado = $db->query($sql);

        if ($resultado->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }

}
