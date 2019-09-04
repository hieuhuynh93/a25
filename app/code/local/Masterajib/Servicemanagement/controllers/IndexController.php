<?php
class Masterajib_Servicemanagement_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/servicemanagement?id=15 
    	 *  or
    	 * http://site.com/servicemanagement/id/15 	
    	 */
    	/* 
		$servicemanagement_id = $this->getRequest()->getParam('id');

  		if($servicemanagement_id != null && $servicemanagement_id != '')	{
			$servicemanagement = Mage::getModel('servicemanagement/servicemanagement')->load($servicemanagement_id)->getData();
		} else {
			$servicemanagement = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($servicemanagement == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$servicemanagementTable = $resource->getTableName('servicemanagement');
			
			$select = $read->select()
			   ->from($servicemanagementTable,array('servicemanagement_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$servicemanagement = $read->fetchRow($select);
		}
		Mage::register('servicemanagement', $servicemanagement);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}