<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Inchoo\ProductFAQ\Ui\Component\ListingFaq\Column;

use Magento\Framework\Data\OptionSourceInterface;

class IsVisible implements OptionSourceInterface
{
    protected $productFaq;

    public function __construct(\Inchoo\ProductFAQ\Model\ProductFaq $productFaq)
    {
        $this->productFaq = $productFaq;
    }
    public function toOptionArray()
    {
        $availableOptions = $this->productFaq->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
