function validate(){
	
	var uid = document.getElementById('id').value;
	var password = document.getElementById('pass').value;
	
	if(uid == ""){
		document.getElementById('uid').innerHTML=" ** Enter Your User ID";
		return false;
	}
	if (password == "") {
       document.getElementById('repass').innerHTML=" ** Enter Password Number";
        return false;
    }
	else if (password.length<6) {
       document.getElementById('repass').innerHTML=" **Password contains at least 6 character";
        return false;
    }
	else{
		return true;
	}
}