<div align="center">
	<table>
		<tr>
		 <td><?php echo \Mage::getBlock('Block\Customer\Category\Banner')->setCategory($this->getCategory())
		 ->setCategory($this->getCategory())->toHtml();?></td>
		</tr>
		<tr>
			<td><?php echo \Mage::getBlock('Block\Customer\Category\product')->setCategory($this->getCategory())->toHtml(); ?>
			<?php echo \Mage::getBlock('Block\Customer\Category\LayerNav')->setCategory($this->getCategory())->toHtml(); ?></td>
		</tr>
	</table>
</div>