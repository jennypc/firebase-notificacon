
<?php
$serverName = "localhost";
    $connectionInfo = array( 'Database'=>'prueba', 'UID'=>'Jenn', 'PWD'=>'contraseña');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    date_default_timezone_set('America/Mexico_City');

//   if ($cnx){
//     echo "conexion exitosa";
//   }else{
//    echo "No hay conexion";
//}
?> 
    