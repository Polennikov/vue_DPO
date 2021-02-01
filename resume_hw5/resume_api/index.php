<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

require 'src/object/status.php';
require 'src/object/resume.php';
require 'src/object/edu_resume.php';
require 'src/dbase/connect_Db.php';

/*$method = $_SERVER['REQUEST_METHOD'];*/

$dbase = new Dbase();
$dbconn = $dbase->Connect();

// Получаем данные из тела запроса
$params = explode('/', trim($_SERVER['REQUEST_URI'],'/'));
$method = $params[0];
array_shift($params);

if($method == 'GET') {

    if (array_shift($params) == 'api' && array_shift($params) == 'cv') {
        if (isset($params[0]) && $params[0]!="") {
            getResumeId($dbconn,$params[0]);
        } else {
			getResume($dbconn);
        }
    }
} else if($method == 'POST') {
	$ID;
	if (array_shift($params) == 'api' && array_shift($params) == 'cv') {
		if(count($params) == 2) {
			$ID=array_shift($params);
			if (isset($params[0]) && $params[0] == "add") {
				addResume($dbconn);
	        } else if(isset($params[0]) && $params[0] == "edit"){
				editResume($dbconn,$ID);
	        }else if(isset($params[0]) && $params[0] == "addEdu"){
				addEdu($dbconn,$ID);
	        }else if(isset($params[0]) && $params[0] == "delEdu"){
				delEdu($dbconn,$ID);
	        }
		}
		else if(count($params) == 3) {
			$ID=array_shift($params);
			if (array_shift($params) == "status" && $params[0] == "update") {
            	editStatus($dbconn,$ID);
	        }
		}

	}
}