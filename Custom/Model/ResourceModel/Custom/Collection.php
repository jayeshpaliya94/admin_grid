<?php
namespace Jayesh\Custom\Model\ResourceModel\Custom;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Jayesh\Custom\Model\Custom', 'Jayesh\Custom\Model\ResourceModel\Custom');
    }
}