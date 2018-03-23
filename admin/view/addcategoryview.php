<?php include("../header.php"); ?>

    <h2>Add Category</h2>
    

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="saveaddcategory">
        
        <label>Category Name:</label>
        <input type="text" name="categoryName" required>
        
        
        <button type="submit" class="mainButton">Submit</button>

    </form>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="adminview">
                
        <button type="submit" class="mainButton">Cancel</button>

    </form>
    

        
<?php include("../footer.php"); ?>