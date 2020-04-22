<?php
namespace JeromeCx\CatalogCategoryBanner\Model\ResourceModel\Banner;

use JeromeCx\CatalogCategoryBanner\Model\ResourceModel\Banner;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use JeromeCx\CatalogCategoryBanner\Model\Banner as BannerModel;
use JeromeCx\CatalogCategoryBanner\Model\ResourceModel\Banner as BannerResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(BannerModel::class, BannerResourceModel::class);
    }
}
