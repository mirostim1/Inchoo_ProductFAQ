<?php

namespace Inchoo\ProductFAQ\Controller\Adminhtml\Questions;

use Magento\Framework\Controller\ResultFactory;

/**
 * Class Index
 * @package Inchoo\ProductFAQ\Controller\Adminhtml\Questions
 */
class Index extends \Magento\Backend\App\Action
{
    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Inchoo_ProductFAQ::questions');
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Inchoo_ProductFAQ::questions');
        $resultPage->getConfig()->getTitle()->prepend(__('F.A.Q. (Frequently Asked Questions)'));

        return $resultPage;
    }
}
