function validate(){
	
	var did = document.getElementById('did').value;
	var dname = document.getElementById('dname').value;
	var pid = document.getElementById('pid').value;
	var pname = document.getElementById('pname').value;
	var date = document.getElementById('date').value;
	var time = document.getElementById('time').value;
	
	
	if(did == ""){
		document.getElementById('docid').innerHTML=" ** Enter User ID";
		return false;
	}
	if(dname == ""){
		document.getElementById('docname').innerHTML=" ** Enter First Name";
		return false;
	}
	else if(dname.length<3 ){
		document.getElementById('docname').innerHTML="** Name must contain at least 3 character";
		return false;
	}
	if(pid == ""){
		document.getElementById('patid').innerHTML=" ** Enter User ID";
		return false;
	}
	if(pname == ""){
		document.getElementById('patname').innerHTML=" ** Enter Last Name";
		return false;
	}
	else if(pname.length<3 ){
		document.getElementById('patname').innerHTML="** Name must contain at least 3 character";
		return false;
	}
	if (date == "") {
       document.getElementById('pdate').innerHTML=" ** Enter Current Date";
        return false;
    }
	
	if(time == ""){
		document.getElementById('ptime').innerHTML=" ** Enter Current Time";
		return false;
	}
	
	else{
		return true;
	}
}

