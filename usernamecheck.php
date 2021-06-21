<?php
$responseStatus = '200 OK';
$responseText = '';
if(!isset($_POST['username'])) {
   $responseStatus = '400 Bad Request';
   $responseText = 'Anfrage erhält keinen Nutzernamen';
} else {
   $usernames = array('admin','gast','paul');
   $validatePattern = '/^[a-z0-9]{4,20}$/';
   if(in_array($_POST['username'],$usernames)) {
      $responseStatus = '409 Conflict';
      $responseText = 'Nutzername bereits in Verwendung';
   } elseif(!preg_match($validatePattern,$_POST['username'])) {
      $responseStatus = '400 Bad Request';
      $responseText = 'Nutzername entspricht nicht den Vorgaben. Der Benutzername muss aus kleinen Buchstaben(a-z) und/oder Ziffern(0-9) bestehen und 4-20 Zeichen lang sein';
   } else {
      $reponseStatus = '204 No Content';
   }
}
header($_SERVER['SERVER_PROTOCOL'].' '.$responseStatus);
header('Content-type: text/html; charset=utf-8');
echo $responseText;
