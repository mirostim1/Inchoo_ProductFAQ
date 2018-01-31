<?php

namespace Inchoo\ProductFAQ\Model\ResourceModel;

/**
 * Class ProductFaq
 * @package Inchoo\ProductFAQ\Model\ResourceModel
 */
class ProductFaq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('inchoo_productfaq', 'faq_id');
    }
}
