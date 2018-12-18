function validate(){
	
	var hname = document.getElementById('hname').value;
	var address = document.getElementById('add').value;
	var dname = document.getElementById('dname').value;
	var did = document.getElementById('did').value;
	var dcontact = document.getElementById('dcontact').value;
	var date = document.getElementById('date').value;
	var pname = document.getElementById('pname').value;
	var pid = document.getElementById('pid').value;
	var male = document.getElementById('mgender').checked;
	var female = document.getElementById('fgender').checked;
	var other = document.getElementById('ogender').checked;
	var page = document.getElementById('page').value;
	var disease = document.getElementById('disease').value;
	var medicine = document.getElementById('medicine').value;
	var test = document.getElementById('test').value;
	var comment = document.getElementById('comment').value;
	
	if(hname == ""){
		document.getElementById('hospital').innerHTML=" ** Enter The Hospital Name";
		return false;
	}
	if(address == ""){
		document.getElementById('address').innerHTML=" ** Enter Hospital Address ";
		return false;
	}
	
	if(dname == ""){
		document.getElementById('docname').innerHTML=" ** Enter Doctor Name";
		return false;
	}
	else if(dname.length<3 ){
		document.getElementById('docname').innerHTML="** Name must contain at least 3 character";
		return false;
	}
	if(did == ""){
		document.getElementById('docid').innerHTML=" ** Enter Doctor ID";
		return false;
	}
	if(dcontact == ""){
		document.getElementById('doccontact').innerHTML=" ** Enter Your Contact Number";
		return false;
	}
	
	else if(dcontact.length<11 || dcontact.length>11  ){
		document.getElementById('doccontact').innerHTML="** Enter Valid Phone Number";
		return false;
	}
	if (date == "") {
       document.getElementById('pdate').innerHTML=" ** Enter Current Date";
        return false;
    }
	if(pname == ""){
		document.getElementById('patname').innerHTML=" ** Enter Patient Name";
		return false;
	}
	else if(pname.length<3 ){
		document.getElementById('patname').innerHTML="** Name must contain at least 3 character";
		return false;
	}
	if(pid == ""){
		document.getElementById('patid').innerHTML=" ** Enter Patient ID";
		return false;
	}
	if ((male=="") &&  (female=="") && (other == "")) {
       document.getElementById('gen').innerHTML=" ** Gender Not Checked";
        return false;
    }
	if(page == ""){
		document.getElementById('patage').innerHTML=" ** Enter Patient Current age";
		return false;
	}
	if (disease == "") {
       document.getElementById('patdisease').innerHTML=" ** patient disease";
        return false;
    }
	if (medicine == "") {
       document.getElementById('patdisease').innerHTML=" ** Recommend medicine";
        return false;
    }
	
	else{
		return true;
	}
}

