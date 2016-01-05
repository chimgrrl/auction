<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Membership */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="membership-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'membership_login_id') ?>

    <?= $form->field($model, 'membership_first_name') ?>

    <?= $form->field($model, 'membership_last_name') ?>

    <?= $form->field($model, 'membership_gender')->dropDownList(['M' => 'Male', 'F' => 'Female']) ?>

    <?= $form->field($model, 'membership_date_of_birth')->widget(\yii\jui\DatePicker::classname(), [
	   'dateFormat' => 'dd/MM/yyyy',
	   'clientOptions' => [
		   'changeMonth' => 'true',
		   'changeYear' => 'true',		   
		   'defaultDate' => '-1',		   
		   'yearRange' => '1920:2015',		   
	   ],
	   ]) ?>
	
	

    <?= $form->field($model, 'membership_district') ?>

    <?= $form->field($model, 'membership_address') ?>

    <?= $form->field($model, 'membership_contact_telephone') ?>

    <?= $form->field($model, 'membership_email_address') ?>

    <?= $form->field($model, 'membership_current_points') ?>

    <?= $form->field($model, 'membership_current_reputation') ?>

    <?= $form->field($model, 'upload_file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
