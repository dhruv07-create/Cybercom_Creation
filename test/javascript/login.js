function login(){

	var obja=new Object();
	obja.name="Hiren";
	obja.password="123456";
  localStorage.setItem("Hiren",JSON.stringify(obja));
  var return1=true;
  var name=document.getElementById("name1").value;

  var password=document.getElementById("Password").value;

     if(name==localStorage.getItem("AdminName") && password==localStorage.getItem("AdminPassword"))
     {
         console.log("Admin Login");
         localStorage.setItem("now",name);

   }else if (name!=null && password!=null && name==(JSON.parse(localStorage.getItem(name))).name && password==(JSON.parse(localStorage.getItem(name))).password)
   {
        document.getElementById("form").setAttribute("action","Sub-User.html");
         localStorage.setItem("now",name);
   }
   else{
       console.log("incorrect User name and password !!!");
       return1=false;
   }

  return return1;
}

console.log("hi");
