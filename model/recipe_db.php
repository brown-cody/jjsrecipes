<?php

function get_last_recipe() {
    global $db;
    $query = 'SELECT * FROM recipe
              ORDER BY recipeID DESC
              LIMIT 1';
    $statement = $db->prepare($query);
    $statement->execute();
    $lastRecipe = $statement->fetch();
    $statement->closeCursor();
    return $lastRecipe;
}

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

function get_recipes_by_category($recipeCategory) {
    global $db;
    $query = 'SELECT * FROM recipe
              WHERE recipeCategory = :recipeCategory';
    $statement = $db->prepare($query);
    $statement->bindValue(":recipeCategory", $recipeCategory);
    $statement->execute();
    $recipes = $statement->fetchAll();
    $statement->closeCursor();
    return $recipes;
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