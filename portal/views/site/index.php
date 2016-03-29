<?php

use yii\helpers\Html;

$this->title = 'iDeal';
?>
<main id="home">

    <?php echo $this->render('partials/carousel', ['HTML' => Html::class]); ?>

    <?php echo $this->render('partials/recommended-products', [
        'HTML' => Html::class,
        'recommendedProducts' => $recommendedProducts]); ?>

    <?php echo $this->render('partials/products-by-categories', [
        'HTML' => Html::class,
        'categories' => $categories]); ?>

</main>
