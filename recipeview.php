<?php include("header.php"); ?>

        <h2><?php echo $recipe['recipeName']; ?></h2>
        <h3>
            <?php
                foreach($categories as $category) {
                    if ($recipe['recipeCategory'] == $category['categoryID']) {
                        echo $category['categoryName'];
                    }
                }
            ?>
            
        </h3>
        <h4><?php echo $recipe['recipeContributor']; ?></h4>
    <?php
        if (file_exists('images/'.$recipe['recipeID'].'.jpg')) {
            echo '<img class="image" src="images/'.$recipe['recipeID'].'.jpg"'.'>';
        }
    ?>
    
    
    <ul class="ingredients">
        
        <?php
            $ingredients = explode(",", $recipe['recipeIngredients']);
            foreach($ingredients as $ingredient) {
                echo "<li>".$ingredient."</li>";
            }
        ?>
    
    </ul>
    
    <p class="instructions">
        <?php echo $recipe['recipeInstructions']; ?>
    </p>
  
<?php include("recipefooter.php"); ?>