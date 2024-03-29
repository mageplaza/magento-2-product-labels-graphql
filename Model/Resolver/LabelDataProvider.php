<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_ProductLabelsGraphQl
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

declare(strict_types=1);

namespace Mageplaza\ProductLabelsGraphQl\Model\Resolver;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\ProductLabels\Block\Label;
use Mageplaza\ProductLabels\Helper\Data;
use Mageplaza\ProductLabels\Model\LabelRepository;
use Mageplaza\ProductLabels\Model\Rule;

/**
 * Class LabelDataProvider
 * @package Mageplaza\ProductLabelsGraphQl\Model\Resolver
 */
class LabelDataProvider implements ResolverInterface
{
    /**
     * @var LabelRepository
     */
    protected $labelRepository;

    /**
     * @var Label
     */
    protected $label;

    /**
     * @var Data
     */
    protected $helperData;

    /**
     * LabelDataProvider constructor.
     *
     * @param LabelRepository $labelRepository
     * @param Label $label
     * @param Data $helperData
     */
    public function __construct(
        LabelRepository $labelRepository,
        Label $label,
        Data $helperData
    ) {
        $this->labelRepository = $labelRepository;
        $this->label           = $label;
        $this->helperData      = $helperData;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!$this->helperData->isEnabled()) {
            return [];
        }

        if (!array_key_exists('model', $value) || !$value['model'] instanceof ProductInterface) {
            throw new LocalizedException(__('"model" value should be specified'));
        }

        /* @var $product ProductInterface */
        $product   = $value['model'];
        $labelData = [];

        /** @var Rule $rule */
        foreach ($this->label->getRulesApplyProduct($product) as $rule) {
            if ($this->label->validateProductInRule($rule, $product->getId())) {
                $label = $this->labelRepository->getById($rule->getId());
                if (!$label || !$label->getId()) {
                    continue;
                }
                $label->setLabel($this->helperData->getCategoryProductLabel($rule->getLabel(), $product));
                $label->setListLabel($this->helperData->getCategoryProductLabel($rule->getListLabel(), $product));
                $labelData[] = $label;
            }
        }

        return $labelData;
    }
}
