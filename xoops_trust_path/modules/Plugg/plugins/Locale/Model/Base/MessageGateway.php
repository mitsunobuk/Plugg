<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Locale/Model/MessageGateway.php
*/
abstract class Plugg_Locale_Model_Base_MessageGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'message';
    }

    public function getFields()
    {
        return array('message_id' => Sabai_Model::KEY_TYPE_INT, 'message_created' => Sabai_Model::KEY_TYPE_INT, 'message_updated' => Sabai_Model::KEY_TYPE_INT, 'message_key' => Sabai_Model::KEY_TYPE_TEXT, 'message_lang' => Sabai_Model::KEY_TYPE_VARCHAR, 'message_localized' => Sabai_Model::KEY_TYPE_TEXT, 'message_plugin' => Sabai_Model::KEY_TYPE_VARCHAR);
    }

    protected function _getSelectByIdQuery($id, $fields)
    {
        return sprintf(
            'SELECT %s FROM %smessage WHERE message_id = %d',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $id
        );
    }

    protected function _getSelectByIdsQuery($ids, $fields)
    {
        return sprintf(
            'SELECT %s FROM %smessage WHERE message_id IN (%s)',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            implode(',', array_map('intval', $ids))
        );
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, $fields)
    {
        return sprintf(
            'SELECT %1$s FROM %2$smessage WHERE %3$s',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $criteriaStr
        );
    }

    protected function _getInsertQuery($values)
    {
        $values['message_created'] = time();
        $values['message_updated'] = 0;
        return sprintf("INSERT INTO %smessage(message_created, message_updated, message_key, message_lang, message_localized, message_plugin) VALUES(%d, %d, %s, %s, %s, %s)", $this->_db->getResourcePrefix(), $values['message_created'], $values['message_updated'], $this->_db->escapeString($values['message_key']), $this->_db->escapeString($values['message_lang']), $this->_db->escapeString($values['message_localized']), $this->_db->escapeString($values['message_plugin']));
    }

    protected function _getUpdateQuery($id, $values)
    {
        $last_update = $values['message_updated'];
        $values['message_updated'] = time();
        return sprintf("UPDATE %smessage SET message_updated = %d, message_key = %s, message_lang = %s, message_localized = %s, message_plugin = %s WHERE message_id = %d AND message_updated = %d", $this->_db->getResourcePrefix(), $values['message_updated'], $this->_db->escapeString($values['message_key']), $this->_db->escapeString($values['message_lang']), $this->_db->escapeString($values['message_localized']), $this->_db->escapeString($values['message_plugin']), $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$smessage WHERE message_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, $sets)
    {
        $sets['message_updated'] = 'message_updated=' . time();
        return sprintf('UPDATE %smessage SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$smessage WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$smessage WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }
}