<?php


function getPageLink($catgy, $text){
    $pageList = array(
        'department' => array(
            'show' => 'showDepartments.php',
            'add' => 'addDepartment.php',
            'edit' => 'updateDepartment.php',
            'delete' => 'deleteDepartment.php'
        ),
        'appointment' => array(
            'show' => 'showAppointments.php',
            'confirm' => 'confirmAppointments.php',
            'confirm2' => 'confirmAppointments2.php',
            'delete' => 'delAppointments.php' //file not created
        ),
        'ot' => array(
            'show' => 'showOtSchedules.php',
            'add' => 'addOtSchedule.php',
            'delete' => 'delOtSchedule.php' //file not created
        ),
        'patient' => array(
            'add' => 'addPatient.php',
            'show' => 'showPatients.php',
            'admitted' => 'showAdmittedPatients.php',
            'release' => 'releasePatients.php',
            'application' => 'showPatientApplication.php',
            'delete' => ''
        ),
        'room' => array(
            'show' => 'showRooms.php',
            'add' => 'addRoom.php',
            'delete' => 'deleteDepartment.php'
        ),
        'roomType' => array(
            'show' => 'showRoomTypes.php', // not created
            'add' => 'addRoomType.php',
            'delete' => 'deleteRoomType.php' //not created
        ),
        'emp' => array(
            'show' => 'showEmp.php',
            'add' => 'addEmp.php',
            'delete' => 'deleteEmp.php',
            'profile' => 'viewProfile.php'
        ),
        "prescription" => array(
            "show" => "showPrescription.php"//not created
        ),
        "admin" => array(
            "show" => "showAdmins.php",
            "view" => "viewProfile.php"
        ),
        "doctor" => array(
            "show" => "showDoctors.php",
            "profile" => "viewProfile.php",
            "prescription" => "showPrescription.php"//not created,

        ),
        "nurse" => array(
            "show" => "showNurses.php",
            "profile" => "viewProfile.php",
            "prescription" => "showPrescription.php"//not created
        ),
        "account" => array(
            "show" => "showAccountants.php",
            "profile" => "viewProfile.php"
        ),
        "pharma" => array(
            "show" => "showPharmacists.php",
            "profile" => "viewProfile.php"
        ),
        "patho" => array(
            "show" => "showPathologists.php",
            "profile" => "viewProfile.php"
        ),
        "admin2" => array(
            "show" => "showPrescription.php"//not created
        ),
        "doctor2" => array(
            "show" => "showPrescription.php"//not created
        ),
        "patient2" => array(
            "show" => "showPrescription.php"//not created
        ),
        "update" => array(
            "info" => "updateInfo2.php",
            "password" => "changePassword.php"
        ),
        "home" => array(
            "show" => "home.php"
        ),
        "emp2" => array(
            "profile" => "viewProfile.php"
        ),
        "search" => array(
            "show" => "searchAll.php"
        )
    );

    foreach ($pageList as $key => $value){
        if($key == $catgy){
            foreach ($value as $key => $value2){
                if($key == $text){
//                    echo "$key ===> " . $value2 . "<br>";
                    return $value2;
                }
            }
        }
    }



}

//$page = getPageLink("a", "home");
//
//echo "<br> Returned Page ======>".$page;


?>