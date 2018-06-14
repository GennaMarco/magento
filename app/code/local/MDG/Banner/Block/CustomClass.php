<?php
/**
 * Class MDG_Banner_Block_CustomClass
 */
class MDG_Banner_Block_CustomClass extends Mage_Core_Block_Template
{
    public function getBlockText()
    {
        if ($this->isProductPage()) 
        {
            $messageBanner = 'PRODUCT BLOCK BANNER';

            $product = Mage::registry('current_product');
            $model = Mage::getModel('catalog/product');

            $_product = $model->load($product->getId()); 
            $stockQuantity = (int)Mage::getModel('cataloginventory/stock_item')->loadByProduct($_product)->getQty();
            if($stockQuantity < 5)
                $messageBanner = "Affrettati, rimangono pochi pezzi in magazzino";
        }
        else 
        {
            $messageBanner = 'CATEGORY BLOCK BANNER';
        }
        return sprintf('%s', $messageBanner);
    }

    protected function isProductPage()
    {
        $isProduct = false;
        if(Mage::registry('current_product'))
            $isProduct = true;

        return $isProduct;
    }
}