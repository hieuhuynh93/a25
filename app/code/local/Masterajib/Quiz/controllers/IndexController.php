<?php
class Masterajib_Quiz_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/quiz?id=15 
    	 *  or
    	 * http://site.com/quiz/id/15 	
    	 */
    	/* 
		$quiz_id = $this->getRequest()->getParam('id');

  		if($quiz_id != null && $quiz_id != '')	{
			$quiz = Mage::getModel('quiz/quiz')->load($quiz_id)->getData();
		} else {
			$quiz = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($quiz == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$quizTable = $resource->getTableName('quiz');
			
			$select = $read->select()
			   ->from($quizTable,array('quiz_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$quiz = $read->fetchRow($select);
		}
		Mage::register('quiz', $quiz);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}