<?php
session_start();

$dsn = 'mysql:dbname=shop; host=localhost; charset=utf8mb4';
$db = new PDO($dsn,'root','root');
$x = sprintf('SELECT * FROM member WHERE member_name="%s" AND password="%s"',
             $_POST['n'],$_POST['p']);
$stt = $db->query($x);
$a = $stt->fetchAll(PDO::FETCH_ASSOC);

if (count($a)==0) {
  header('Location: login.php');
  exit();
} else {
  $r = $a[0];
  $_SESSION['member_id'] = $r['member_id'];
  $_SESSION['member_name'] = $r['member_name'];
  $_SESSION['birth_year'] = $r['birth_year'];
  $_SESSION['addres'] = $r['addres'];
  $_SESSION['span'] = $r['span'];
  if (!strcmp($r['member_name'],'admin')){
    header('Location: admin.php');
    exit();
  }
  header('Location: member.php');
  exit();
}
?>
