<?php

class Masterajib_Caption_IndexController extends Mage_Core_Controller_Front_Action {
    
    public function getallcaptionAction(){
        $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $customerId = $customerData->getId();
        
        $captionCollection = Mage::getModel('caption/caption')
            ->getCollection()
            ->addFieldToFilter('customer_id', $customerId)
            ->addFieldToFilter('status', '1');
        
        $html = '';
        foreach ($captionCollection as $caption){
            $param1 = "'".str_replace("\n", "", $caption->getCaptionText())."'";
            $param2 = "'".captiontxt."'";
            $html .= '<li onclick="setCaption('.$param1.', '.$param2.');" class="mb-20" style="cursor: pointer;">
                                    <div class="media">
                                        <div class="position-relative">
                                            <input style="margin-top: 5px; margin-right: 10px;" value="'.$caption->getId().'" type="checkbox">
                                        </div> 
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-0">'.$caption->getTitle().' <span class="float-right text-danger"> 8,561</span>  </h6>
                                            <p style="width: 100%; word-wrap: anywhere; text-align: left;">'.$caption->getCaptionText().' </p>
                                        </div>
                                    </div>
                                    <div class="divider dotted mt-20"></div>
                                </li>';
        }
        echo $html;
    }

    public function updatecaptionAction() {
        $captionid = $_REQUEST['captionid'];
        $caption_name = $_REQUEST['caption_name'];
        $caption = $_REQUEST['caption'];

        $model = Mage::getModel('caption/caption')->load($captionid);
        $model->setTitle($captionName);
        $model->setCaptionText($caption);
        try {
            $model->save();
        } catch (Exception $ex) {
            
        }
    }

    public function deletecaptionAction() {
        $captionid = $_REQUEST['captionid'];
        Mage::getModel('caption/caption')->load($captionid)->delete();
        echo '1';
    }

    public function savecaptionAction() {

        $model = Mage::getModel('caption/caption');
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $customerId = $customerData->getId();

            $status = 0;
            $msg = '';
            echo "Caption Name: " . $captionName = $_REQUEST['caption_name'];
            echo "Caption: " . $caption = $_REQUEST['caption'];

            try {
                $model->setCustomerId($customerId);
                $model->setTitle($captionName);
                $model->setCaptionText($caption);
                $model->setStatus('1');
                $model->setCreatedTime(now);
                $model->setUpdateTime(now());
                $model->save();
                $status = 1;
            } catch (Exception $ex) {
                $msg = '<div class="alert alert-danger" role="alert">
                        ' . $ex . '
                      </div>';
            }
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                        Customer session expired!, Please login again.
                      </div>';
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function indexAction() {

        $this->loadLayout();
        $this->renderLayout();
    }

}
