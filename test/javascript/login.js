function login(){

  var name=document.getElementById("name").value;
  var password=document.getElementById("password").value;

    if(name==localStorage.getItem("AdminName") && password==localStorage.getItem("AdminPassword"))
	    {
	        console.log("Move to Dasabord");	
	    }else if(name==(JSON.parse(localStorage.getItem(localStorage.getItem(name)))).name && password==(JSON.parse(localStorage.getItem(localStorage.getItem(name)))).password)
	    {
            document.getElementById("form").setAttribute("action","Sub-User.html");
	    }

}