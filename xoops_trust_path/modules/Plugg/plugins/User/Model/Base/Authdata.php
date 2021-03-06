<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
plugins/User/Model/Authdata.php
*/
abstract class Plugg_User_Model_Base_Authdata extends Sabai_Model_Entity
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Authdata', $model);
        $this->_vars = array('authdata_id' => 0, 'authdata_created' => 0, 'authdata_updated' => 0, 'authdata_claimed_id' => null, 'authdata_display_id' => null, 'authdata_lastused' => 0, 'authdata_auth_id' => 0, 'authdata_user_id' => 0);
    }

    public function __clone()
    {
        $this->_vars = array_merge($this->_vars, array('authdata_id' => 0, 'authdata_created' => 0, 'authdata_updated' => 0));
    }

    public function __toString()
    {
        return 'Authdata #' . $this->_get('id', null, null);
    }

    public function assignUser($user, $markDirty = true)
    {
        $this->_set('user_id', $user->id, $markDirty);
        return $this;
    }

    protected function _fetchUser($withData = false)
    {
        if (!isset($this->_objects['User'])) {
            $this->_objects['User'] = $this->_model->User_Identity($this->_vars['authdata_user_id'], $withData);
        }

        return $this->_objects['User'];
    }

    public function isOwnedBy($user)
    {
        return $this->user_id && $this->user_id == $user->id;
    }

    public function assignAuth(Plugg_User_Model_Auth $entity)
    {
        $this->_assignEntity($entity, 'auth_id');
        return $this;
    }

    public function unassignAuth()
    {
        $this->_unassignEntity('Auth', 'auth_id');
        return $this;
    }

    protected function _fetchAuth()
    {
        return $this->_fetchEntity('Auth', 'auth_id');
    }

    protected function _get($name, $sort, $order, $limit = 0, $offset = 0)
    {
        switch ($name) {
        case 'id':
            return $this->_vars['authdata_id'];
        case 'created':
            return $this->_vars['authdata_created'];
        case 'updated':
            return $this->_vars['authdata_updated'];
        case 'claimed_id':
            return $this->_vars['authdata_claimed_id'];
        case 'display_id':
            return $this->_vars['authdata_display_id'];
        case 'lastused':
            return $this->_vars['authdata_lastused'];
        case 'auth_id':
            return $this->_vars['authdata_auth_id'];
        case 'user_id':
            return $this->_vars['authdata_user_id'];
        case 'Auth':
            return $this->_fetchAuth();
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
            $this->_setVar('authdata_id', $value, $markDirty);
            break;
        case 'claimed_id':
            $this->_setVar('authdata_claimed_id', $value, $markDirty);
            break;
        case 'display_id':
            $this->_setVar('authdata_display_id', $value, $markDirty);
            break;
        case 'lastused':
            $this->_setVar('authdata_lastused', $value, $markDirty);
            break;
        case 'auth_id':
            $this->_setVar('authdata_auth_id', $value, $markDirty);
            break;
        case 'user_id':
            $this->_setVar('authdata_user_id', $value, $markDirty);
            break;
        case 'Auth':
            $entity = is_array($value) ? $value[0] : $value;
            $this->assignAuth($entity);
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

abstract class Plugg_User_Model_Base_AuthdataRepository extends Sabai_Model_EntityRepository
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Authdata', $model);
    }

    public function fetchByUser($id, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeign('authdata_user_id', $id, $limit, $offset, $sort, $order);
    }

    public function paginateByUser($id, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntity('User', $id, $perpage, $sort, $order);
    }

    public function countByUser($id)
    {
        return $this->_countByForeign('authdata_user_id', $id);
    }

    public function fetchByUserAndCriteria($id, Sabai_Model_Criteria $criteria, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeignAndCriteria('authdata_user_id', $id, $criteria, $limit, $offset, $sort, $order);
    }

    public function paginateByUserAndCriteria($id, Sabai_Model_Criteria $criteria, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntityAndCriteria('User', $id, $criteria, $perpage, $sort, $order);
    }

    public function countByUserAndCriteria($id, Sabai_Model_Criteria $criteria)
    {
        return $this->_countByForeignAndCriteria('authdata_user_id', $id, $criteria);
    }

    public function fetchByAuth($id, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeign('authdata_auth_id', $id, $limit, $offset, $sort, $order);
    }

    public function paginateByAuth($id, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntity('Auth', $id, $perpage, $sort, $order);
    }

    public function countByAuth($id)
    {
        return $this->_countByForeign('authdata_auth_id', $id);
    }

    public function fetchByAuthAndCriteria($id, Sabai_Model_Criteria $criteria, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeignAndCriteria('authdata_auth_id', $id, $criteria, $limit, $offset, $sort, $order);
    }

    public function paginateByAuthAndCriteria($id, Sabai_Model_Criteria $criteria, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntityAndCriteria('Auth', $id, $criteria, $perpage, $sort, $order);
    }

    public function countByAuthAndCriteria($id, Sabai_Model_Criteria $criteria)
    {
        return $this->_countByForeignAndCriteria('authdata_auth_id', $id, $criteria);
    }

    protected function _getCollectionByRowset(Sabai_DB_Rowset $rs)
    {
        return new Plugg_User_Model_Base_AuthdatasByRowset($rs, $this->_model->create('Authdata'), $this->_model);
    }

    public function createCollection(array $entities = array())
    {
        return new Plugg_User_Model_Base_Authdatas($this->_model, $entities);
    }
}

class Plugg_User_Model_Base_AuthdatasByRowset extends Sabai_Model_EntityCollection_Rowset
{
    public function __construct(Sabai_DB_Rowset $rs, Plugg_User_Model_Authdata $emptyEntity, Sabai_Model $model)
    {
        parent::__construct('Authdatas', $rs, $emptyEntity, $model);
    }

    protected function _loadRow(Sabai_Model_Entity $entity, array $row)
    {
        $entity->initVars($row);
    }
}

class Plugg_User_Model_Base_Authdatas extends Sabai_Model_EntityCollection_Array
{
    public function __construct(Sabai_Model $model, array $entities = array())
    {
        parent::__construct($model, 'Authdatas', $entities);
    }
}