<?php

function select_all_items(){
    global $db;
    $query = 'SELECT * FROM todoitems';
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}



function select_item_by_title($title){
    global $db;
    $query = 'SELECT * FROM todoitems
                WHERE Title= :title 
                    ORDER BY ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(":title", $title);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function insert_item($Title, $Description){
    global $db;
    $count = 0;
    $query = 'INSERT INTO todoitems
                            (Title, Description)
                            VALUES 
                            (:Title, :Description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Title', $Title);
    $statement->bindValue(':Description', $Description);
    if($statement->execute()){
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;

}

function update_item($ItemNum, $Title, $Description){
    global $db;
    $count = 0;
    $query = 'UPDATE todoitems
                SET Title = :Title, Description=:Description
                WHERE ItemNum = :ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(":ItemNum", $ItemNum);
    $statement->bindValue(":Title", $Title);
    $statement->bindValue(":Description", $Description);
    if($statement->execute()){
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
}


function delete_item($ItemNum){
    global $db;
    $count = 0;
    $query = 'DELETE FROM todoitems
                WHERE ItemNum = :ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(":ItemNum", $ItemNum);
    if($statement->execute()){
        $count = $statement->rowCount();
    };
    $statement->closeCursor();
    return $count;
}



?>