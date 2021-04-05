<div>
<table style="width: 100%">
	<tr>
		<td style="width:20%;float: left;">
			<?php echo $this->getTabHtml() ;?>

		</td>

		<td style="width:80%;">
		 <form action="<?php echo $this->getFormUrl() ;?>" method='post' enctype="multipart/form-data">	
			<?php echo $this->getTabContent();?>
		</td>
	</tr>
</table>
</div>