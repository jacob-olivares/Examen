<?php
    include_once '../../constantes.php';
    include_once '../../librerias.php';
    $objses = new Sesion();
    $objses->init();

    $user = isset($_SESSION['idprivilegio']) ? $_SESSION['idprivilegio'] : null ;
    
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <?php if ($user == 3) { ?>
    <body>
        <div id="Lista">
        <form action="estadoConsulta.php" method="POST">
            Rut Paciente: <input id="rut" type="number" name="rut">
                <input type="submit" value="Buscar">
        </form>
        <?php
            if(!empty($_POST['rut'])){
                $rut = $_POST['rut'];
                $sql = "SELECT c.idConsulta, c.fecha_atencion, p.Paciente_rut_paciente, m.Medico_rut_medico, c.estado FROM consulta c"
                . " INNER JOIN paciente_has_consulta p ON (p.Consulta_idConsulta = c.idConsulta)"
                . " INNER JOIN medico_has_consulta m ON (m.Consulta_idConsulta = c.idConsulta) WHERE Paciente_rut_paciente = $rut;";
                $resultado = mysqli_query($con,$sql);
        ?>
        <table border="2px" width="90%"> <!-- Lo cambiaremos por CSS -->
                    <tr>
                        <td>ID CONSULTA</td>
                        <td>FECHA ATENCION</td>
                        <td>RUT PACIENTE</td>
                        <td>RUT MEDICO</td>
                        <td>ESTADO</td>
                        <td>ACCION</td>
                    </tr>

                    <?php
                     //QUERY Consulta
                    $sqlConsulta = "SELECT c.idConsulta, c.fecha_atencion, p.Paciente_rut_paciente, m.Medico_rut_medico, c.estado FROM consulta c"
                        . " INNER JOIN paciente_has_consulta p ON (p.Consulta_idConsulta = c.idConsulta)"
                        . " INNER JOIN medico_has_consulta m ON (m.Consulta_idConsulta = c.idConsulta) WHERE Paciente_rut_paciente = $rut;";
                    $miqueryConsulta = mysqli_query($con, $sqlConsulta);
                    $i =0;
                    while ($idConsultalst = mysqli_fetch_array($miqueryConsulta)) {
                        $i++;
                        echo
                        '<tr>'
                        . '<td>'. $idConsultalst['idConsulta'] . '</td>'
                        . '<td>' . $idConsultalst['fecha_atencion'] . '</td>'
                        . '<td>' . $idConsultalst['Paciente_rut_paciente'] . '</td>'
                        . '<td>' . $idConsultalst['Medico_rut_medico'] . '</td>'
                        .'<form action="../../controladores/consulta/modEstado.php" method="POST">'
                        . '<td>'
                        . '<select id="estado" name="estado">'
                            . '<option value="Confirmarda">Confirmar</option>'
                            . '<option value="Anulada">Anular</option>'
                            . '<option value="Perdida">Perdida</option>'
                            . '<option value="Realizada">Realizada</option>'
                        . '</select>'
                        . '</td>'
                        . '<input type="hidden" class="idConsulta" id="idConsulta" name ="idConsulta" value='.$idConsultalst['idConsulta'].'>'
                        . '<td><input id="modificar" type="button" value="Modificar Consulta"><td>'
                        . '</tr></form>';
                        } ?>
                </table>  
            <?php } ?>
        </div>
    </body>
            
    <script>
    $(document).ready(function(){
            $("#modificar").click(function(){
                        $.ajax({url:"../../controladores/consulta/modEstado.php"
                            ,type:'post'
                            ,data:{'estado':$("#estado").val(),
                                'idConsulta':$("#idConsulta").val()
                                }
                            ,success:function(resultado){
                                $("#mensaje").html(resultado);
                            }
                        });
                    
            });
            //Click Boton enviar
     });//Function Ready de la página
     </script>
</html>
<?php } ?>
<?php
if (!$user) {
    header('Location:http://localhost:' . $_SERVER['SERVER_PORT'] . '/Examen/otras/err_IniciarSesion.php');
}
?>