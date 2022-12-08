<?php
/** @var $this \matejpal\phpmvc\View */
/** @var $model \app\models\ContactForm */

use matejpal\phpmvc\form\TextAreaField;

$this->title = "Contact";
?>


<h1>Contact us</h1>

<?php $form = \matejpal\phpmvc\form\Form::begin("", "post") ?>
<?php echo $form->field($model, "subject") ?>
<?php echo $form->field($model, "email") ?>
<?php echo new TextAreaField($model, "body") ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php \matejpal\phpmvc\form\Form::end() ?>


  
