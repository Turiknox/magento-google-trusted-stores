<?php
/*
 * Turiknox_Trustedstores

 * @category   Turiknox
 * @package    Turiknox_Trustedstores
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento-google-trusted-stores/blob/master/LICENSE.md
 * @version    1.0.2
 */
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