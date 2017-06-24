<?php


namespace Affiliate\Members\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface AffiliatemembersRepositoryInterface
{


    /**
     * Save Affiliatemembers
     * @param \Affiliate\Members\Api\Data\AffiliatemembersInterface $affiliatemembers
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function save(
        \Affiliate\Members\Api\Data\AffiliatemembersInterface $affiliatemembers
    );

    /**
     * Retrieve Affiliatemembers
     * @param string $affiliatemembersId
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getById($affiliatemembersId);

    /**
     * Retrieve Affiliatemembers matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Affiliate\Members\Api\Data\AffiliatemembersSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Affiliatemembers
     * @param \Affiliate\Members\Api\Data\AffiliatemembersInterface $affiliatemembers
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function delete(
        \Affiliate\Members\Api\Data\AffiliatemembersInterface $affiliatemembers
    );

    /**
     * Delete Affiliatemembers by ID
     * @param string $affiliatemembersId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function deleteById($affiliatemembersId);


}
