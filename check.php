<?php

$dsn = 'mysql:dbname=shop; host=localhost; charset=utf8mb4';
$db = new PDO($dsn,'root','root');

if(empty($_POST['n'])) {
  header('Location: join.php');
  exit();
}

$x = sprintf('SELECT * FROM member WHERE member_name="%s"', $_POST['n']);
$stt = $db->query($x);
$a = $stt->fetchAll(PDO::FETCH_ASSOC);
if(count($a)>0) {
  header('Location: join.php');
  exit();
}

$n = sprintf('<input type="hidden" name="n" value="%s" />', 
             $_POST['n']); 
$p = sprintf('<input type="hidden" name="p" value="%s" />', 
             $_POST['p']); 
$b = sprintf('<input type="hidden" name="b" value="%s" />', 
             $_POST['b']); 

?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body> 
<form method="post">
  <table>
    <tr><td>会員名</td>
        <td><?php print $_POST['n']; ?></td></tr>
    <tr><td>パスワード</td>
        <td><?php print $_POST['p']; ?></td></tr>
    <tr><td>電話番号</td>
        <td><?php print $_POST['b']; ?></td></tr>


  </table>
  <a href="join.php">書き直す</a>
  <input type="submit" value="登録する" formaction="completion.php" />
  <?php print $n; ?>
  <?php print $p; ?>
  <?php print $b; ?>




</form>
</body></html>
