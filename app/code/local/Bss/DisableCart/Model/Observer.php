<?php
class Bss_DisableCart_Model_Observer
{
	public function disableCart(Varien_Event_Observer $observer){
		$storeId = Mage::app()->getStore()->getId();
		$totalItemsInCart = Mage::helper('checkout/cart')->getItemsCount();
		if(Mage::getStoreConfig('gotocheckout/general/enable', $storeId) && ($totalItemsInCart > 0)){
			$controller = $observer->getControllerAction();
        	$controller->getResponse()
        				->setRedirect(Mage::getUrl('checkout/onepage'),301)
        				->sendResponse();
        }
        return;
	}
		
}
