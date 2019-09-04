<?php

class Masterajib_Ajaxpages_IndexController extends Mage_Core_Controller_Front_Action {
    
    public function acceptRequest($customerId, $fromCustomerId){
        $customer = Mage::getModel('customer/customer')->load($customerId);
        $arrAllFollowersIds = explode(",", $customer->getFollowersIds());
        array_diff($arrAllFollowersIds, array($fromCustomerId));
        array_unique($arrAllFollowersIds);
        $customer->setFollowersIds(rtrim(ltrim(implode(",", $arrAllFollowersIds), ","), ","));
        
        $arrConfirmFriends = explode(",", $customer->getConfirmFriends());
        array_push($arrConfirmFriends, $fromCustomerId);
        array_unique($arrConfirmFriends);
        
        $customer->setConfirmFriends(rtrim(ltrim(implode(",", $arrConfirmFriends), ","), ","));
        $customer->save();
    }
    
    public function AcceptFollowRequestAction(){
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getID();
        $fromCustomerId = $_REQUEST['custid'];
        
        $this->acceptRequest($customerId, $fromCustomerId);
        $this->acceptRequest($fromCustomerId, $customerId);
    }
    
    public function sendFollowRequestAction(){
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getID();
        $toCustomerId = $_REQUEST['custid'];
        $customer = Mage::getModel('customer/customer')->load($toCustomerId);
        $arrAllFollowersIds = explode(",", $customer->getFollowersIds());
        array_push($arrAllFollowersIds, $customerId);
        array_unique($arrAllFollowersIds);
        $customer->setFollowersIds(rtrim(ltrim(implode(",", $arrAllFollowersIds), ","), ","));
        $customer->save();
    }

    public function uploadProfileAndBackgroundImageAction() {
        $upload_type = $_REQUEST['upload_type'];
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getID();
        if (isset($_FILES['profiledp']['name']) && $_FILES['profiledp']['name'] != '') {
            try {
                $path = Mage::getBaseDir('media') . DS . "users" . DS . $customerId . DS . $upload_type . DS;
                if (!file_exists('path/to/directory')) {
                    mkdir($path, 0777, true);
                }
                $uploader = new Varien_File_Uploader('profiledp');
                $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(false);
                //$destFile = $path . str_replace(' ', '_', $_FILES['img']['name']);
                $ext = pathinfo($_FILES['profiledp']['name'], PATHINFO_EXTENSION); //getting image extension
                $filename = rand(100000,999999) . "." . $ext;
                $uploader->save($path, $filename);
            } catch (Exception $e) {
                
            }
            $customer = Mage::getModel('customer/customer')->load($customerId);
            if($upload_type == "DP"){
                $customer->setProfilePicture("users" . DS . $customerId . DS . $upload_type . DS . $filename);
            }elseif($upload_type == "BG"){
                $customer->setBackgroundPicture("users" . DS . $customerId . DS . $upload_type . DS . $filename);
            }
            
            $customer->save();
            
            $refererUrl = $this->_getRefererUrl();
            $this->getResponse()->setRedirect($refererUrl);
        }
    }

    public function indexAction() {
        $status = 0;
        $pageid = $_REQUEST['pageid'];
        $cmsPage = Mage::getModel('cms/page')->load($pageid);
        if (!empty($cmsPage)) {
            $status = 1;
        }
        $title = $cmsPage->getTitle();
        $identifier = $cmsPage->getIdentifier();
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getID();
        //$content = @file_get_contents(Mage::helper('cms/page')->getPageUrl($pageid) . "?customer_id=".Mage::getSingleton('customer/session')->getCustomer()->getID());
        $content = @file_get_contents(Mage::getBaseUrl() . 'linkanalysis?customer_id=' . $customerId);

        echo json_encode(array(
            'status' => $status,
            'title' => $title,
            'identifier' => 'linkanalysis', //$identifier,
            'content' => $content,
            'msg' => ''
                )
        );
    }

}
