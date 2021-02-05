  
 	  var table=document.getElementById("table");
    var bu=document.getElementById("ok");
    var row1=1;
    var count=1;
     var index=1;

   
    function done()
    {
     
    	var table=document.getElementById("table");
      var bu=document.getElementById("ok");
    	var name=document.getElementsByName("text1")[0].value;
    	var email=document.getElementsByName("text2")[0].value;
      var password=document.getElementsByName("text3")[0].value;
      var birthday=document.getElementById("date").value;

    	var row=table.insertRow(row1);
    	var name1=row.insertCell(0);
    	var email2=row.insertCell(1);
      var password3=row.insertCell(2);
      var birthday4=row.insertCell(3);
      var age5=row.insertCell(4);
      var cell6=row.insertCell(5);
      var cell7=row.insertCell(6);

      var time=new Date(birthday);

     var age=((new Date()).getFullYear())-(time.getFullYear());

        name1.innerHTML=name;
        email2.innerHTML=email;
        password3.innerHTML=password;
        birthday4.innerHTML=birthday;
        age5.innerHTML=age;
        cell6.innerHTML='<u color="blue">Edit</u>';
        cell7.innerHTML='<u color="blue">Delete</u>';

         localStorage.setItem(row1+"name",name);
         localStorage.setItem(row1+"email",email);
         localStorage.setItem(row1+"password",password);
         localStorage.setItem(row1+"birthday",birthday);

        /* localStorage.setItem(name+"u",name);
         localStorage.setItem(name+"e",email);*/

        
            for(var x=1;x<table.rows.length;x++)
            {
               table.rows[x].cells[5].onclick=function(){

                  document.getElementsByName("name1")[0].value=localStorage.getItem(this.parentElement.rowIndex+"name");
                  document.getElementsByName("email2")[0].value=localStorage.getItem(this.parentElement.rowIndex+"email");
                  document.getElementsByName("password2")[0].value=localStorage.getItem(this.parentElement.rowIndex+"password");
                  document.getElementsByName("birthday4")[0].value=localStorage.getItem(this.parentElement.rowIndex+"birthday");



                  index=this.parentElement.rowIndex;
                  document.getElementById("ok").setAttribute("id","ok1");
                  document.getElementById("ok1").setAttribute("onclick","donee()");
                  document.getElementById("ok1").setAttribute("value","Upadte User");
                
                 console.log("Edit Click"); 
               }

               console.log("Edit operation");
            }

             for(var j=1;j<table.rows.length;j++)
            {
               table.rows[j].cells[6].onclick=function(){

                  localStorage.removeItem(this.parentElement.rowIndex+"name");
                  localStorage.removeItem(this.parentElement.rowIndex+"email");
                  table.deleteRow(this.parentElement.rowIndex);
                  row1--;
                  
               }
               console.log("Delete operation");
            }

    	row1++;
      console.log("row:"+row1);
    	count++;
  }
      function donee()
      {

     
       var table=document.getElementById("table");
        var bu=document.getElementById("ok");
      var name=document.getElementsByName("text1")[0].value;
      var email=document.getElementsByName("text2")[0].value;

        table.rows[index].cells[0].innerHTML=name;
        table.rows[index].cells[1].innerHTML=email;
        table.rows[index].cells[2].innerHTML='<u color="blue">Edit</u>';
        table.rows[index].cells[3].innerHTML='<u color="blue">Delete</u>';
      
      document.getElementById("ok1").setAttribute("id","ok");
                  document.getElementById("ok").setAttribute("onclick","done()");
                  document.getElementById("ok").setAttribute("value","Add User");
      }