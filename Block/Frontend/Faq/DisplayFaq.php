<?php

namespace Inchoo\ProductFAQ\Block\Frontend\Faq;

use Magento\Framework\View\Element\Template\Context;
use Magento\Customer\Model\Session;
use Magento\Framework\Registry;

/**
 * Class DisplayFaq
 * @package Inchoo\ProductFAQ\Block\Frontend\Faq
 */
class DisplayFaq extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\CollectionFactory
     */
    protected $faqCollectionFactory;

    /**
     * DisplayFaq constructor.
     * @param Context $context
     * @param \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\CollectionFactory $faqCollectionFactory
     * @param Session $customerSession
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\CollectionFactory $faqCollectionFactory,
        Session $customerSession,
        Registry $registry
    )
    {
        $this->storeManager = $context->getStoreManager();
        $this->faqCollectionFactory = $faqCollectionFactory;
        $this->customerSession = $customerSession;
        $this->registry = $registry;
        parent::__construct($context);
    }

    /**
     * @return \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\Collection
     */
    public function getFaq()
    {
        $productId = $this->registry->registry('current_product')->getId();
        $storeId = $this->storeManager->getStore()->getId();

        $faqCollection = $this->faqCollectionFactory->create();
        $faqCollection->addFieldToFilter('product_id', ['eq' => $productId]);
        $faqCollection->addFieldToFilter('store_id', ['eg' => $storeId]);
        $faqCollection->addFieldToFilter('display', ['eq' => 1]);
        $faqCollection->setOrder('created_at', 'desc');

        return $faqCollection;
    }

    /**
     * @return int|null
     */
    public function userLoggedIn()
    {
        $isLoggedIn = $this->customerSession->getId();

        return $isLoggedIn;
    }

    /**
     * @return int|null
     */
    public function getCollectionSize()
    {
        $faqCollection = $this->faqCollectionFactory->create();

        return count($faqCollection);
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        $productId = $this->registry->registry('current_product')->getId();

        return $productId;
    }

    /**
     * @return mixed
     */
    public function getProductLink()
    {
        $productLink = $this->registry->registry('current_product')->getUrlKey();

        return $productLink;
    }
}