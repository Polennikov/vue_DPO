<?php

function delEdu($dbconn,$id_edu)
{
    $sql = "DELETE FROM edu_resume
 WHERE id_edu=:id_edu";
    $result = $dbconn->prepare($sql);
    $result->bindParam(':id_edu', $id_edu, PDO::PARAM_STR);
    $result->execute();

}
function addEdu($dbconn,$id_resume)
{
    $sql = "INSERT INTO edu_resume (id_resume)
    VALUES (:id_resume);";
    $result = $dbconn->prepare($sql);
    $result->bindParam(':id_resume', $id_resume, PDO::PARAM_STR);
    $result->execute();
    $id=$dbconn->lastInsertId();
    $res=[
          "id" => $id,
          "id_resume" => $id_resume
        ];
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}


