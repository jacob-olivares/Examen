
<html>
    <head>
        <meta charset="UTF-8">
        <script src="../../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <div id="contenedor">
            <form action="../../controladores/paciente/agregar.php" method="POST">
                <div>Rut: <input id="rut" type="number" name="rut"></div>
                <div>Nombres: <input id="nombres" type="text" name="nombres"></div>
                <div>Apellido Paterno: <input id="ape_pat" type="text" name="ape_pat"></div>
                <div>Apellido Materno: <input id="ape_mat" type="text" name="ape_mat"></div>
                <div>Sexo: 
                    <select name="sexo">
                        <option value="seleccione">Seleccione</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>
                <div>Direccion: <input id="direccion" type="text" name="direccion"></div>
                <div>Telefono: <input id="tel" type="number" name="tel"></div>
                <input id="enviar" type="button" value="Acceder">
                <div id="msjweb"></div>
            </form>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            
             $("#enviar").click(function(){
                     $.ajax({url:"<?=URL?>controladores/paciente/agregar.php"
                            ,type:"post"
                            ,data:{'rut':$("#rut").val(),
                                   'nombres':$("#nombres").val(),
                                   'ape_pat':$("#ape_pat").val(),
                                   'ape_mat':$("#ape_mat").val(),
                                   'direccion':$("#direccion").val(),
                                   'tel':$("#tel").val()}
                            ,success:function(resweb){
                                $('#msjweb').html(resweb);
                                if(resweb=="Todo Bien"){
                                    location.href="<?=URL;?>/index.php";
                                }
                            }
                        });//Cierre AJAX           
            });//Click del botón  
            
        });//Ready del document
    
    </script>
</html>
