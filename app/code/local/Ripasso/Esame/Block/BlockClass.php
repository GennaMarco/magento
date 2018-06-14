<?php 
/**
* class Ripasso_Esame_Block_BlockClass
*/
class Ripasso_Esame_Block_BlockClass extends Mage_Core_Block_Template
{
    protected function getAttributesOfProduct()
    {
        $product = Mage::registry('current_product');
        $attributes = $product->getAttributes();

        //get only frontend attributes of a product
        echo "Attributi visibili forntend: <br>";
        foreach ($attributes as $attribute) 
        {
            if ($attribute->getIsVisibleOnFront()) 
            {
                $attributeCode = $attribute->getAttributeCode();     
                $value = $attribute->getFrontend()->getValue($product);
                echo $attributeCode . '-' . $value; 
                echo "<br />";    
            }
        }

        // get all attributes of a product
        /*foreach ($attributes as $attribute) 
        {      
            $attributeCode = $attribute->getAttributeCode();
            $label = $attribute->getStoreLabel($product);   
            $value = $attribute->getFrontend()->getValue($product);
            echo $attributeCode . '-' . $label . '-' . $value; echo "<br />";    
        }*/
    }

    protected function isProductPage()
    {
        $isProduct = false;
        if(Mage::registry('current_product'))
            $isProduct = true;

        return $isProduct;
    }

    protected function getArrayOfProduct()
    {
        /*
        ATTENZIONE PEZZO DI CODICE PERICOLOSO, PRESTARE ATTENZIONE PRIMA DI SCOMMENTARE
        $product = Mage::registry('current_product');
        $model = Mage::getModel('catalog/product');

        $_product = $model->load($product->getId());
        echo "<pre>";
        var_dump($_product->setData('special_price', '1234'));
        echo "</pre>";
        $price = $_product->getData('special_price');
        $product->setMinimalPrice($price)->setPrice($price)->setFinalPrice($price)->save();

        $blocks = Mage::app()->getLayout()->getAllBlocks();
        $blockNames = array_keys($blocks);
        echo "<pre>";
        var_dump($blockNames);
        echo "</pre>";
        */
    }
}