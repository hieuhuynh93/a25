<?php
class Masterajib_Seotoolsaccountactivity_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/accountactivity?id=15 
    	 *  or
    	 * http://site.com/accountactivity/id/15 	
    	 */
    	/* 
		$accountactivity_id = $this->getRequest()->getParam('id');

  		if($accountactivity_id != null && $accountactivity_id != '')	{
			$accountactivity = Mage::getModel('accountactivity/accountactivity')->load($accountactivity_id)->getData();
		} else {
			$accountactivity = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($accountactivity == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$accountactivityTable = $resource->getTableName('accountactivity');
			
			$select = $read->select()
			   ->from($accountactivityTable,array('accountactivity_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$accountactivity = $read->fetchRow($select);
		}
		Mage::register('accountactivity', $accountactivity);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}