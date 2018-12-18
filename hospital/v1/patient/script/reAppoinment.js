function validate(){
	
	var Did = document.getElementById('did').value;
	var Dname = document.getElementById('dname').value;
	var Pid = document.getElementById('pid').value;
	var Pname = document.getElementById('pname').value;
	var Dep = document.getElementById('dep').value;
	
	
	if(Did == ""){
		document.getElementById('doctorid').innerHTML=" * Enter Doctor Id";
		return false;
	}
	if(Dname == ""){
		document.getElementById('doctorname').innerHTML=" * Enter Doctor Name";
		return false;
	}
	else if(Dname.length<3 ){
		document.getElementById('doctorname').innerHTML="* Name must contain at least 3 character";
		return false;
	}
	if(Pid == ""){
		document.getElementById('patientid').innerHTML=" * Enter Patient Id";
		return false;
	}
	if(Pname == ""){
		document.getElementById('patientname').innerHTML="* Enter  Patient Name";
		return false;
	}
	else if(Pname.length<3 ){
		document.getElementById('patientname').innerHTML="* Name must contain at least 3 character";
		return false;
	}
	if(Dep == ""){
		document.getElementById('dept').innerHTML=" * Enter Department";
		return false;
	}
	
	
	else{
		return true;
	}
}

