<?php
// Get the database connection to recipe db
require('model/database.php');

// Get the models
require('model/category_db.php');
require('model/recipe_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL) {
        $action = 'menuview';
    }
}  

switch ($action) {
    case 'menuview':
        $categories = get_categories();
        include('menuview.php');
        break;
    case 'categoryview':
        $categories = get_categories();
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $recipes = get_recipes_by_category($categoryID);
        include('categoryview.php');
        break;
    case 'recipeview':
        $recipeID = filter_input(INPUT_GET, 'recipeID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        if ($recipeID == 0 || $recipeID == null) {
            $recipeID = 1;
        }
        $recipe = get_recipe($recipeID);
        $categories = get_categories();
        include('recipeview.php');
        break;

    }
?>