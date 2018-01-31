<?php

namespace Inchoo\ProductFAQ\Ui\Component\Form;

/**
 * Class DataProvider
 * @package Inchoo\ProductFAQ\Ui\Component\Form
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * DataProvider constructor.
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Inchoo\ProductFAQ\Model\ResourceModel\ProductFaq\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\ProductFactory $productModelFactory,
        array $meta = [],
        array $data = []
    )
    {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->productModelFactory = $productModelFactory;
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data = [];
        $dataObject = $this->getCollection()->getFirstItem();

        //var_dump($dataObject->getProductId()); die();

        $productLink = $this->productModelFactory->create()->setId($dataObject->getProductId())->getProductUrl();
        //var_dump($productLink);die();
        $data['link'] = $productLink;

        if($dataObject->getFaqId()) {
            $data[$dataObject->getFaqId()] = $dataObject->toArray();
        }

        return $data;
    }
}