<?php
    include "./conexion.php";

//$data = {message: 'Respuesta de mi php'};
//header('Content-Type: application/json; charset=utf-8');
//echo json_encode($data);

    $token = $_POST['token'];
    $id_usuario=1;
    $registros="select * from suscripciones where id_user = '$id_usuario'";
    $registrosResult = sqlsrv_query($cnx, $registros);
    if (!$registrosResult) die( print_r( sqlsrv_errors(), true));
    if(sqlsrv_num_rows($registrosResult)>0){
        $fila=sqlsrv_fetch_row($registrosResult);
        $cnx = "update suscripciones set token='$token' where id_user='$id_usuario'";
        $conexionResult = sqlsrv_query($cnx, $cnx);
        if (!$conexionResult) die( print_r( sqlsrv_errors(), true));
    }else{
        $conexion = "insert into suscripciones (token, id_user) values('$token',$id_usuario)";
        $conexionResult = sqlsrv_query($cnx, $conexion);
        if (!$conexionResult) die( print_r( sqlsrv_errors(), true));
    }
//$data = {message: 'Respuesta de mi php'};
//header('Content-Type: application/json; charset=utf-8');
//echo json_encode($data);

?>