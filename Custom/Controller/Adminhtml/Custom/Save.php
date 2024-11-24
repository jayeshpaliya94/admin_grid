<?php
namespace Jayesh\Custom\Controller\Adminhtml\Custom;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Jayesh\Custom\Model\CustomFactory
     */
    var $CustomFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Jayesh\Custom\Model\CustomFactory $CustomFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Jayesh\Custom\Model\CustomFactory $CustomFactory
    ) {
        parent::__construct($context);
        $this->CustomFactory = $CustomFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('custom/custom/addrow');
            return;
        }
        try {
            $rowData = $this->CustomFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('custom/custom/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Jayesh_Custom::save');
    }
}