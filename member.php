<?php
session_start();

$dsn = 'mysql:dbname=shop; host=localhost; charset=utf8mb4';
$db = new PDO($dsn,'root','root');

if(empty($_SESSION['member_id']) or !strcmp($_SESSION['member_name'],'admin')){
  header('Location: login.php');
  exit();
}


?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<h1>オンライン映画</h1> 
<a href="logout.php">ログアウト</a>
<a href="cart.php">カートを確認</a>
<h2><?php print $_SESSION['member_name']; ?>さん、ようこそ</h2>
<p>レンタル映画一覧</p>
<?php
$x = sprintf('SELECT * FROM publisher, book WHERE publisher.publisher_id=book.book_publisher_id');
$stt = $db->query($x);
$y = $stt->fetchAll(PDO::FETCH_ASSOC);
foreach($y as $z) {
  printf('%s (評価：%s) %s<form method="post"><input type="hidden" name="b" value="%s" /><input type="submit" value="カートに入れる" formaction="tocart.php" /></form><br>', $z['book_title'], $z['author_name'], $z['publisher_name'], $z['book_id']);
}
?>
<p>あなたの購入済みレンタル映画一覧</p>
<?php
$x = sprintf('SELECT * FROM buy, publisher, book WHERE publisher.publisher_id=book.book_publisher_id AND buy.buy_book_id=book.book_id AND buy.buy_member_id="%s" AND buy.status="1"',$_SESSION['member_id']);
$stt = $db->query($x);
$y = $stt->fetchAll(PDO::FETCH_ASSOC);
foreach($y as $z) {
  printf('%s (評価：%s) %s<br>', $z['book_title'], $z['author_name'], $z['publisher_name'],$z['cinema production']);
}
?>
<p>あなたが最後に購入した映画と同じ映画会社の映画一覧</p>
<?php

$x = sprintf('SELECT * FROM buy, book WHERE buy.buy_book_id=book.book_id AND buy.buy_member_id="%s" AND buy.status="1" ORDER BY buy.buy_id DESC',$_SESSION['member_id']);
$stt = $db->query($x);
$y = $stt->fetchAll(PDO::FETCH_ASSOC);

if (count($y)>0) {
  $pub = $y[0]['book_publisher_id'];
  $x = sprintf('SELECT * FROM publisher, book WHERE publisher.publisher_id=book.book_publisher_id AND book.book_publisher_id="%s"',$pub);
  $stt = $db->query($x);
  $y = $stt->fetchAll(PDO::FETCH_ASSOC);
  foreach($y as $z) {
    printf('%s (評価：%s) %s<br>', $z['book_title'], $z['author_name'], $z['publisher_name'],$z['cinema production']);
  }
}
?>
</body></html>
