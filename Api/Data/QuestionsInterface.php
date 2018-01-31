<?php

namespace Inchoo\ProductFAQ\Api\Data;

/**
 * Interface QuestionsInterface
 * @package Inchoo\ProductFAQ\Api\Data
 */
interface QuestionsInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const FAQ_ID         = 'faq_id';
    const CUSTOMER_ID    = 'customer_id';
    const CUSTOMER_EMAIL = 'customer_email';
    const STORE_ID       = 'store_id';
    const PRODUCT_ID     = 'product_id';
    const QUESTION       = 'question';
    const ANSWER         = 'answer';
    const DISPLAY        = 'display';
    const CREATED_AT     = 'created_at';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $faqId
     * @return mixed
     */
    public function setId($faqId);

    /**
     * @return mixed
     */
    public function getCustomerId();

    /**
     * @param $customerId
     * @return mixed
     */
    public function setCustomerId($customerId);

    /**
     * @return mixed
     */
    public function getCustomerEmail();

    /**
     * @param $customerEmail
     * @return mixed
     */
    public function setCustomerEmail($customerEmail);

    /**
     * @return mixed
     */
    public function getStoreId();

    /**
     * @param $storeId
     * @return mixed
     */
    public function setStoreId($storeId);

    /**
     * @return mixed
     */
    public function getProductId();

    /**
     * @param $productId
     * @return mixed
     */
    public function setProductId($productId);

    /**
     * @return mixed
     */
    public function getQuestion();

    /**
     * @param $question
     * @return mixed
     */
    public function setQuestion($question);

    /**
     * @return mixed
     */
    public function getAnswer();

    /**
     * @param $answer
     * @return mixed
     */
    public function setAnswer($answer);

    /**
     * @return mixed
     */
    public function getDisplay();

    /**
     * @param $display
     * @return mixed
     */
    public function setDisplay($display);

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @return mixed
     */
    public function getAvailableStatuses();
}