<?php 
include "conexion.php";

$severKey="AAAAzCKy1C4:APA91bGEIdtimjiTi9oech4g6dEohwID0JxrXVwB9IT_9C9CdMA4cFBvV0Sdlw5bkCySuErxSR_t8w1popvV9obDe_NFAdr-sTpCHpjZUGp533Oq6i09NN79SrBOcKCEAZw_tX27BMmk";
$url="https://fcm.googleapis.com/fcm/send";

$field=array(
    'data'=>array(
        'notification'=>array(
            'title'=>'Hola',
            'body'=>'Esta es una notificacion',
            'icon'=>'http://localhost/notificaciones/img/icon.png'
        )
        ),
    'to'=>'dIflFlxrWFxkTfLMtMAdyv:APA91bE8gUKNHMnajGnLMKUVv-ChniUT25bFzEJYygC4cQoHnl8mp63M9hDtkT1bksSgaFL-r_18RpUWmooER7u3Oj0TAk9BHL3JPgroXu4EncNqSDc_aB6PmESF140J9HAAQ_zrxwhs'    
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