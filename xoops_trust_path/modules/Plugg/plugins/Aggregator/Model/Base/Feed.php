<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
plugins/Aggregator/Model/Feed.php
*/
abstract class Plugg_Aggregator_Model_Base_Feed extends Sabai_Model_Entity
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Feed', $model);
        $this->_vars = array('feed_id' => 0, 'feed_created' => 0, 'feed_updated' => 0, 'feed_site_url' => null, 'feed_title' => null, 'feed_description' => null, 'feed_language' => null, 'feed_feed_url' => null, 'feed_favicon_url' => null, 'feed_favicon_hide' => 0, 'feed_last_ping' => 0, 'feed_last_fetch' => 0, 'feed_last_publish' => 0, 'feed_status' => 0, 'feed_author_pref' => 0, 'feed_allow_image' => 0, 'feed_allow_external_resources' => 0, 'feed_host' => null, 'feed_user_id' => 0, 'feed_item_count' => 0, 'feed_item_last' => 0, 'feed_item_lasttime' => 0);
    }

    public function __clone()
    {
        $this->_vars = array_merge($this->_vars, array('feed_id' => 0, 'feed_created' => 0, 'feed_updated' => 0, 'feed_item_count' => 0, 'feed_item_last' => 0, 'feed_item_lasttime' => 0));
    }

    public function __toString()
    {
        return 'Feed #' . $this->_get('id', null, null);
    }

    public function assignUser($user, $markDirty = true)
    {
        $this->_set('user_id', $user->id, $markDirty);
        return $this;
    }

    protected function _fetchUser($withData = false)
    {
        if (!isset($this->_objects['User'])) {
            $this->_objects['User'] = $this->_model->User_Identity($this->_vars['feed_user_id'], $withData);
        }

        return $this->_objects['User'];
    }

    public function isOwnedBy($user)
    {
        return $this->user_id && $this->user_id == $user->id;
    }

    public function addItem(Plugg_Aggregator_Model_Item $entity)
    {
        $this->_addEntity($entity);
        return $this;
    }

    public function removeItem(Plugg_Aggregator_Model_Item $entity)
    {
        return $this->removeItemById($entity->id);
    }

    public function removeItemById($id)
    {
        return $this->_removeEntityById('item_id', 'Item', $id);
    }

    public function createItem()
    {
        return $this->_createEntity('Item');
    }

    protected function _fetchItems($limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchEntities('Item', $limit, $offset, $sort, $order);
    }

    protected function _fetchLastItem()
    {
        if (!isset($this->_objects['LastItem']) && $this->hasLastItem()) {
            $this->_objects['LastItem'] = $this->_fetchEntities('Item', 1, 0, 'item_created', 'DESC')->getFirst();
        }
        return $this->_objects['LastItem'];
    }

    public function paginateItems($perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateEntities('Item', $perpage, $sort, $order);
    }

    public function removeItems()
    {
        return $this->_removeEntities('Item');
    }

    public function countItems()
    {
        return $this->_countEntities('Item');
    }

    protected function _get($name, $sort, $order, $limit = 0, $offset = 0)
    {
        switch ($name) {
        case 'id':
            return $this->_vars['feed_id'];
        case 'created':
            return $this->_vars['feed_created'];
        case 'updated':
            return $this->_vars['feed_updated'];
        case 'site_url':
            return $this->_vars['feed_site_url'];
        case 'title':
            return $this->_vars['feed_title'];
        case 'description':
            return $this->_vars['feed_description'];
        case 'language':
            return $this->_vars['feed_language'];
        case 'feed_url':
            return $this->_vars['feed_feed_url'];
        case 'favicon_url':
            return $this->_vars['feed_favicon_url'];
        case 'favicon_hide':
            return $this->_vars['feed_favicon_hide'];
        case 'last_ping':
            return $this->_vars['feed_last_ping'];
        case 'last_fetch':
            return $this->_vars['feed_last_fetch'];
        case 'last_publish':
            return $this->_vars['feed_last_publish'];
        case 'status':
            return $this->_vars['feed_status'];
        case 'author_pref':
            return $this->_vars['feed_author_pref'];
        case 'allow_image':
            return $this->_vars['feed_allow_image'];
        case 'allow_external_resources':
            return $this->_vars['feed_allow_external_resources'];
        case 'host':
            return $this->_vars['feed_host'];
        case 'user_id':
            return $this->_vars['feed_user_id'];
        case 'item_count':
            return $this->_vars['feed_item_count'];
        case 'item_last':
            return $this->_vars['feed_item_last'];
        case 'item_lasttime':
            return $this->_vars['feed_item_lasttime'];
        case 'Items':
            return $this->_fetchItems($limit, $offset, $sort, $order);
        case 'LastItem':
            return $this->_fetchLastItem();
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
            $this->_setVar('feed_id', $value, $markDirty);
            break;
        case 'site_url':
            $this->_setVar('feed_site_url', $value, $markDirty);
            break;
        case 'title':
            $this->_setVar('feed_title', $value, $markDirty);
            break;
        case 'description':
            $this->_setVar('feed_description', $value, $markDirty);
            break;
        case 'language':
            $this->_setVar('feed_language', $value, $markDirty);
            break;
        case 'feed_url':
            $this->_setVar('feed_feed_url', $value, $markDirty);
            break;
        case 'favicon_url':
            $this->_setVar('feed_favicon_url', $value, $markDirty);
            break;
        case 'favicon_hide':
            $this->_setVar('feed_favicon_hide', $value, $markDirty);
            break;
        case 'last_ping':
            $this->_setVar('feed_last_ping', $value, $markDirty);
            break;
        case 'last_fetch':
            $this->_setVar('feed_last_fetch', $value, $markDirty);
            break;
        case 'last_publish':
            $this->_setVar('feed_last_publish', $value, $markDirty);
            break;
        case 'status':
            $this->_setVar('feed_status', $value, $markDirty);
            break;
        case 'author_pref':
            $this->_setVar('feed_author_pref', $value, $markDirty);
            break;
        case 'allow_image':
            $this->_setVar('feed_allow_image', $value, $markDirty);
            break;
        case 'allow_external_resources':
            $this->_setVar('feed_allow_external_resources', $value, $markDirty);
            break;
        case 'host':
            $this->_setVar('feed_host', $value, $markDirty);
            break;
        case 'user_id':
            $this->_setVar('feed_user_id', $value, $markDirty);
            break;
        case 'item_count':
            $this->_setVar('feed_item_count', $value, $markDirty);
            break;
        case 'item_last':
            $this->_setVar('feed_item_last', $value, $markDirty);
            break;
        case 'item_lasttime':
            $this->_setVar('feed_item_lasttime', $value, $markDirty);
            break;
        case 'Items':
            $this->removeItems();
            foreach (array_keys($value) as $i) {
                $this->addItem($value[$i]);
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

abstract class Plugg_Aggregator_Model_Base_FeedRepository extends Sabai_Model_EntityRepository
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Feed', $model);
    }

    public function fetchByUser($id, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeign('feed_user_id', $id, $limit, $offset, $sort, $order);
    }

    public function paginateByUser($id, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntity('User', $id, $perpage, $sort, $order);
    }

    public function countByUser($id)
    {
        return $this->_countByForeign('feed_user_id', $id);
    }

    public function fetchByUserAndCriteria($id, Sabai_Model_Criteria $criteria, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeignAndCriteria('feed_user_id', $id, $criteria, $limit, $offset, $sort, $order);
    }

    public function paginateByUserAndCriteria($id, Sabai_Model_Criteria $criteria, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntityAndCriteria('User', $id, $criteria, $perpage, $sort, $order);
    }

    public function countByUserAndCriteria($id, Sabai_Model_Criteria $criteria)
    {
        return $this->_countByForeignAndCriteria('feed_user_id', $id, $criteria);
    }

    protected function _getCollectionByRowset(Sabai_DB_Rowset $rs)
    {
        return new Plugg_Aggregator_Model_Base_FeedsByRowset($rs, $this->_model->create('Feed'), $this->_model);
    }

    public function createCollection(array $entities = array())
    {
        return new Plugg_Aggregator_Model_Base_Feeds($this->_model, $entities);
    }
}

class Plugg_Aggregator_Model_Base_FeedsByRowset extends Sabai_Model_EntityCollection_Rowset
{
    public function __construct(Sabai_DB_Rowset $rs, Plugg_Aggregator_Model_Feed $emptyEntity, Sabai_Model $model)
    {
        parent::__construct('Feeds', $rs, $emptyEntity, $model);
    }

    protected function _loadRow(Sabai_Model_Entity $entity, array $row)
    {
        $entity->initVars($row);
    }
}

class Plugg_Aggregator_Model_Base_Feeds extends Sabai_Model_EntityCollection_Array
{
    public function __construct(Sabai_Model $model, array $entities = array())
    {
        parent::__construct($model, 'Feeds', $entities);
    }
}