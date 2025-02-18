<?php
    /* TODO: Incluye el archivo de configuración de la conexión a la base de datos y la clase Usuario */
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    require_once("../models/Email.php");

    /* TODO:Crea una instancia de la clase Usuario */
    $usuario = new Usuario();
    $email = new Email();

    /* TODO: Utiliza una estructura switch para determinar la operación a realizar según el valor de $_GET["op"] */
    switch($_GET["op"]){

        /* TODO: Si la operación es "registrar" */
        case "registrar":
            /* TODO: Llama al método registrar_usuario de la instancia $usuario con los datos del formulario */
            $datos = $usuario->get_usuario_correo($_POST["usu_correo"]);
            if(is_array($datos) == true and count($datos) == 0){
                $datos1 = $usuario->registrar_usuario($_POST["usu_nomape"],$_POST["usu_correo"],$_POST["usu_pass"],"../../assets/picture/avatar.png",2);
                $email->registrar($datos1[0]["usu_id"]);
                echo "1";
            }else{
                echo "0";
            }
            break;

        case "activar":
            $usuario->activar_usuario($_POST["usu_id"]);
            break;

        case "registrargoogle":
            if($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER["CONTENT_TYPE"] === "application/json"){
                //TODO: Recuperar el JSON del cuerpo POST
                $jsonStr = file_get_contents('php://input');
                $jsonObj = json_decode($jsonStr);

                if(!empty($jsonObj->request_type) && $jsonObj->request_type == 'user_auth'){
                    $credential = !empty($jsonObj->credential) ? $jsonObj->credential : '';

                    //TODO: Decodificar el payload de la respuesta desde el token JWT
                    $parts = explode(".",$credential);
                    $header = base64_decode($parts[0]);
                    $payload = base64_decode($parts[1]);
                    $signature = base64_decode($parts[2]);

                    $reponsePayload = json_decode($payload);

                    if(!empty($reponsePayload)){
                        //TODO: Información del perfil del usuario
                        $nombre = !empty($reponsePayload->name) ? $reponsePayload->name : '';
                        $email = !empty($reponsePayload->email) ? $reponsePayload->email : '';
                        $imagen = !empty($reponsePayload->picture) ? $reponsePayload->picture : '';
                    }

                    $datos = $usuario->get_usuario_correo($email);
                    if(is_array($datos) == true and count($datos) == 0){
                        $datos1 = $usuario->registrar_usuario($nombre,$email,"",$imagen,1);

                        $_SESSION["usu_id"] = $datos1[0]["usu_id"];
                        $_SESSION["usu_nomape"] = $nombre;
                        $_SESSION["usu_correo"] = $email;
                        $_SESSION["usu_img"] =  $imagen;
                        $_SESSION["rol_id"] =  $datos1[0]["rol_id"];

                        echo "1";
                    }else{
                        $usu_id = $datos[0]["usu_id"];

                        $_SESSION["usu_id"] = $usu_id;
                        $_SESSION["usu_nomape"] = $nombre;
                        $_SESSION["usu_correo"] = $email;
                        $_SESSION["usu_img"] =  $imagen;
                        $_SESSION["rol_id"] =  $datos[0]["rol_id"];

                        echo "0";
                    }
                }else{
                    echo json_encode(['error' => '¡Los datos de la cuenta no están disponibles!']);
                }
            }
            break;

        case "colaboradorgoogle":
            if($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER["CONTENT_TYPE"] === "application/json"){
                //TODO: Recuperar el JSON del cuerpo POST
                $jsonStr = file_get_contents('php://input');
                $jsonObj = json_decode($jsonStr);

                if(!empty($jsonObj->request_type) && $jsonObj->request_type == 'user_auth'){
                    $credential = !empty($jsonObj->credential) ? $jsonObj->credential : '';

                    //TODO: Decodificar el payload de la respuesta desde el token JWT
                    $parts = explode(".",$credential);
                    $header = base64_decode($parts[0]);
                    $payload = base64_decode($parts[1]);
                    $signature = base64_decode($parts[2]);

                    $reponsePayload = json_decode($payload);

                    if(!empty($reponsePayload)){
                        //TODO: Información del perfil del usuario
                        $nombre = !empty($reponsePayload->name) ? $reponsePayload->name : '';
                        $email = !empty($reponsePayload->email) ? $reponsePayload->email : '';
                        $imagen = !empty($reponsePayload->picture) ? $reponsePayload->picture : '';
                    }

                    $datos = $usuario->get_usuario_correo($email);
                    if(is_array($datos) == true and count($datos) == 0){
                        echo "1";
                    }else{
                        $usu_id = $datos[0]["usu_id"];

                        $_SESSION["usu_id"] = $usu_id;
                        $_SESSION["usu_nomape"] = $nombre;
                        $_SESSION["usu_correo"] = $email;
                        $_SESSION["usu_img"] =  $imagen;
                        $_SESSION["rol_id"] = $datos[0]["rol_id"];

                        echo "0";
                    }
                }else{
                    echo json_encode(['error' => '¡Los datos de la cuenta no están disponibles!']);
                }
            }
            break;

        case "guardaryeditar":
            /* TODO: Llama al método registrar_usuario de la instancia $usuario con los datos del formulario */
            if(empty($_POST["usu_id"])){
                $datos = $usuario->get_usuario_correo($_POST["usu_correo"]);
                if(is_array($datos) == true and count($datos) == 0){
                    $datos1 = $usuario->insert_colaborador($_POST["usu_nomape"],$_POST["usu_correo"],$_POST["rol_id"]);
                    $email->nuevo_colaborador($datos1[0]["usu_id"]);
                    echo "1";
                }else{
                    echo "0";
                }
            }else{
                $usuario->update_colaborador($_POST["usu_id"],$_POST["usu_nomape"],$_POST["usu_correo"],$_POST["rol_id"]);
                echo "2";
            }
            break;

        case "mostrar":
            $datos = $usuario->get_usuario_id($_POST["usu_id"]);
            if(is_array($datos) == true and count($datos) > 0){
                foreach($datos as $row){
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nomape"] = $row["usu_nomape"];
                    $output["usu_correo"] = $row["usu_correo"];
                    $output["rol_id"] = $row["rol_id"];
                }
                echo json_encode($output);
            }
            break;

        case "eliminar":
            $usuario->eliminar_colaborador($_POST["usu_id"]);
            echo "1";
            break;

        case "listar":
            $datos=$usuario->get_colaborador();
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[]= $row["usu_nomape"];
                $sub_array[]= $row["usu_correo"];
                $sub_array[]= $row["rol_nom"];
                $sub_array[]= $row["fech_crea"];
                $sub_array[]= '<button type="button" class="btn btn-soft-info waves-effect waves-light btn-sm" onClick="permiso('.$row["usu_id"].')"><i class="bx bx-shield-quarter font-size-16 align-middle"></i></button>';
                $sub_array[]= '<button type="button" class="btn btn-soft-warning waves-effect waves-light btn-sm" onClick="editar('.$row["usu_id"].')"><i class="bx bx-edit-alt font-size-16 align-middle"></i></button>';
                $sub_array[]= '<button type="button" class="btn btn-soft-danger waves-effect waves-light btn-sm" onClick="eliminar('.$row["usu_id"].')"><i class="bx bx-trash-alt font-size-16 align-middle"></i></button>';
                $data[]=$sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);

            echo json_encode($results);
            break;

        case "comboarea":
            $datos=$usuario->get_usuario_permiso_area($_SESSION["usu_id"]);
            $html="";
            $html.="<option value=''>Seleccionar</option>";
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $html.="<option value='".$row['area_id']."'>".$row['area_nom']."</option>";
                }
                echo $html;
            }
            break;
    }
?>