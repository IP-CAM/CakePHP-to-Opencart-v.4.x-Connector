<?php

namespace CakePHPOpencart\Model\Entity\OpencartAbstract;

abstract class AbstractOrder extends \CakePHPOpencart\Model\Entity\Entity
{

    protected function _getPaymentFullName()
    {
        return sprintf(
            '%s %s',
            trim($this->payment_firstname), trim($this->payment_lastname)
        );
    }

    protected function _getShippingFullName()
    {
        return sprintf(
            '%s %s',
            trim($this->shipping_firstname), trim($this->shipping_lastname)
        );
    }

    private function _formatAddress($type) {
        $order_info = $this->toArray();
        $address_format = $this->{$type.'_address_format'};
        if (empty($address_format)) {
            $country_info = $this->{$type.'_country_info'};
            $address_format = $country_info->address_format;
        }
        return preg_replace_callback(
            "@\{([a-z_0-9]+)\}@iu",
            function($m) use($order_info, $type) {
                return $order_info[$type.'_'.$m[1]];
            },
            $address_format
        );
    }

    protected function _getPaymentAddress() {
        return $this->_formatAddress('payment');
    }

    protected function _getShippingAddress() {
        return $this->_formatAddress('shipping');
    }

}
