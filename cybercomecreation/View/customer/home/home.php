<div align="center">
<table style="width: 100%" >
	<tr>
		<td><?php echo \Mage::getBlock('Block\Customer\Home\Banner')->toHtml(); ?></td>
	</tr>
	<tr>
		<td><?php echo \Mage::getBlock('Block\Customer\Home\Featured')->toHtml(); ?></td>
	</tr>
	<tr>
	<td><?php echo \Mage::getBlock('Block\Customer\Home\Deal')->toHtml() ?></td>
	</tr>
	<tr>>	
		<td><?php echo \Mage::getBlock('Block\Customer\Home\Brand')->toHtml(); ?></td>
	</tr>
	<tr>	
		<td><?php echo \Mage::getBlock('Block\Customer\Home\Popular')->toHtml(); ?></td>
	</tr>	
</table>
</div>