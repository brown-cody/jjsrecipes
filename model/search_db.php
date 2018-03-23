<?php

function search_name($searchText) {
    global $db;
    
    $query = 'SELECT * FROM recipe
              WHERE recipeName LIKE :searchText';
    $statement = $db->prepare($query);
    $statement->bindValue(":searchText", '%'.$searchText.'%');
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function search_contributor($searchText) {
    global $db;
    
    $query = 'SELECT DISTINCT recipeContributor
              FROM recipe
              WHERE recipeContributor LIKE :searchText';
    $statement = $db->prepare($query);
    $statement->bindValue(":searchText", '%'.$searchText.'%');
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function search_ingredients($searchText) {
    global $db;
    
    $query = 'SELECT * FROM recipe
              WHERE recipeIngredients LIKE :searchText';
    $statement = $db->prepare($query);
    $statement->bindValue(":searchText", '%'.$searchText.'%');
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function search_Instructions($searchText) {
    global $db;
    
    $query = 'SELECT * FROM recipe
              WHERE recipeInstructions LIKE :searchText';
    $statement = $db->prepare($query);
    $statement->bindValue(":searchText", '%'.$searchText.'%');
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

?>