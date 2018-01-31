<?php

namespace Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq;

/**
 * Class Collection
 * @package Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Inchoo\ProductFAQ\Model\ProductFaq::class,
            \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq::class
        );
    }
}