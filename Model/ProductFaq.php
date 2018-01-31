<?php

namespace Inchoo\ProductFAQ\Model;

use Inchoo\ProductFAQ\Api\Data\QuestionsInterface;

/**
 * Class ProductFaq
 * @package Inchoo\ProductFAQ\Model
 */
class ProductFaq extends \Magento\Framework\Model\AbstractModel implements QuestionsInterface
{
    protected function _construct()
    {
        $this->_init(\Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq::class);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->getData(self::FAQ_ID);
    }

    /**
     * @param mixed $faqId
     * @return $this|mixed
     */
    public function setId($faqId)
    {
        return $this->setData(self::FAQ_ID, $faqId);
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    /**
     * @param $customerId
     * @return $this|mixed
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    /**
     * @return mixed
     */
    public function getCustomerEmail()
    {
        return $this->getData(self::CUSTOMER_EMAIL);
    }

    /**
     * @param $customerEmail
     * @return $this|mixed
     */
    public function setCustomerEmail($customerEmail)
    {
        return $this->setData(self::CUSTOMER_EMAIL, $customerEmail);
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * @param $productId
     * @return $this|mixed
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * @return mixed
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * @param $storeId
     * @return $this|mixed
     */
    public function setStoreId($storeId)
    {
        return $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * @param $question
     * @return $this|mixed
     */
    public function setQuestion($question)
    {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * @param $answer
     * @return $this|mixed
     */
    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * @return mixed
     */
    public function getDisplay()
    {
        return $this->getData(self::DISPLAY);
    }

    /**
     * @param $display
     * @return $this|mixed
     */
    public function setDisplay($display)
    {
        return $this->setData(self::DISPLAY, $display);
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @return array|mixed
     */
    public function getAvailableStatuses()
    {
        $data = [0 => 'not visible', 1 => 'visible'];

        return $data;
    }

}