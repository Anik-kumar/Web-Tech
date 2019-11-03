function validate(){
	
	var Pid = document.getElementById('pid').value;
	var Pname = document.getElementById('pname').value;
	var Dep = document.getElementById('dep').value;
	var Dis = document.getElementById('dis').value;
	
	
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
	if(Dis == ""){
		document.getElementById('disease').innerHTML=" * Enter Disease";
		return false;
	}
	
	
	else{
		return true;
	}
}

