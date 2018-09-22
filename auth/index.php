<?php
// Get the database connection to recipe db
require('../model/database.php');

// Get the models
//require('../model/category_db.php');
//require('../model/recipe_db.php');
require('../model/user_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL) {
        $action = 'loginprompt';
    }
}  

switch ($action) {
    case 'loginprompt':
        
        break;
    case 'credcheck':
        break;
    case 'grantaccess':
        header('Location: ../admin/index.php');
        break;

}
?>