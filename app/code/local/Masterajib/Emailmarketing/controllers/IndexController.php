<?php
class Masterajib_Emailmarketing_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/emailmarketing?id=15 
    	 *  or
    	 * http://site.com/emailmarketing/id/15 	
    	 */
    	/* 
		$emailmarketing_id = $this->getRequest()->getParam('id');

  		if($emailmarketing_id != null && $emailmarketing_id != '')	{
			$emailmarketing = Mage::getModel('emailmarketing/emailmarketing')->load($emailmarketing_id)->getData();
		} else {
			$emailmarketing = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($emailmarketing == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$emailmarketingTable = $resource->getTableName('emailmarketing');
			
			$select = $read->select()
			   ->from($emailmarketingTable,array('emailmarketing_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$emailmarketing = $read->fetchRow($select);
		}
		Mage::register('emailmarketing', $emailmarketing);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}