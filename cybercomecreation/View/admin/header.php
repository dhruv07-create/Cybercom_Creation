<!DOCTYPE html>
<html>
<head>
	<title></title>

    <link rel="stylesheet" type="text/css" href="Skin/Admin/css/bootstrap.min.css"/>
   
    <script type="text/javascript" src="Skin/Admin/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

</head>
<body>

<div style="margin: auto;margin-top: 10px;padding:20px;" align="center" >

   	<nav class="navbar navbar-dark bg-light "  >
   		
      <ul class="navbar-nav" style="margin: auto" >

   		<li class="nav-item">

          <a  href="<?php echo $this->getUrl('home','admin\dashbord') ;?>">Dashbord</a>&nbsp;&nbsp;| 
          <a  href="<?php echo $this->getUrl('grid','admin\admin');  ?>" >Admin</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\product'); ?>" >Product</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\category'); ?>" >Category</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\customer'); ?>" >Customer</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\customergroup'); ?>" >Customergroup</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\payment'); ?>" >Payment</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\cms'); ?>" >Cms</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\shipping'); ?>" >shippping</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\attribute'); ?>" >Attribute</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\brand'); ?>" >Brand</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\cart'); ?>" >Cart</a>&nbsp;&nbsp;|
          <a  href="<?php echo $this->getUrl('grid','admin\configgroup'); ?>" >ConfigGroup</a>&nbsp;&nbsp;


   		</li>
   	  </ul>	
   	</nav>
 </div>
 
</body>

</html>