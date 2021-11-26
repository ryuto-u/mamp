<?php
session_start();
$dsn = 'mysql:dbname=shop; host=localhost; charset=utf8mb4';
$db = new PDO($dsn,'root','root');

if(empty($_SESSION['member_id']) or !strcmp($_SESSION['member_name'],'admin')){
  header('Location: login.php');
  exit();
}

$x = sprintf('DELETE FROM buy WHERE buy_member_id="%s" AND status="0"',$_SESSION['member_id']);
$db->query($x);
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<h1>オンライン映画</h1> 
<a href="logout.php">ログアウト</a>
<h2><?php print $_SESSION['member_name']; ?>さん、ようこそ</h2>
<p>カートを空にしました</p>
<a href="member.php">マイページに戻る</a>
</body></html>
