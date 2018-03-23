<?php include("../header.php"); ?>

    <h2>Edit Recipe</h2>
    

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="saveeditrecipe">
        
        <input type="hidden" name="recipeID" value="<?php echo $recipe['recipeID']; ?>">
        
        <label>Recipe Name:</label>
        <input type="text" name="recipeName" value="<?php echo $recipe['recipeName']; ?>" required>
        <br>

        <label for="category">Category</label>
        <select id="category" name="recipeCategory">
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['categoryID']; ?>"  <?php if ($recipe['recipeCategory'] == $category['categoryID']) {echo 'selected';} ?>>
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="contributor">Contributor:</label>
        <input type="text" name="recipeContributor" value="<?php echo $recipe['recipeContributor']; ?>" required>
        <br>

        
        <!-- OLD IMAGE ADD
        <label for="image">Image:</label>
        <input type="text" name="recipeImage" value="<?php echo $recipe['recipeImage']; ?>">.jpg
        <br>
        -->
        
        
        <label for="ingredients">Ingredients (separate with commas):</label>
        <input type="text" name="recipeIngredients" value="<?php echo $recipe['recipeIngredients']; ?>" required>
        <br>

        <label for="instructions">Instructions:</label>
        <textarea rows="10" cols="30" name="recipeInstructions" required><?php echo str_replace("<br>", "\r",$recipe['recipeInstructions']); ?></textarea>
        <br>

        <button type="submit" class="mainButton">Submit</button>
    </form>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="adminview">
                
        <button type="submit" class="mainButton">Cancel</button>

    </form>





    <form action="index.php" method="post">
        <input type="hidden" name="action" value="confirmation">
        
        <input type="hidden" name="subaction" value="deleterecipe">
        
        <input type="hidden" name="recipeID" value="<?php echo $recipe['recipeID']; ?>">
        
        <input type="hidden" name="recipeName" value="<?php echo $recipe['recipeName']; ?>">
        
        <button type="submit" class="mainButton delete">Delete Recipe</button>

    </form>
        
<?php include("../footer.php"); ?>