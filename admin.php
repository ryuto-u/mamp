<?php
session_start();

$dsn = 'mysql:dbname=shop; host=localhost; charset=utf8mb4';
$db = new PDO($dsn,'root','root');

if(empty($_SESSION['member_id']) or strcmp($_SESSION['member_name'],'admin')){
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
<h2>管理者用ページ</h2>
<p>レンタル可能映画一覧</p>
<?php
$x = sprintf('SELECT * FROM publisher, cinema WHERE publisher.publisher_id=cinema.cinema_publisher_id');
$stt = $db->query($x);
$y = $stt->fetchAll(PDO::FETCH_ASSOC);
foreach($y as $z) {
  printf('%s (評価：%s) %s<form method="post"><input type="text" name="t" /><input type="hidden" name="b" value="%s" /><input type="submit" value="タイトルを修正する" formaction="revise.php" /></form><br>', $z['cinema_title'], $z['author_name'], $z['publisher_name'], $z['cinema_id']);
}
?>
<p>レンタル映画追加</p>
<form method="post">
  タイトル<input type="text" name="t" /><br>
  評価<input type="text" name="a" /><br>
  <select name="p">
<?php
$x = sprintf('SELECT * FROM publisher');
$stt = $db->query($x);
$y = $stt->fetchAll(PDO::FETCH_ASSOC);
foreach($y as $z) {
  printf('<option value="%s">%s</option>', $z['publisher_id'], $z['publisher_name']);
}
?>
  </select>
  <input type="submit" value="追加" formaction="delivery.php" />
</form>
</body></html>
