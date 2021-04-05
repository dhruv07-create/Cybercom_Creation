<?php 
namespace Controller\Core;
 

 class Pager 
 {
 	 protected $totalPages=Null;
 	 protected $totalRecords=Null;
 	 protected $end=Null;
 	 protected $start=1;
 	 protected $next=Null;
 	 protected $previous=Null;
 	 protected $currentPage=Null;
 	 protected $recordsPerPage=Null;

     public function setTotalRecords($records)
     {
     	 $this->totalRecords= (int ) $records;

     	 return $this;
     }

     public function getTotalRecords()
     {
     	return $this->totalRecords;
     }

     public function setTotalPages($Pages)
     {
     	 $this->totalPages= (int) $Pages;
         
         return $this;
     }

     public function getTotalPages()
     {
         return $this->totalPages;
         return $this;
     }

     public function setEnd($end)
     {
     	$this->end=$end;
     }

     public function getEnd()
     {
     	 return $this->end;
     }

     public function setStart($star)
     {
     	$this->start=$star;
     	return $this;
     }

     public function getStart()
     {
     	return $this->start;
     }

     public function setNext($next)
     {
     	$this->next=$next;
     	return $this;
     }

     public function getNext()
     {
     	return $this->next;
     }

     public function setPrevious($previous)
     {
     	 $this->previous=$previous;
     	 return $this;
     }

     public function getPrevious()
     {
     	return $this->previous;		
     }


	 
	 public function setCurrentPage($currentPage)
     {
         $this->currentPage= (int) $currentPage;
         return $this;
     }

     public function getCurrentPage(){

     	return $this->currentPage;
     }	     

     public function setRecordsPerPage($recordsPerPage)
     {
          $this->recordsPerPage= (int ) $recordsPerPage;

          return $this;
     }

     public function getRecordsPerPage()
     {
     	 return $this->recordsPerPage;
     }

     public function calculate()
     {
       	 $page=ceil($this->getTotalRecords()/$this->getRecordsPerPage());
     	 $this->setTotalPages($page);
     	 $this->setEnd($page);

     	 if($this->getCurrentPage() > $this->getEnd() )
     	 {
 			$this->setCurrentPage($this->getStart());	
     	 }

    	 if($this->getCurrentPage() < $this->getStart() )
     	 {
 			$this->setCurrentPage($this->getStart());	
     	 }

     	 if($this->getTotalRecords() <= $this->getRecordsPerPage())
     	 {
              $this->setTotalPages(1);
              $this->setStart(null);
              $this->setEnd(null);
              $this->setPrevious(null);
              $this->setNext(null);

              return $this;
     	 }

     	 
     	 if($this->getCurrentPage() == $this->getStart())
     	 {
     	 	$this->setStart(null);
     	 	$this->setPrevious(null);

     	 	if($this->getCurrentPage() < $this->getTotalPages())
     	 	{
               $this->setNext($this->getCurrentPage()+1);
     	 	}

     	 	return $this;	
     	 }

     	 if($this->getCurrentPage() == $this->getEnd())
     	 {
     	 	$this->setNext(null);
     	 	$this->setEnd(null);

     	 	if($this->getCurrentPage() > $this->getStart())
     	 	{
     	 		$this->setPrevious($this->getCurrentPage()-1);
     	 	}

     	   return $this;	
     	 }	
      
         if($this->getCurrentPage() > $this->getStart() && $this->getCurrentPage() < $this->getEnd())
         {
            $this->setNext($this->getCurrentPage()+1);
            $this->setPrevious($this->getCurrentPage()-1);
         }

         return $this;
      }

 }

?>