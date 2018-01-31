<?php

namespace Inchoo\ProductFAQ\Ui\Component\ListingFaq\Column;

use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class EditActions
 * @package Inchoo\ProductFAQ\Ui\Component\ListingFaq\Column
 */
class EditActions extends Column
{
    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }
        foreach ($dataSource['data']['items'] as & $item) {
            if (isset($item['faq_id'])) {
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $this->context->getUrl(
                            'productfaq/questions/edit',
                            ['faq_id' => $item['faq_id']]
                        ),
                        'label' => __('Edit')
                    ]
                ];
            }
        }
        return $dataSource;
    }
}