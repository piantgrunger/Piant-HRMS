<aside class="main-sidebar">

    <section class="sidebar">



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => '@web/gii','visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User', 'icon' => ' fa-dashboard', 'url' => '@web/user/index','visible' => !Yii::$app->user->isGuest],
                  
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
                           ['label' => 'Jns Absen', 'icon' => 'fa fa-circle-o', 'url' => "@web/jns_absen/index",],
                           
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
