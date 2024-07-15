<?= $this->Form->create($category) ?>
<fieldset>
    <legend><?= __('Edit Category') ?></legend>
    <?= $this->Form->control('parent_id', ['options' => $parentCategories, 'empty' => 'No parent category']) ?>
    <?= $this->Form->control('name') ?>
    <?= $this->Form->control('description') ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
