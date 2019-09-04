<?php
class Masterajib_Codebazzar_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/codebazzar?id=15 
    	 *  or
    	 * http://site.com/codebazzar/id/15 	
    	 */
    	/* 
		$codebazzar_id = $this->getRequest()->getParam('id');

  		if($codebazzar_id != null && $codebazzar_id != '')	{
			$codebazzar = Mage::getModel('codebazzar/codebazzar')->load($codebazzar_id)->getData();
		} else {
			$codebazzar = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($codebazzar == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$codebazzarTable = $resource->getTableName('codebazzar');
			
			$select = $read->select()
			   ->from($codebazzarTable,array('codebazzar_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$codebazzar = $read->fetchRow($select);
		}
		Mage::register('codebazzar', $codebazzar);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}