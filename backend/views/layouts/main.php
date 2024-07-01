<?php

use yii\bootstrap5\Nav;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        body {
            background-color: #343a40;
            color: #ffffff;
        }
        .wrapper {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #212529;
            padding: 20px;
            border-right: 1px solid #495057;
        }
        .content {
            flex: 1;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        .header {
            background-color: #495057;
            padding: 10px 20px;
            border-bottom: 1px solid #6c757d;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: calc(100% - 250px);
        }
        .navbar-light .navbar-brand, .navbar-light .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9);
        }
        .navbar-light .navbar-nav .nav-link:hover {
            color: rgba(255, 255, 255, 0.75);
        }
        .btn-link.logout {
            color: rgba(255, 255, 255, 0.9);
        }
        .btn-link.logout:hover {
            color: rgba(255, 255, 255, 0.75);
        }
        a {
            color: #17a2b8;
        }
        a:hover {
            color: #138496;
        }
        .nav.flex-column .nav-link {
            color: #ffffff;
        }
        .nav.flex-column .nav-link:hover {
            background-color: #495057;
        }
        .main-content {
            flex: 1;
            background-color: #ffffff;
            color: #000000;
            padding: 20px;
            overflow: auto;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <div class="sidebar">
        <h2><?= Yii::$app->name ?></h2>
        <?php
        echo Nav::widget([
            'options' => ['class' => 'nav flex-column'],
            'items' => [
                ['label' => 'Фильмы', 'url' => ['/film/index']],
                ['label' => 'Сессии', 'url' => ['/session/index']]
            ],
        ]);
        ?>
    </div>
    <div class="content">
        <div class="header">
            <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">Административная панель</a>
            <div class="navbar-nav">
                <?= Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm() ?>
            </div>
        </div>
        <div class="main-content">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'itemTemplate' => "<li>{link} / </li>\n",
                'activeItemTemplate' => "<li>{link}</li>\n",
            ]) ?>
            <?= $content ?>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
