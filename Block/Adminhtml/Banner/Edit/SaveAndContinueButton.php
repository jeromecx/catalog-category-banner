<?php
namespace JeromeCx\CatalogCategoryBanner\Block\Adminhtml\Banner\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveAndContinueButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [
            'label' => __('Save and Continue Edit'),
            'class' => 'save',
            'on_click' => '',
            /*'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'saveAndContinueEdit'],],
            ],*/
            'sort_order' => 80,
        ];
        return $data;
    }
}
