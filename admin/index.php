<?php
// Get the database connection to recipe db
require('../model/database.php');

// Get the models
require('../model/category_db.php');
require('../model/recipe_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL) {
        $action = 'adminview';
    }
}  

switch ($action) {
    case 'adminview':
        $subaction = filter_input(INPUT_GET, 'subaction', FILTER_SANITIZE_STRING);
        $recipes = get_recipes();
        switch ($subaction) {
            case 'recipesort':
                break;
            case 'categorysort':
                $recipes = sort_recipes_by_category();
                break;
            case 'contributorsort':
                $recipes = sort_recipes_by_contributor();
                break;
            case 'imagesort':
                $recipes = sort_recipes_by_image();
                break;
            case 'updatedsort':
                $recipes = sort_recipes_by_updated();
                break;
            case 'createdsort':
                $recipes = sort_recipes_by_created();
                break;
            default:
                break;
        }
        $categories = get_categories();
        include('view\adminview.php');
        break;
    case 'addcategory':
        include('view\addcategoryview.php');
        break;
    case 'editcategory':
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        if ($categoryID == null) {
            $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_SANITIZE_STRING);
        }
        $category = get_category($categoryID);
        include('view\editcategoryview.php');
        break;
    case 'saveeditcategory':
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        edit_category($categoryID, $categoryName);
        $recipes = get_recipes();
        $categories = get_categories();
        include('view\adminview.php');
        break;
    case 'saveaddcategory':
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        add_category($categoryName);
        $recipes = get_recipes();
        $categories = get_categories();
        include('view\adminview.php');
        break;
    case 'deletecategory':
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        delete_category($categoryID);
        $recipes = get_recipes();
        $categories = get_categories();
        include('view\adminview.php');
        break;
    case 'addrecipe':
        $categories = get_categories();
        include('view\addrecipeview.php');
        break;
    case 'editrecipe':
        $recipeID = filter_input(INPUT_POST, 'recipeID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        if ($recipeID == null) {
            $recipeID = filter_input(INPUT_GET, 'recipeID', FILTER_SANITIZE_STRING);
        }
        $recipe = get_recipe($recipeID);
        $categories = get_categories();
        include('view\editrecipeview.php');
        break;
    case 'saveeditrecipe':
        $recipeID = filter_input(INPUT_POST, 'recipeID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $recipeName = filter_input(INPUT_POST, 'recipeName', FILTER_SANITIZE_STRING);
        $recipeCategory = filter_input(INPUT_POST, 'recipeCategory', FILTER_SANITIZE_STRING);
        $recipeContributor = filter_input(INPUT_POST, 'recipeContributor', FILTER_SANITIZE_STRING);
        $recipeImage = filter_input(INPUT_POST, 'recipeImage', FILTER_SANITIZE_STRING);
        $recipeIngredients = filter_input(INPUT_POST, 'recipeIngredients', FILTER_SANITIZE_STRING);
        $recipeInstructions = str_replace("\r",'<br>',filter_input(INPUT_POST, 'recipeInstructions', FILTER_SANITIZE_STRING));
        edit_recipe($recipeID, $recipeName, $recipeCategory, $recipeContributor, $recipeImage, $recipeIngredients, $recipeInstructions);
        $recipes = get_recipes();
        $categories = get_categories();
        include('view\adminview.php');
        break;
    case 'saveaddrecipe':
        $recipeName = filter_input(INPUT_POST, 'recipeName', FILTER_SANITIZE_STRING);
        $recipeCategory = filter_input(INPUT_POST, 'recipeCategory', FILTER_SANITIZE_STRING);
        $recipeContributor = filter_input(INPUT_POST, 'recipeContributor', FILTER_SANITIZE_STRING);
        $recipeImage = filter_input(INPUT_POST, 'recipeImage', FILTER_SANITIZE_STRING);
        $recipeIngredients = filter_input(INPUT_POST, 'recipeIngredients', FILTER_SANITIZE_STRING);
        $recipeInstructions = str_replace("\r",'<br>',filter_input(INPUT_POST, 'recipeInstructions', FILTER_SANITIZE_STRING));
        add_recipe($recipeName, $recipeCategory, $recipeContributor, $recipeImage, $recipeIngredients, $recipeInstructions);
        $recipes = get_recipes();
        $categories = get_categories();
        include('view\adminview.php');
        break;
    case 'deleterecipe':
        $recipeID = filter_input(INPUT_POST, 'recipeID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        delete_recipe($recipeID);
        $recipes = get_recipes();
        $categories = get_categories();
        include('view\adminview.php');
        break;
    case 'deleteimage':
        $recipeID = filter_input(INPUT_POST, 'recipeID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        unlink('../images/'.$recipeID.'.jpg');
        set_recipe_image($recipeID, '0');
        $recipes = get_recipes();
        $categories = get_categories();
        include('view\adminview.php');
        break;
    case 'confirmation':
        $recipeID = filter_input(INPUT_POST, 'recipeID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $recipeName = filter_input(INPUT_POST, 'recipeName', FILTER_SANITIZE_STRING);
        $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        $subaction = filter_input(INPUT_POST, 'subaction', FILTER_SANITIZE_STRING);
        
        include('view\confirmationview.php');
        break;
    case 'upload':
        $recipeID = filter_input(INPUT_POST, 'recipeID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $recipeName = filter_input(INPUT_POST, 'recipeName', FILTER_SANITIZE_STRING);
        $recipes = get_recipes();
        $categories = get_categories();
        
        if(isset($_POST["SubmitBtn"])){
            
            $fileName=$_FILES["imageUpload".$recipeID]["name"];
            $fileSize=$_FILES["imageUpload".$recipeID]["size"]/1024;
            $fileType=$_FILES["imageUpload".$recipeID]["type"];
            $fileTmpName=$_FILES["imageUpload".$recipeID]["tmp_name"];  

            if ($fileName == null) {
                $error = "No file selected. Click the thumbnail to select an image.";
            } else if($fileType=="image/jpeg"){
                if($fileSize<=5000){

                //New file name
                //$random=rand(1111,9999);
                //$newFileName=$random.$fileName;

                $newFileName = $recipeID.'.jpg';

                //File upload path
                $uploadPath="../images/".$newFileName;

                //function for upload file
                    if(move_uploaded_file($fileTmpName,$uploadPath)){
                        $success = "Successful image upload for ".$recipeName;
                        set_recipe_image($recipeID, '1');
                    }
                } else {
                    $error = "Maximum upload file size limit is 5,000 kb";
                    include('view\adminview.php');
                    break;
                }
            } else {
                $error = "You can only upload a JPEG.";
                include('view\adminview.php');
                break;
            }  
            
        }
        
        include('view\adminview.php');
        break;

}
?>