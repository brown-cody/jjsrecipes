<?php include("../header.php"); ?>

    <h2>Confirmation</h2>
    <br>
    <h3>
        Are you sure you want to delete this
        <?php
            
            switch ($subaction) {
                case 'deletecategory':
                    echo "category?"; 
                    break;
                case 'deleterecipe':
                    echo "recipe?";
                    break;
                case 'deleteimage':
                    echo "image?";
                    break;
            }
        
        ?>
        
    </h3>
    <br>
    <h3 class="delete"><?php echo $categoryName; ?></h3>
    <h3 class="delete"><?php echo $recipeName; ?></h3>


    <form action="index.php" method="post">
        <input type="hidden" name="action" value="<?php echo $subaction; ?>">
        
        <input type="hidden" name="categoryID" value="<?php echo $categoryID; ?>">
    
        <input type="hidden" name="recipeID" value="<?php echo $recipeID; ?>">
    
        <input type="hidden" name="imageName" value="<?php echo $imageName; ?>">
        
        <button type="submit" class="mainButton delete">Yes, Delete</button>

    </form>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="adminview">
                
        <button type="submit" class="mainButton">Cancel</button>

    </form>

    <?php
        if ($subaction == 'deleteimage') {
            echo '<img src="../images/'.$recipeID.'.jpg" class="image">';
        }
    ?>

    
    

        
<?php include("../footer.php"); ?>