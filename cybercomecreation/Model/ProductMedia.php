<?php
namespace Model; 

\Mage::loadFileByClassName('Model\\Core\\Table');

/**
 * 
 */
class ProductMedia extends Core\Table
{
	
	public function __construct()
	{
		$this->setTableName('productimg');
		$this->setPrimaryKey('imgId');
    }

    public function getImageDir($subDir = null)
    {
    	if(!$subDir)
    	{
    		return \Mage::getBaseDir();
    	}
      return \Mage::getBaseDir($subDir);	
    }
}


?>