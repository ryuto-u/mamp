<?php
$dsn = 'mysql:dbname=shop; host=localhost; charset=utf8mb4';
$db = new PDO($dsn,'root','root');
$x = sprintf('INSERT INTO member SET member_name="%s", password="%s", birth_year="%s"', $_POST['n'],$_POST['p'],$_POST['b']);
$db->query($x);
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<p>会員登録が完了しました</p>
<a href="login.php">ログインする</a>
</body></html>
