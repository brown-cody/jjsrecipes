<?php
// Get the database connection to guest_tracker
require('../model/database.php');

// Get the models
require('../model/session_db.php');
require('../model/guest_db.php');
require('../model/ethnicity_db.php');
require('../model/guestsession_db.php');
require('../model/room_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL) {
        $action = 'guest_view';
    }
}  

switch ($action) {
    case 'guest_view':
        
        
        $guests = get_guests();

        if (count($guests) == 0) {
            $hide = TRUE;
            $message = 'No guests have registered today.';
        }

        $ethnicities = get_ethnicities();

        include('guest_view.php');
        
        break;
        
    case 'guest_add_form':
        $ethnicities = get_ethnicities();
        include('guest_add_form.php');
        break;
    
    case 'guest_add' :
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $ethnicityID = filter_input(INPUT_POST, 'ethnicityID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $zipCode = filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_STRING);
        $subscriber = filter_input(INPUT_POST, 'subscriber', FILTER_SANITIZE_STRING);
        
        $ethnicities = get_ethnicities();
        
        if ($firstName == NULL || $firstName == FALSE || preg_match('/^[a-zA-Z\s]+$/', $firstName) == 0) {
            $error = 'Please enter a valid First Name.';
            include('guest_add_form.php');
        } else if ($lastName == NULL || $lastName == FALSE || preg_match('/^[a-zA-Z\s]+$/', $lastName) == 0) {
            $error = 'Please enter a valid Last Name.';
            include('guest_add_form.php');
        } else if ($gender == NULL || $gender == FALSE) {
            $error = 'Please make a Gender selection.';
            include('guest_add_form.php');
        } else if ($age == NULL || $age == FALSE || $age < 0 || $age > 120) {
            $error = 'Please enter a valid Age.';
            include('guest_add_form.php');
        } else if ($age < 18) {
            $error = 'You must be 18 years old to participate.';
            include('guest_add_form.php');
        } else if ($ethnicityID == NULL || $ethnicityID == FALSE) {
            $error = 'Please select an Ethnicity.';
            include('guest_add_form.php');
        } else if ($zipCode == NULL || $zipCode == FALSE || preg_match ('/^[0-9]{5}$/', $zipCode) == 0) {
            $error = 'Please enter a valid Zip Code.';
            include('guest_add_form.php');
        } else if ($subscriber == NULL || $subscriber == FALSE) {
            $error = 'Please select whether you subscribe to premium television (HBO, Showtime, Netflix, Hulu, etc.).';
            include('guest_add_form.php');
        } else {
            guest_add($firstName, $lastName, $gender, $age, $ethnicityID, $zipCode, $subscriber);
            $guest = get_last_guest();
            $sessions = get_sessions();
            include('add_guest_session_form.php');
        }
        break;
        
    case 'add_guest_session_form':
        $guestID = filter_input(INPUT_POST, 'guestID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        $guestSessions = get_guestsession($guestID);
        $sessions = get_sessions();
        $i = 0;
        $sessionCheck = array();
        
        foreach ($guestSessions as $guestSession) {
            $sessionCheck[$i] = $guestSession['sessionID'];
        }
        
        
        
        
        
        
        $guest = get_guest($guestID);
        
        include('add_guest_session_form.php');
        break;
    
    case 'add_guest_session':
        $sessionID = filter_input(INPUT_POST, 'sessionID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $guestID = filter_input(INPUT_POST, 'guestID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        guestsession_add($guestID, $sessionID);
        $ethnicities = get_ethnicities();
        $guests = get_guests();
        include('guest_view.php');
        break;
    
    case 'guest_session_delete':
        $sessionID = filter_input(INPUT_POST, 'sessionID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $guestID = filter_input(INPUT_POST, 'guestID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        guestsession_delete($guestID, $sessionID);
        
        $ethnicities = get_ethnicities();
        $guests = get_guests();
        include('guest_view.php');
        
        break;
        
    case 'guest_edit_form':
        $guestID = filter_input(INPUT_POST, 'guestID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        $ethnicities = get_ethnicities();
        $guest = get_guest($guestID);
        
        include('guest_edit_form.php');
        break;
    
    case 'guest_edit':
        $guestID = filter_input(INPUT_POST, 'guestID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $ethnicityID = filter_input(INPUT_POST, 'ethnicityID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $zipCode = filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_STRING);
        $subscriber = filter_input(INPUT_POST, 'subscriber', FILTER_SANITIZE_STRING);
        
        $ethnicities = get_ethnicities();
        $guest = get_guest($guestID);
        
        if ($firstName == NULL || $firstName == FALSE || preg_match('/^[a-zA-Z\s]+$/', $firstName) == 0) {
            $error = 'Please enter a valid First Name.';
            include('guest_edit_form.php');
        } else if ($lastName == NULL || $lastName == FALSE || preg_match('/^[a-zA-Z\s]+$/', $lastName) == 0) {
            $error = 'Please enter a valid Last Name.';
            include('guest_edit_form.php');
        } else if ($gender == NULL || $gender == FALSE) {
            $error = 'Please make a Gender selection.';
            include('guest_edit_form.php');
        } else if ($age == NULL || $age == FALSE || $age < 0 || $age > 120) {
            $error = 'Please enter a valid Age.';
            include('guest_edit_form.php');
        } else if ($age < 18) {
            $error = 'You must be 18 years old to participate.';
            include('guest_edit_form.php');
        } else if ($ethnicityID == NULL || $ethnicityID == FALSE) {
            $error = 'Please select an Ethnicity.';
            include('guest_edit_form.php');
        } else if ($zipCode == NULL || $zipCode == FALSE || preg_match ('/^[0-9]{5}$/', $zipCode) == 0) {
            $error = 'Please enter a valid Zip Code.';
            include('guest_edit_form.php');
        } else if ($subscriber == NULL || $subscriber == FALSE) {
            $error = 'Please select whether you subscribe to premium television (HBO, Showtime, Netflix, Hulu, etc.).';
            include('guest_edit_form.php');
        } else {
            guest_edit($guestID, $firstName, $lastName, $gender, $age, $ethnicityID, $zipCode, $subscriber);
            $guests = get_guests();
            include('guest_view.php');
        }
        break;
    
    case 'guest_delete_confirm':
        $guestID = filter_input(INPUT_POST, 'guestID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        $ethnicities = get_ethnicities();
        $guestInfo = get_guest($guestID);
        
        include('guest_delete_confirm.php');
        break;
    
    case 'guest_delete':
        $guestID = filter_input(INPUT_POST, 'guestID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        guest_delete($guestID);
        
        $guests = get_guests();
        
        if (count($guests) == 0) {
            $hide = TRUE;
            $message = 'No guests have registered today.';
        }
        
        $ethnicities = get_ethnicities();
        
        $guestSessions = get_guestsession($guestID);
        
        if ($guestSessions == FALSE || $guestSessions == NULL) {
            $message = 'Guest successfully deleted';
        } else {
            $message = 'Guest and guest sessions successfully deleted.';
        }
        
        all_guestsession_delete($guestID);
        
        include('guest_view.php');
        break;
        
}
