<?php

namespace Inchoo\ProductFAQ\Controller\Adminhtml\Questions;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class Delete
 * @package Inchoo\ProductFAQ\Controller\Adminhtml\Questions
 */
class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq
     * @var \Inchoo\ProductFAQ\Model\ProductFaqFactory
     * @var \Magento\Framework\Controller\ResultFactory
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $productFaqResource;
    protected $productFaqModelFactory;
    protected $resultFactory;
    protected $messageManager;

    /**
     * Delete constructor.
     * @param Context $context
     * @param \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq $productFaqResource
     * @param \Inchoo\ProductFAQ\Model\ProductFaqFactory $productFaqModelFactory
     * @param ResultFactory $resultFactory
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        Context $context,
        \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq $productFaqResource,
        \Inchoo\ProductFAQ\Model\ProductFaqFactory $productFaqModelFactory,
        ResultFactory $resultFactory,
        ManagerInterface $messageManager
    )
    {
        parent::__construct($context);
        $this->productFaqResource = $productFaqResource;
        $this->productFaqModelFactory = $productFaqModelFactory;
        $this->resultFactory = $resultFactory;
        $this->messageManager = $messageManager;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Inchoo_ProductFAQ::questions');
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     * @throws \Exception
     */
    public function execute()
    {
        $faqId = $this->getRequest()->getParam('faq_id', false);

        $productFaq = $this->productFaqModelFactory->create();

        $this->productFaqResource->load($productFaq, $faqId);

        $this->productFaqResource->delete($productFaq);

        $this->messageManager->addSuccessMessage(__("F.A.Q with ID #$faqId has been successfully deleted"));

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('productfaq/questions/index');

        return $resultRedirect;
    }
}
