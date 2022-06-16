<?php 
include "conexion.php";

$severKey='AAAAzCKy1C4:APA91bGEIdtimjiTi9oech4g6dEohwID0JxrXVwB9IT_9C9CdMA4cFBvV0Sdlw5bkCySuErxSR_t8w1popvV9obDe_NFAdr-sTpCHpjZUGp533Oq6i09NN79SrBOcKCEAZw_tX27BMmk';
$url='https://fcm.googleapis.com/fcm/send';

$field=array(
    'data'=>array(
        'notification'=>array(
            'title'=>'Hola',
            'body'=>'Esta es una notificacion',
            'icon'=>'http://localhost/notificaciones/img/icon.png'
        )
        ),
    'to'=>'emL5za-dY2vca7pyC8vJtr:APA91bE5H-N6HyAe-9th-f55F1Ypu_5_IiZWvcijHswRzIwauS8PlF8dHgUMP3PonPht3kNQuoo9ZxNJe3tGVd1I5FKig96blMu7AMOqaP2N1kCy5SG2O9O0QoEAwNclqFlFAqU16Mpq'    
);
$fields=json_encode($field);

$header=array(
    'Authorization: key='.$severKey,
    'Content-Type: application/json'
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

$result=curl_exec($ch);
echo $result;
curl_close($ch);
?>