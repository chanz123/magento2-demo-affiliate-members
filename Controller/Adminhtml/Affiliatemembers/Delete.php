<?php


namespace Affiliate\Members\Controller\Adminhtml\Affiliatemembers;

class Delete extends \Affiliate\Members\Controller\Adminhtml\Affiliatemembers
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('affiliatemembers_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Affiliate\Members\Model\Affiliatemembers');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Affiliatemembers.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['affiliatemembers_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Affiliatemembers to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
