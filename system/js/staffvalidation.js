function staffvalidation(){
    var st_fname=document.getElementById('st_fname');	// consider an id called....
	var patname=/^[a-zA-Z]+$/;// statring of the regular expression--/^$/
    var st_address1=document.getElementById('st_address1');	// consider an id called....
	var patcontact=/^[0-9]{10}$/;
	var st_contact_no1=document.getElementById('st_contact_no1');
	var st_nic=document.getElementById('st_nic');	// consider an id called....
	var patnic=/^[0-9]{9}[vVxX]$/;

	
	// Staff name validation
	
if (st_fname.value==""){
   document.getElementById("show").innerHTML="Empty First Name!";
   st_fname.focus(); // call by variable name
   return false;// to restrict passing to the next page coz default is true	
}

	
if (!st_fname.value.match(patname)){
document.getElementById("show").innerHTML="Invalid First Name!";
   st_fname.focus(); // call by variable name
   return false;// to restrict passing to the next page coz default is true		
	
}

if (st_lname.value==""){
   document.getElementById("show").innerHTML="Empty Last Name!";
   st_lname.focus(); // call by variable name
   return false;// to restrict passing to the next page coz default is true	
}

	
if (!st_lname.value.match(patname)){
document.getElementById("show").innerHTML="Invalid Last Name!";
   st_lname.focus(); // call by variable name
   return false;// to restrict passing to the next page coz default is true		
	
}


// Staff Address validation


if (st_address1.value==""){
   document.getElementById("show").innerHTML="Empty Address 1!";
   st_address1.focus(); // call by variable name
   return false;// to restrict passing to the next page coz default is true	
}


if (st_address2.value==""){
   document.getElementById("show").innerHTML="Empty Address 2!";
   st_address2.focus(); // call by variable name
   return false;// to restrict passing to the next page coz default is true	
}


  // Staff Contact number validation
  
  if (st_contact_no1.value==""){
   document.getElementById("show").innerHTML="Empty Contact No1!";
   st_address1.focus(); // call by variable name
   return false;// to restrict passing to the next page coz default is true	
}

  
  if(!st_contact_no1.value.match(patcontact)){ 
	 document.getElementById("show").innerHTML="Invalid Contact Number 1!";
	 st_contact_no1.select();
	 return false;
  }



	// Staff Date of Birth validation
	
 var st_dob=document.getElementById('st_dob').value;
 var today=new Date();
 currentYear=today.getFullYear();
 currentMonth=today.getMonth();
 currentDate=today.getDate();
 
 var birthday=new Date(st_dob);
 birthYear=birthday.getFullYear();
 birthMonth=birthday.getMonth();
 birthDate=birthday.getDate();
 
 age=currentYear-birthYear;
 age1=currentYear-birthYear;
 m=currentMonth-birthMonth;
 d=currentDate-birthDate;
 
 if (st_dob.value==""){
   document.getElementById("show").innerHTML="Empty Date of Birth!";
   st_dob.focus(); // call by variable name
   return false;// to restrict passing to the next page coz default is true	
}

 
 if(m<0 || (m===0 && d<0)){
	age--;
 }
 
 if(age<18){
	 document.getElementById("show").innerHTML="Underage!";
	 return false;
 }
	 
  if(age>=60){
	 document.getElementById("show").innerHTML="Overage!";
	 return false;
  }
  
  if (!st_nic.value.match(patnic)){
document.getElementById("show").innerHTML="Invalid NIC no!";
   st_nic.focus();
   st_nic.select(); // call by variable name
   return false;// to restrict passing to the next page coz default is true		
}

	
 var y=st_dob.substring(2,4);
 var n=st_nic.value.substring(0,2);

 if(y!=n){
	 document.getElementById("show").innerHTML="NIC and DOB are not Matching!";
	 st_nic.select();
	 return false;
 }
  

   // Staff City validation
  
  if (st_city.value==""){
   document.getElementById("show").innerHTML="Empty City!";
   st_city.focus(); // call by variable name
   return false;// to restrict passing to the next page coz default is true	
}


 
 
 
 
 
 
 
}
