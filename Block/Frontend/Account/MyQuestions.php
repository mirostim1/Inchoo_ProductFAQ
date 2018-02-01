<?php

namespace Inchoo\ProductFAQ\Block\Frontend\Account;

use Magento\Framework\View\Element\Template\Context;
use Magento\Customer\Model\Session;
use Magento\Framework\Registry;

/**
 * Class MyQuestions
 * @package Inchoo\ProductFAQ\Block\Frontend\Account
 */
class MyQuestions extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\CollectionFactory
     * @var \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq
     * @var \Inchoo\ProductFAQ\Model\ProductFaq
     * @var \Magento\Catalog\Model\ProductFactory
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $faqCollectionFactory;
    protected $productFaqResource;
    protected $productFaqModelFactory;
    protected $productModelFactory;
    protected $date;

    /**
     * MyQuestions constructor.
     * @param Context $context
     * @param \Inchoo\ProductFAQ\Model\ProductFaqFactory $productFaqModelFactory
     * @param \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq $productFaqResource
     * @param \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\CollectionFactory $faqCollectionFactory
     * @param \Magento\Catalog\Model\ProductFactory $productModelFactory
     * @param Session $session
     * @param Registry $registry
     * @param \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone
     */
    public function __construct(
        Context $context,
        \Inchoo\ProductFAQ\Model\ProductFaqFactory $productFaqModelFactory,
        \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq $productFaqResource,
        \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\CollectionFactory $faqCollectionFactory,
        \Magento\Catalog\Model\ProductFactory $productModelFactory,
        Session $session,
        Registry $registry,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $date
    )
    {
        $this->productFaqModelFactory = $productFaqModelFactory;
        $this->productFaqResource = $productFaqResource;
        $this->faqCollectionFactory = $faqCollectionFactory;
        $this->productModelFactory = $productModelFactory;
        $this->session = $session;
        $this->registry = $registry;
        $this->date = $date;
        parent::__construct($context);
    }

    /**
     * @return \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\Collection
     */
    public function getQuestions()
    {
        $customerId = $this->session->getCustomerId();

        $faqCollection = $this->faqCollectionFactory->create();
        $faqCollection->addFieldToFilter('customer_id', ['eq' => $customerId]);
        $faqCollection->setOrder('created_at', 'desc');

        return $faqCollection;
    }

    /**
     * @param $productId
     * @return string
     */
    public function getLink($productId)
    {
        $product = $this->productModelFactory->create();
        $productLink = $product->setId($productId)->getProductUrl();

        return $productLink;
    }

    /**
     * @param $productFaqId
     * @return string
     */
    public function getDate($datetime)
    {
        $date = $this->formatDate($datetime);

        return $date;
    }

    /**
     * @param $productFaqId
     * @return string
     */
    public function getTime($datetime)
    {
        $time = $this->formatTime($datetime);

        return $time;
    }
}