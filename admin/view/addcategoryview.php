<?php include("../header.php"); ?>

    <h2>Add Category</h2>
    
    <div class="formContainer">
        <form action="index.php" method="post" class="mainForm">
            <input type="hidden" name="action" value="saveaddcategory">

            <label for="categoryName" class="formLabel">Category Name:</label>
            <input type="text" name="categoryName" id="categoryName" class="formInput submitButtonSpace" required>

            <br>
            <button type="submit" class="mainButton submitButton">Submit</button>

        </form>

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="adminview">

            <button type="submit" class="mainButton">Cancel</button>

        </form>
    </div>

        
<?php include("../footer.php"); ?>