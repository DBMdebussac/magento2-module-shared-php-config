<?php
/**
 * Copyright © 2016 Owebia. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Owebia\AdvancedSettingCore\Model\Wrapper;

class ProductStockItem extends SourceWrapper
{

    /**
     * @var \Magento\CatalogInventory\Api\StockRegistryInterface
     */
    protected $stockRegistry;

    /**
     * @param \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param \Magento\Backend\Model\Auth\Session $backendAuthSession
     * @param \Magento\Quote\Model\Quote\Address\RateRequest $request
     * @param \Owebia\AdvancedSettingCore\Helper\Registry $registry
     * @param mixed $data
     */
    public function __construct(
        \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Backend\Model\Auth\Session $backendAuthSession,
        \Magento\Quote\Model\Quote\Address\RateRequest $request,
        \Owebia\AdvancedSettingCore\Helper\Registry $registry,
        $data = null
    ) {
        parent::__construct($objectManager, $backendAuthSession, $request, $registry, $data);
        $this->stockRegistry = $stockRegistry;
    }

    /**
     * @return \Magento\CatalogInventory\Api\Data\StockItemInterface
     */
    protected function loadSource()
    {
        return $this->stockRegistry
            ->getStockItem($this->data['product_id']);
    }
}
