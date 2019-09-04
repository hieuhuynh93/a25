<?php
class Masterajib_Keywords_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/keywords?id=15 
    	 *  or
    	 * http://site.com/keywords/id/15 	
    	 */
    	/* 
		$keywords_id = $this->getRequest()->getParam('id');

  		if($keywords_id != null && $keywords_id != '')	{
			$keywords = Mage::getModel('keywords/keywords')->load($keywords_id)->getData();
		} else {
			$keywords = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($keywords == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$keywordsTable = $resource->getTableName('keywords');
			
			$select = $read->select()
			   ->from($keywordsTable,array('keywords_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$keywords = $read->fetchRow($select);
		}
		Mage::register('keywords', $keywords);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}