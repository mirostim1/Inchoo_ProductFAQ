<?php

namespace Inchoo\ProductFAQ\Block\Adminhtml;

use Magento\Framework\View\Element\Template\Context;

/**
 * Class ProductPageLink
 * @package Inchoo\ProductFAQ\Block\Adminhtml
 */
class ProductPageLink extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Catalog\Model\ProductFactory
     * @var \Inchoo\ProductFAQ\Model\ProductFaqFactory
     * @var \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq
     */
    protected $productModelFactory;
    protected $productFaqModelFactory;
    protected $productFaqResource;

    /**
     * ProductPageLink constructor.
     * @param Context $context
     * @param \Magento\Catalog\Model\ProductFactory $productModelFactory
     * @param \Inchoo\ProductFAQ\Model\ProductFaqFactory $productFaqModelFactory
     * @param \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq $productFaqResource
     */
    public function __construct(
        Context $context,
        \Magento\Catalog\Model\ProductFactory $productModelFactory,
        \Inchoo\ProductFAQ\Model\ProductFaqFactory $productFaqModelFactory,
        \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq $productFaqResource
    )
    {
        parent::__construct($context);
        $this->productModelFactory = $productModelFactory;
        $this->productFaqModelFactory = $productFaqModelFactory;
        $this->productFaqResource = $productFaqResource;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        $product = $this->productFaqModelFactory->create();
        $this->productFaqResource->load($product, $this->getRequest()->getParam('faq_id', false));
        $productId = $product->getProductId();

        $product = $this->productModelFactory->create();
        $productLink = $product->setId($productId)->getProductUrl();

        return $productLink;
    }
}