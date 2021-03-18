<?php

if($success=$this->getMessage()->getSuccess())
{   
	echo "<div class=' alert alert-success' role='alert' >";
   echo $this->getMessage()->getSuccess();
    echo "</div>";
   $this->getMessage()->clearSuccess();

}
if($this->getMessage()->getFailer())
{
   echo "<div class=' alert alert-danger' role='alert' >";	 
   echo $this->getMessage()->getFailer();
   echo "</div>";

   $this->getMessage()->clearFailer();
}

?>