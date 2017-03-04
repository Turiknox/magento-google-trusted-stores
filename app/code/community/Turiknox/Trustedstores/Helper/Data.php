<?php
/*
 * Turiknox_Trustedstores

 * @category   Turiknox
 * @package    Turiknox_Trustedstores
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento-google-trusted-stores/blob/master/LICENSE.md
 * @version    1.0.2
 */
class Turiknox_Trustedstores_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Check if the module has been enabled in the admin
     *
     * @return bool
     */
    public function isModuleEnabledInAdmin()
    {
        return Mage::getStoreConfigFlag('google/trustedstores/enable');
    }
}