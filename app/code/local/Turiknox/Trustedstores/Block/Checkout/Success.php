<?php
class Turiknox_Trustedstores_Block_Checkout_Success extends Mage_Core_Block_Template
{
    /**
     * Date format of estimated shipping/delivery date
     *
     * @var string
     */
    private $_dateFormat = 'Y-m-d';

    /**
     * Order object
     *
     * @Mage_Sales_Model_Order
     */
    protected $_order;

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
     * Turiknox_Trustedstores_Block_Checkout_Success constructor.
     */
    public function __construct()
    {
        $this->_order = Mage::getModel('sales/order')->loadByIncrementId(
            Mage::getSingleton('checkout/session')->getLastRealOrderId()
        );
        parent::__construct();
    }

    /**
     * Get order
     *
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        return $this->_order;
    }

    /**
     * Get the order ID
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->_order->getIncrementId();

    }

    /**
     * Get the customer email
     *
     * @return Mage_Customer_Model
     */
    public function getCustomerEmail()
    {
        return $this->_order->getCustomerEmail();
    }

    /**
     * Get the customer country code
     *
     * @return string
     */
    public function getCustomerCountry()
    {
        return $this->_order->getShippingAddress()->getCountryId();
    }

    /**
     * Get the order currency code.
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->_order->getOrderCurrencyCode();
    }

    /**
     * Get the order total
     */
    public function getGrandTotal()
    {
        return number_format($this->_order->getGrandTotal(), 2, '.' , '');
    }

    /**
     * Get the order discount
     *
     * @return string
     */
    public function getDiscounts()
    {
        return number_format($this->_order->getDiscountAmount(), 2, '.', '');
    }

    /**
     * Get the shipping amount.
     *
     * @return float
     */
    public function getShipping()
    {
        return number_format($this->_order->getShippingAmount(), 2, '.', '');
    }

    /**
     * @return mixed
     */
    public function getTax()
    {
        return number_format($this->_order->getTaxAmount(), 2, '.', '');
    }

    /**
     * Calculates the estimated shipping date
     *
     * @return string
     */
    public function getEstimatedShippingDate()
    {
        $createdAt = $this->getCreatedAt();
        return $this->_addDays($createdAt, (int) Mage::getStoreConfig('google/trustedstores/estimated_shipping'));
    }

    /**
     * Calculates the estimated delivery date
     *
     * @return string
     */
    public function getEstimatedDeliveryDate()
    {
        $createdAt = $this->getCreatedAt();
        return $this->_addDays($createdAt, (int) Mage::getStoreConfig('google/trustedstores/estimated_delivery'));
    }

    /**
     * Get order created at date
     *
     * @return Zend_Date
     */
    public function getCreatedAt()
    {
        return $this->_order->getCreatedAtDate();
    }

    /**
     * Add days to date
     *
     * @param $date
     * @param $daysToAdd
     *
     * @return bool|string
     */
    private function _addDays($date, $daysToAdd)
    {
        return date($this->_dateFormat, strtotime($date . ' + ' . $daysToAdd . ' days'));
    }

    /**
     * Check if the order contain virtual products
     *
     * @return bool
     */
    public function doesOrderContainDigitalProducts()
    {
        $containsDigitalProducts = false;
        foreach($this->getOrder()->getAllVisibleItems() as $item) {
            if ($item->getIsVirtual()) {
                $containsDigitalProducts = true;
            }
        }
        return $containsDigitalProducts;
    }

    /**
     * Check if the order contains back ordered products
     *
     * @return bool
     */
    public function doesOrderContainBackOrder()
    {
        $containsBackOrder = false;
        foreach($this->getOrder()->getAllVisibleItems() as $item) {
            if($item->getQtyBackordered()) {
                $containsBackOrder = true;
            }
        }
        return $containsBackOrder;
    }
}