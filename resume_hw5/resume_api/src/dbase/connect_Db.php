<?php
class Dbase {
    public $connect;

    public function Connect(){
		try {
		    $path = "config/parameters.ini";
		    $arrayConnect = parse_ini_file($path, true);
		    $dsn = "pgsql:host={$arrayConnect['db']['host']};port={$arrayConnect['db']['port']};dbname={$arrayConnect['db']['dbname']}";
		    $this->connect = new PDO($dsn, $arrayConnect['db']['login'], $arrayConnect['db']['password']);
		} catch (PDOException $e) {
		    echo '<script type="text/javascript">alert("Неполадки с подключением к базе!")</script>';
		}
		return $this->connect;
	}
}