<?php


namespace Affiliate\Members\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $table_affiliate_affiliatemembers = $setup->getConnection()->newTable($setup->getTable('affiliate_affiliatemembers'));

        
        $table_affiliate_affiliatemembers->addColumn(
            'affiliatemembers_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            array('identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,),
            'Entity ID'
        );        
        $table_affiliate_affiliatemembers->addColumn(
            'Name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'Name'
        );
        
        $table_affiliate_affiliatemembers->addColumn(
            'Status',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [],
            'Status'
        );
        $table_affiliate_affiliatemembers->addColumn(
            'Profile_Image',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'Profile_Image'
        );
        $table_affiliate_affiliatemembers->addColumn(
            'Created',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            [],
            'Created'
        );
        $table_affiliate_affiliatemembers->addColumn(
            'Modified',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            [],
            'Modified'
        );
        

        $setup->getConnection()->createTable($table_affiliate_affiliatemembers);

        $setup->endSetup();
    }
}
