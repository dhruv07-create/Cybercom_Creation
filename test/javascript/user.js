
  function name1(){

document.getElementById("h").innerHTML="Hello, "+localStorage.getItem("now");


}

 	  var table=document.getElementById("table");
    var bu=document.getElementById("ok");
    var row1=1;
    var count=1;
     var index=1;

   function validate(){
      var imp=true;
      var name=document.getElementsByName("text1")[0].value;
      var email=document.getElementsByName("text2")[0].value;
      var password=document.getElementsByName("text3")[0].value;
      var date=document.getElementById("date");


       var nameche=/^[A-Za-z ]{3,18}$/;
        var emailche=/^[A-Za-z0-9_]{1,}[@]{1}[a-z]{3,}[\.]{1}[a-z\.]{2,6}$/;
        var passwordche=/^[0-9]{6}$/;
        var dateche=/^[0-9]{1,2}[\/]{1}[0-9]{1,2}[\/][0-9]{4}$/;

           if(nameche.test(name))
     {
        
            document.getElementById("names").innerHTML="";
     }else
     {
        document.getElementById("names").innerHTML="*";
        imp=false;
     }

           if(emailche.test(email))
       {
              document.getElementById("emails").innerHTML="";
          
       }else
       {
          document.getElementById("emails").innerHTML="*";
          imp=false;
       }

        if(passwordche.test(password))
   {
      
            document.getElementById("passwords").innerHTML="";

   }else
   {
      document.getElementById("passwords").innerHTML="*";
       imp=false;
   }

    if(dateche.test(date.value))
   {
            document.getElementById("dates").innerHTML="";

   }else
   {
      document.getElementById("dates").innerHTML="*";
       imp=false;
   }

  if(imp)
    done();
   }
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

         var temp=new Object();
         temp.name=name;
         temp.password=password;
         temp.birthday=birthday;
         temp.timestart=(new Date()).getTime();

         var month=(new Date()).getMonth()+1;

         var day=(new Date()).getDate();

         var year=(new Date()).getFullYear();

         var date=month+"/"+day+"/"+year;
         
          temp.logindate=date;
         
         localStorage.setItem(name,JSON.stringify(temp));
        
          localStorage.setItem("Array",detail);
          
          var temp1=detail;
        
            for(var x=1;x<table.rows.length;x++)
            {
               table.rows[x].cells[5].onclick=function(){

                  document.getElementsByName("text1")[0].value=table.rows[this.parentElement.rowIndex].cells[0].innerHTML;    //localStorage.getItem(this.parentElement.rowIndex+"name");
                  document.getElementsByName("text2")[0].value=table.rows[this.parentElement.rowIndex].cells[1].innerHTML;
                  document.getElementsByName("text3")[0].value=table.rows[this.parentElement.rowIndex].cells[2].innerHTML;
                  document.getElementById("date").value=table.rows[this.parentElement.rowIndex].cells[4].innerHTML;



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

                
                  localStorage.removeItem(table.rows[(this.parentElement.rowIndex)].cells[0].innerHTML);
                  console.log("deleting row name:"+table.rows[(this.parentElement.rowIndex)].cells[0]);
                   
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
      var password=document.getElementsByName("text3")[0].value;
      var birthday=document.getElementById("date").value;
     
     var time=new Date(birthday);

     var age=((new Date()).getFullYear())-(time.getFullYear());


        table.rows[index].cells[0].innerHTML=name;
        table.rows[index].cells[1].innerHTML=email;

        table.rows[index].cells[2].innerHTML=password;
        table.rows[index].cells[3].innerHTML=birthday;

        table.rows[index].cells[4].innerHTML=age;
        table.rows[index].cells[5].innerHTML='<u color="blue">Edit</u>';
        table.rows[index].cells[6].innerHTML='<u color="blue">Delete</u>';
      
      document.getElementById("ok1").setAttribute("id","ok");
                  document.getElementById("ok").setAttribute("onclick","done()");
                  document.getElementById("ok").setAttribute("value","Add User");
      }