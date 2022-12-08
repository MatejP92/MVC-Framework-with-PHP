<?php
/** @var $model \app\models\User */
/** @var $this \matejpal\phpmvc\View */

$this->title = "Login";


?>

<h1>Login</h1>

<?php $form = \matejpal\phpmvc\form\Form::begin("", "post") ?>

<?php echo $form->field($model, "email") ?>
<?php echo $form->field($model, "password")->passwordField() ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php echo \matejpal\phpmvc\form\Form::end() ?>

