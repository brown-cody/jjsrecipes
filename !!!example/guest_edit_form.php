<?php include('../view/header.php'); ?>

<main>
    <h2>Edit Guest</h2>
    <p class="error"><?php if (isset($error) == TRUE) echo $error; ?></p>
    <form class="mainForm" action="index.php" method="post">
        <input type="hidden" name="action" value="guest_edit">
        <input type="hidden" name="guestID" value="<?php echo $guest['guestID']; ?>">
        
        <label>First Name:</label>
        <input type="text" name="firstName" class="textBox" value="<?php echo $guest['firstName']; ?>">
        <br>
        
        <label>Last Name:</label>
        <input type="text" name="lastName" class="textBox" value="<?php echo $guest['lastName']; ?>">
        <br>
        
        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" <?php if ($guest['gender'] == 'Male') {echo 'checked';} ?>>&nbsp;Male<br>
        <label class="smallPadding">&nbsp;</label>
        <input type="radio" name="gender" value="Female" <?php if ($guest['gender'] == 'Female') {echo 'checked';} ?>>&nbsp;Female
        <br>
        
        <label>Age:</label>
        <input type="number" name="age" class="code" maxlength="3" value="<?php echo $guest['age']; ?>">
        <br>
        
        <label>Ethnicity:</label>
        <select name="ethnicityID" class="selectBox">
            <?php foreach($ethnicities as $ethnicity): ?>
                <option value="<?php echo $ethnicity['ethnicityID']; ?>"  <?php if ($guest['ethnicityID'] == $ethnicity['ethnicityID']) {echo 'selected';} ?>>
                    <?php echo $ethnicity['ethnicityName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        
        <label>Zip Code:</label>
        <input type="number" name="zipCode" class="zipCode" maxlength="5" value="<?php echo $guest['zipCode']; ?>">
        <br>
        
        <label class="doubleWide">Premium Television Subscriber:</label>
        <label class="smallPadding">&nbsp;</label>
        <input type="radio" name="subscriber" value="No" <?php if ($guest['subscriber'] == 'No') {echo 'checked';} ?>>&nbsp;No<br>
        <label class="smallPadding">&nbsp;</label>
        <input type="radio" name="subscriber" value="Yes" <?php if ($guest['subscriber'] == 'Yes') {echo 'checked';} ?>>&nbsp;Yes
        <br>
        
        <button type="submit" class="mainButton">Submit</button>

    </form>
    
</main>
    
<?php include('../view/footer.php'); ?>