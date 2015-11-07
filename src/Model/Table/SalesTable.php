<?php
namespace App\Model\Table;

use App\Model\Entity\Sale;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sales Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Products
 */
class SalesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('sales');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Products', [
            'foreignKey' => 'id'
        ]);
        
        $this->belongsTo('SaleRegisteredBy', [
            'className' => 'Users',
            'foreignKey' => 'user_id'
        ]);
                
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('sale_price', 'valid', ['rule' => 'decimal'])
            ->requirePresence('sale_price', 'create')
            ->notEmpty('sale_price');

        $validator
            ->requirePresence('buyer_name', 'create')
            ->notEmpty('buyer_name');

        $validator
            ->add('registered_by', 'valid', ['rule' => 'numeric'])
            ->requirePresence('registered_by', 'create')
            ->notEmpty('registered_by');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        return $rules;
    }
}
