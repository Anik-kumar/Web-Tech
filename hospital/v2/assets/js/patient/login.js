function validate(){
	
	var uid = document.getElementById('id').value;
	var password = document.getElementById('pass').value;
	
	if(uid == ""){
		document.getElementById('uid').innerHTML=" * Enter  your userid";
		return false;
	}
	if (password == "") {
       document.getElementById('repass').innerHTML="* Enter Password";
        return false;
    }
	else if (password.length<6) {
       document.getElementById('repass').innerHTML="* Password contains at least 6 character";
        return false;
    }
	else{
		return true;
	}
}
