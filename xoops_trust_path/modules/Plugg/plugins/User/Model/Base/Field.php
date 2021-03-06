<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
plugins/User/Model/Field.php
*/
abstract class Plugg_User_Model_Base_Field extends Sabai_Model_Entity
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Field', $model);
        $this->_vars = array('field_id' => 0, 'field_created' => 0, 'field_updated' => 0, 'field_name' => null, 'field_title' => null, 'field_description' => null, 'field_weight' => 0, 'field_required' => 0, 'field_collapsible' => 0, 'field_collapsed' => 0, 'field_settings' => null, 'field_fieldset' => 0, 'field_field_id' => 0, 'field_registerable' => 0, 'field_editable' => 0, 'field_visibility_default' => null, 'field_visibility_control' => 0);
    }

    public function __clone()
    {
        $this->_vars = array_merge($this->_vars, array('field_id' => 0, 'field_created' => 0, 'field_updated' => 0));
    }

    public function __toString()
    {
        return 'Field #' . $this->_get('id', null, null);
    }

    protected function _get($name, $sort, $order, $limit = 0, $offset = 0)
    {
        switch ($name) {
        case 'id':
            return $this->_vars['field_id'];
        case 'created':
            return $this->_vars['field_created'];
        case 'updated':
            return $this->_vars['field_updated'];
        case 'name':
            return $this->_vars['field_name'];
        case 'title':
            return $this->_vars['field_title'];
        case 'description':
            return $this->_vars['field_description'];
        case 'weight':
            return $this->_vars['field_weight'];
        case 'required':
            return $this->_vars['field_required'];
        case 'collapsible':
            return $this->_vars['field_collapsible'];
        case 'collapsed':
            return $this->_vars['field_collapsed'];
        case 'settings':
            return $this->_vars['field_settings'];
        case 'fieldset':
            return $this->_vars['field_fieldset'];
        case 'field_id':
            return $this->_vars['field_field_id'];
        case 'registerable':
            return $this->_vars['field_registerable'];
        case 'editable':
            return $this->_vars['field_editable'];
        case 'visibility_default':
            return $this->_vars['field_visibility_default'];
        case 'visibility_control':
            return $this->_vars['field_visibility_control'];
default:
return isset($this->_objects[$name]) ? $this->_objects[$name] : null;
        }
    }

    protected function _set($name, $value, $markDirty)
    {
        switch ($name) {
        case 'id':
            $this->_setVar('field_id', $value, $markDirty);
            break;
        case 'name':
            $this->_setVar('field_name', $value, $markDirty);
            break;
        case 'title':
            $this->_setVar('field_title', $value, $markDirty);
            break;
        case 'description':
            $this->_setVar('field_description', $value, $markDirty);
            break;
        case 'weight':
            $this->_setVar('field_weight', $value, $markDirty);
            break;
        case 'required':
            $this->_setVar('field_required', $value, $markDirty);
            break;
        case 'collapsible':
            $this->_setVar('field_collapsible', $value, $markDirty);
            break;
        case 'collapsed':
            $this->_setVar('field_collapsed', $value, $markDirty);
            break;
        case 'settings':
            $this->_setVar('field_settings', $value, $markDirty);
            break;
        case 'fieldset':
            $this->_setVar('field_fieldset', $value, $markDirty);
            break;
        case 'field_id':
            $this->_setVar('field_field_id', $value, $markDirty);
            break;
        case 'registerable':
            $this->_setVar('field_registerable', $value, $markDirty);
            break;
        case 'editable':
            $this->_setVar('field_editable', $value, $markDirty);
            break;
        case 'visibility_default':
            $this->_setVar('field_visibility_default', $value, $markDirty);
            break;
        case 'visibility_control':
            $this->_setVar('field_visibility_control', $value, $markDirty);
            break;
        }
    }

    protected function _initVar($name, $value)
    {
        switch ($name) {
        default:
            $this->_vars[$name] = $value;
            break;
        }
    }
}

abstract class Plugg_User_Model_Base_FieldRepository extends Sabai_Model_EntityRepository
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Field', $model);
    }

    protected function _getCollectionByRowset(Sabai_DB_Rowset $rs)
    {
        return new Plugg_User_Model_Base_FieldsByRowset($rs, $this->_model->create('Field'), $this->_model);
    }

    public function createCollection(array $entities = array())
    {
        return new Plugg_User_Model_Base_Fields($this->_model, $entities);
    }
}

class Plugg_User_Model_Base_FieldsByRowset extends Sabai_Model_EntityCollection_Rowset
{
    public function __construct(Sabai_DB_Rowset $rs, Plugg_User_Model_Field $emptyEntity, Sabai_Model $model)
    {
        parent::__construct('Fields', $rs, $emptyEntity, $model);
    }

    protected function _loadRow(Sabai_Model_Entity $entity, array $row)
    {
        $entity->initVars($row);
    }
}

class Plugg_User_Model_Base_Fields extends Sabai_Model_EntityCollection_Array
{
    public function __construct(Sabai_Model $model, array $entities = array())
    {
        parent::__construct($model, 'Fields', $entities);
    }
}