  function validation()
  {
    
     var nameex=/^[A-Za-z]{3,10}$/;
     var mobileex=/^[^012345][0-9]{9}$/;
     var informationex=/^[A-Za-z ]{1,}$/;
     var passwordex=/^[0-9]{6,8}$/;
     var emailex=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

      
     var imp=true;
     var firstname=document.getElementsByName("first_name")[0].value;
     var lastname=document.getElementsByName("last_name")[0].value;
     var mobile=document.getElementsByName("mobile")[0].value;
     var password=document.getElementsByName("password")[0].value;
     var cpassword=document.getElementsByName("cpassword")[0].value;
     var prefix=document.getElementsByName("prefix")[0].value;
     var email=document.getElementsByName("email")[0].value;
     var information=document.getElementsByName("information")[0].value;

     if(prefix=='mr' || prefix=='mrs' ){

      document.getElementById("prefix1").innerHTML="";

     }else{

      document.getElementById("prefix1").innerHTML="*select prefix";

      imp=false;


     }
   

     if(nameex.test(firstname)){

      console.log("if name");
      document.getElementById("firstname1").innerHTML="";

     }else{

      console.log("else name");

      document.getElementById("firstname1").innerHTML="*Firstname";
       imp=false;
     }


     if(nameex.test(lastname)){
       
      console.log("if phone");
      document.getElementById("lastname1").innerHTML="";
 
     }else{

      console.log("else phone");

      document.getElementById("lastname1").innerHTML="* Lastname";
       imp=false;
     }


     if(emailex.test(email)){

      console.log("if class");
      document.getElementById("email1").innerHTML="";
     }else{

      console.log("else class");
      document.getElementById("email1").innerHTML="*Email";
       imp=false;
     }


     if(mobileex.test(mobile)){

      console.log("if class");
      document.getElementById("mobile1").innerHTML="";
     }else{

      console.log("else class");
      document.getElementById("mobile1").innerHTML="*Mobile";
       imp=false;
     }

     if(passwordex.test(password)){

      console.log("if class");
      document.getElementById("password1").innerHTML="";
     }else{

      console.log("else class");
      document.getElementById("password1").innerHTML="*Passwoed";
       imp=false;
     }

     if(cpassword==password){

      console.log("if class");
      document.getElementById("cpassword1").innerHTML="";

     }else{

      console.log("else class");
      document.getElementById("cpassword1").innerHTML="*Not Match";
       imp=false;
     }

     if(informationex.test(information)){

      console.log("if class");

      document.getElementById("information1").innerHTML="";
     }else{

      console.log("else class");
      document.getElementById("information1").innerHTML="*Information";
       imp=false;
     }


  return false;

  }