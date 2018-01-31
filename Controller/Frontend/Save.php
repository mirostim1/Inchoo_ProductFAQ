<?php

namespace Inchoo\ProductFAQ\Controller\Frontend;

use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template\Context as ContextStoreManager;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class Save
 * @package Inchoo\ProductFAQ\Controller\Frontend
 */
class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Inchoo\ProductFAQ\Model\ProductFaqFactory
     * @var \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq
     * @var \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\Collection
     */
    protected $productFaqFactory;
    protected $productFaqResource;
    protected $faqCollectionFactory;

    /**
     * Save constructor.
     * @param Context $context
     * @param ContextStoreManager $contextStoreManager
     * @param Session $customerSession
     * @param Registry $registry
     * @param \Inchoo\ProductFAQ\Model\ProductFaqFactory $productFaqFactory
     * @param \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq $productFaqResource
     * @param \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\CollectionFactory $faqCollectionFactory
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        Context $context,
        ContextStoreManager $contextStoreManager,
        Session $customerSession,
        Registry $registry,
        \Inchoo\ProductFAQ\Model\ProductFaqFactory $productFaqFactory,
        \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq $productFaqResource,
        \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\CollectionFactory $faqCollectionFactory,
        ManagerInterface $messageManager
    )
    {
        $this->customerSession = $customerSession;
        $this->registry = $registry;
        $this->productFaqFactory = $productFaqFactory;
        $this->productFaqResource = $productFaqResource;
        $this->faqCollectionFactory = $faqCollectionFactory;
        $this->storeManager = $contextStoreManager->getStoreManager();
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     * @throws \Exception
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function execute()
    {
        if (!$this->customerSession->isLoggedIn()) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('customer/account/login');

            return $resultRedirect;
        }

        $productId = $this->getRequest()->getParam('product_id', false);

        $customerId = $this->customerSession->getId();
        $customerEmail = $this->customerSession->getCustomer()->getEmail();

        $storeId = $this->storeManager->getStore()->getId();

        $faq = $this->productFaqFactory->create();

        $faq->setProductId($productId);
        $faq->setStoreId($storeId);
        $faq->setCustomerId($customerId);
        $faq->setCustomerEmail($customerEmail);
        $faq->setQuestion($this->getRequest()->getParam('question', false));
        $faq->setDisplay($this->getRequest()->getParam('display', false));

        $save = $this->productFaqResource->save($faq);

        if($save) {
            $this->messageManager->addSuccessMessage(__('Question has been successfully saved'));
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath($this->_redirect->getRefererUrl());

        return $resultRedirect;
    }
}
