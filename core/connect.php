<?
define("CONFIG", [
	"DB" => [
		"server" => "localhost",
		"user" => "root",
		"password" => "",
		"name" => "mineralogy"
	]
]);
$sqlConnect = mysqli_connect(
	CONFIG['DB']['server'],
	CONFIG['DB']['user'],
	CONFIG['DB']['password'],
	CONFIG['DB']['name']
);
mysqli_set_charset($sqlConnect,'utf8');

function p($text) {
	echo "<pre style=\"white-space: pre-wrap; background:#fafafa;padding:10px;margin:10px 0;\">";
	print_r($text);
	echo "</pre>";
}
?>