function name(){
	var name=localStorage.getItem("now");

	document.getElementById("h").innerHTML="Hello, "+name;

    
    var birthday=(JSON.parse(localStorage.getItem(name))).birthday;
    console.log(birthday);

    var temp=new Date(birthday);
   
    var today=new Date();
     
    if((today.getFullYear()==temp.getFullYear())&&(today.getDate()==temp.getDate())&&((today.getMonth()+1)==temp.getMonth())){

    	document.getElementById("h1").innerHTML="Happy Birthday "+name;

    }

}


