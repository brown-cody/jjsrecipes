<?php include("header.php"); ?>

        <h2>Menu</h2>
        <br>
        <form action="index.php" method="post" class="searchForm">
            <input type="hidden" name="action" value="search">
            <input type="text" name="searchText" class="searchField">
            <button type="submit" class="searchButton"><img src="view/search.png" class="icon"></button>
        </form>
<br>

        <?php foreach($categories as $category): ?>
            <form action="index.php" method="get">
                <input type="hidden" name="action" value="categoryview">
                <input type="hidden" name="categoryID" value="<?php echo $category['categoryID'];?>">
                <button class="categoryButton" type="submit"><?php echo $category['categoryName'];?></button>
            </form>
        <?php endforeach; ?>


<?php include("footer.php"); ?>