<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
plugins/User/Model/Autologin.php
*/
abstract class Plugg_User_Model_Base_Autologin extends Sabai_Model_Entity
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Autologin', $model);
        $this->_vars = array('autologin_id' => 0, 'autologin_created' => 0, 'autologin_updated' => 0, 'autologin_salt' => null, 'autologin_expires' => 0, 'autologin_last_ip' => null, 'autologin_last_ua' => null, 'autologin_user_id' => 0);
    }

    public function __clone()
    {
        $this->_vars = array_merge($this->_vars, array('autologin_id' => 0, 'autologin_created' => 0, 'autologin_updated' => 0));
    }

    public function __toString()
    {
        return 'Autologin #' . $this->_get('id', null, null);
    }

    public function assignUser($user, $markDirty = true)
    {
        $this->_set('user_id', $user->id, $markDirty);
        return $this;
    }

    protected function _fetchUser($withData = false)
    {
        if (!isset($this->_objects['User'])) {
            $this->_objects['User'] = $this->_model->User_Identity($this->_vars['autologin_user_id'], $withData);
        }

        return $this->_objects['User'];
    }

    public function isOwnedBy($user)
    {
        return $this->user_id && $this->user_id == $user->id;
    }

    protected function _get($name, $sort, $order, $limit = 0, $offset = 0)
    {
        switch ($name) {
        case 'id':
            return $this->_vars['autologin_id'];
        case 'created':
            return $this->_vars['autologin_created'];
        case 'updated':
            return $this->_vars['autologin_updated'];
        case 'salt':
            return $this->_vars['autologin_salt'];
        case 'expires':
            return $this->_vars['autologin_expires'];
        case 'last_ip':
            return $this->_vars['autologin_last_ip'];
        case 'last_ua':
            return $this->_vars['autologin_last_ua'];
        case 'user_id':
            return $this->_vars['autologin_user_id'];
        case 'User':
            return $this->_fetchUser();
        case 'UserWithData':
            return $this->_fetchUser(true);
default:
return isset($this->_objects[$name]) ? $this->_objects[$name] : null;
        }
    }

    protected function _set($name, $value, $markDirty)
    {
        switch ($name) {
        case 'id':
            $this->_setVar('autologin_id', $value, $markDirty);
            break;
        case 'salt':
            $this->_setVar('autologin_salt', $value, $markDirty);
            break;
        case 'expires':
            $this->_setVar('autologin_expires', $value, $markDirty);
            break;
        case 'last_ip':
            $this->_setVar('autologin_last_ip', $value, $markDirty);
            break;
        case 'last_ua':
            $this->_setVar('autologin_last_ua', $value, $markDirty);
            break;
        case 'user_id':
            $this->_setVar('autologin_user_id', $value, $markDirty);
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

abstract class Plugg_User_Model_Base_AutologinRepository extends Sabai_Model_EntityRepository
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Autologin', $model);
    }

    public function fetchByUser($id, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeign('autologin_user_id', $id, $limit, $offset, $sort, $order);
    }

    public function paginateByUser($id, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntity('User', $id, $perpage, $sort, $order);
    }

    public function countByUser($id)
    {
        return $this->_countByForeign('autologin_user_id', $id);
    }

    public function fetchByUserAndCriteria($id, Sabai_Model_Criteria $criteria, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeignAndCriteria('autologin_user_id', $id, $criteria, $limit, $offset, $sort, $order);
    }

    public function paginateByUserAndCriteria($id, Sabai_Model_Criteria $criteria, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntityAndCriteria('User', $id, $criteria, $perpage, $sort, $order);
    }

    public function countByUserAndCriteria($id, Sabai_Model_Criteria $criteria)
    {
        return $this->_countByForeignAndCriteria('autologin_user_id', $id, $criteria);
    }

    protected function _getCollectionByRowset(Sabai_DB_Rowset $rs)
    {
        return new Plugg_User_Model_Base_AutologinsByRowset($rs, $this->_model->create('Autologin'), $this->_model);
    }

    public function createCollection(array $entities = array())
    {
        return new Plugg_User_Model_Base_Autologins($this->_model, $entities);
    }
}

class Plugg_User_Model_Base_AutologinsByRowset extends Sabai_Model_EntityCollection_Rowset
{
    public function __construct(Sabai_DB_Rowset $rs, Plugg_User_Model_Autologin $emptyEntity, Sabai_Model $model)
    {
        parent::__construct('Autologins', $rs, $emptyEntity, $model);
    }

    protected function _loadRow(Sabai_Model_Entity $entity, array $row)
    {
        $entity->initVars($row);
    }
}

class Plugg_User_Model_Base_Autologins extends Sabai_Model_EntityCollection_Array
{
    public function __construct(Sabai_Model $model, array $entities = array())
    {
        parent::__construct($model, 'Autologins', $entities);
    }
}