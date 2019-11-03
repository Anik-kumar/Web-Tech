function validate(){
	
	var did = document.getElementById('empId').value;
	var pid = document.getElementById('patId').value;
	var date = document.getElementById('date').value;
	var time = document.getElementById('time').value;
	// alert(did + '->' + pid + '->' + date + '->' + time);
	if(did == "" || did===null){
		document.getElementById('empIdErr').innerHTML=" ** Select Doctor";

	}else{
		document.getElementById('empIdErr').innerHTML="";
	}

	if(pid == "" || pid===null){
		document.getElementById('patIdErr').innerHTML=" ** Select Patient";
	}else{
		document.getElementById('patIdErr').innerHTML="";
	}

	if (date == "") {
       document.getElementById('pdate').innerHTML=" ** Enter Date";
    }else{
		document.getElementById('pdate').innerHTML="";
	}
	
	if(time == ""){
		document.getElementById('ptime').innerHTML=" ** Enter Time";
		return false;
	}else{
		document.getElementById('ptime').innerHTML="";
	}
}

