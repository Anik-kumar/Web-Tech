<?php
/**
 * Created by PhpStorm.
 * User: ANiK
 * Date: 03-Jul-19
 * Time: 11:20 AM
 */

session_start();
//    echo  $_REQUEST['flag'];

    if(isset($_REQUEST['flag']) == true){
        $code = $_REQUEST['code'];
        $id = $_REQUEST['id'];


        switch ($code){
            case "department":      // department
                header("Location: admin.php?f1=department&f2=show");
                break;
            case "addDept":
                header("Location: admin.php?f1=department&f2=add");
                break;
            case "editDept":
                header("Location: admin.php?f1=department&f2=edit&id=$id");
                break;
            case "delDept":
                header("Location: admin.php?f1=department&f2=delete");
                break;
            case "search":
                header("Location: admin.php?f1=search&f2=show");
                break;
            case "admin":       // admin
                header("Location: admin.php?f1=admin&f2=show");
                break;
            case "viewAdminProfile":
                header("Location: admin.php?f1=admin&f2=view&id=$id");
                break;
            case "doctor":         //doctor
                header("Location: admin.php?f1=doctor&f2=show");
                break;
            case "viewEmpProfile":
                header("Location: admin.php?f1=emp&f2=profile&id=$id");
                break;
            case "nurse":          //nurse
                header("Location: admin.php?f1=nurse&f2=show");
                break;
            case "viewNurseProfile":
            header("Location: admin.php?f1=nurse&f2=profile&id=$id");
                break;
            case "patient":         //patient
                header("Location: admin.php?f1=patient&f2=show");
                break;
            case "updatePatInfo":
                header("Location: admin.php?f1=update&f2=info&patId=$id");
                break;
            case "viewPatProfile":
                header("Location: admin.php?f1=account&f2=profile&patId=$id");
                break;
            case "accountant":      //accountant
                header("Location: admin.php?f1=account&f2=show");
                break;
            case "pathologist":    //pathologist
                header("Location: admin.php?f1=patho&f2=show");
                break;
            case "pharmacist":      //pharmacist
                header("Location: admin.php?f1=pharma&f2=show");
                break;
            case "room":            //rooms
                header("Location: admin.php?f1=room&f2=show");
                break;
            case "otschedule":      //operation theatre
                header("Location: admin.php?f1=ot&f2=show");
                break;
            case "allEmp":      //employees
                header("Location: admin.php?f1=emp&f2=show");
                break;
            case "addEmp":      //operation theatre
                header("Location: admin.php?f1=emp&f2=add");
                break;
            case "delEmp":      //operation theatre
                header("Location: admin.php?f1=emp&f2=delete");
                break;

            case "profile":         //profile
                header("Location: admin.php?f1=a&f2=search");
                break;
            case "updateEmpInfo":
                header("Location: admin.php?f1=update&f2=info&id=$id&patId=$patId");
                break;
            case "changePass":
                header("Location: admin.php?f1=update&f2=password");
                break;
            case "editDept":
                header("Location: admin.php?f1=department&f2=edit");
                break;
            case "delDept":
                header("Location: admin.php?f1=department&f2=delete");
                break;
            case "search":
                header("Location: admin.php?f1=a&f2=search");
                break;

            default:
                header("Location: admin.php?f1=home&f2=show");

        }

        $uri = $_SERVER['REQUEST_URI'];
        $link = explode('/', $uri);
        print_r($link);

    }

?>