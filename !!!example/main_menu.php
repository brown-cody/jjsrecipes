<?php include('view/header.php'); ?>

<h2>Instructions:</h2>
<ol>
    <li>Set up sessions for the day.</li>
    <li>Register guests for one or more sessions.</li>
    <li>Run reports for usage statistics.</li>
</ol>

<?php if (isset($error)) {echo '<p class="error">'.$error.'</p>';} ?>


<main>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="session_setup">
        <button class="mainButton" type="submit">Session Setup</button>
    </form>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="guest_registration">
        <button class="mainButton" type="submit">Guest Registration</button>
    </form>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="reports">
        <button class="mainButton" type="submit">Reports</button>
    </form>
    
    <br>
    <br>
    
    
    
    <h2>For Class Purposes:</h2>
    <?php if (isset($message)) {echo '<p class="message">'.$message.'</p>';} ?>
    
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="build_database">
        <button class="mainButton" type="submit">Build Database</button>
    </form>
    <p>Builds a random database of sessions and guests for today.</p>
    
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="clear_today">
        <button class="mainButton delete" type="submit">Clear Today</button>
    </form>
    <p>Clears all sessions and guests from today.</p>
    
</main>
    
<?php include('view/footer.php'); ?>