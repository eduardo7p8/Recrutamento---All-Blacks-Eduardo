<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clientes Model
 *
 * @method \App\Model\Entity\Cliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cliente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cliente|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClientesTable extends Table
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

        $this->setTable('clientes');
        $this->setDisplayField('idcliente');
        $this->setPrimaryKey('idcliente');

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
            ->integer('idcliente')
            ->allowEmptyString('idcliente', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 180)
            ->allowEmptyString('nome');

        $validator
            ->scalar('documento')
            ->maxLength('documento', 100)
            ->allowEmptyString('documento');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 20)
            ->allowEmptyString('cep');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 180)
            ->allowEmptyString('endereco');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 50)
            ->allowEmptyString('bairro');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 100)
            ->allowEmptyString('cidade');

        $validator
            ->scalar('uf')
            ->maxLength('uf', 10)
            ->allowEmptyString('uf');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 25)
            ->allowEmptyString('telefone');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('st_ativo')
            ->maxLength('st_ativo', 1)
            ->allowEmptyString('st_ativo');

        $validator
            ->scalar('st_registro_ativo')
            ->allowEmptyString('st_registro_ativo');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }



    public function cliente()
    {
        $conn = $this->getConnection();
        $query = "select idcliente,email, nome,st_ativo from clientes;
        ORDER BY nome DESC";

        $cliente = $conn->execute($query);

        return $cliente->fetchAll('assoc');
    }
}
