<?php
class Masterajib_Emojis_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/emojis?id=15 
    	 *  or
    	 * http://site.com/emojis/id/15 	
    	 */
    	/* 
		$emojis_id = $this->getRequest()->getParam('id');

  		if($emojis_id != null && $emojis_id != '')	{
			$emojis = Mage::getModel('emojis/emojis')->load($emojis_id)->getData();
		} else {
			$emojis = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($emojis == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$emojisTable = $resource->getTableName('emojis');
			
			$select = $read->select()
			   ->from($emojisTable,array('emojis_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$emojis = $read->fetchRow($select);
		}
		Mage::register('emojis', $emojis);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}