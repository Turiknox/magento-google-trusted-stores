<?php
/*
 * Turiknox_Trustedstores

 * @category   Turiknox
 * @package    Turiknox_Trustedstores
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/Turiknox/magento-google-trusted-stores/blob/master/LICENSE.md
 * @version    1.0.2
 */
class Turiknox_Trustedstores_Block_Badge extends Mage_Core_Block_Template
{
    /**
     * Check if the module has been enabled in the admin
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->helper('turiknox_trustedstores')->isModuleEnabledInAdmin();
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