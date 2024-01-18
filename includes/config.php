<?php
$host = '127.0.0.1';
$db = '2023_boksystem';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dns = "mysql:host=$host; dbname=$db; charset=$charset";
$options =[
	PDO::ATTR_ERRMODE 				=> PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE 	=> PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES 		=> false,
];


try {
	$pdo = new PDO ($dns, $user, $pass, $options);
} catch (\PDOException $e){
	throw new \PDOException ($e->getMessage(), (int)$e->getCode());

}


if(!isset($_SESSION)){
	session_start();
}

	$user = new USER($pdo);

?>