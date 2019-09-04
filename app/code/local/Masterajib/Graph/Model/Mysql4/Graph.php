<?php

class Masterajib_Graph_Model_Mysql4_Graph extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the graph_id refers to the key field in your database table.
        $this->_init('graph/graph', 'graph_id');
    }
}