<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
pluginsy/Forum/Model/ViewGateway.php
*/
abstract class Plugg_Forum_Model_Base_ViewGateway extends Sabai_Model_Gateway
{
    public function getName()
    {
        return 'view';
    }

    public function getFields()
    {
        return array('view_id' => Sabai_Model::KEY_TYPE_INT, 'view_created' => Sabai_Model::KEY_TYPE_INT, 'view_updated' => Sabai_Model::KEY_TYPE_INT, 'view_last_viewed' => Sabai_Model::KEY_TYPE_INT, 'view_topic_id' => Sabai_Model::KEY_TYPE_INT, 'view_user_id' => Sabai_Model::KEY_TYPE_INT);
    }

    protected function _getSelectByIdQuery($id, $fields)
    {
        return sprintf(
            'SELECT %s FROM %sview WHERE view_id = %d',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $id
        );
    }

    protected function _getSelectByIdsQuery($ids, $fields)
    {
        return sprintf(
            'SELECT %s FROM %sview WHERE view_id IN (%s)',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            implode(',', array_map('intval', $ids))
        );
    }

    protected function _getSelectByCriteriaQuery($criteriaStr, $fields)
    {
        return sprintf(
            'SELECT %1$s FROM %2$sview WHERE %3$s',
            empty($fields) ? '*' : implode(', ', $fields),
            $this->_db->getResourcePrefix(),
            $criteriaStr
        );
    }

    protected function _getInsertQuery($values)
    {
        $values['view_created'] = time();
        $values['view_updated'] = 0;
        return sprintf("INSERT INTO %sview(view_created, view_updated, view_last_viewed, view_topic_id, view_user_id) VALUES(%d, %d, %d, %d, %d)", $this->_db->getResourcePrefix(), $values['view_created'], $values['view_updated'], $values['view_last_viewed'], $values['view_topic_id'], $values['view_user_id']);
    }

    protected function _getUpdateQuery($id, $values)
    {
        $last_update = $values['view_updated'];
        $values['view_updated'] = time();
        return sprintf("UPDATE %sview SET view_updated = %d, view_last_viewed = %d, view_topic_id = %d, view_user_id = %d WHERE view_id = %d AND view_updated = %d", $this->_db->getResourcePrefix(), $values['view_updated'], $values['view_last_viewed'], $values['view_topic_id'], $values['view_user_id'], $id, $last_update);
    }

    protected function _getDeleteQuery($id)
    {
        return sprintf('DELETE FROM %1$sview WHERE view_id = %2$d', $this->_db->getResourcePrefix(), $id);
    }

    protected function _getUpdateByCriteriaQuery($criteriaStr, $sets)
    {
        $sets['view_updated'] = 'view_updated=' . time();
        return sprintf('UPDATE %sview SET %s WHERE %s', $this->_db->getResourcePrefix(), implode(',', $sets), $criteriaStr);
    }

    protected function _getDeleteByCriteriaQuery($criteriaStr)
    {
        return sprintf('DELETE FROM %1$sview WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _getCountByCriteriaQuery($criteriaStr)
    {
        return sprintf('SELECT COUNT(*) FROM %1$sview WHERE %2$s', $this->_db->getResourcePrefix(), $criteriaStr);
    }

    protected function _afterInsertTrigger1($id, $new)
    {
    }

    protected function _afterDeleteTrigger1($id, $old)
    {
    }

    protected function _afterUpdateTrigger1($id, $new, $old)
    {
    }

    protected function _afterInsertTrigger($id, $new)
    {
        $this->_afterInsertTrigger1($id, $new);
    }

    protected function _afterUpdateTrigger($id, $new, $old)
    {
        $this->_afterUpdateTrigger1($id, $new, $old);
    }

    protected function _afterDeleteTrigger($id, $old)
    {
        $this->_afterDeleteTrigger1($id, $old);
    }
}