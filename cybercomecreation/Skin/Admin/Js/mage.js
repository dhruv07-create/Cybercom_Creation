
var Base=function(){
}

Base.prototype={

   method:'POST',
   url:null,
   params:{},
   form:null,

   setMethod:function(method){
       this.method=method;
       return this;
   },
   getMethod:function(){
   	  return this.method;
   } ,

   setParams:function(params){
      this.params=params;
      return this;
   } ,

   addParam :function(key,param){
      this.params[key]=param;
      return this;
   },
   removeParams:function(){
   	  this.params={};
   },

   getParams:function(key){
       if(typeof key == 'undefined'){
       	   return this.params;
       }

       return this.params[key];
   },

   setUrl:function(url){

      this.url=url;
      return this;
   },

   getUrl:function(){
   	   return this.url;
   },
  

   load:function(){
        var obj=this;
   	  var request1= $.ajax({
           
           url:this.getUrl(),
           method:this.getMethod(),
           data:this.getParams(),

           success:function(responce){
               alert(typeof responce);
               obj.manageHtml(responce);
           }
           
   	   });

    },

     manageHtml:function(responce)
    {

          if(typeof responce=='undefined')
          {
            return false;
          }

          if(typeof responce=='object')
          {
            $(responce.element).each(function(i,element)
            {
                $(element.selectore).html(element.html);
            })
          }else{
            $(responce.element.selectore).html(responce.element.html);
          }
    },

    setForm:function(button){
     
       this.form= $(button).closest('form');
       this.setParams(this.form.serialize());
       this.setUrl(this.form.attr('action'));
       this.setMethod(this.form.attr('method'));  
       return this;
    },
    getForm:function(){

        return this.form;
    }

    }

 

var object=new Base();



























/*
   var Base=function(){

};

Base.prototype={

	alert:function(){
		alert("Dhruv");
	},

	url:null,
	method:null,
	params:null,

	setUrl:function(url){
      this.url=url;
      return this;
	},
	getUrl:function(){
		return this.url;
	},
	setMethod:function(method){
       this.method=method;
       return this;
	},
	getMethod:function(){
		return this.method;
	},
	setParams:function(params){
       this.params=params;
       return this;
	},
	getParams:function(key){
       if(typeof key== 'undefined')
       {
       	 return this.params;
       }

      return this.params[key]; 
	},
removeParams:function(key){
   if(typeof key!='undefined'){
   	delete this.params[key];
   }
   	 return this;
},
	addParams:function(key,value){
	  this.params[key]=value;
	  return this;
	}
}


var object=new Base();
object.setParams({name:"Raj"});
console.log(object.getParams()); */