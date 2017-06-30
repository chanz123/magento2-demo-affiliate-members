<?php


namespace Affiliate\Members\Api\Data;

interface AffiliatemembersInterface
{

    const PROFILE_IMAGE = 'Profile_Image';
    const NAME = 'Name';
    const AFFILIATEMEMBERS_ID = 'affiliatemembers_id';
    const AFFILIATE_ID = 'Affiliate_Id';
    const STATUS = 'Status';
    const CREATED = 'Created';
    const MODIFIED = 'Modified';


    /**
     * Get affiliatemembers_id
     * @return string|null
     */
    
    public function getAffiliatemembersId();

    /**
     * Set affiliatemembers_id
     * @param string $affiliatemembers_id
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    
    public function setAffiliatemembersId($affiliatemembersId);

    /**
     * Get Affiliate_Id
     * @return string|null
     */
    
    public function getAffiliateId();

    /**
     * Set Affiliate_Id
     * @param string $Affiliate_Id
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    
    public function setAffiliateId($Affiliate_Id);

    /**
     * Get Name
     * @return string|null
     */
    
    public function getName();

    /**
     * Set Name
     * @param string $Name
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    
    public function setName($Name);

    /**
     * Get Status
     * @return string|null
     */
    
    public function getStatus();

    /**
     * Set Status
     * @param string $Status
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    
    public function setStatus($Status);

    /**
     * Get Profile_Image
     * @return string|null
     */
    
    public function getProfileImage();

    /**
     * Set Profile_Image
     * @param string $Profile_Image
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    
    public function setProfileImage($Profile_Image);

    /**
     * Get Created
     * @return string|null
     */
    
    public function getCreated();

    /**
     * Set Created
     * @param string $Created
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    
    public function setCreated($Created);

    /**
     * Get Modified
     * @return string|null
     */
    
    public function getModified();

    /**
     * Set Modified
     * @param string $Modified
     * @return \Affiliate\Members\Api\Data\AffiliatemembersInterface
     */
    
    public function setModified($Modified);


}
