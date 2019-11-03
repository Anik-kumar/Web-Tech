function validate(){
	
	var uid = document.getElementById('id').value;
	var fname = document.getElementById('fname').value;
	var lname = document.getElementById('lname').value;
	var email = document.getElementById('email').value;
	var contact = document.getElementById('contact').value;
	var pass = document.getElementById('password').value;
	var repass = document.getElementById('repass').value;
	var male = document.getElementById('Mgender').checked;
	var female = document.getElementById('Fgender').checked;
	var other = document.getElementById('Ogender').checked;
	var bg = document.getElementById('group').selected;
	var dob = document.getElementById('dob').value;
	var type = document.getElementById('type').value;
	
	if(uid == ""){
		document.getElementById('userid').innerHTML=" * Enter  your UserId";
		return false;
	}
	if(fname == ""){
		document.getElementById('first').innerHTML=" * Enter your First Name";
		return false;
	}
	else if(fname.length<3 ){
		document.getElementById('first').innerHTML="* Name must contain at least 3 character";
		return false;
	}
	if(lname == ""){
		document.getElementById('last').innerHTML="* Enter  your Last Name";
		return false;
	}
	else if(lname.length<3 ){
		document.getElementById('last').innerHTML="* Name must contain at least 3 character";
		return false;
	}
	if (email == "") {
       document.getElementById('mail').innerHTML=" * Enter Your Email Address";
        return false;
    }
	else if (email.indexOf("@", 0)<0) {
       document.getElementById('mail').innerHTML="* Enter Valid Email Address";
        return false;
    }
	else if (email.indexOf(".", 0)<0) {
      document.getElementById('mail').innerHTML="* Enter Valid Email Address";
        return false;
    }
	if(contact == ""){
		document.getElementById('cont').innerHTML="* Enter Your Contact Number";
		return false;
	}
	else if(contact.length<11 || contact.length>11  ){
		document.getElementById('cont').innerHTML="* Enter Valid Phone Number";
		return false;
	}
	if (pass == "") {
       document.getElementById('pass').innerHTML="* Enter Password Number";
        return false;
    }
	else if (pass.length<6) {
       document.getElementById('pass').innerHTML="* Password contains at least 6 character";
        return false;
    }
	if (pass != repass){
       document.getElementById('conpass').innerHTML="* Password and Confirm Password not matched";
        return false;
    }
	if ((male=="") &&  (female=="") && (other == "")) {
       document.getElementById('gender').innerHTML="* Checked Gender ";
        return false;
    }
	if (bg == ""){
       document.getElementById('blood').innerHTML=" * Select Blood Group";
        return false;
    }
	if (dob == "") {
       document.getElementById('birth').innerHTML=" * Enter Your Date of Birth";
        return false;
    }
	if (type.selectedIndex ==0 ) {
       document.getElementById('user').innerHTML=" * Select User Type";
        return false;
    }
	else{
		return true;
	}
}

