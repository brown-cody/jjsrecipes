<?php include("../header.php"); ?>

    <h2>Add Recipe</h2>
    

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="saveaddrecipe">
        
        <label>Recipe Name:</label>
        <input type="text" name="recipeName" required>
        <br>

        <label for="category">Category</label>
        <select id="category" name="recipeCategory">
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="contributor">Contributor:</label>
        <input type="text" name="recipeContributor" required>
        <br>        
        
        <!-- OLD IMAGE ADD
        <label for="image">Image:</label>
        <input type="text" name="recipeImage">.jpg
        <br>
        -->

        <label for="ingredients">Ingredients (separate with commas):</label>
        <input type="text" name="recipeIngredients" required>
        <br>

        <label for="instructions">Instructions:</label>
        <textarea rows="10" cols="30" name="recipeInstructions" required></textarea>
        <br>

        <button type="submit" class="mainButton">Submit</button>
    </form>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="adminview">
                
        <button type="submit" class="mainButton">Cancel</button>

    </form>
        
<?php include("../footer.php"); ?>