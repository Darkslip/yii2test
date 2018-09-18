<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Role;
use app\models\AuthItem;


/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $model app\models\Role */
/* @var $model app\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
$roles = ArrayHelper::map(Role::find()->all(), 'user_id', 'item_name');
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model->role, 'item_name')->textInput() ?>







    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<? echo $model->role->item_name ?>

</div>
