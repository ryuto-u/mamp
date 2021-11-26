<?php
$dsn = 'mysql:dbname=shop; host=localhost; charset=utf8mb4';
$db = new PDO($dsn,'root', 'root');
$stt = $db->query('SELECT * FROM member');
$a = $stt->fetchAll(PDO::FETCH_ASSOC);
print '<pre>'; print_r($a); print '</pre>';
?>