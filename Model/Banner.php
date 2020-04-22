<?php
namespace JeromeCx\CatalogCategoryBanner\Model;

use Magento\Framework\Model\AbstractModel;
use JeromeCx\CatalogCategoryBanner\Model\ResourceModel\Banner as BannerResourceModel;

class Banner extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(BannerResourceModel::class);
    }
}
