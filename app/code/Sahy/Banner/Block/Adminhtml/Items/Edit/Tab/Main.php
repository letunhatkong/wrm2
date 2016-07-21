<?php


namespace Sahy\Banner\Block\Adminhtml\Items\Edit\Tab;


use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;



class Main extends Generic implements TabInterface
{

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Item Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Item Information');
    }
	
    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_sahy_banner_items');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Item Information')]);
        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }
        $fieldset->addField(
            'name',
            'text',
            ['name' => 'name', 'label' => __('Name'), 'title' => __('Item Name'), 'required' => true]
        );
		$fieldset->addField(
            'details',
            'textarea',
            ['name' => 'details', 'label' => __('Details'), 'title' => __('details'), 'required' => false]
        );
	$fieldset->addField(
            'image',
            'image',
            [
                'label' => __('Image'),
                'title' => __('image'),
                'name' => 'image',
            ]
        );
	$fieldset->addField(
            'pages',
            'select',
            [
                'name'      => 'pages',
                'label'     => __('Pages'),
                'options'   =>  array(
		   '' => '-- Select Page --',
                   'Home Page' => 'Home Page',
                   'Category Page' => 'Category Page',				   
                   'Product Detail Page' => 'Product Detail Page',
                )
            ]
        );
	$fieldset->addField(
            'layout',
            'select',
            [
                'name'      => 'layout',
                'label'     => __('Layout'),
                'options'   =>  array(
                   '' => '-- Select Layout --',
                   'Left' => 'Left',
                   'Right' => 'Right',
		   'Top content' => 'Top content',
		   'Bottom Content' => 'Bottom Content'
             )
            ]
        );
        $fieldset->addField(
            'link',
            'text',
            ['name' => 'link', 'label' => __('Link'), 'title' => __('Link'), 'required' => false]
        );
		
		
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
