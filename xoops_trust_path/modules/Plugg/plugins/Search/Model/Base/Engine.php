<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
plugins/Search/Model/Engine.php
*/
abstract class Plugg_Search_Model_Base_Engine extends Sabai_Model_Entity
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Engine', $model);
        $this->_vars = array('engine_id' => 0, 'engine_created' => 0, 'engine_updated' => 0, 'engine_plugin' => null);
    }

    public function __clone()
    {
        $this->_vars = array_merge($this->_vars, array('engine_id' => 0, 'engine_created' => 0, 'engine_updated' => 0));
    }

    public function __toString()
    {
        return 'Engine #' . $this->_get('id', null, null);
    }

    public function linkSearchable(Plugg_Search_Model_Searchable $entity)
    {
        return $this->linkSearchableById($entity->id);
    }

    public function linkSearchableById($id)
    {
        return $this->_linkEntityById('Searchable2engine', 'searchable_id', $id);
    }

    public function unlinkSearchable(Plugg_Search_Model_Searchable $entity)
    {
        return $this->unlinkSearchableById($entity->id);
    }

    public function unlinkSearchableById($id)
    {
        return $this->_unlinkEntityById('Searchable2engine', 'searchable2engine_engine_id', 'searchable2engine_searchable_id', $id);
    }

    public function unlinkSearchables()
    {
        return $this->_unlinkEntities('Searchable2engine');
    }

    protected function _fetchSearchables($limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchEntities('Searchable', $limit, $offset, $sort, $order);
    }

    public function paginateSearchables($perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateEntities('Searchable', $perpage, $sort, $order);
    }

    public function countSearchables()
    {
        return $this->_countEntities('Searchable');
    }

    protected function _get($name, $sort, $order, $limit = 0, $offset = 0)
    {
        switch ($name) {
        case 'id':
            return $this->_vars['engine_id'];
        case 'created':
            return $this->_vars['engine_created'];
        case 'updated':
            return $this->_vars['engine_updated'];
        case 'plugin':
            return $this->_vars['engine_plugin'];
        case 'Searchables':
            return $this->_fetchSearchables($limit, $offset, $sort, $order);
default:
return isset($this->_objects[$name]) ? $this->_objects[$name] : null;
        }
    }

    protected function _set($name, $value, $markDirty)
    {
        switch ($name) {
        case 'id':
            $this->_setVar('engine_id', $value, $markDirty);
            break;
        case 'plugin':
            $this->_setVar('engine_plugin', $value, $markDirty);
            break;
        case 'Searchables':
            $this->unlinkSearchables();
            foreach (array_keys($value) as $i) {
                if (is_object($value[$i])) {
                    $this->linkSearchable($value[$i]);
                } else {
                    $this->linkSearchableById($value[$i]);
                }
            }
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

abstract class Plugg_Search_Model_Base_EngineRepository extends Sabai_Model_EntityRepository
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Engine', $model);
    }

    public function fetchBySearchable($id, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByAssoc('engine', 'Searchable2engine', 'searchable2engine_searchable_id', $id, $limit, $offset, $sort, $order);
    }

    public function paginateBySearchable($id, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntity('Searchable', $id, $perpage, $sort, $order);
    }

    public function countBySearchable($id)
    {
        return $this->_countByAssoc('engine_id', 'Searchable2engine', 'searchable2engine_searchable_id', $id);
    }

    public function fetchBySearchableAndCriteria($id, Sabai_Model_Criteria $criteria, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByAssocAndCriteria('engine', 'Searchable2engine', 'searchable2engine_searchable_id', $id, $criteria, $limit, $offset, $sort, $order);
    }

    public function countBySearchableAndCriteria($id, Sabai_Model_Criteria $criteria)
    {
        return $this->_countByAssocAndCriteria('engine_id', 'Searchable2engine', 'searchable2engine_searchable_id', $id, $criteria);
    }

    public function paginateBySearchableAndCriteria($id, Sabai_Model_Criteria $criteria, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntityAndCriteria('Searchable', $id, $criteria, $perpage, $sort, $order);
    }

    protected function _getCollectionByRowset(Sabai_DB_Rowset $rs)
    {
        return new Plugg_Search_Model_Base_EnginesByRowset($rs, $this->_model->create('Engine'), $this->_model);
    }

    public function createCollection(array $entities = array())
    {
        return new Plugg_Search_Model_Base_Engines($this->_model, $entities);
    }
}

class Plugg_Search_Model_Base_EnginesByRowset extends Sabai_Model_EntityCollection_Rowset
{
    public function __construct(Sabai_DB_Rowset $rs, Plugg_Search_Model_Engine $emptyEntity, Sabai_Model $model)
    {
        parent::__construct('Engines', $rs, $emptyEntity, $model);
    }

    protected function _loadRow(Sabai_Model_Entity $entity, array $row)
    {
        $entity->initVars($row);
    }
}

class Plugg_Search_Model_Base_Engines extends Sabai_Model_EntityCollection_Array
{
    public function __construct(Sabai_Model $model, array $entities = array())
    {
        parent::__construct($model, 'Engines', $entities);
    }
}