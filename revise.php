<?php
session_start();
$dsn = 'mysql:dbname=shop; host=localhost; charset=utf8mb4';
$db = new PDO($dsn,'root','root');

if(empty($_SESSION['member_id']) or strcmp($_SESSION['member_name'],'admin')){
  header('Location: login.php');
  exit();
}

$x = sprintf('UPDATE cinema SET cinema_title="%s" WHERE cinema_id="%s"', $_POST['t'],$_POST['b']);
$db->query($x);
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<h1>オンライン映画</h1> 
<a href="logout.php">ログアウト</a>
<h2>管理者用ページ</h2>
<p>タイトルを修正しました</p>
<a href="admin.php">管理者用ページに戻る</a>
</body></html>
