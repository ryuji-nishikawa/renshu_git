<?php
session_start();
$dsn = 'mysql:host=mysql446.db.sakura.ne.jp; dbname=tokyo-akabane_travel_agents; charset=utf8';
$user = 'tokyo-akabane';
$password = 'gct33656131';
require_once("../Smarty/libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = "../templates";
$smarty->compile_dir = "../templates_c";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>旅行会社一覧</title>
</head>

<body>
<a href="logout.php">ログアウト</a>
<?php
try{
	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = 'SELECT *, sp.flag as sflag, script.flag as scflag, company.id as id FROM company join sp on company.sp = sp.flag join script on company.script = script.flag'.(isset($_GET['estab_sort'])?' ORDER BY estab_year':'');
	$st = $pdo->query($sql);
	echo '<table border="1"><tr><th>会社名</th><th>URL</th><th>spサイト</th><th>スクリプト言語</th><th>設立年</th><th>従業員数</th><th colspan="2"><a href="insert.php">新規追加</a></th></tr>';
	echo '<tr><th></th><th></th><th></th><th></th><th><a href="'.$_SERVER['SCRIPT_NAME'].'?estab_sort=true">ソート</a></th><th><a href="'.$_SERVER['SCRIPT_NAME'].'">ソート</a></th><th colspan="2"><a href="insert.php"></a></th></tr>';
	foreach($st as $row){
		echo '<tr>';
		$name[] = $row['name'];
		$url[] = $row['url'];
		$sp[] = $row['state'];
		echo '<td>'.htmlspecialchars($row['name'],ENT_QUOTES).'</td>';
		echo '<td><a href="'.htmlspecialchars($row['url'],ENT_QUOTES).'" target="blank" >'.htmlspecialchars($row['url'],ENT_QUOTES).'</a></td>';
		echo '<td>'.htmlspecialchars($row['state'],ENT_QUOTES).'</td>';
		echo '<td>'.htmlspecialchars($row['language'],ENT_QUOTES).'</td>';
		echo '<td>'.($row['estab_year']==0?'':htmlspecialchars($row['estab_year'],ENT_QUOTES)).'</td>';
		echo '<td>'.($row['staff']==0?'':number_format(htmlspecialchars($row['staff'],ENT_QUOTES))).'</td>';
		if($_SESSION['level'] == 2){
			echo '<td>'.'<a href="edit.php?id='.htmlspecialchars($row['id'],ENT_QUOTES).'">編集</a>'.'</td>';
			echo '<td>'.'<a href="delete.php?id='.htmlspecialchars($row['id'],ENT_QUOTES).'">削除</a>'.'</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
	unset($st, $pdo);
} catch (PDOException $e){
	echo '<p>connection error: '. $e->getMessage(),'</p>';
}
$smarty->assign("name",$name);
$smarty->assign("url",$url);
$smarty->assign("sp",$sp);
$smarty->display("index.tpl");
?>

</body>
</html>
