<?php


namespace Affiliate\Members\Model\ResourceModel\Affiliatemembers;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Affiliate\Members\Model\Affiliatemembers',
            'Affiliate\Members\Model\ResourceModel\Affiliatemembers'
        );
    }
}
