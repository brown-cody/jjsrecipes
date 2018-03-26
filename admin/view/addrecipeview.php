<?php include("../header.php"); ?>

    <h2>Add Recipe</h2>
    

    <form action="index.php" method="post" class="recipeAddForm">
        <input type="hidden" name="action" value="saveaddrecipe">
        
        <label for="recipeName" class="formLabel">Recipe Name:</label>
        <input type="text" id="recipeName" name="recipeName" class="formInput" required>
        <br>

        <label for="category" class="formLabel">Category:</label>
        <select id="category" name="recipeCategory" class="formInput">
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="recipeContributor" class="formLabel">Contributor:</label>
        <input type="text" id="recipeContributor" name="recipeContributor" class="formInput" required>
        <br>        

        <label for="recipeIngredients" class="formLabel">Ingredients (separate with commas):</label>
        <input type="text" id="recipeIngredients" name="recipeIngredients" class="formInput" required>
        <br>

        <label for="recipeInstructions" class="formLabel">Instructions:</label>
        <textarea rows="10" cols="30" id="recipeInstructions" name="recipeInstructions" class="formInput" required></textarea>
        <br>

        <button type="submit" class="mainButton submitButton">Submit</button>
    </form>
    <br>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="adminview">
                
        <button type="submit" class="mainButton">Cancel</button>

    </form>
        
<?php include("../footer.php"); ?>