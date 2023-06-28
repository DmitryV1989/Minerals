<? 
include($_SERVER['DOCUMENT_ROOT']."/core/connect.php");

$sqlResult = mysqli_query($sqlConnect,"SELECT * FROM `minerals`");
while($row = mysqli_fetch_assoc($sqlResult)) {
	$arList[$row['id']] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Minerals</title>
	<link rel="stylesheet" href="static/custom.css">	
</head>
<body>
	<? foreach($arList as $item): if(!$item['active']) continue; ?>
	<div class="item" style=" 
    margin-top: 15px;
    margin-bottom: 15px;
    border: 1px solid blue;
    padding: 15px;
">	
		<img src="static/images/upload/image<?=$item['id']?>.png" alt="">
		<div class="inner">
			<div class="title"><?=$item['name']?></div>
			<div class="descr">Описание: <?=$item['descr']?></div>
			<div class="hard">Твёрдость: <?=$item['hard']?></div>
			<div class="use">Применение: <?=$item['use']?></div>
		</div>
	</div>	
	<? endforeach; ?>		
</body>
</html>


