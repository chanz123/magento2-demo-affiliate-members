<?php
namespace Affiliate\Members\Controller\Adminhtml\Affiliatemembers;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor        = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('affiliatemembers_id');        
            $model = $this->_objectManager->create('Affiliate\Members\Model\Affiliatemembers')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Affiliatemembers no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }           
            if($_FILES && $_FILES['Profile_Image']['tmp_name']){
                 $uploader = $this->_objectManager->create(
                    'Magento\MediaStorage\Model\File\Uploader',
                    ['fileId' => 'Profile_Image']
                );

                $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
               
                $imageAdapter = $this->_objectManager->get('Magento\Framework\Image\AdapterFactory')->create();
                $uploader->setAllowRenameFiles(true);
                $uploader->setFilesDispersion(true);
                
                $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
                    ->getDirectoryRead(DirectoryList::MEDIA);
                $result = $uploader->save($mediaDirectory->getAbsolutePath('profile_images'));
                if($result['error']==0)
                {
                    $data['Profile_Image'] = 'profile_images' . $result['file'];
                }   
            }                 
            $model->setData($data);        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Affiliatemembers.'));
                $this->dataPersistor->clear('affiliate_members_affiliatemembers');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['affiliatemembers_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Affiliatemembers.'));
            }
        
            $this->dataPersistor->set('affiliate_members_affiliatemembers', $data);
            return $resultRedirect->setPath('*/*/edit', ['affiliatemembers_id' => $this->getRequest()->getParam('affiliatemembers_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
