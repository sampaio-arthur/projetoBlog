<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoriesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        // Relacionamentos
        $this->belongsTo('ParentCategories', [
            'className' => 'Categories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('Articles', [
            'foreignKey' => 'category_id',
        ]);
        $this->hasMany('ChildCategories', [
            'className' => 'Categories',
            'foreignKey' => 'parent_id',
        ]);

        // Comportamentos
        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('parent_id')
            ->notEmptyString('parent_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        // Validar lft e rght
        $validator
            ->integer('lft')
            ->allowEmptyString('lft', 'create')
            ->add('lft', 'valid', ['rule' => 'numeric']);

        $validator
            ->integer('rght')
            ->allowEmptyString('rght', 'create')
            ->add('rght', 'valid', ['rule' => 'numeric']);

        return $validator;
    }
}
