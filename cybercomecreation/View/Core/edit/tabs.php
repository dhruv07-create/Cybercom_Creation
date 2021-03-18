<?php
/*if(!$this->getRequest()->getGet('id'))
{
	$this->removeTab('2');
}*/

$tabs=$this->getTabs();

foreach ($tabs as $key => $value) {
?>
<a href="<?php echo $this->getUrl(null,null,['tab'=>$key],true) ?>" class='btn btn-primary'><?php echo $value['lable'] ?></a><br><br>
<?php } ?>