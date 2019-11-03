function validate(){

	var did = document.getElementById('did').value;
	var date = document.getElementById('date').value;
	var pid = document.getElementById('pid').value;
	var disease = document.getElementById('disease').value;
	var medicine = document.getElementById('medicine').value;
	var test = document.getElementById('test').value;
	var comment = document.getElementById('comment').value;
	

	

	if(did === "" || did ===null){
		document.getElementById('docid').innerHTML=" ** Enter Doctor ID";
		return false;
	}else{
		document.getElementById('docid').innerHTML="";
	}

	if(dcontact === "" || dcontact===null){
		document.getElementById('doccontact').innerHTML=" ** Enter Your Contact Number";
		return false;
	}else if(dcontact.length<1 || dcontact.length>11  ){
		document.getElementById('doccontact').innerHTML="** Enter Valid Phone Number";
		return false;
	}else{
		document.getElementById('doccontact').innerHTML="";
	}

	if (date === "" || date===null) {
       document.getElementById('pdate').innerHTML=" ** Enter Current Date";
        return false;
    }else{
		document.getElementById('pdate').innerHTML="";
	}

	if(pid === "" || pid === null){
		document.getElementById('patid').innerHTML=" ** Enter Patient ID";
		return false;
	}else{
		document.getElementById('patid').innerHTML="";
	}

	if (disease === "") {
       document.getElementById('patdisease').innerHTML=" ** Patient Disease";
        return false;
    }else{
		document.getElementById('patdisease').innerHTML="";
	}

	if (medicine === "") {
       document.getElementById('patmedicine').innerHTML=" ** Recommend Medicine";
        return false;
    }else{
		document.getElementById('patmedicine').innerHTML="";
	}

	if(test === "" || test === null){
		document.getElementById('pattest').innerHTML=" ** Recommend Tests";
		return false;
	}else{
		document.getElementById('pattest').innerHTML="";
	}

	if(comment === "" || comment === null){
		document.getElementById('pcomment').innerHTML=" ** Comment on Prescription";
		return false;
	}else{
		document.getElementById('pcomment').innerHTML="";
	}

}

