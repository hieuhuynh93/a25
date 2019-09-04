<?php
class Masterajib_Admanagement_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/admanagement?id=15 
    	 *  or
    	 * http://site.com/admanagement/id/15 	
    	 */
    	/* 
		$admanagement_id = $this->getRequest()->getParam('id');

  		if($admanagement_id != null && $admanagement_id != '')	{
			$admanagement = Mage::getModel('admanagement/admanagement')->load($admanagement_id)->getData();
		} else {
			$admanagement = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($admanagement == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$admanagementTable = $resource->getTableName('admanagement');
			
			$select = $read->select()
			   ->from($admanagementTable,array('admanagement_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$admanagement = $read->fetchRow($select);
		}
		Mage::register('admanagement', $admanagement);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}