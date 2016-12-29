<?php
class Turiknox_Trustedstores_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Check if the module has been enabled in the admin
     *
     * @return bool
     */
    public function isModuleEnabled()
    {
        return (bool) Mage::getStoreConfig('google/trustedstores/enable');
    }
}