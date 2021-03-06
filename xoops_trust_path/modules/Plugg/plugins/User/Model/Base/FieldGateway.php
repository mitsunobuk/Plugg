<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/User/Model/FieldGateway.php
*/
abstract class Plugg_User_Model_Base_FieldGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'field';
    }

    public function getFields()
    {
        return array('field_id' => Sabai_Model::KEY_TYPE_INT, 'field_created' => Sabai_Model::KEY_TYPE_INT, 'field_updated' => Sabai_Model::KEY_TYPE_INT, 'field_name' => Sabai_Model::KEY_TYPE_VARCHAR, 'field_title' => Sabai_Model::KEY_TYPE_VARCHAR, 'field_description' => Sabai_Model::KEY_TYPE_TEXT, 'field_weight' => Sabai_Model::KEY_TYPE_INT, 'field_required' => Sabai_Model::KEY_TYPE_INT, 'field_collapsible' => Sabai_Model::KEY_TYPE_INT, 'field_collapsed' => Sabai_Model::KEY_TYPE_INT, 'field_settings' => Sabai_Model::KEY_TYPE_TEXT, 'field_fieldset' => Sabai_Model::KEY_TYPE_INT, 'field_field_id' => Sabai_Model::KEY_TYPE_INT, 'field_registerable' => Sabai_Model::KEY_TYPE_INT, 'field_editable' => Sabai_Model::KEY_TYPE_INT, 'field_visibility_default' => Sabai_Model::KEY_TYPE_VARCHAR, 'field_visibility_control' => Sabai_Model::KEY_TYPE_INT);
    }

    protected function _getSelectByIdQuery($id, $fields)
    {
        return sprintf(
            'SELECT %s FROM %sfield WHERE field_id = %d',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $id
        );
    }

    protected function _getSelectByIdsQuery($ids, $fields)
    {
        return sprintf(
            'SELECT %s FROM %sfield WHERE field_id IN (%s)',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            implode(',', array_map('intval', $ids))
        );
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, $fields)
    {
        return sprintf(
            'SELECT %1$s FROM %2$sfield WHERE %3$s',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $criteriaStr
        );
    }

    protected function _getInsertQuery($values)
    {
        $values['field_created'] = time();
        $values['field_updated'] = 0;
        return sprintf("INSERT INTO %sfield(field_created, field_updated, field_name, field_title, field_description, field_weight, field_required, field_collapsible, field_collapsed, field_settings, field_fieldset, field_field_id, field_registerable, field_editable, field_visibility_default, field_visibility_control) VALUES(%d, %d, %s, %s, %s, %d, %d, %d, %d, %s, %d, %d, %d, %d, %s, %d)", $this->_db->getResourcePrefix(), $values['field_created'], $values['field_updated'], $this->_db->escapeString($values['field_name']), $this->_db->escapeString($values['field_title']), $this->_db->escapeString($values['field_description']), $values['field_weight'], $values['field_required'], $values['field_collapsible'], $values['field_collapsed'], $this->_db->escapeString($values['field_settings']), $values['field_fieldset'], $values['field_field_id'], $values['field_registerable'], $values['field_editable'], $this->_db->escapeString($values['field_visibility_default']), $values['field_visibility_control']);
    }

    protected function _getUpdateQuery($id, $values)
    {
        $last_update = $values['field_updated'];
        $values['field_updated'] = time();
        return sprintf("UPDATE %sfield SET field_updated = %d, field_name = %s, field_title = %s, field_description = %s, field_weight = %d, field_required = %d, field_collapsible = %d, field_collapsed = %d, field_settings = %s, field_fieldset = %d, field_field_id = %d, field_registerable = %d, field_editable = %d, field_visibility_default = %s, field_visibility_control = %d WHERE field_id = %d AND field_updated = %d", $this->_db->getResourcePrefix(), $values['field_updated'], $this->_db->escapeString($values['field_name']), $this->_db->escapeString($values['field_title']), $this->_db->escapeString($values['field_description']), $values['field_weight'], $values['field_required'], $values['field_collapsible'], $values['field_collapsed'], $this->_db->escapeString($values['field_settings']), $values['field_fieldset'], $values['field_field_id'], $values['field_registerable'], $values['field_editable'], $this->_db->escapeString($values['field_visibility_default']), $values['field_visibility_control'], $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$sfield WHERE field_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, $sets)
    {
        $sets['field_updated'] = 'field_updated=' . time();
        return sprintf('UPDATE %sfield SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$sfield WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$sfield WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }
}