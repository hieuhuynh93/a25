<?php
class Masterajib_Graph_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/graph?id=15 
    	 *  or
    	 * http://site.com/graph/id/15 	
    	 */
    	/* 
		$graph_id = $this->getRequest()->getParam('id');

  		if($graph_id != null && $graph_id != '')	{
			$graph = Mage::getModel('graph/graph')->load($graph_id)->getData();
		} else {
			$graph = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($graph == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$graphTable = $resource->getTableName('graph');
			
			$select = $read->select()
			   ->from($graphTable,array('graph_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$graph = $read->fetchRow($select);
		}
		Mage::register('graph', $graph);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}