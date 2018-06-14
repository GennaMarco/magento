<?php
/**
 * class MADEGE_Verifica_Model_Observercustom
 */

class MADEGE_Verifica_Model_Observercustom
{
    public function onCatalogProductSaveBefore(Varien_Event_Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        if ($product instanceof Mage_Catalog_Model_Product) 
        {
            $StoreName = Mage::getStoreConfig('general/store_information/name');
            $categoryIds = $product->getCategoryIds();

            $categories = "";
            foreach($categoryIds as $categoryId) 
            {
              $category = Mage::getModel('catalog/category')->load($categoryId);
              $categories .= $category->getName();
            }

            $product->setData('meta_title', $product->getName()." - ". $StoreName);
            $product->setData('meta_keyword', $categories);
            $product->setData('meta_description', "Compra ". $product->getName()." su ". $StoreName ." a prezzi imbattibili");
        }
    }
}