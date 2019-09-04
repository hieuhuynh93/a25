<?php
ini_set('display_errors', 1);
set_time_limit(0);
umask(0);
error_reporting(E_ALL);
require('../../../app/Mage.php');
Mage::init();
Mage::setIsDeveloperMode(true);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

$storeId = Mage::app()->getStore()->getStoreId();

$template_id = $_REQUEST['template_id'];
$template = Mage::getModel('pagebuilder/pagebuilder')->load($template_id);

include '../../topheading.php';
?>
<input type="hidden" id="templateId" value="<?php echo $template_id; ?>">
<?php
$title = 'ABCD';
echo str_replace("@@title@@", $title, $template->getContent());
?>