<?php
namespace app\widgets;
use Yii;
use yii\helpers\Html;
use yii\web\View;
use app\widgets\Assets;
/**
 *
 * 
 * @author Alfian Naufal
 * @since 1.0
 */
class TreeImage extends \yii\bootstrap\Widget
{
      
    
    public $root = 'Root';
    public $icon = 'user';
    public $iconRoot = 'tree-conifer';
    public $nameFieldname = 'name';
    
    public $query;
    public function init()
    {
        Assets::register($this->getView());
        $this->initTreeView(0);
    }
    protected function initTreeView($parent)
    {   
        $icon1 = '<span class="glyphicon glyphicon-'.$this->icon.'"></span>';
        $iconRoot = '<span class="glyphicon glyphicon-'.$this->iconRoot.'"></span>';
        $dataArray = $this->query->asArray()->all();
        $nodeDepth = $currDepth = $counter = 0;
        echo Html::beginTag('div', ['class' => 'tree']);
                echo Html::beginTag('ul') . "\n" .Html::beginTag('li') . "\n" ;
                echo Html::a(Yii::t('app', $iconRoot.'  '.$this->root), ['index1','parent'=>0] );   // echo '<a href="#">'.$iconRoot.'  '.$this->root.'</a>' . "\n" ;
        foreach ($dataArray as $key) {
            if ($key['parent'] == $parent ) 
            {
                echo Html::beginTag('ul') . "\n" .Html::beginTag('li') . "\n" ;
                echo Html::a(Yii::t('app', $icon1.'  '.$key[$this->nameFieldname]), ['index1','parent'=>$key['parent']] );   // echo '<a href="#">'.$iconRoot.'  '.$this->root.'</a>' . "\n" ;
            }  else
            {
                $as = $currDepth-1;
                $sa = ${'x'.$as}+1;
                if ($key['lvl'] == ${'x'.$as}) {
                    echo Html::beginTag('li') . "\n";
                    echo '<a href="#">'.$icon1.'  '.$key[$this->nameFieldname].'</a>' . "\n" ;
                    echo  Html::endTag('/li') . "\n";
                } else if ($key['lvl'] == $sa){
                    echo Html::beginTag('ul') . "\n" .Html::beginTag('li') . "\n" ;
                    echo '<a href="#">'.$icon1.'  '.$key[$this->nameFieldname].'</a>' . "\n" ;
                } else
                {
                    $da = ${'x'.$as}-1;
                    if ($key['lvl'] == $da) {
                        echo Html::endTag('li') . "\n" ;
                        echo Html::endTag('ul') . "\n" ;
                        echo Html::beginTag('li') . "\n" ;
                        echo '<a href="#">'.$icon1.'  '.$key[$this->nameFieldname].'</a>' . "\n" ;
                    }else
                    {
                        $hasil = ${'x'.$as} - $key['lvl'];
                        for ($i=0; $i < $hasil ; $i++) { 
                            echo Html::endTag('li') . "\n" ;
                            echo Html::endTag('ul') . "\n" ;
                        }
                        echo Html::beginTag('li') . "\n" ;
                        echo '<a href="#">'.$icon1.'  '.$key[$this->nameFieldname].'</a>' . "\n" ;
                    }
                }
            }      
            ${'x'.$currDepth} = $key['lvl'];    
            ++$currDepth;
            ++$nodeDepth;
        }
        echo Html::endTag('div');
    }
}