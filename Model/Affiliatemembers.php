<?php
namespace Affiliate\Members\Model;
use Affiliate\Members\Api\Data\AffiliatemembersInterface;
class Affiliatemembers extends \Magento\Framework\Model\AbstractModel implements AffiliatemembersInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Affiliate\Members\Model\ResourceModel\Affiliatemembers');
    }

    /**
     * Get affiliatemembers_id
     * @return string
     */
    public function getAffiliatemembersId()
    {
        return $this->getData(self::AFFILIATEMEMBERS_ID);
    }

    /**
     * Set affiliatemembers_id
     * @param string $affiliatemembersId
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    public function setAffiliatemembersId($affiliatemembersId)
    {
        return $this->setData(self::AFFILIATEMEMBERS_ID, $affiliatemembersId);
    }

    /**
     * Get Affiliate_Id
     * @return string
     */
    public function getAffiliateId()
    {
        return $this->getData(self::AFFILIATE_ID);
    }

    /**
     * Set Affiliate_Id
     * @param string $Affiliate_Id
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    public function setAffiliateId($Affiliate_Id)
    {
        return $this->setData(self::AFFILIATE_ID, $Affiliate_Id);
    }

    /**
     * Get Name
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Name
     * @param string $Name
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    public function setName($Name)
    {
        return $this->setData(self::NAME, $Name);
    }

    /**
     * Get Status
     * @return string
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set Status
     * @param string $Status
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    public function setStatus($Status)
    {
        return $this->setData(self::STATUS, $Status);
    }

    /**
     * Get Profile_Image
     * @return string
     */
    public function getProfileImage()
    {
        return $this->getData(self::PROFILE_IMAGE);
    }

    /**
     * Set Profile_Image
     * @param string $Profile_Image
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    public function setProfileImage($Profile_Image)
    {
        return $this->setData(self::PROFILE_IMAGE, $Profile_Image);
    }

    /**
     * Get Created
     * @return string
     */
    public function getCreated()
    {
        return $this->getData(self::CREATED);
    }

    /**
     * Set Created
     * @param string $Created
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    public function setCreated($Created)
    {
        return $this->setData(self::CREATED, $Created);
    }

    /**
     * Get Modified
     * @return string
     */
    public function getModified()
    {
        return $this->getData(self::MODIFIED);
    }

    /**
     * Set Modified
     * @param string $Modified
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    public function setModified($Modified)
    {
        return $this->setData(self::MODIFIED, $Modified);
    }
}
