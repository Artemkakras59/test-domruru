<?php
use yii\widgets\ActiveForm;
?>
<h3><?= $message ?></h3>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?= $form->field($model, 'file')->fileInput() ?>
<button>Загрузить</button>
<?php ActiveForm::end() ?>
