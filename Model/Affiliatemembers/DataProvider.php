<?php


namespace Affiliate\Members\Model\Affiliatemembers;

use Affiliate\Members\Model\ResourceModel\Affiliatemembers\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $collection;

    protected $loadedData;
    protected $dataPersistor;


    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $model) {
		 $itemData = $model->getData();
            $imageName = $itemData['Profile_Image']; // Your database field 
	if($imageName !=''){
	$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
         $media =  $objectManager->get('Magento\Store\Model\StoreManagerInterface')
                    ->getStore()
                    ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'profile_images'.$imageName;

            unset($itemData['image']);
            $itemData['image'] = array(
                array(
                    'name'  =>  $imageName,
                    'url'   =>  $media, // Should return a URL to view the image. For example, http://domain.com/pub/media/../../imagename.jpeg
		'file'	=>$imageName
                )
            );
}
           // $this->loadedData[$item->getItemId()] = $itemData;


            $this->loadedData[$model->getId()] = $itemData;
        }
        $data = $this->dataPersistor->get('affiliate_members_affiliatemembers');
        
        if (!empty($data)) {
            $model = $this->collection->getNewEmptyItem();
            $model->setData($data);
            $this->loadedData[$model->getId()] = $model->getData();
            $this->dataPersistor->clear('affiliate_members_affiliatemembers');
        }
        
        return $this->loadedData;
    }
}
