<?php

function get_categories() {
    global $db;
    
    $query = 'SELECT * FROM category
              ORDER BY categoryName';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

function get_category($categoryID) {
    global $db;
    $query = 'SELECT * FROM category
              WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(":categoryID", $categoryID);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    return $category;
}

function edit_category($categoryID, $categoryName) {
    global $db;
    $query = 'UPDATE category
              SET categoryName = :categoryName
              WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);    
    $statement->bindValue(':categoryName', $categoryName);
    $success = $statement->execute();
    $statement->closeCursor();
}

function add_category($categoryName) {
    global $db;
    $query = 'INSERT INTO category
                (categoryName)
              VALUES
                (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(":categoryName", $categoryName);
    $statement->execute();
    $statement->closeCursor();
}

function delete_category($categoryID) {
    global $db;
    $query = 'DELETE FROM category
              WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $statement->closeCursor();
}