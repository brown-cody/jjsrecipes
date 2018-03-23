<?php include("../header.php"); ?>

    <h2>Edit Category</h2>
    

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="saveeditcategory">
        
        <input type="hidden" name="categoryID" value="<?php echo $category['categoryID']; ?>">
        
        <label>Category Name:</label>
        <input type="text" name="categoryName" value="<?php echo $category['categoryName']; ?>" required>
        
        
        <button type="submit" class="mainButton">Submit</button>

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
    

        
<?php include("../footer.php"); ?>