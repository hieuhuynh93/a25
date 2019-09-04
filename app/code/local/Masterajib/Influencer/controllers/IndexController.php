<?php

class Masterajib_Influencer_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {
        //------------------ Account Activity Social Media Management--------
        $customerId = Mage::getSingleton('customer/session')->getCustomer()->getEntityId();
        $activityHelper = Mage::helper('accountactivity/data');
        $data['activity'] = 'Social Media Management & Influencer Program';
        $data['smm'] = '1';
        $data['customer_id'] = $customerId;
        $data['created_time'] = now();
        $activityHelper->setUserActivity($data);
        //--------------------------------------------------------------
        $this->loadLayout();
        $this->renderLayout();
    }

    public function uploadMediaAction() {
        $arrFiles = $_FILES['input2']['name'];
        $category = $_REQUEST['influencer_category'];
        $path = Mage::getBaseDir('media') . DS . "media_library" . DS . $category . DS;
        try {
            if (Mage::getSingleton('customer/session')->isLoggedIn()) {
                $customerData = Mage::getSingleton('customer/session')->getCustomer();
                $customerId = $customerData->getId();
                if (!(@is_dir($destinationFolder))) {
                    @mkdir($destinationFolder, 0777, true);
                }
                $i = 0;
             //   $writeConnection = Mage::getSingleton('core/resource')->getConnection('core_write');
                foreach ($_FILES['input2']['name'] as $key => $image) {
                    $uploader = new Mage_Core_Model_File_Uploader(
                            array(
                        'name' => $_FILES['input2']['name'][$i],
                        'type' => $_FILES['input2']['type'][$i],
                        'tmp_name' => $_FILES['input2']['tmp_name'][$i],
                        'error' => $_FILES['input2']['error'][$i],
                        'size' => $_FILES['input2']['size'][$i]
                            )
                    );
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(false);

                    // We set media as the upload dir
                    $ext = pathinfo($image, PATHINFO_EXTENSION); //getting image extension
                    $filename = rand(99999, 9999999999) . "." . $ext;
                    $uploader->save($path, $filename);
                    
                    $model = Mage::getModel('filemanager/filemanager');
                    $model->setCustomerId($customerId);
                    $model->setCategoryIds($category);
                    $model->setUploadType($ext);
                    $model->setFilename($category . DS . $filename);
                    $model->setStatus('1');
                    $model->setCreatedAt(now());
                    $model->setUpdateAt(now());
                  // $query = "INSERT INTO `media` (`media_id`, `customer_id`, `category_ids`, `upload_type`, `filename`, `customer_permission`, `created_at`, `updated_at`) VALUES (NULL, '".$customerId."', '" . $category . "', '" . $ext . "', '" . $filename . "', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
                  //$writeConnection->query($query);
                    $model->save();
                    $i++;
                }
            } else {
                echo "Session expired!Kindly Login again";
            }
            $refererUrl = $this->_getRefererUrl();
            if (empty($refererUrl)) {
                $refererUrl = empty($defaultUrl) ? Mage::getBaseUrl() : $defaultUrl;
            }
            Mage::getSingleton('core/session')->addSuccess("Successfully Uploaded");
            $this->getResponse()->setRedirect($refererUrl);
        } catch (Exception $ex) {
            
        }
    }

}
