
if(localStorage.getItem("AdminName"))
  {
      document.getElementsByName("submit")[0].style.visibility="hidden";
      document.getElementById("message").innerHTML="*Admin Already Registered";
  }


function validation()
{
  var imp=true;
  var name,email,password,copassword,state,city,term;
  
  
  name=document.getElementById("name");
  
  email=document.getElementsByName("email")[0];
  
  password=document.getElementsByName("password")[0];
  
  copassword=document.getElementsByName("copassword")[0];
  
  city=document.getElementById("city").value;
  
  term=document.getElementsByName("term"); 
  
  state=document.getElementById("state").value;


  //var storage=new Array(); 
 
  
	  console.log(city);
    console.log(name.value);
    console.log(email.value);
    console.log(state);
    console.log(copassword.value);
   
    for(var i=0;i<term.length;i++){
      if(term[i].checked)
      {
        console.log(term[i].value);
        term=term[i].value;
      }
    }
	
  var nameche=/^[A-Za-z ]{3,18}$/;
	var emailche=/^[A-Za-z0-9_]{1,}[@]{1}[a-z]{3,}[\.]{1}[a-z\.]{2,6}$/;
  var passwordche=/^[0-9]{6}$/;

  console.log("term"+term);
   console.log("city:",city);

   if(nameche.test(name.value))
   {
   	  localStorage.setItem("AdminName",name.value);
      console.log("Data setting name");
          document.getElementById("names").innerHTML="";
   }else
   {
   	  document.getElementById("names").innerHTML="*Enter Valid Name";
   	  imp=false;
   }


    if(emailche.test(email.value))
   {
          document.getElementById("emails").innerHTML="";
      
   }else
   {
   	  document.getElementById("emails").innerHTML="*Enter Valid Email";
   	  imp=false;
   }


    if(passwordche.test(password.value))
   {
   	  localStorage.setItem("AdminPassword",password.value);
        console.log("date setting password ");
            document.getElementById("passwords").innerHTML="";

   }else
   {
   	  document.getElementById("passwords").innerHTML="*Enter Correct Password";
   	   imp=false;
   }


   if(!((copassword.value)==(password.value)))
   {
   	  document.getElementById("copasswords").innerHTML="*Enter same pass as above Password";
   	  imp=false;
   }else{document.getElementById("copasswords").innerHTML=""; console.log(copassword.value);}

  if("Select city"==(city))
  {

     document.getElementById("citys").innerHTML="*Please Select Your City"
      imp=false;
  }else
  {
             document.getElementById("citys").innerHTML="";
  }

  if("Select State"==(state))
  {
     document.getElementById("states").innerHTML="*Please Select Your State";
     imp=false;  

  }else
  { 
              document.getElementById("states").innerHTML="";

  }
  
  if(term=="yes")
  {
     document.getElementById("checkboxs").innerHTML="";

  }else{

    document.getElementById("checkboxs").innerHTML="*Please Check term and Condition";
    imp=false;
  }
   
 
  return imp;
}
