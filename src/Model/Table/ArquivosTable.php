<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Arquivos Model
 *
 * @method \App\Model\Entity\Arquivo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Arquivo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Arquivo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Arquivo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Arquivo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Arquivo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArquivosTable extends Table
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

        $this->setTable('arquivos');
        $this->setDisplayField('idarquivo');
        $this->setPrimaryKey('idarquivo');

        $this->addBehavior('Timestamp');
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
            ->integer('idarquivo')
            ->allowEmptyString('idarquivo', null, 'create');

        $validator
            ->scalar('no_doc')
            ->maxLength('no_doc', 255)
            ->allowEmptyString('no_doc');

        $validator
            ->scalar('no_documento_original')
            ->maxLength('no_documento_original', 255)
            ->allowEmptyString('no_documento_original');

        $validator
            ->scalar('ext_documento')
            ->maxLength('ext_documento', 8)
            ->allowEmptyString('ext_documento');

        $validator
            ->scalar('path_documento')
            ->maxLength('path_documento', 4294967295)
            ->allowEmptyString('path_documento');

        return $validator;
    }
}
