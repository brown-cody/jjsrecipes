<?php include("../header.php"); ?>

    <h2>Admin Console</h2>
    <h3 class="error"><?php if(isset($error)) echo $error; ?></h3>
    <h3><?php if(isset($success)) echo $success; ?></h3>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="addcategory">
        <button type="submit" class="mainButton">Add Category</button>
    </form>
    
    <table class="categoryTable">

        <?php foreach($categories as $category): ?>
            <?php echo "<tr><td>"; ?>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="editcategory">
                <input type="hidden" name="categoryID" value="<?php echo $category['categoryID'];?>">
                <button type="submit" class="editButton">Edit</button>
            </form>
            <?php echo "</td><td>"; ?>
            <?php echo $category["categoryName"]; ?>
            <?php echo "</td></tr>"; ?>
            
        <?php endforeach; ?>
    </table>

    <hr>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="addrecipe">
        <button type="submit" class="mainButton">Add Recipe</button>
    </form>
    <h4>To add or change an image, click on the thumbnail, select the image, then click on the UP arrow.</h4>
    <br>

    <table class="recipeTable">
        <tr>
            <th></th>
            <th>Name</th>
            <th>Category</th>
            <th class="hideContributor">Contributor</th>
            <th>Image</th>
            <th class="hideDates">Updated</th>
            <th class="hideDates">Added</th>
        </tr>
        <?php foreach($recipes as $recipe): ?>
            <tr>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="editrecipe">
                        <input type="hidden" name="recipeID" value="<?php echo $recipe['recipeID'];?>">
                        <button type="submit" class="editButton">Edit</button>
                    </form>
                </td>
                <td>
                    <?php echo $recipe["recipeName"]; ?>
                </td>
                <td>
                    <?php
                        if ($recipe['recipeCategory'] == null) {
                            echo "<div style='background:red;'>ORPHAN</div>";    
                        } else foreach($categories as $category) {
                            if ($recipe['recipeCategory'] == $category['categoryID']) {
                                echo $category['categoryName'];
                            }
                        }


                    ?>
                </td>
                <td  class="hideContributor">
                    <?php echo $recipe["recipeContributor"]; ?>
                </td>
                <td class="imageCell">
                    
                    <form action="index.php" method="post" class="formFloat middle">
                        <input type="hidden" name="action" value="confirmation">
                        
                        <input type="hidden" name="subaction" value="deleteimage">
        
                        <input type="hidden" name="recipeID" value="<?php echo $recipe['recipeID']; ?>">
        
                        <button type="submit" class="uploadButton middle delete <?php if (file_exists("../images/".$recipe['recipeID'].".jpg")) {}else{echo "notVisible";} ?>">X</button>

                    </form>
                    
                    <form action="index.php" method="post" enctype="multipart/form-data" class="formFloat">
                        <input type="hidden" name="action" value="upload">
                        <input type="hidden" name="recipeID" value="<?php echo $recipe['recipeID'];?>">
                        <input type="hidden" name="recipeName" value="<?php echo $recipe['recipeName'];?>">
                        <input type="file" name="imageUpload<?php echo $recipe['recipeID'];?>" id="imageUpload<?php echo $recipe['recipeID'];?>" class="hidden">
                        <label for="imageUpload<?php echo $recipe['recipeID'];?>" class="imageLabel middle">
                            <?php
                                if (file_exists("../images/".$recipe['recipeID'].".jpg")) {
                                    echo '<img src="../images/'.$recipe['recipeID'].'.jpg" class="uploadIcon middle">';
                                } else {
                                    echo '<img src="image.png" class="uploadIcon middle">';
                                }
                            ?>
                            
                        </label>
                        <button type="submit" name="SubmitBtn" class="uploadButton middle">&#8593</button>
                    </form>
                    
                    
                    
                    
                    
                    
                    
    
                </td>
                <td class="hideDates">
                    <?php echo $recipe["recipeDateEdited"]; ?>
                </td>
                <td class="hideDates">
                    <?php echo $recipe["recipeDateAdded"]; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
        
<?php include("../footer.php"); ?>