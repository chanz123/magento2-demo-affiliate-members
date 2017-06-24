<?php


namespace Affiliate\Members\Model;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Reflection\DataObjectProcessor;
use Affiliate\Members\Api\Data\AffiliatemembersInterfaceFactory;
use Affiliate\Members\Api\AffiliatemembersRepositoryInterface;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Affiliate\Members\Model\ResourceModel\Affiliatemembers\CollectionFactory as AffiliatemembersCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Affiliate\Members\Api\Data\AffiliatemembersSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Affiliate\Members\Model\ResourceModel\Affiliatemembers as ResourceAffiliatemembers;

class AffiliatemembersRepository implements AffiliatemembersRepositoryInterface
{

    protected $dataAffiliatemembersFactory;

    private $storeManager;

    protected $affiliatemembersFactory;

    protected $dataObjectProcessor;

    protected $searchResultsFactory;

    protected $resource;

    protected $affiliatemembersCollectionFactory;

    protected $dataObjectHelper;


    /**
     * @param ResourceAffiliatemembers $resource
     * @param AffiliatemembersFactory $affiliatemembersFactory
     * @param AffiliatemembersInterfaceFactory $dataAffiliatemembersFactory
     * @param AffiliatemembersCollectionFactory $affiliatemembersCollectionFactory
     * @param AffiliatemembersSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceAffiliatemembers $resource,
        AffiliatemembersFactory $affiliatemembersFactory,
        AffiliatemembersInterfaceFactory $dataAffiliatemembersFactory,
        AffiliatemembersCollectionFactory $affiliatemembersCollectionFactory,
        AffiliatemembersSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->affiliatemembersFactory = $affiliatemembersFactory;
        $this->affiliatemembersCollectionFactory = $affiliatemembersCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataAffiliatemembersFactory = $dataAffiliatemembersFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Affiliate\Members\Api\Data\AffiliatemembersInterface $affiliatemembers
    ) {
        /* if (empty($affiliatemembers->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $affiliatemembers->setStoreId($storeId);
        } */
        try {
            $affiliatemembers->getResource()->save($affiliatemembers);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the affiliatemembers: %1',
                $exception->getMessage()
            ));
        }
        return $affiliatemembers;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($affiliatemembersId)
    {
        $affiliatemembers = $this->affiliatemembersFactory->create();
        $affiliatemembers->getResource()->load($affiliatemembers, $affiliatemembersId);
        if (!$affiliatemembers->getId()) {
            throw new NoSuchEntityException(__('Affiliatemembers with id "%1" does not exist.', $affiliatemembersId));
        }
        return $affiliatemembers;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->affiliatemembersCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Affiliate\Members\Api\Data\AffiliatemembersInterface $affiliatemembers
    ) {
        try {
            $affiliatemembers->getResource()->delete($affiliatemembers);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Affiliatemembers: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($affiliatemembersId)
    {
        return $this->delete($this->getById($affiliatemembersId));
    }
}
