<?php include("header.php"); ?>

        <h2><?php echo $recipe['recipeName']; ?></h2>
        <h3>
            <?php
                foreach($categories as $category) {
                    if ($recipe['recipeCategory'] == $category['categoryID']) {
                        echo '<a href="index.php?action=categoryview&categoryID='.$category['categoryID'].'">';
                        echo $category['categoryName'];
                        echo '</a>';
                    }
                }
            ?>
            
        </h3>
        <h4>
            <?php
                $contributorEdited = str_replace(" ","+",$recipe['recipeContributor']);
                echo '<a href="index.php?action=contributorview&recipeContributor='.$contributorEdited.'">';
                echo $recipe['recipeContributor'];
                echo '</a>';
            ?>
        </h4>
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