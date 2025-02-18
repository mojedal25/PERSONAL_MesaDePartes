<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Rol.php");
    $rol = new Rol();
    $datos = $rol->validar_menu_x_rol($_SESSION["rol_id"],"home");
    if(isset($_SESSION["usu_id"]) and count($datos)>0){
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Poder Judicial | Inicio Mesa de Partes</title>
        <?php require_once("../html/head.php")?>
    </head>

    <body>

        <div id="layout-wrapper">

            <?php require_once("../html/header.php")?>

            <?php require_once("../html/menu.php")?>

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Inicio</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Starter Page</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>

                            <div class="card border border-primary">
                                <div class="card-header bg-transparent border-primary">
                                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Terminos y Condiciones de la Mesa de Partes Virtual</h5>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Terminos y Condiciones </h5>
                                    <p class="card-text">Conste por el presente documento, el Acuerdo del Uso del <Strong>Aplicativo Web Mesa de Partes Virtual</Strong> de la Corte Superior de Justicia Lima Norte - Poder Judicial, que asume el suscrito Usuario, quien manifiesta conocer su contenido, ACEPTANDO expresamente la totalidad de las condiciones que a continuacion se detallan:</p>
                                    <h6 class="card-title"></h6>
                                    <p class="card-text">1. El Usuario, acepta haber recibido gratuitamente sus credenciales de Usuario y Clave vía correo electronico, las que tienen el caracter de estrictamente personales.</p>
                                    <h6 class="card-title"></h6>
                                    <p class="card-text">2. El Usuario, se compromete a no ceder ni transferir bajo ninguna modalidad ni circunstancia, el uso de la clave que se le asignen; siendo en todo caso, único responsable del uso que terceras personas pudieran darle.</p>
                                    <h6 class="card-title"></h6>
                                    <p class="card-text">3. El Aplicativo sera utilizado exclusivamente para que el usuario solicite el registro de sus requerimientos el cual deberá serl el documento formato (PDF), además, reciba la información del Número de Expediente registrado, observaciones, así como la Fecha - Hora de audiencias.</p>
                                    <h6 class="card-title"></h6>
                                    <p class="card-text">4. El Usuario, acepta que cosntituye exclusiva responsabilidad de su persona, el omitir y/o ingresar datos incorrectos de la información en la presentación de su solicitud de registro al Aplicativo web y de la documentación respectiva de su requerimiento a presentar.</p>
                                    <h6 class="card-title"></h6>
                                    <p class="card-text">5. El Usuario, podrá solicitar formalmente mediante correo electronico a informatica_limanortepj.gob.pe la restauracion de Usuario y Clave, así como, la supresión definitiva de su clave y, por consiguiente, la cancelación de su acceso, bajo su responsabilidad.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php require_once("../html/footer.php")?>

            </div>

        </div>

        <?php require_once("../html/sidebar.php")?>

        <div class="rightbar-overlay"></div>

        <?php require_once("../html/js.php")?>

    </body>
</html>
<?php
  }else{
    header("Location:".Conectar::ruta()."index.php");
  }
?>