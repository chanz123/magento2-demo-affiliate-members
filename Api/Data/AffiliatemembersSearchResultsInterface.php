<?php


namespace Affiliate\Members\Api\Data;

interface AffiliatemembersSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    /**
     * Get Affiliatemembers list.
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface[]
     */
    
    public function getItems();

    /**
     * Set Affiliate_Id list.
     * @param \Affiliate\Members\Api\Data\AffiliatemembersInterface[] $items
     * @return $this
     */
    
    public function setItems(array $items);
}
