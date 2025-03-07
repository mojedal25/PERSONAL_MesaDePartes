<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Rol.php");
    $rol = new Rol();
    $datos = $rol->validar_menu_x_rol($_SESSION["rol_id"],"nuevotramite");
    if(isset($_SESSION["usu_id"]) and count($datos)>0){
?>
<html lang="es">
    <head>
        <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, proxy-revalidate, max-age=0">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <title>Poder Judicial | Nuevo Tramite Mesa de Partes</title>
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
                                    <h4 class="mb-sm-0 font-size-18">Nuevo Tramite</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Starter Page</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Ingrese toda la información requerida.</h4>
                                            <p class="card-title-desc">(*) Datos obligatorios. </p>
                                        </div>

                                        <div class="card-body">
                                            <form method="post" id="documento_form">
                                                <div class="row">

                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="form-label" class="form-label">Juzgado (*)</label>
                                                            <select class="form-select" name="area_id" id="area_id" placeholder="Seleccionar" required>
                                                                <option value="">Seleccionar</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="example-text-input" class="form-label">Documento (*)</label>
                                                            <select class="form-select" name="tra_id" id="tra_id" placeholder="Seleccionar" required>
                                                                <option value="">Seleccionar</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="form-label" class="form-label">Nro Expediente</label>
                                                            <input class="form-control" type="text" value="" name="doc_externo" id="doc_externo">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="form-label" class="form-label">Presentado (*)</label>
                                                            <select class="form-select" name="tip_id" id="tip_id" placeholder="Seleccionar" required>
                                                                <option value="">Seleccionar</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <label for="form-label" class="form-label">DNI / RUC (*)</label>
                                                            <input class="form-control" type="text" value="" name="doc_dni" id="doc_dni" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="form-label" class="form-label">Nombre / Razon Social (*)</label>
                                                            <input class="form-control" type="text" value="" name="doc_nom" id="doc_nom" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="form-label" class="form-label">Descripcion (*)</label>
                                                            <textarea class="form-control" type="text" rows="2" value="" name="doc_descrip" id="doc_descrip" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">

                                                        <div class="dropzone">
                                                            <div class="dz-default dz-message">
                                                                <button class="dz-button" type="button">
                                                                    <img src="../../assets/image/upload.png" alt="">
                                                                </button>
                                                                <div class="dz-message" data-dz-message><span>Arrastra y suelta archivos aquí o haz click para seleccionar archivos <br> Maximo 5 archivos de tipo *.PDF, y solo de peso maximo de 2MB </span></div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="d-flex flex-wrap gap-2 mt-4">
                                                        <button type="button" id="btnlimpiar" class="btn btn-secondary waves-effect waves-light">Limpiar</button>
                                                        <button type="submit" id="btnguardar" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>

                                    </div>
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

        <script type="text/javascript" src="nuevotramite.js"></script>

    </body>
</html>
<?php
  }else{
    header("Location:".Conectar::ruta()."index.php");
  }
?>