<?php
class Turiknox_Trustedstores_Model_Source_Badgeposition
{
    public function toOptionArray()
    {
        return array(
            array('value' => Mage::helper('core')->__('BOTTOM_LEFT'), 'label' => Mage::helper('core')->__('Bottom Left')),
            array('value' => Mage::helper('core')->__('BOTTOM_RIGHT'), 'label' => Mage::helper('core')->__('Bottom Right')),
        );
    }
}