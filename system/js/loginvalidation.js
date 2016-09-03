// JavaScript Document


function validate(){
	var un=document.getElementById("uname");
	var ps=document.getElementById("pass");
	
	if(un.value=="" && ps.value==""){
	    document.getElementById("msg").innerHTML="Username and Password are Empty!";
		un.focus();
		return false; // by defaults true	
	}
	
	
	if(un.value==""){
	    document.getElementById("msg").innerHTML="Username is Empty!";
		un.focus();
		return false; // by defaults true	
	}
	
	if(ps.value==""){
	    document.getElementById("msg").innerHTML="Password is Empty!";
		un.focus();
		return false; // by defaults true	
	}
}