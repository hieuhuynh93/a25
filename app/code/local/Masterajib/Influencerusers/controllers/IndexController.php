<?php

class Masterajib_Influencerusers_IndexController extends Mage_Core_Controller_Front_Action {
    
    public function getFilesFromFileManagerAction(){
        $fileName = array();
        $fileIds = rtrim(ltrim($_REQUEST['fileIds'], ","), ",");
        //$resource = Mage::getSingleton('core/resource');
        //$readConnection = $resource->getConnection('core_read');
        foreach(explode(",", $fileIds) as $fileId){
            $modelFileManager = Mage::getModel('filemanager/filemanager')->load($fileId);
            //$query = 'SELECT * FROM media WHERE media_id='.$fileId;
            //$results = $readConnection->fetchAll($query);
            //if(count($results) > 0){
                array_push($fileName, $modelFileManager->getFilename());
            //}
        }
        echo implode(",", $fileName);
    }
    
    public function updateUserAction(){
        $id = $_REQUEST['id'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $contactNo = $_REQUEST['contact_no'];
        $url = '';
        try{
            $influencerModal = Mage::getModel('influencerusers/influencerusers')->load($id);
            if($influencerModal->getPlatform() == 2){
                $url = Mage::getBaseUrl() . 'smm-post-instagram';
            }
            $influencerModal->setPassword($password);
            $influencerModal->setEmail();
            $influencerModal->save();
        } catch (Exception $ex) {
            echo $ex; die();
        }
        if(strlen($url) <= 5){
            $url = Mage::getBaseUrl() . 'account_manager';
        }
        
        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
    }

    public function getFbDataAction() {
        $data = json_decode($_REQUEST['data'], true);
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $customerId = $customerData->getId();
        }
        try {
            $model = Mage::getModel('influencerusers/influencerusers');
            $model->setCustomerId($customerId);
            $model->setPlatformId($data['FBID']);
            $model->setPlatform('1');
            $model->setUsername($data['EMAIL']);
            $model->setPassword();
            $model->setEmail($data['EMAIL']);
            $model->setName($data['FULLNAME']);
            $model->setProfilePicture($data['PROFILE_PIC']);
            $model->setAuthorizedKey($data['ACCESS_TOKEN']);
            $model->setUserType('1');
            $model->setStatus('1');
            $model->setCreatedTime(now());
            $model->setUpdateTime(now());
            $model->save();
        } catch (Exception $ex) {
            
        }

        $url = Mage::getBaseUrl() . 'account_manager';
        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
    }

    public function getFacebookLoginAction() {
        $helper = Mage::helper('influencerusers/data');
        $facebookCredentialsArr = $helper->getFacebookCredentials();
        $url = 'https://www.socicos.com/scripts/1353/fbconfig.php?app_id=' . $facebookCredentialsArr['app_id'] . '&client_secrate=' . $facebookCredentialsArr['client_secrate'];

        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
    }

    public function instagramCallbackAction() {

        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customerData = Mage::getSingleton('customer/session')->getCustomer();
            $customerId = $customerData->getId();
        }

        $helper = Mage::helper('influencerusers/data');
        $instagramCredentialsArr = $helper->getIntagramCredentials();
        if (isset($_GET['code'])) {
            try {
                // Get the access token 
                $access_token = $helper->GetAccessToken($instagramCredentialsArr['INSTAGRAM_CLIENT_ID'], $instagramCredentialsArr['INSTAGRAM_REDIRECT_URI'], $instagramCredentialsArr['INSTAGRAM_CLIENT_SECRET'], $_GET['code']);

                // Get user information
                $user_info = $helper->GetUserProfileInfo($access_token);

                $fullName = $user_info['full_name'];
                $userId = $user_info['id'];
                $username = $user_info['username'];
                $userProfile = $user_info['profile_picture'];
                
                $post = $user_info['counts']['media'];
                $followers = $user_info['counts']['followed_by'];
                $following = $user_info['counts']['follows'];
                
                //echo "<pre>"; print_r($user_info); die();

                $model = Mage::getModel('influencerusers/influencerusers');
                $model->setCustomerId($customerId);
                $model->setPlatformId($userId);
                $model->setPlatform('2');
                $model->setUsername($username);
                $model->setPassword();
                $model->setEmail('');
                $model->setName($fullName);
                $model->setProfilePicture($userProfile);
                $model->setAuthorizedKey($access_token);
                $model->setPost($post);
                $model->setFollowers($followers);
                $model->setFollowing($following);
                $model->setUserType('1');
                $model->setStatus('1');
                $model->setCreatedTime(now());
                $model->setUpdateTime(now());
                $model->save();
            } catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }
        }
        $url = Mage::getBaseUrl() . 'account_manager';
        Mage::app()->getFrontController()->getResponse()->setRedirect($url);
    }

    public function deleteUserAction() {
        $status = 0;
        $msg = "";
        $html = '';
        $id = $_REQUEST['userId'];
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $model = Mage::getModel('influencerusers/influencerusers')->load($id);
            try {
                $model->delete();
                $status = 1;
                $msg = '<div class="alert alert-primary" role="alert">
                            ' . $model->getName() . ' Deleted Sucessfully.
                        </div>';
            } catch (Exception $ex) {
                
            }
        } else {
            $status = 2;
            $msg = '<div class="alert alert-danger" role="alert">
                        Session expired, Please login.
                    </div>';
        }
        $url = Mage::getBaseUrl() . 'account_manager/';
        $html = @file_get_contents($url);
        echo json_encode(array(
            'url' => $url,
            'status' => $status,
            'msg' => $msg
                )
        );
    }

    public function indexAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

}
