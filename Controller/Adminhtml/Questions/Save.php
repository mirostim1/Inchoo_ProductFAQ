<?php

namespace Inchoo\ProductFAQ\Controller\Adminhtml\Questions;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;

/**
 * Class Save
 * @package Inchoo\ProductFAQ\Controller\Adminhtml\Questions
 */
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Inchoo\ProductFAQ\Model\ProductFaqFactory
     * @var \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq
     * @var \Magento\Framework\Controller\ResultFactory
     * @var \Magento\Framework\Message\ManagerInterface
     */
    protected $productFaqModelFactory;
    protected $productFaqResource;
    protected $resultFactory;
    protected $messageManager;

    /**
     * Save constructor.
     * @param Action\Context $context
     * @param \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq $productFaqResource
     * @param \Inchoo\ProductFAQ\Model\ProductFaqFactory $productFaqModelFactory
     * @param ResultFactory $resultFactory
     * @param ManagerInterface $messageManager
     */
    public function __construct(
        Action\Context $context,
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
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function execute()
    {
        $faqId = $this->getRequest()->getParam('faq_id', false);
        $question = $this->getRequest()->getParam('question', false);
        $answer = $this->getRequest()->getParam('answer', false);
        $display = $this->getRequest()->getParam('display', false);

        $productFaq = $this->productFaqModelFactory->create();
        $productFaq->setId($faqId);
        $productFaq->setQuestion($question);
        $productFaq->setAnswer($answer);
        $productFaq->setDisplay($display);

        $this->productFaqResource->save($productFaq);

        $this->messageManager->addSuccessMessage(__("F.A.Q. with Id #$faqId has been successfully edited"));

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('productfaq/questions/index');

        return $resultRedirect;
    }
}