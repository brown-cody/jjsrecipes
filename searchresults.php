<?php include("header.php"); ?>

    <h2>Search Results</h2>
    
    <?php if($searchNames != null){echo '<br><h3>Recipes</h3>';}?>
    <?php foreach ($searchNames as $recipe): ?>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="recipeview">
            <input type="hidden" name="recipeID" value="<?php echo $recipe['recipeID'];?>">
            <button class="recipeButton" type="submit"><?php echo $recipe['recipeName'];?></button>
        </form>
    <?php endforeach; ?>
    
    <?php if($searchIngredients != null){echo '<br><h3>Ingredients</h3>';}?>
    <?php foreach ($searchIngredients as $recipe): ?>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="recipeview">
            <input type="hidden" name="recipeID" value="<?php echo $recipe['recipeID'];?>">
            <button class="recipeButton" type="submit"><?php echo $recipe['recipeName'];?></button>
        </form>



    <?php endforeach; ?>
    
    <?php if($searchInstructions != null){echo '<br><h3>Instructions</h3>';}?>
    <?php foreach ($searchInstructions as $recipe): ?>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="recipeview">
            <input type="hidden" name="recipeID" value="<?php echo $recipe['recipeID'];?>">
            <button class="recipeButton" type="submit"><?php echo $recipe['recipeName'];?></button>
        </form>

        
    <?php endforeach; ?>
    
    <?php if($searchContributors != null){echo '<br><h3>Contributors</h3>';}?>
    <?php foreach ($searchContributors as $recipe): ?>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="contributorview">
            <input type="hidden" name="recipeContributor" value="<?php echo $recipe['recipeContributor'];?>">
            <button class="recipeButton" type="submit"><?php echo $recipe['recipeContributor'];?></button>
        </form>
        
    <?php endforeach; ?>

    <?php if($searchNames == null && $searchIngredients == null && $searchInstructions == null && $searchContributors == null) {
        echo '<br><h3>No Results</h3>';
    } ?>

<?php include("footer.php"); ?>