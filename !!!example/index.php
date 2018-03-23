<?php
// Get the database connection to guest_tracker
require('model/database.php');

// Get the models
require('model/session_db.php');
require('model/guest_db.php');
require('model/guestsession_db.php');
require('model/room_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL) {
        $action = 'main_menu';
    }
}  

switch ($action) {
    case 'main_menu':
        include('main_menu.php');
        break;    
    case 'session_setup':
        header('Location: session_setup/index.php');
        break;
    case 'guest_registration':
        $sessions = get_sessions();
        if ($sessions == NULL || $sessions == FALSE) {
            $error = 'You cannot register guests because no sessions have been set up for today.';
            include('main_menu.php');
        } else {
            header('Location: guest_registration/index.php');
        }
        break;
    case 'reports':
        header('Location: reports/index.php');
        break;
        
        
         
    
    
    
    //this set of arrays and functionality of the application is solely for demonstration purposes and would not be intended for a deliverable to a client
       
        
        
        
    case 'build_database':
        
        
        //BUILD SESSION DATABASE
        
        $sessionsQty = 8;
        
        $rooms = array(1, 2, 3, 6, 7, 8);
        $minutes = array('00', '15', '30', '45');
        
        $shows = rand(2, 4);
        $code = array();
                
        for ($i = 0; $i < $shows; $i++) {
            $codeString = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(3/strlen($x)) )),1,3);
            array_push($code, $codeString);
        }
        
        for($i = 1; $i <= $sessionsQty; $i++) {
            $roomNum = $rooms[rand(0, count($rooms)-1)];
            
            $hour = rand(10, 20);
            $minute = $minutes[rand(0, count($minutes)-1)];
            $time = $hour.':'.$minute;
            
            $showCode = $code[rand(0, count($code)-1)];
            
            $randomBin = rand(0, 1);
            if ($randomBin == 1) {
                $incentive = 'Yes';
            } else {
                $incentive = 'No';
            }
            
            session_add($roomNum, $time, $showCode, $incentive);
        }
        

        //BUILD GUEST DATABASE    
        
        $guestsQty = 80;
                
        $firstListM = array("James", "John", "Robert", "Michael", "William", "David", "Richard", "Joseph", "Thomas", "Charles");
        $firstListF = array("Mary", "Patricia", "Jennifer", "Elizabeth", "Linda", "Barbara", "Susan", "Jessica", "Margaret", "Sarah");
        $lastList = array("Smith", "Johnson", "Williams", "Jones", "Brown", "Davis", "Miller", "Wilson", "Moore", "Taylor", "Anderson", "Thomas", "Jackson", "White", "Harris", "Martin", "Thompson", "Garcia", "Martinez", "Robinson");
        
        for ($i = 1; $i <= $guestsQty; $i++){
            $lastName = $lastList[rand(0, count($lastList)-1)];
            
            $randomBin = rand(0, 1);
            if ($randomBin == 1) {
                $gender = 'Male';
                $firstName = $firstListM[rand(0, count($firstListM)-1)];
            } else {
                $gender = 'Female';
                $firstName = $firstListF[rand(0, count($firstListF)-1)];
            }
            
            $age = rand(18, 75);
            $ethnicityID = rand(1, 5);
            $zipCode = rand(10000, 99999);
            
            $randomBin = rand(0, 1);
            if ($randomBin == 1) {
                $subscriber = 'Yes';
            } else {
                $subscriber = 'No';
            }
            
            guest_add($firstName, $lastName, $gender, $age, $ethnicityID, $zipCode, $subscriber);
        }
        
        //BUILD GUEST SESSION DATABASE
        
        $guests = get_guests();
        $sessions = get_sessions_ID();
        $count = 0;
        
        foreach ($sessions as $session) {
            $sessionIDmax = $session['sessionID']; //1725
            $count++; //10
        }
        
        $sessionIDmin = $sessionIDmax - $count + 1;
        
        foreach ($guests as $guest) {
            
            $sessionID = rand($sessionIDmin, $sessionIDmax);
            
            guestsession_add($guest['guestID'], $sessionID);
        }
        
        
    
        $message = "Session and Guest Databases built.";
        include('main_menu.php');
        break;
    case 'clear_today':
        guest_delete_today();
        session_delete_today();
        guestsession_delete_today();
        $message = "Today's data cleared.";
        include('main_menu.php');
        break;
}
