<?php include("../header.php"); ?>

    <h2>Edit Recipe</h2>
    
    <div class="formContainer">
        <form action="index.php" method="post" class="mainForm">
            <input type="hidden" name="action" value="saveeditrecipe">

            <input type="hidden" name="recipeID" value="<?php echo $recipe['recipeID']; ?>">

            <label for="recipeName" class="formLabel">Recipe Name:</label>
            <input type="text" id="recipeName" name="recipeName" class="formInput" value="<?php echo $recipe['recipeName']; ?>" required>
            <br>

            <label for="recipeCategory" class="formLabel">Category</label>
            <select id="recipeCategory" name="recipeCategory" class="formInput">
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category['categoryID']; ?>"  <?php if ($recipe['recipeCategory'] == $category['categoryID']) {echo 'selected';} ?>>
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>

            <label for="recipeContributor" class="formLabel">Contributor:</label>
            <input type="text" id="recipeContributor" name="recipeContributor" class="formInput"  value="<?php echo $recipe['recipeContributor']; ?>" required>
            <br>        

            <label for="recipeIngredients" class="formLabel">Ingredients (separate with commas):</label>
            <input type="text" id="recipeIngredients" name="recipeIngredients" class="formInput" value="<?php echo $recipe['recipeIngredients']; ?>" required>
            <br>

            <label for="recipeInstructions" class="formLabel">Instructions:</label>
            <textarea rows="10" cols="30" id="recipeInstructions" name="recipeInstructions" class="formInput submitButtonSpace" required><?php echo str_replace("<br>", "\r",$recipe['recipeInstructions']); ?></textarea>
            <br>

            <button type="submit" class="mainButton submitButton">Submit</button>
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
    </div>
<?php include("../footer.php"); ?>