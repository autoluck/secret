<?php
/**
 *
 * User: jt
 * Date: 2016/8/25 9:11
 */
Yii::import('zii.widgets.CMenu');
class Admin_Menu extends CMenu{

    public $htmlOptions = array(
        'class'=>'page-sidebar-menu',
        'data-keep-expanded'=>'false',
        'data-auto-scroll'=>'true',
        'data-slide-speed'=>200,
    );

    public $submenuHtmlOptions = array(
        'class'=>'sub-menu'
    );

    public $linkLabelWrapper = 'span';

    public $linkLabelWrapperHtmlOptions = array(
        'class'=>'title'
    );

    public $activateParents = true;

    public function init(){
        $this->items = $this->owner->menu;
        parent::init();
    }


    /**
     * Recursively renders the menu items.
     * @param array $items the menu items to be rendered recursively
     */
    protected function renderMenuRecursive($items)
    {
        $count=0;
        $n=count($items);
        foreach($items as $item)
        {
            $count++;
            $options=isset($item['itemOptions']) ? $item['itemOptions'] : array();
            $class=array();
            if($item['active'] && $this->activeCssClass!='')
                $class[]=$this->activeCssClass;
            if($count===1 && $this->firstItemCssClass!==null)
                $class[]=$this->firstItemCssClass;
            if($count===$n && $this->lastItemCssClass!==null)
                $class[]=$this->lastItemCssClass;
            if($this->itemCssClass!==null)
                $class[]=$this->itemCssClass;
            if($class!==array())
            {
                if(empty($options['class']))
                    $options['class']=implode(' ',$class);
                else
                    $options['class'].=' '.implode(' ',$class);
            }
            if(isset($item['items']) && count($item['items']) && isset($item['active']) && $item['active'] === true )
                $options['class'] .= ' open';

            echo CHtml::openTag('li', $options);

            $menu=$this->renderMenuItem($item);
            if(isset($this->itemTemplate) || isset($item['template']))
            {
                $template=isset($item['template']) ? $item['template'] : $this->itemTemplate;
                echo strtr($template,array('{menu}'=>$menu));
            }
            else
                echo $menu;

            if(isset($item['items']) && count($item['items']))
            {
                echo "\n".CHtml::openTag('ul',isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions)."\n";
                $this->renderMenuRecursive($item['items']);
                echo CHtml::closeTag('ul')."\n";
            }

            echo CHtml::closeTag('li')."\n";
        }
    }

    protected function renderMenuItem($item)
    {
        if(isset($item['url']))
        {
            $label='';
            if(isset($item['icon']))
                $label .= '<i class="'.$item['icon'].'"></i> &nbsp;';
            if(isset($item['items']) && count($item['items'])){
                if(isset($item['active']) && $item['active'] === true)
                    $label .= '<span class="arrow open"></span>';
                else
                    $label .= '<span class="arrow"></span>';
            }
            $label .=$this->linkLabelWrapper===null ? $item['label'] : CHtml::tag($this->linkLabelWrapper, $this->linkLabelWrapperHtmlOptions, $item['label']);
            return CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array());
        }
        else
            return CHtml::tag('span',isset($item['linkOptions']) ? $item['linkOptions'] : array(), $item['label']);
    }

}