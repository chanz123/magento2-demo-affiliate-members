<?php
use Affiliate\Members\Api\AffiliatemembersManagementInterface;
namespace Affiliate\Members\Model;
class AffiliatemembersManagement extends \Affiliate\Members\Model\AffiliatemembersRepository implements AffiliatemembersManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getAffiliatemembers()
    {
        return $this->getItems();
    }
}
