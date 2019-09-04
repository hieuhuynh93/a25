<?php

class Masterajib_Pagebuilder_Block_Adminhtml_Pagebuilder_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {

    public function render(Varien_Object $row) {
        $html = '<img ';
        $html .= 'id="' . $this->getColumn()->getId() . '" width="50"';
        $html .= 'src="' . Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . $row->getFilename() . '"';
        $html .= 'class="grid-image ' . $this->getColumn()->getInlineCss() . '"/>';
        $html .= '<br/><p>' . $row->getData($this->getColumn()->getIndex()) . '</p>';
        return $html;
    }

}
