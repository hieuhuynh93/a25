<?php
class Masterajib_Pagebuilder_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/pagebuilder?id=15 
    	 *  or
    	 * http://site.com/pagebuilder/id/15 	
    	 */
    	/* 
		$pagebuilder_id = $this->getRequest()->getParam('id');

  		if($pagebuilder_id != null && $pagebuilder_id != '')	{
			$pagebuilder = Mage::getModel('pagebuilder/pagebuilder')->load($pagebuilder_id)->getData();
		} else {
			$pagebuilder = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($pagebuilder == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$pagebuilderTable = $resource->getTableName('pagebuilder');
			
			$select = $read->select()
			   ->from($pagebuilderTable,array('pagebuilder_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$pagebuilder = $read->fetchRow($select);
		}
		Mage::register('pagebuilder', $pagebuilder);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}