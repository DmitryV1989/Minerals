<?
include($_SERVER['DOCUMENT_ROOT']."/core/connect.php"); // подключение файла к проекту


?>
<form enctype="multipart/form-data" method="post" id="create_product">
	<h2>Создание новой записи</h2>
	<div>
		<input type="text" id="mineral" name="mineral" required>
		<label for="mineral">минерал</label>
	</div>
	<div>
		<textarea name="descr" id="descr" cols="30" rows="8"></textarea>
		<label for="descr">описание</label>
	</div>
	<div>
		<input type="text" id="hard" name="hard" required>
		<label for="hard">твёрдость</label>
	</div>
	<div>
		<textarea name="use" id="use" cols="30" rows="8"></textarea>
		<label for="use">применение</label>
	</div>
	<div>
		<input type="text" id="class" name="class" required>
		<label for="class">классификация</label>
	</div>
	<div>
		<label for="photo">выбрать изображение</label>
		<input type="file" id="photo" name="photo">
	</div>
	<div>
		<input type="checkbox" name="active" id="active" value="1">
		<label for="active">активность</label>
	</div>
	<div>
		<input type="submit" name="create" value="создать">
	</div>
</form>
<?
print_r($_POST);
if(isset($_POST['create'])) {
	$sqlResult = mysqli_query($sqlConnect,"INSERT INTO `minerals` VALUES (
		0,
		'".$_POST['mineral']."',
		'".$_POST['descr']."',
		'".$_POST['hard']."',
		'".$_POST['use']."',
		'".$_POST['class']."',
		'".$_POST['active']."',
		NOW()
	);");
	print_r($sqlResult ? "запись создана ".$sqlConnect->insert_id : "ошибка создания записи");	
	p($_FILES);
	if($_FILES['photo']['name']) {
		switch ($_FILES["photo"]["type"]) {
			case 'image/jpeg':
				$extention=".jpg";
				break;
			case 'image/png':
				$extention=".png";
				break;
		}
		
		echo move_uploaded_file($_FILES['photo']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/static/images/upload/image'.$sqlConnect->insert_id.$extention) ? " файл загружен" : "ошибка загрузки файла";
	}
}
?>




