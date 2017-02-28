<?php
use hscstudio\mimin\components\Mimin;
$menuItems =
        [
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => '@web/gii','visible' => !Yii::$app->user->isGuest],
                    [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'Manajemen User / Group',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                    ['label' => 'App. Route', 'icon' =>  'fa fa-circle-o', 'url' => '@web/mimin/route','visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Role', 'icon' =>  'fa fa-circle-o', 'url' => '@web/mimin/role','visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User', 'icon' => ' fa fa-circle-o', 'url' => '@web/mimin/user','visible' => !Yii::$app->user->isGuest],
                   ]]
                        ,
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                   
                    [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'Master',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [

                            [
                                'label' => 'Organisasi',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Divisi', 'icon' => 'fa fa-circle-o', 'url' => "@web/divisi/index",],
                                    ['label' => 'Departemen', 'icon' => 'fa fa-circle-o', 'url' => "@web/departemen/index",], 
                                    ['label' => 'Seksi', 'icon' => 'fa fa-circle-o', 'url' => "@web/seksi/index",],
                                    ['label' => 'Jabatan', 'icon' => 'fa fa-circle-o', 'url' => "@web/jabatan/index",],
                                ],
                            ],
                           ['label' => 'Jns Absen', 'icon' => 'fa fa-circle-o', 'url' => "@web/JnsAbsen/index",],
                           
                        ],
                    ],
                ];
 $menuItems = Mimin::filterMenu($menuItems);
        
?>
<aside class="main-sidebar">

    <section class="sidebar">



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
