<?php
/**
 * Created by PhpStorm.
 * User: supostat
 * Date: 24.12.15
 * Time: 15:35
 */

namespace common\widgets;

use yii\base\Widget;
use yii\helpers\BaseUrl;
use yii\helpers\Url;

class ListGroupMenu extends Widget
{

    public $items = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->renderMenu();
    }

    protected function renderMenu()
    {
        $html = [];

        $html[] = '<div class="list-group">';
        foreach ($this->items as $item) {
            if(BaseUrl::current() == $item['url']) {
                $html[] = $this->renderActiveItem($item);
            } else {
                $html[] = $this->renderItem($item);
            }
        }
        $html[] = '</div>';

        return implode($html);
    }

    protected function renderActiveItem($item)
    {
        $html[] = '<span class="list-group-item active">';
        $html[] = $item['ico']?'<i class="'.$item['ico'].'"></i> ':'';
        $html[] = $item['value'];
        $html[] = '</span>';
        return implode($html);

    }

    protected function renderItem($item)
    {
        $html[] = '<a href="' . Url::toRoute($item['url']) . '" class="list-group-item">';
        $html[] = $item['ico']?'<i class="'.$item['ico'].'"></i> ':'';
        $html[] = $item['value'];
        $html[] = '</a>';
        return implode($html);
    }


}