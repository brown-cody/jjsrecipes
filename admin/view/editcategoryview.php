<?php include("../header.php"); ?>

    <h2>Edit Category</h2>
    
    <div class="formContainer">
        <form action="index.php" method="post" class="mainForm">
            <input type="hidden" name="action" value="saveeditcategory">

            <input type="hidden" name="categoryID" value="<?php echo $category['categoryID']; ?>">

            <label class="formLabel" for="categoryName">Category Name:</label>
            <input type="text" name="categoryName" id="categoryName" class="formInput submitButtonSpace" value="<?php echo $category['categoryName']; ?>" required>
            <br>

            <button type="submit" class="mainButton submitButton">Submit</button>

        </form>

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="adminview">

            <button type="submit" class="mainButton">Cancel</button>

        </form>

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="confirmation">

            <input type="hidden" name="subaction" value="deletecategory">

            <input type="hidden" name="categoryID" value="<?php echo $category['categoryID']; ?>">

            <input type="hidden" name="categoryName" value="<?php echo $category['categoryName']; ?>">

            <button type="submit" class="mainButton delete">Delete Category</button>

        </form>
    </div>

        
<?php include("../footer.php"); ?>