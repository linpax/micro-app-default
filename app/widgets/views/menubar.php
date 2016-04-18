<?= \Micro\Web\Html\Html::openTag('div', ['class' => 'menu']) ?>
<?= implode(' ', $this->menu) ?>
<?= \Micro\Web\Html\Html::closeTag('div');