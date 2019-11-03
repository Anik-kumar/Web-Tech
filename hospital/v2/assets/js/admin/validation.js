
$(document).ready(function () {
    $("#firstname, #lastname").focus(function () {
        validDept();
        validUserType();
    });

    $("#firstname , #lastname").blur(function () {

        var first = $('#firstname').val();
        var last = $('#lastname').val();
        var nameErr = $('#nameErr');
        var alphabets = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z','1','2','3','4','5','6','7','8','9','0'];
        var numbers = ['1','2','3','4','5','6','7','8','9','0'];
        var spcChar = ['`','~','!','@','#','$','%','^','&','*','(',')','[',']','{','}',':',';','|','<','>',',','.','/','?','+','='];
        var firstFlag = false;
        var lastFlag = false;
        var numFlag1 = false;
        var numFlag2 = false;
        var spcFlag1 = false;
        var spcFlag2 = false;

        if(first != "" || last != ""){
            first = $.trim(first);
            last = $.trim(last);
            // -----checking first word for number
            for (let i = 0; i < first.length; i++){
                for (let j = 0; j < numbers.length; j++) {
                    if (first[0] == numbers[j]) {
                        numFlag1 = true;
                        break;
                    } else {
                        numFlag1 = false;
                    }
                }
            }

            for (let i = 0; i < last.length; i++){
                for (let j = 0; j < numbers.length; j++) {
                    if (last[0] == numbers[j]) {
                        numFlag2 = true;
                        break;
                    } else {
                        numFlag2 = false;
                    }
                }
            }
            // -----checking alphabets
            for (let i = 0; i < first.length; i++) {
                for (let j = 0; j < alphabets.length; j++){
                    if(first[i] == alphabets[j]){
                        firstFlag = false;
                        break;
                    }else{
                        firstFlag = true;
                    }
                }
            }

            for (let i = 0; i < last.length; i++) {
                for (let j = 0; j < alphabets.length; j++){
                    if(last[i] == alphabets[j]){
                        lastFlag = false;
                        break;
                    }else{
                        lastFlag = true;
                    }
                }
            }
            // -----checking special characters
            for (let i = 0; i < first.length; i++) {
                for (let j = 0; j < spcChar.length; j++){
                    if(first[i] != spcChar[j]){
                        spcFlag = false;
                        break;
                    }else{
                        spcFlag = true;
                    }
                }
            }

            for (let i = 0; i < last.length; i++) {
                for (let j = 0; j < spcChar.length; j++){
                    if(last[i] != spcChar[j]){
                        spcFlag = false;
                        break;
                    }else{
                        spcFlag = true;
                    }
                }
            }
            if(first==""){
                nameErr.html("<b>* Must Enter First Name</b>");
                nameErr.css('backgound-color', 'white');
                $('#firstname').css('border-color', 'red');
                return false;
            }else if (numFlag1 == true) {
                nameErr.html("<b>* Name Must Start with Words</b>");
                $('#firstname').css('border-color', 'red');
                return false;
            }else if(spcFlag1 == true){
                nameErr.html("<b>* Only '-'' and '_' are allowed</b>");
                $('#firstname').css('border-color', 'red');
                return false;
            }else if(firstFlag == true){
                nameErr.html("<b>* Invalid Characters</b>");
                $('#firstname').css('border-color', 'red');
                $('#lastname').css('border-color', 'red');
                return false;
            }else if(last==""){
                nameErr.html("<b>* Must Enter Last Name</b>");
                nameErr.css('backgound-color', 'white');
                $('#lastname').css('border-color', 'red');
                return false;
            }else if (numFlag2 == true) {
                nameErr.html("<b>* Name Must Start with Words</b>");
                $('#lastname').css('border-color', 'red');
                return false;
            }else if(spcFlag2 == true){
                nameErr.html("<b>* Only '-'' and '_' are allowed</b>");
                $('#lastname').css('border-color', 'red');
                return false;
            }else if(lastFlag == true){
                nameErr.html("<b>* Invalid Characters</b>");
                $('#firstname').css('border-color', 'red');
                $('#lastname').css('border-color', 'red');
                return false;
            }else {
                nameErr.html("");
                $('#firstname').css('border-color', '#ccc');
                $('#lastname').css('border-color', '#ccc');
            }
        }else{
            nameErr.html("<b>* Must Enter First Name or Last Name</b>");
            nameErr.css('backgound-color', 'white');
            $('#firstname').css('border-color', 'red');
            $('#lastname').css('border-color', 'red');
            return false;
        }

    });

});



$(document).ready(function () {
    $('#password1').blur(function () {
        var pass1 = $('#password1').val();
        var pass2 = $('#password2').val();

        if(pass1!=""){
            $('#password1').css('border-color', "#ccc");
            $('#password2').css('border-color', "#ccc");
            $('#passErr').html("");
        }else{
            $('#password1').css('border-color', "red");
            $('#passErr').html("* Enter Password");
        }
    });

    $('#password2').blur(function () {
        var pass1 = $('#password1').val();
        var pass2 = $('#password2').val();

        if(pass2!=""){
            if(pass1!=pass2){
                $('#password1').css('border-color', "red");
                $('#password2').css('border-color', "red");
                $('#passErr').html("<b>* Password Does not Match</b>");
            }else{
                $('#password1').css('border-color', "#ccc");
                $('#password2').css('border-color', "#ccc");
                $('#passErr').html("");
            }
        }else{
            $('#password2').css('border-color', "red");
            $('#passErr').html("<b>* Enter Password</b>");
        }
    });
});
	// alert("asdf");



$(document).ready(function () {
   $('#email').blur(function () {
       var email = $('#email').val();
       var emailErr = $('#emailErr');
       var eFlag = false;
       var ii=0, jj=0;
       email = $.trim(email);
       console.log(email);

       if(email == "" || email==null){
           emailErr.html("<b>* Must Enter Email</b>");
           $('#email').css("border-color", 'red');
           console.log("a");
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
   });
});


function validDOB() {
	// alert("asd3f");
    var dobDay = $('#day option:selected').val();
    var dobMonth = $('#month option:selected').val();
    var dobYear = $('#year option:selected').val();
    var dobErr = $('#dobErr');

    console.log(dobDay + " " + dobMonth + " " + dobYear);

    if (dobDay == "" || dobMonth == "" || dobYear == "") {
        dobErr.html("* Must enter Date Of Birth");
        $('#year').css("border-color", 'red');
        $('#month').css("border-color", 'red');
        $('#day').css("border-color", 'red');
        return false;
    } else{
        dobErr.html("");
        $('#year').css("border-color", '#ccc');
        $('#month').css("border-color", '#ccc');
        $('#day').css("border-color", '#ccc');
    }

}

$(document).ready(function () {
    $('#contact').focus(function (){
        validDOB();
        validGender();
    });
});

$(document).ready(function () {
   $('#contact').blur(function () {
       validGender();
       validDOB();
       var contact = $('#contact').val();
       var contactErr = $('#contactErr');

       if(contact<5000){
           $('#contact').css("border-color", "red");
           contactErr.html("* Enter a valid Contact No");
       }else{
           $('#contact').css("border-color", "#ccc");
           contactErr.html("");
       }
   });
});


function validGender(){
	var gender = document.getElementsByName('gender');
    var genderErr = document.getElementById('genderErr');

    if (gender[0].checked == false && gender[1].checked == false) {
        genderErr.innerHTML = "* Select a Gender";
        return false;
    }else{
        genderErr.innerHTML = "";
    }
	
}

// register.php submit button
$(document).ready(function () {
    $('#submitBtn').click(function () {
        var first = $('#firstname').val();
        var last = $('#lastname').val();
        var pass1 = $('#password1').val();
        var pass2 = $('#password2').val();
        var email = $('#email').val();
        var dobDay = $('#day option:selected').val();
        var dobMonth = $('#month option:selected').val();
        var dobYear = $('#year option:selected').val();
        var contact = $('#contact').val();
        var genders = document.getElementsByName('gender');

        if(genders[0].checked == true){
            gender = genders[0].value;
            // console.log("1"+gender);
        }else if(genders[1].checked == true){
            gender = genders[1].value;
            // console.log("2"+gender);
        }else{
            console.log("gender is.....");
        }

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                // document.getElementById("showw").innerHTML = this.responseText;
                let msg = this.responseText;
                console.log(msg);
                msg = $.trim(msg);
                alert(msg);
                if(msg == "Registration Successful"){
                    console.log("equal");
                    window.location = 'http://localhost/YandexDisk/hospital/admin/login.php';

                }else{
                    console.log("not equal");
                    window.location = 'http://localhost/YandexDisk/hospital/admin/register.php';
                }
            }
        }

        var str = "first="+first+"&last="+last+"&pass="+pass1+"&email="+email+"&year="+dobYear+"&month="+dobMonth+"&day="+dobDay+"&contact="+contact+"&gender="+gender;
        // console.log(str);
        // console.log(str);
        xmlhttp.open("POST", "./Registration.php", true);
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xmlhttp.send(str);

    });

});

// - - addEmp.php
function validDept() {
    // alert("asd3f");
    var dept = $('#department option:selected').val();
    var deptErr = $('#deptErr');

    if (dept == "") {
        deptErr.html("* Must enter Department");
        $('#department').css("border-color", 'red');
        return false;
    } else{
        deptErr.html("");
        $('#department').css("border-color", "#ccc");
    }

}

function validUserType() {
    // alert("asd3f");
    var user = $('#usertype option:selected').val();
    var userErr = $('#userErr');

    if (user == "") {
        userErr.html("* Must enter User Type");
        $('#usertype').css("border-color", 'red');
        return false;
    } else{
        userErr.html("");
        $('#usertype').css("border-color", '#ccc');
    }

}


$(document).ready(function () {
    $('#salary').blur(function () {
        validGender();
        validDOB();
        // alert("asd4f");
        let salary = $('#salary').val();
        let salaryErr = $('#salaryErr');

        if(salary<=5000){
            $('#salary').css("border-color", "red");
            salaryErr.html("* Minimum Salary is 5000");
        }else{
            $('#salary').css("border-color", "#ccc");
            salaryErr.html("");
        }
    });
});

$(document).ready(function () {
    $('#empSubmitBtn').mouseover(function () {
        validDept();
        validUserType();
        validDOB();
        validGender();
    });

});