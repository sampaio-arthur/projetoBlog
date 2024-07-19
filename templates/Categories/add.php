<?= $this->Form->create($category) ?>
<fieldset>
    <legend><?= __('Add Category') ?></legend>
    <?php
        echo $this->Form->control('parent_id', [
            'type' => 'select',
            'options' => $parentCategories,
            'empty' => 'No parent category',
        ]);
        echo $this->Form->control('name');
        echo $this->Form->control('description');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
