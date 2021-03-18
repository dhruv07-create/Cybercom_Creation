<?php
namespace Model\Admin;
class Collection 
{
	protected $data=[];

	public function setData(array $data)
	{
		 $this->data=$data;
	}

	public function getData()
	{
		return $this->data;
	}

	public function count()
	{
		return count($data);
	}
}

?>