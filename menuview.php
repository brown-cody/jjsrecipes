<?php include("header.php"); ?>

        <h2>Menu</h2>
        
        <?php foreach($categories as $category): ?>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="categoryview">
                <input type="hidden" name="categoryID" value="<?php echo $category['categoryID'];?>">
                <button class="categoryButton" type="submit"><?php echo $category['categoryName'];?></button>
            </form>
        <?php endforeach; ?>


<?php include("footer.php"); ?>