<?php
function editStatus($dbconn,$ID)
{
    // получаем отправленные данные
    $data = file_get_contents("php://input");
    $sql = "UPDATE public.resume SET status =:status
            WHERE id_resume=:id_resume";
    $result = $dbconn->prepare($sql);
    $result->bindParam(':id_resume', $ID);
    $result->bindParam(':status', $data);
    $result->execute();
    
}