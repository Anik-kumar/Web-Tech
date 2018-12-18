function validateName(name, nameErr) {
    // var nameErr = $('#nameErr');
    var alphabets = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z','1','2','3','4','5','6','7','8','9','0'];
    var numbers = ['1','2','3','4','5','6','7','8','9','0'];
    var spcChar = ['`','~','!','@','#','$','%','^','&','*','(',')','[',']','{','}',':',';','|','<','>',',','.','/','?','+','='];
    var nameFlag = false;
    var numFlag1 = false;
    var spcFlag1 = false;
    console.log(name);

    if(name != ""){
        name = $.trim(name);
        // -----checking name word for number
        for (let i = 0; i < name.length; i++){
            for (let j = 0; j < numbers.length; j++) {
                if (name[0] == numbers[j]) {
                    numFlag1 = true;
                    break;
                } else {
                    numFlag1 = false;
                }
            }
        }
        // -----checking alphabets
        for (let i = 0; i < name.length; i++) {

            for (let j = 0; j < alphabets.length; j++){
                if(name[i] == alphabets[j]){
                    nameFlag = false;
                    break;
                }else{
                    nameFlag = true;
                }
            }
        }
        // -----checking special characters
        for (let i = 0; i < name.length; i++) {

            for (let j = 0; j < spcChar.length; j++){
                if(name[i] != spcChar[j]){
                    spcFlag = false;
                    break;
                }else{
                    spcFlag = true;
                }
            }
        }

        if(name==""){
            nameErr.html("* Must Enter Name");
            nameErr.css('backgound-color', 'white');
            $('#firstname').css('border-color', 'red');
            return false;
        }else if (numFlag1 == true) {
            nameErr.html("* Name Must Start with Words");
            $('#firstname').css('border-color', 'red');
            return false;
        }else if(spcFlag1 == true){
            nameErr.html("* Only '-'' and '_' are allowed");
            $('#namename').css('border-color', 'red');
            return false;
        }else if(nameFlag == true){
            nameErr.html("* Invalid Characters");
            $('#firstname').css('border-color', 'red');
            $('#lastname').css('border-color', 'red');
            return false;
        }else {
            nameErr.html("");
            $('#firstname').css('border-color', '#ccc');
            $('#lastname').css('border-color', '#ccc');
        }

    }else{
        nameErr.html("* Must Enter Name");
        nameErr.css('backgound-color', 'white');
        $('#firstname').css('border-color', 'red');
        $('#lastname').css('border-color', 'red');
        return false;
    }

}

function validateEmail(email, emailErr) {
    var eFlag = false;
    var ii=0, jj=0;
    email = $.trim(email);
    console.log(email);

    if(email == "" || email==null){
        emailErr.html("<b>* Must Enter Email</b>");
        $('#email').css("border-color", 'red');
        // console.log("a");
    }else{

        for(let i=0; i<email.length; i++){
            // console.log(email[j]);
            ii++;
            if(email[i]=="@"){
                eFlag = false;
                for (let j = i; j < email.length; j++){
                    jj++;
                    if (email[j] == "." && email[j + 1] == "c" && email[j + 2] == "o" && email[j + 3] == "m") {
                        eFlag = false;
                        // console.log(email[j]);
                        break;
                    } else {
                        eFlag = true;
                    }
                }

            }
        }

        if(eFlag){
            emailErr.html("* Email is missing  @  or .com") ;
            $('#email').css("border-color", 'red');
            // console.log("C");
            return false;
        }else if(ii<3 && jj<3){
            emailErr.html("* Invalid Email. Ex: example@abc.com") ;
            $('#email').css("border-color", 'red');
            // console.log("C");
            return false;
        }else{
            emailErr.html("");
            $('#email').css("border-color", '#ccc');
        }
    }

}


function validateSelect(select, selectErr) {
    // alert("asd3f");
    /*var dobDay = $('#day option:selected').val();
    var dobMonth = $('#month option:selected').val();
    var dobYear = $('#year option:selected').val();
    var dobErr = $('#dobErr');*/


    console.log(dobDay + " " + dobMonth + " " + dobYear);

    if (select == "") {
        selectErr.html("* Must enter Date Of Birth");
        $('#year').css("border-color", 'red');
        // $('#month').css("border-color", 'red');
        // $('#day').css("border-color", 'red');
        return false;
    } else{
        dobErr.html("");
        $('#year').css("border-color", '#ccc');
        // $('#month').css("border-color", '#ccc');
        // $('#day').css("border-color", '#ccc');
    }

}


// addDepartment.php---------------
function addDeptValid() {
    var dName = $('#deptname').val();
    var dDescription = $('#description').val();
    // console.log(dName+" "+dDescription);

    if(dName=="" || dName==null){
        $('#deptname').css('border', '2px solid red');
        $('#description').css('border', '#ccc');
        return false;
    }else if(dDescription=="" || dDescription==null){
        $('#description').css('border', '2px solid red');
        $('#deptname').css('border-color', '#ccc');
        return false;
    }else{
        $('#deptname').css('border-color', '#ccc');
        $('#description').css('border-color', '#ccc');
    }

}

// addPatient.php----------
$(document).ready(function () {
    $('#submitBtn').mouseover(function () {
        var admitDate = $('#adminDate').val();
        var relDate = $('#releaseDate').val();
        // console.log(dName+" "+dDescription);

        if(admitDate=="" || admitDate==null){
            $('#adminDate').css('border', '2px solid red');
            $('#admitErr').html(" Select Date ");
            return false;
        }else if(relDate=="" || relDate==null){
            $('#releaseDate').css('border', '2px solid red');
            $('#releaseErr').html(" Select Date ");
            return false;
        }else{
            $('#admitDate').css('border-color', '#ccc');
            $('#releaseDate').css('border-color', '#ccc');
            $('#admitErr').html("");
            $('#releaseErr').html("");
        }
    });
});


// addRoom.php------------
$(document).ready(function () {
    $('#roomSubmitBtn').mouseover(function () {
        var roomType = $('#roomtype').val();
        var location = $('#location').val();
        // console.log(dName+" "+dDescription);

        if(roomType=="" || roomType==null){
            $('#roomtype').css('border', '2px solid red');
            $('#rmtypeErr').html(" Room Type ");
            // return false;
        }else if(location=="" || location==null){
            $('#location').css('border', '2px solid red');
            $('#locErr').html(" Enter Room No ");
            // return false;
        }else{
            $('#roomtype').css('border-color', '#ccc');
            $('#location').css('border-color', '#ccc');
            $('#rmtypeErr').html("");
            $('#locErr').html("");
        }
    });
});

// addRoomType.php----------------
$(document).ready(function () {
    $('#rtSubmitBtn').mouseover(function () {
        var rmtype = $('#roomtype').val();
        var cost = $('#cost').val();
        var capacity = $('#capacity').val();

        if(rmtype=="" || rmtype==null){
            $('#rmErr').html("Enter Room Type");
            $('#roomtype').css("border-color","red");
        }else if(cost=="" || cost==null){
            $('#costErr').html("Enter Room Cost");
            $('#cost').css("border-color", "red");
        }else if(capacity=="" || capacity==null){
            $('#capacityErr').html("Enter Room Capacity");
            $('#capacity').css("border-color", "red");
        }else{
            $('#rmErr').html("");
            $('#roomtype').css("border-color","#ccc");
            $('#costErr').html("");
            $('#cost').css("border-color", "#ccc");
            $('#capacityErr').html("");
            $('#capacity').css("border-color", "#ccc");
        }

    });
});


// changePassword.php
$(document).ready(function () {
    $('#newpass2').focus(function () {
        let oldPass = $('#currpass').val();
        let newPass = $('#newpass').val();

        if(oldPass==""){
            $('#currpass').css("border-color", "red");
        }else if(newPass==""){
            $('#newpass').css('border-color', 'red');
        }else if(oldPass==newPass){
            $('#currpass').css("border-color", "red");
            $('#newpass').css('border-color', 'red');
            $('#npassErr').html('Current Password and New Password can not be Same');
        }else{
            $('#currpass').css("border-color", "#ccc");
            $('#newpass').css('border-color', '#ccc');
            $('#npassErr').html('');
        }


    });

    $('#currpass').blur(function () {
        let curPass = $('#currpass').val();
        if(curPass=="" || curPass==null){
            $('#currpass').css("border-color", "red");
            $('#cpassErr').html('Enter Current Password');
        }else{
            $('#currpass').css("border-color", "#ccc");
            $('#cpassErr').html('');
        }

    });

    $('#newpass').blur(function () {
        let newPass = $('#newpass').val();
        if(newPass=="" || newPass==null){
            $('#newpass').css("border-color", "red");
            $('#npassErr').html('Enter New Password2');
        }else{
            $('#newpass').css("border-color", "#ccc");
            $('#npassErr').html('');
        }
    });

    $('#newpass2').blur(function () {
        let newPass = $('#newpass').val();
        let newPass2 = $('#newpass2').val();
        if(newPass2!="" || newPass2!=null){
            if(newPass!=newPass2){
                $('#n2passErr').html('Passwords did not matched');
                $('#newpass2').css("border-color", "red");
                $('#newpass').css("border-color", "red");
            }else{
                $('#n2passErr').html('');
                $('#newpass2').css("border-color", "#ccc");
                $('#newpass').css("border-color", "#ccc");
            }
        }else{
            $('#newpass2').css("border-color", "red");
            $('#n2passErr').html('Enter Current Password');
        }

    });
});

// updateInfo.php
$(document).ready(function () {
    $('#searchText').blur(function () {
        let text = $('#searchText').val();
        let spcChar = ['`','~','!','#','$','%','^','&','*','(',')','[',']','{','}',':',';','|','<','>',',','/','?','+','='];
        // alert('asdf');

        for (let i = 0; i < text.length; i++) {
            for (let j = 0; j < spcChar.length; j++){
                console.log(text[i]+" "+spcChar[j]);
                if(text[i] != spcChar[j]){
                    spcFlag = false;
                }else{
                    spcFlag = true;
                    break;
                }
            }
        }

        if(spcFlag){
            $('#searchTest').css("border-color", "red");
            $('#searchErr').html('Can Not Search Special Characters');
            // alert('asdf2');
        }else{
            $('#searchTest').css("border-color", "#ccc");
            $('#searchErr').html('');
            // alert('asdf3');
        }

    });
});

// updateInfo2.php
$(document).ready(function () {
    $("#upFirstName").blur(function () {
        let fName = $('#upFirstName').val();
        let fNameErr = $('#firstNameErr');
        // console.log(fName);
        validateName(fName, fNameErr);

    });

    $("#upLastName").blur(function () {
        let lName = $('#upLastName').val();
        let lNameErr = $('#lastNameErr');

        validateName(lName, lNameErr);
    });

    $("#upEmail").blur(function () {
        let email = $('#upEmail').val();
        let emailErr = $('#emailErr');

        validateEmail(email, emailErr);
    });

    $("#upContact").blur(function () {
        let contact = $('#upContact').val();
        let contactErr = $('#contactErr');

        if(contact<5000){
            $('#contact').css("border-color", "red");
            contactErr.html("* Enter a valid Contact No");
        }else{
            $('#contact').css("border-color", "#ccc");
            contactErr.html("");
        }
    });

    $("#upSalary").blur(function () {
        let salary = $('#upSalary').val();
        let salaryErr = $('#salaryErr');

        if(salary<5000){
            $('#salary').css("border-color", "red");
            salaryErr.html("* Minimum Salary  5000");
        }else{
            $('#salary').css("border-color", "#ccc");
            salaryErr.html("");
        }
    });
});

// updateProfileAdmin.php
$(document).ready(function () {
    $('#upFirst').blur(function () {
        let fName = $('#upFirst').val();
        let fNameErr = $('#firstNameErr');
        // console.log(fName);
        validateName(fName, fNameErr);
    });

    $("#upLast").blur(function () {
        let lName = $('#upLast').val();
        let lNameErr = $('#lastNameErr');

        validateName(lName, lNameErr);
    });

    $("#upEmail").blur(function () {
        let email = $('#upEmail').val();
        let emailErr = $('#emailErr');

        validateEmail(email, emailErr);
    });

    $("#upContact").blur(function () {
        let contact = $('#upContact').val();
        let contactErr = $('#contactErr');

        if(contact<5000){
            $('#contact').css("border-color", "red");
            contactErr.html("* Enter a valid Contact No");
        }else{
            $('#contact').css("border-color", "#ccc");
            contactErr.html("");
        }
    });

    $("#upSalary").blur(function () {
        let salary = $('#upSalary').val();
        let salaryErr = $('#salaryErr');

        if(salary<=5000){
            $('#salary').css("border-color", "red");
            salaryErr.html("* Minimum Salary  5000");
        }else{
            $('#salary').css("border-color", "#ccc");
            salaryErr.html("");
        }
    });

});



