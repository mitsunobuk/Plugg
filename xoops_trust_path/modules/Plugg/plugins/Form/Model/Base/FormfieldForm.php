<?php
abstract class Plugg_Form_Model_Base_FormfieldForm extends Plugg_PluginModelEntityForm
{
    public function __construct(Plugg_PluginModel $model)
    {
        parent::__construct($model);
    }

    public function getSettings(Sabai_Model_Entity $entity)
    {
        $settings = array();
        $settings['name'] = array(
            '#type' => 'textfield',
            '#title' => $this->_model->_('Name'),
            '#maxlength' => 255,
            '#required' => true,
            '#default_value' => $entity->name,
            '#weight' => 2,
        );
        $settings['title'] = array(
            '#type' => 'textfield',
            '#title' => $this->_model->_('Title'),
            '#maxlength' => 255,
            '#required' => true,
            '#default_value' => $entity->title,
            '#weight' => 4,
        );
        $settings['description'] = array(
            '#type' => 'textarea',
            '#title' => $this->_model->_('Description'),
            '#rows' => 10,
            '#default_value' => $entity->description,
            '#weight' => 6,
        );
        $settings['weight'] = array(
            '#type' => 'textfield',
            '#title' => $this->_model->_('Weight'),
            '#maxlength' => 255,
            '#default_value' => $entity->weight,
            '#weight' => 8,
        );
        $settings['required'] = array(
            '#type' => 'checkbox',
            '#title' => $this->_model->_('Required'),
            '#options' => array('default' => 0),
            '#default_value' => $entity->required,
            '#weight' => 10,
        );
        $settings['disabled'] = array(
            '#type' => 'checkbox',
            '#title' => $this->_model->_('Disabled'),
            '#options' => array('default' => 0),
            '#default_value' => $entity->disabled,
            '#weight' => 12,
        );
        $settings['collapsible'] = array(
            '#type' => 'checkbox',
            '#title' => $this->_model->_('Collapsible'),
            '#options' => array('default' => 0),
            '#default_value' => $entity->collapsible,
            '#weight' => 14,
        );
        $settings['collapsed'] = array(
            '#type' => 'checkbox',
            '#title' => $this->_model->_('Collapsed'),
            '#options' => array('default' => 0),
            '#default_value' => $entity->collapsed,
            '#weight' => 16,
        );

        return $settings;
    }
}