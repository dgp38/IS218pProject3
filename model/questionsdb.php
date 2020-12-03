<?php
function get_users_questions($userId) {
    global $db;

    $query = 'SELECT * FROM questions WHERE ownerid = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId' , $userId);
    $statement->execute();
    $question = $statement->fetchAll();
    $statement->closeCursor();

    return $question;
}

 function get_all_question () {
    global $db;

    $query = 'SELECT * FROM questions';
    $statement = $db->prepare($query);
    $statement->execute();
    $questions = $statement->fetchAll();

    $statement->closeCursor();
    return$questions;
}

function create_question($title, $body, $skills, $userId) {
    global $db;
    $query = 'INSERT INTO questions 
                (title, body,skills,ownerid)
                VALUES
                    (:title,:body,:skills,:ownerid)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':title', $title);
    $statement->bindvalue(':body', $body);
    $statement->bindvalue(':skills', $skills);
    $statement->bindvalue(':ownerid', $userId);
    $statement->execute();
    $statement->closeCursor();
}

function delete_question($questionId){
    global $db;

    $query = 'DELETE FROM questions WHERE id = :questionId';
    $statement = $db->prepare($query);
    $statement->bindValue(':questionId',$questionId);
    $statement->execute();
    $statement->closeCursor();

}