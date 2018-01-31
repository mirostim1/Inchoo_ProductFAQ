<?php

namespace Inchoo\ProductFAQ\Controller\Adminhtml\Questions;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Edit
 * @package Inchoo\ProductFAQ\Controller\Adminhtml\Questions
 */
class Edit extends \Magento\Backend\App\Action
{
    /**
     * Edit constructor.
     * @param Context $context
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        Context $context,
        ResultFactory $resultFactory
    )
    {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
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
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Inchoo_ProductFAQ::questions');
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Question'));

        return $resultPage;
    }
}