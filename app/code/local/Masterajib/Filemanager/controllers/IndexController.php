<?php
class Masterajib_Filemanager_IndexController extends Mage_Core_Controller_Front_Action
{
    
    public function deletesocicosfilesAction(){
        $fileIds = $_REQUEST['fileIds'];
        $fileIdsArr = explode(",", $fileIds);
        foreach($fileIdsArr as $fileId){
            
        }
    }
    
    public function getfolderobjectsAction(){
        $bulkuploadid = $_REQUEST['bulkuploadid'];
        $modelBulkPost = Mage::getModel('bulkposting/bulkposting')->load($bulkuploadid);
        $folder_name = $modelBulkPost->getFolderName() ;
        $files = array_reverse(scandir($folder_name));
        
        $imagePathArr = explode("/", $modelBulkPost->getFilename());
        $count = 0;
        $realFilePath = '';
        foreach($imagePathArr as $imagePath){
            $ext = pathinfo($imagePath, PATHINFO_EXTENSION);
            if($ext != "zip" && $count >= 4){
                $realFilePath .= $imagePath . DS;
            }
            $count++;
        }
        $realFilePath = rtrim($realFilePath, "/") . DS;
        
        $arrImages = array("jpg", "jpeg", "png");
        $arrVideos = array("avi", "mp4");
        
        $html = '';
        
        $html .= '<div class="col-md-8">
                    <div class="alert alert-warning" role="alert" style="padding: .3rem 1.25rem; border-radius: .5rem;">
                        You suppose to upload <b>50</b> more images in this folder
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" required="">
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                </div>';
        
        for($i = 0; $i < count($files); $i++){
            $fileExtension = pathinfo($files[$i], PATHINFO_EXTENSION);
            
            if(in_array($fileExtension, $arrImages)){
                $html .= '<div class="col-md-3" style="text-align: center;">
                                <div class="file-preview-frame" title="'.$files[$i].'" style="width:100%;">
                                    <img id="" style="width: 100%;" src="'. Mage::getBaseUrl( Mage_Core_Model_Store::URL_TYPE_WEB, true ) . $realFilePath . $files[$i].'" width="100%">
                                    <div class="file-thumbnail-footer">
                                        <div class="file-footer-caption" title="'.$files[$i].'">'.$files[$i].'</div>
                                    </div>
                                </div>
                            </div>';
            }elseif(in_array($fileExtension, $arrVideos)){
                $html .= '<div class="col-md-3" style="text-align: center;">
                                <div class="file-preview-frame" title="'.$files[$i].'" style="width:100%;">
                                    <video controls="" width="100%" height="160px">
                                        <source id="socicosDirImage" src="'.Mage::getBaseUrl( Mage_Core_Model_Store::URL_TYPE_WEB, true ) . $realFilePath . $files[$i].'" type="video/mp4">
                                        <div class="file-preview-other">
                                            <span class="file-icon-4x">
                                                <i class="glyphicon glyphicon-file"></i>
                                            </span>
                                        </div>
                                    </video>
                                    <div class="file-thumbnail-footer">
                                        <div class="file-footer-caption" title="'.$files[$i].'">'.$files[$i].'</div>
                                    </div>
                                </div>
                            </div>';
            }
        }
        
        echo $html;
    }
    
    public function indexAction()
    {
    	
    	/*
    	 * Load an object by id 
    	 * Request looking like:
    	 * http://site.com/filemanager?id=15 
    	 *  or
    	 * http://site.com/filemanager/id/15 	
    	 */
    	/* 
		$filemanager_id = $this->getRequest()->getParam('id');

  		if($filemanager_id != null && $filemanager_id != '')	{
			$filemanager = Mage::getModel('filemanager/filemanager')->load($filemanager_id)->getData();
		} else {
			$filemanager = null;
		}	
		*/
		
		 /*
    	 * If no param we load a the last created item
    	 */ 
    	/*
    	if($filemanager == null) {
			$resource = Mage::getSingleton('core/resource');
			$read= $resource->getConnection('core_read');
			$filemanagerTable = $resource->getTableName('filemanager');
			
			$select = $read->select()
			   ->from($filemanagerTable,array('filemanager_id','title','content','status'))
			   ->where('status',1)
			   ->order('created_time DESC') ;
			   
			$filemanager = $read->fetchRow($select);
		}
		Mage::register('filemanager', $filemanager);
		*/

			
		$this->loadLayout();     
		$this->renderLayout();
    }
}