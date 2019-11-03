<?php
$conn = getConnection();

$getAdmin = "SELECT * FROM employee WHERE user_type='Admin'";
$getDoctor = "SELECT * FROM employee WHERE user_type='Doctor'";
$getNurse = "SELECT * FROM employee WHERE user_type='Nurse'";
$getPatient = "SELECT * FROM patients WHERE user_type='Patient'";
$getAccountant = "SELECT * FROM employee WHERE user_type='Accountant'";
$getPharmacist = "SELECT * FROM employee WHERE user_type='Pharmacist'";
$getPathologist = "SELECT * FROM employee WHERE user_type='Pathologist'";
$getAppointment = "SELECT * FROM appointment";
$getOT = "SELECT * FROM ot_schedules";
$getBirthList = "SELECT * FROM child_birth";
$getDeathList = "SELECT * FROM deaths";
$getMorgueList = "SELECT * FROM death_list WHERE inMorgue='Yes'";
$getDept = "SELECT * FROM department";

$resultAdmin = mysqli_query($conn, $getAdmin);
$resultDoc = mysqli_query($conn, $getDoctor);
$resultNurse = mysqli_query($conn, $getNurse);
$resultPatient = mysqli_query($conn, $getPatient);
$resultAcc = mysqli_query($conn, $getAccountant);
$resultPharma = mysqli_query($conn, $getPharmacist);
$resultPathology = mysqli_query($conn, $getPathologist);
$resultAppoint = mysqli_query($conn, $getAppointment);
$resultOT = mysqli_query($conn, $getOT);
$resultBirth = mysqli_query($conn, $getBirthList);
$resultDeath = mysqli_query($conn, $getDeathList);
$resultMorgue = mysqli_query($conn, $getMorgueList);
$resultDept = mysqli_query($conn, $getDept);

$numAdmin = mysqli_num_rows($resultAdmin);
$numDoctor = mysqli_num_rows($resultDoc);
$numNurse = mysqli_num_rows($resultNurse);
$numPatient = mysqli_num_rows($resultPatient);
$numAcc = mysqli_num_rows($resultAcc);
$numPharma = mysqli_num_rows($resultPharma);
$numPathology = mysqli_num_rows($resultPathology);
$numAppoint = mysqli_num_rows($resultAppoint);
$numOT = mysqli_num_rows($resultOT);
$numBirth = mysqli_num_rows($resultBirth);
$numDeath = mysqli_num_rows($resultDeath);
//$numMorgue = mysqli_num_rows($resultMorgue);
$numDept = mysqli_num_rows($resultDept);
//$num = mysqli_num_rows($result);



?>



<h1>Admin Home Page </h1>
<h2>Dashboard</h2>

<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="adminDiv">
        <a class="button" href="router.php?flag=true&code=admin">
            <div id="">
                <div class="div-pic">
                    <img src="resources/images/admin6.png" alt="Admin" title="Administration Person" >
                </div>
                <div class="div-body">
                    <h2 class="bottom-padding-20"><span> <?=$numAdmin?> </span>   Admin</h2>
                </div>
            </div>

        </a>
    </div>
</div>

<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="doctorDiv">
        <a class="button" href="router.php?flag=true&code=doctor">
            <div class="div-pic">
                <img src="resources/images/doctor1.png" alt="Doctor" title="Doctor Person" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numDoctor?></span>   Doctor</h2>
            </div>
        </a>
    </div>
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="patientDiv">
        <a class="button" href="router.php?flag=true&code=patient">
            <div class="div-pic">
                <img src="resources/images/patient5.png" alt="Patient" title="Patient Person" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numPatient?></span>   Patient</h2>
            </div>
        </a>
    </div>
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="nurseDiv">
        <a class="button" href="router.php?flag=true&code=nurse">
            <div class="div-pic">
                <img src="resources/images/nurse9.png" alt="Nurse" title="Nurse Person" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numNurse?></span>   Nurse</h2>
            </div>
        </a>
    </div>
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="accountDiv">
        <a class="button" href="router.php?flag=true&code=accountant">
            <div class="div-pic">
                <img src="resources/images/accounting2.png" alt="Accountant" title="Accountant Person" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numAcc?></span>   Accountant</h2>
            </div>
        </a>
    </div>
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="pharmaDiv">
        <a class="button" href="router.php?flag=true&code=pharmacist">
            <div class="div-pic">
                <img src="resources/images/pharmacy.png" alt="Pharmacy" title="Pharmacy Person" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numPharma?></span>   Pharmacist</h2>
            </div>
        </a>
    </div>
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="labDiv">
        <a class="button" href="router.php?flag=true&code=pathologist">
            <div class="div-pic">
                <img src="resources/images/pathology2.jpg" alt="Pathology" title="Pathology Person" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numPathology?></span>  Pathologist </h2>
            </div>

        </a>
    </div>
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="appointDiv">
        <a class="button" href="#">
            <div class="div-pic">
                <img src="resources/images/appointment2.png" alt="Appointment" title="Appointment List" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numAppoint?></span> Appointment </h2>
            </div>

        </a>
    </div>
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="otDiv">
        <a class="button" href="#">
            <div class="div-pic">
                <img src="resources/images/ot.png" alt="Operating Schedule" title="Operating Schedule List" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numOT?></span>  Operating Theater </h2>
            </div>

        </a>
    </div>
</div>

<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="birthDiv">
        <a class="button" href="#">
            <div class="div-pic">
                <img src="resources/images/birth.png" alt="Child Birth" title="Child Birth List" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numBirth?></span>  Child Birth List </h2>
            </div>

        </a>
    </div>
</div>

<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="deptDiv">
        <a class="button" href="router.php?flag=true&code=department">
            <div class="div-pic">
                <img src="resources/images/dept.png" alt="Department" title="Department List" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numDept?></span>  Department </h2>
            </div>

        </a>
    </div>
</div>

<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    <div id="deathDiv">
        <a  class="button" href="#">
            <div class="div-pic">
                <img src="resources/images/death4.png" alt="Death" title="Death List" >
            </div>
            <div class="div-body">
                <h2 class="bottom-padding-20"><span><?=$numDeath?></span>  Death List </h2>
            </div>

        </a>
    </div>
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">

</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    
</div>
<div class="innerDiv col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
    
</div>












