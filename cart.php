<?php
session_start();

$dsn = 'mysql:dbname=shop; host=localhost; charset=utf8mb4';
$db = new PDO($dsn,'root','root');

if(empty($_SESSION['member_id']) or !strcmp($_SESSION['member_name'],'admin')){
  header('Location: login.php');
  exit();
}

$x = sprintf('SELECT * FROM buy, publisher, book WHERE publisher.publisher_id=book.book_publisher_id AND buy.buy_book_id=book.book_id AND buy.buy_member_id="%s" AND buy.status="0"',$_SESSION['member_id']);
$stt = $db->query($x);
$y = $stt->fetchAll(PDO::FETCH_ASSOC);

?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<h1>オンライン映画</h1> 
<a href="logout.php">ログアウト</a>
<h2><?php print $_SESSION['member_name']; ?>さん、ようこそ</h2>
<p>カート内映画一覧</p>
<?php
foreach($y as $z) {
  printf('%s (評価：%s) %s<br>', $z['book_title'], $z['author_name'], $z['publisher_name'],$z['cinema production']);
}
?>
<a href="member.php">マイページに戻る</a>
<form method="post">
  <input type="submit" value="カートを空にする" formaction="empty.php" />
</form>
<form method="post">
  <input type="submit" value="購入する" formaction="buy.php" />
</form>
</body></html>
