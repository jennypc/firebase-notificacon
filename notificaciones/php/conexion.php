
<?php
$serverName = "localhost";
    $connectionInfo = array( 'Database'=>'ejemplo', 'UID'=>'Jenny', 'PWD'=>'12345');
    $cnx = sqlsrv_connect($serverName, $connectionInfo);
    date_default_timezone_set('America/Mexico_City');

//   if ($cnx){
//     echo "conexion exitosa";
//   }else{
//    echo "No hay conexion";
//}
?> 
    