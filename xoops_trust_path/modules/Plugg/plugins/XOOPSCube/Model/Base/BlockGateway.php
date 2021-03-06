<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/XOOPSCube/Model/BlockGateway.php
*/
abstract class Plugg_XOOPSCube_Model_Base_BlockGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'block';
    }

    public function getFields()
    {
        return array('block_id' => Sabai_Model::KEY_TYPE_INT, 'block_created' => Sabai_Model::KEY_TYPE_INT, 'block_updated' => Sabai_Model::KEY_TYPE_INT, 'block_plugin' => Sabai_Model::KEY_TYPE_VARCHAR, 'block_widget' => Sabai_Model::KEY_TYPE_VARCHAR, 'block_block_id' => Sabai_Model::KEY_TYPE_INT);
    }

    protected function _getSelectByIdQuery($id, $fields)
    {
        return sprintf(
            'SELECT %s FROM %sblock WHERE block_id = %d',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $id
        );
    }

    protected function _getSelectByIdsQuery($ids, $fields)
    {
        return sprintf(
            'SELECT %s FROM %sblock WHERE block_id IN (%s)',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            implode(',', array_map('intval', $ids))
        );
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, $fields)
    {
        return sprintf(
            'SELECT %1$s FROM %2$sblock WHERE %3$s',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $criteriaStr
        );
    }

    protected function _getInsertQuery($values)
    {
        $values['block_created'] = time();
        $values['block_updated'] = 0;
        return sprintf("INSERT INTO %sblock(block_created, block_updated, block_plugin, block_widget, block_block_id) VALUES(%d, %d, %s, %s, %d)", $this->_db->getResourcePrefix(), $values['block_created'], $values['block_updated'], $this->_db->escapeString($values['block_plugin']), $this->_db->escapeString($values['block_widget']), $values['block_block_id']);
    }

    protected function _getUpdateQuery($id, $values)
    {
        $last_update = $values['block_updated'];
        $values['block_updated'] = time();
        return sprintf("UPDATE %sblock SET block_updated = %d, block_plugin = %s, block_widget = %s, block_block_id = %d WHERE block_id = %d AND block_updated = %d", $this->_db->getResourcePrefix(), $values['block_updated'], $this->_db->escapeString($values['block_plugin']), $this->_db->escapeString($values['block_widget']), $values['block_block_id'], $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$sblock WHERE block_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, $sets)
    {
        $sets['block_updated'] = 'block_updated=' . time();
        return sprintf('UPDATE %sblock SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$sblock WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$sblock WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }
}