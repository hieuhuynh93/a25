<?php
class Masterajib_Feedback_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/feedback?id=15 
    	 *  or
    	 * http://site.com/feedback/id/15 	
    	 */
    	/* 
		$feedback_id = $this->getRequest()->getParam('id');

  		if($feedback_id != null && $feedback_id != '')	{
			$feedback = Mage::getModel('feedback/feedback')->load($feedback_id)->getData();
		} else {
			$feedback = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($feedback == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$feedbackTable = $resource->getTableName('feedback');
			
			$select = $read->select()
			   ->from($feedbackTable,array('feedback_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$feedback = $read->fetchRow($select);
		}
		Mage::register('feedback', $feedback);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}