<?php
namespace Block\Admin\Configgroup;

class Edit extends \Block\Core\Edit
{
	function __construct()
	{
		parent::__construct();
		$this->setTabClass('Block\Admin\Configgroup\Edit\Tab');
	}
}


?>