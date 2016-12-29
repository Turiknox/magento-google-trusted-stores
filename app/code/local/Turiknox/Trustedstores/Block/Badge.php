<?php
class Turiknox_Trustedstores_Block_Badge extends Mage_Core_Block_Template
{
    /**
     * Check if the module has been enabled in the admin
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->helper('turiknox_trustedstores')->isModuleEnabled();
    }

    /**
     * Get Trusted Stores ID
     *
     * @return int
     */
    public function getTrustedStoresId()
    {
        return (int) Mage::getStoreConfig('google/trustedstores/id');
    }

    /**
     * Get the badge position
     *
     * @return string
     */
    public function getBadgePosition()
    {
        return Mage::getStoreConfig('google/trustedstores/position');
    }
}