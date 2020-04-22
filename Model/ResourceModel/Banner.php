<?php
namespace JeromeCx\CatalogCategoryBanner\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Banner extends AbstractDb
{
    const TABLE_NAME = 'jeromecx_catalog_category_banner';
    const ID_FIELD_NAME = 'banner_id';

    /**
     * Initialize with table name and primary field
     */
    protected function _construct()
    {
        $this->_init(static::TABLE_NAME, static::ID_FIELD_NAME);
    }
}
