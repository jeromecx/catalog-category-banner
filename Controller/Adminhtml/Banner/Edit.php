<?php
namespace JeromeCx\CatalogCategoryBanner\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory as ResultPageFactory;
use Magento\Backend\Model\View\Result\Page as ResultPage;
use Magento\Backend\Model\View\Result\Redirect as ResultRedirect;
use Magento\Framework\Registry;

/**
 * Edit CMS page action.
 */
class Edit extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'JeromeCx_CatalogCategoryBanner::banner';

    /**
     * Core registry
     *
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * @var ResultPageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param ResultPageFactory $resultPageFactory
     * @param Registry $registry
     */
    public function __construct(
        Context $context,
        ResultPageFactory $resultPageFactory,
        Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    /**
     * Init actions
     *
     * @return ResultPage
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var ResultPage $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('JeromeCx_CatalogCategoryBanner::banner')
            ->addBreadcrumb(__('Catalog Category Banner'), __('Catalog Category Banner'))
            ->addBreadcrumb(__('Manage Banners'), __('Manage Banners'));
        return $resultPage;
    }

    /**
     * Edit Banner
     *
     * @return ResultPage|ResultRedirect
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('banner_id');
        $model = $this->_objectManager->create(\JeromeCx\CatalogCategoryBanner\Model\Banner::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This banner no longer exists.'));
                /** @var ResultRedirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->_coreRegistry->register('catalogcategorybanner_banner', $model);

        // 5. Build edit form
        /** @var ResultPage $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Banner') : __('New Banner'),
            $id ? __('Edit Banner') : __('New Banner')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Banners'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle() : __('New Banner'));

        return $resultPage;
    }
}
