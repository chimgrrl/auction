<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'iDeal - Signup';
?>
<main >
	    	<section class="sections">
	    		<div class="container">
	    			
	    			<div class="nav-category"><?= Html::a('Home','@web') ?>	><a href="#">Signup</a></div>
	    			
	    			<div class="membership-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($user, 'username') ?>
	
    <?= $form->field($user, 'new_password')->passwordInput() ?>

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

    <?= $form->field($user, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Signup'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



	    		</div>
    		</section>
    	</main>