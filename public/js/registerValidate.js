var fullname=true;
var Email=true;
var Username=true;
var Num=true;
var SSN=true;
var password=true;

function check(){
    if(fullname == false ||   Email==false ||  Username==false  || SSN==false || password==false || Num==false){
        return false;
    }
    else return true;
}

function validateFName(text){
    var regex=/^[0-9]+$/;
    if(text.value==""){
        text.style.backgroundColor ="red";
        document.getElementById("name").innerHTML="full name can't be empty";
        fullname= false;
    }
    else if(text.value.match(regex)){
        text.style.backgroundColor="red";
        document.getElementById("name").innerHTML="name must be letters only";
        fullname= false;
    }
    else {
        document.getElementById("name").innerHTML="";
        fullname= true;
        text.style.backgroundColor="#1c1c1c";
    }
}

function validateEmail(text){
    if(text.value==""){
        text.style.backgroundColor="red";
        document.getElementById("mail").innerHTML=" email can't be empty";
        Email= false;

    } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text.value))){
        document.getElementById("mail").innerHTML=" email wrong format";
        text.style.backgroundColor="red";
        Email= false;
    }
    else{
        document.getElementById("mail").innerHTML="";
        Email= true;
        text.style.backgroundColor="#1c1c1c";
    } 
}

function checkuserr() { 
    jQuery.ajax({
        url: "L&R/ajaxusername.php",
        data:'username='+$("#UserNamee").val(),
        type:"POST",
        success:function(data)
        {
            $("#username").html(data);
            if(data=="valid username"){
                Username=true;
            }
            else{
                Username=false;
            }
        }
    });
}

function checkmail() { 
    jQuery.ajax({
        url: "L&R/ajaxusername.php",
        data:'mail='+$("#Email").val(),
        type:"POST",
        success:function(data)
        {
            $("#mail").html(data);
            if(data=="valid mail"){
                Email=true;
            }
            else{
                Email=false;
            }
        }
    });
}

function checkssn() { 
    jQuery.ajax({
        url: "L&R/ajaxusername.php",
        data:'ssn='+$("#SSN").val(),
        type:"POST",
        success:function(data)
        {
            $("#ssn").html(data);
            if(data =="valid ssn")
            {
                SSN=true;
            }
            else{
                SSN=false;
            }
        }
    });
}

function validateNumber(text){
    if (text.value==""){
        document.getElementById("number").innerHTML="number can't be empty";
        Num= false;
        text.style.backgroundColor="red";
    }
    else if(text.value.charAt(0)!=0){
        document.getElementById("number").innerHTML="must begin with zero";
        Num= false;
        text.style.backgroundColor="red";

    }
    else if(text.value.length!=11 ){
        document.getElementById("number").innerHTML="number must be 11 digits begin with zero";
        Num= false;
        text.style.backgroundColor="red";
    }
    else  if (isNaN(text.value)){
        document.getElementById("number").innerHTML="number can't contain letters";
        Num= false;
        text.style.backgroundColor="red";
    }
    else {
        document.getElementById("number").innerHTML="";
        Num= true;
        text.style.backgroundColor="#1c1c1c";
    }
}

function validatepassword(text){
    if (text.value==""){
        document.getElementById("password").innerHTML="password can't be empty";
        password= false;
        text.style.backgroundColor="red";
    }
    else if(text.value.length<6){
        document.getElementById("password").innerHTML="password must be at least 6 digits";
        password= false;
        text.style.backgroundColor="red";
    }
    else {
        document.getElementById("password").innerHTML="";
        password= true;
        text.style.backgroundColor="#1c1c1c";
    }
}