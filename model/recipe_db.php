<?php

function get_recipe($recipeID) {
    global $db;
    $query = 'SELECT * FROM recipe
              WHERE recipeId = :recipeID';
    $statement = $db->prepare($query);
    $statement->bindValue(":recipeID", $recipeID);
    $statement->execute();
    $recipe = $statement->fetch();
    $statement->closeCursor();
    return $recipe;
}

function get_recipes() {
    global $db;
    
    $query = 'SELECT * FROM recipe
              ORDER BY recipeName';
    $statement = $db->prepare($query);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function sort_recipes_by_category() {
    global $db;
    
    $query = 'SELECT * FROM recipe
              ORDER BY recipeCategory';
    $statement = $db->prepare($query);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function sort_recipes_by_contributor() {
    global $db;
    $query = 'SELECT * FROM recipe
              ORDER BY recipeContributor';
    $statement = $db->prepare($query);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function sort_recipes_by_image() {
    global $db;
    $query = 'SELECT * FROM recipe
              ORDER BY recipeImage';
    $statement = $db->prepare($query);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function sort_recipes_by_updated() {
    global $db;
    $query = 'SELECT * FROM recipe
              ORDER BY recipeDateEdited DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function sort_recipes_by_created() {
    global $db;
    $query = 'SELECT * FROM recipe
              ORDER BY recipeDateAdded DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function get_recipes_by_category($recipeCategory) {
    global $db;
    $query = 'SELECT * FROM recipe
              WHERE recipeCategory = :recipeCategory
              ORDER BY recipeName';
    $statement = $db->prepare($query);
    $statement->bindValue(":recipeCategory", $recipeCategory);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function get_recipes_by_contributor($recipeContributor) {
    global $db;
    $query = 'SELECT * FROM recipe
              WHERE recipeContributor = :recipeContributor
              ORDER BY recipeName';
    $statement = $db->prepare($query);
    $statement->bindValue(":recipeContributor", $recipeContributor);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
}

function set_recipe_image($recipeID, $recipeImage) {
    global $db;
    $query = 'UPDATE recipe
              SET recipeImage = :recipeImage
              WHERE recipeID = :recipeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':recipeImage', $recipeImage);
    $statement->bindValue(':recipeID', $recipeID);
    $statement->execute();
    $statement->closeCursor();
}

function add_recipe($recipeName, $recipeCategory, $recipeContributor, $recipeImage, $recipeIngredients, $recipeInstructions) {
    global $db;
    $query = 'INSERT INTO recipe
                 (recipeName, recipeCategory, recipeContributor, recipeImage, recipeIngredients, recipeInstructions, recipeDateAdded, recipeDateEdited)
              VALUES
                 (:recipeName, :recipeCategory, :recipeContributor, :recipeImage, :recipeIngredients, :recipeInstructions, now(), now())';
    $statement = $db->prepare($query);
    $statement->bindValue(':recipeName', $recipeName);
    $statement->bindValue(':recipeCategory', $recipeCategory);
    $statement->bindValue(':recipeContributor', $recipeContributor);
    $statement->bindValue(':recipeImage', $recipeImage);
    $statement->bindValue(':recipeIngredients', $recipeIngredients);
    $statement->bindValue(':recipeInstructions', $recipeInstructions);
    $statement->execute();
    $statement->closeCursor();
}

function delete_recipe($recipeID) {
    global $db;
    $query = 'DELETE FROM recipe
              WHERE recipeID = :recipeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':recipeID', $recipeID);
    $statement->execute();
    $statement->closeCursor();
}

function edit_recipe($recipeID, $recipeName, $recipeCategory, $recipeContributor, $recipeImage, $recipeIngredients, $recipeInstructions) {
    global $db;
    $query = 'UPDATE recipe
              SET recipeName = :recipeName, recipeCategory = :recipeCategory, recipeContributor = :recipeContributor, recipeImage = :recipeImage, recipeIngredients = :recipeIngredients, recipeInstructions = :recipeInstructions, recipeDateEdited = now()
              WHERE recipeID = :recipeID';
    $statement = $db->prepare($query);
    $statement->bindValue(':recipeID', $recipeID);    
    $statement->bindValue(':recipeName', $recipeName);
    $statement->bindValue(':recipeCategory', $recipeCategory);
    $statement->bindValue(':recipeContributor', $recipeContributor);
    $statement->bindValue(':recipeImage', $recipeImage);
    $statement->bindValue(':recipeIngredients', $recipeIngredients);
    $statement->bindValue(':recipeInstructions', $recipeInstructions);
    $success = $statement->execute();
    $statement->closeCursor();    
}