<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $idcliente
 * @property string|null $nome
 * @property string|null $documento
 * @property string|null $cep
 * @property string|null $endereco
 * @property string|null $bairro
 * @property string|null $cidade
 * @property string|null $uf
 * @property string|null $telefone
 * @property string|null $email
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $st_ativo
 * @property string|null $st_registro_ativo
 */
class Cliente extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'documento' => true,
        'cep' => true,
        'endereco' => true,
        'bairro' => true,
        'cidade' => true,
        'uf' => true,
        'telefone' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'st_ativo' => true,
        'st_registro_ativo' => true,
    ];
}
