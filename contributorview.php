<?php include("header.php"); ?>

    <h2><?php echo $recipeContributor; ?></h2>
    <br>
    
    <?php foreach ($recipes as $recipe): ?>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="recipeview">
            <input type="hidden" name="recipeID" value="<?php echo $recipe['recipeID'];?>">
            <button class="recipeButton" type="submit"><?php echo $recipe['recipeName'];?></button>
        </form>
    <?php endforeach; ?>
    
<?php include("footer.php"); ?>