<?php
class Plugg_Forum_Model_TopicsWithComments extends Sabai_Model_EntityCollection_Decorator_ForeignEntities
{
    public function __construct(Sabai_Model_EntityCollection $collection)
    {
        parent::__construct('comment_topic_id', 'Comment', $collection);
    }
}