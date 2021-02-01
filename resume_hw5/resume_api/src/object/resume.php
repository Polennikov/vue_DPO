<?php

function getResume($dbconn)
{
    $sql = "SELECT * FROM resume";
    $result = $dbconn->prepare($sql);
    $result->execute();
    $data = $result->fetchAll();

    if (count($data) > 0) {
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    else {
        $res=[
            "message" => "Резюме не найдено"
        ];
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}
function getResumeId($dbconn,$id)
{
    $sql = "SELECT * FROM resume WHERE id_resume=:id";
    $result = $dbconn->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $result->execute();
    $data = $result->fetchAll();
    if (count($data) > 0) {
        $sql = "SELECT * FROM edu_resume WHERE id_resume=:id";
        $result = $dbconn->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();
        $educations = $result->fetchAll();
        $res=[
          "user" => $data,
          "educations" => $educations
        ];
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}
function addResume($dbconn)
{
    // получаем отправленные данные
    $data = json_decode(file_get_contents("php://input"));
    //print_r($data);
    $id_resume;
    if(count($data)>0){
        $user=$data->user;
        $sql = "INSERT INTO resume (prof, city, photo, fio, phone, email, date_born, money_, skills, about, status)
                VALUES (:prof, :city, :photo, :fio, :phone, :email, :date_born, :money_, :skills, :about, :status)";
        $result = $dbconn->prepare($sql);
        $result->bindParam(':prof', $user->prof);
        $result->bindParam(':city', $user->city);
        $result->bindParam(':photo', $user->photo);
        $result->bindParam(':fio', $user->fio);
        $result->bindParam(':phone', $user->phone);
        $result->bindParam(':email', $user->email);
        $result->bindParam(':date_born', $user->date_born);
        $result->bindParam(':money_', $user->money_);
        $result->bindParam(':skills', $user->skills);
        $result->bindParam(':about', $user->about);
        $result->bindParam(':status', $user->status);
        $result->execute();

        $id_resume = $dbconn->lastInsertId();

    }
     if(count($data->education)>0){
        $education=$data->education;
        $sql = "INSERT INTO edu_resume (id_resume, educationlevel, university, faculty, spiciality, eduyear)
                VALUES (:id_resume, :educationlevel, :university, :faculty, :spiciality, :eduyear)";
        foreach ($education as $data) {
            $result = $dbconn->prepare($sql);
            $result->bindParam(':id_resume', $id_resume);
            $result->bindParam(':educationlevel', $data->educationlevel);
            $result->bindParam(':university', $data->university);
            $result->bindParam(':faculty', $data->faculty);
            $result->bindParam(':spiciality', $data->spiciality);
            $result->bindParam(':eduyear', $data->eduyear);
            $result->execute();
        }

    }
}
function editResume($dbconn,$ID)
{
    // получаем отправленные данные
    $data = json_decode(file_get_contents("php://input"));
    $id_resume;
    if(count($data)>0){
        $user=$data->user;
        $sql = "UPDATE resume SET prof=:prof, city=:city, photo=:photo, fio=:fio, phone=:phone, email=:email, date_born=:date_born, money_=:money_, skills=:skills, about=:about, status=:status
                WHERE id_resume=:id_resume";
        $result = $dbconn->prepare($sql);
        $result->bindParam(':id_resume', $ID);
        $result->bindParam(':prof', $user->prof);
        $result->bindParam(':city', $user->city);
        $result->bindParam(':photo', $user->photo);
        $result->bindParam(':fio', $user->fio);
        $result->bindParam(':phone', $user->phone);
        $result->bindParam(':email', $user->email);
        $result->bindParam(':date_born', $user->date_born);
        $result->bindParam(':money_', $user->money_);
        $result->bindParam(':skills', $user->skills);
        $result->bindParam(':about', $user->about);
        $result->bindParam(':status', $user->status);
        $result->execute();
        $id_resume = $dbconn->lastInsertId();
    }
    print_r($ID);
    if(count($data->education)>0){
        $education=$data->education;
        $sql = "UPDATE edu_resume SET educationlevel=:educationlevel, university=:university, faculty=:faculty, spiciality=:spiciality, eduyear=:eduyear
                WHERE id_edu=:id_edu";
        foreach ($education as $data) {
            $result = $dbconn->prepare($sql);
            $result->bindParam(':id_edu', $data->id_edu);
            $result->bindParam(':educationlevel', $data->educationlevel);
            $result->bindParam(':university', $data->university);
            $result->bindParam(':faculty', $data->faculty);
            $result->bindParam(':spiciality', $data->spiciality);
            $result->bindParam(':eduyear', $data->eduyear);
            $result->execute();
        }

    }

}

