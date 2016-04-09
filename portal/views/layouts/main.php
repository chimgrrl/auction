<?php

use kartik\icons\Icon;
use portal\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;

AppAsset::register($this);

$this->registerJsFile('@web/js/bootstrap.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('@web/js/modernizr-2.7.1.min.js', ['position' => View::POS_HEAD]);

Icon::map($this, Icon::FA);

?>

<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="<?php echo Yii::$app->language ?>">
    <head>
        <meta charset="<?php echo Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo Html::csrfMetaTags() ?>
        <title><?php echo Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body class="loading">

    <?php $this->beginBody() ?>

    <div id="preload"></div>

    <div id="header">
        <?php echo $this->render('partials/header', ['HTML' => Html::class, 'ICON' => Icon::class]); ?>
        <?php echo $this->render('partials/navigation-search', ['HTML' => Html::class]); ?>
        <?php echo $this->render('partials/navigation'); ?>
    </div>

    <?php echo $content ?>

    <?php echo $this->render('partials/footer', ['HTML' => Html::class]); ?>

    <?php echo $this->render('partials/add-credits-modal'); ?>

    <?php $this->endBody() ?>
    </body>
    </html>

<?php $this->endPage() ?>