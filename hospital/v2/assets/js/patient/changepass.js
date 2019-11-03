function validate(){
	
	var currpass = document.getElementById('crpass').value;
	var newpass = document.getElementById('npass').value;
	var conpass = document.getElementById('cnpass').value;
	
	if(currpass == ""){
		document.getElementById('curpass').innerHTML=" ** Enter Your Current Password";
		return false;
	}
	if (newpass == "") {
       document.getElementById('newpass').innerHTML=" ** Enter New Password ";
        return false;
    }
	else if (newpass.length<6) {
       document.getElementById('newpass').innerHTML=" **Password contains at least 6 character";
        return false;
    }
	if (newpass != conpass) {
       document.getElementById('conpass').innerHTML=" ** New Password and Confirm Password not matched ";
        return false;
    }
	else{
		return true;
	}
}