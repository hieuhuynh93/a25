<?php
class Masterajib_Schedulepost_IndexController extends Mage_Core_Controller_Front_Action
{
    public function deletepostAction(){
        $postId = $_REQUEST['postId'];
        try{
            Mage::getModel('schedulepost/schedulepost')->load($postId)->delete();
        } catch (Exception $ex) {

        }
    }
    
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/schedulepost?id=15 
    	 *  or
    	 * http://site.com/schedulepost/id/15 	
    	 */
    	/* 
		$schedulepost_id = $this->getRequest()->getParam('id');

  		if($schedulepost_id != null && $schedulepost_id != '')	{
			$schedulepost = Mage::getModel('schedulepost/schedulepost')->load($schedulepost_id)->getData();
		} else {
			$schedulepost = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($schedulepost == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$schedulepostTable = $resource->getTableName('schedulepost');
			
			$select = $read->select()
			   ->from($schedulepostTable,array('schedulepost_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$schedulepost = $read->fetchRow($select);
		}
		Mage::register('schedulepost', $schedulepost);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}