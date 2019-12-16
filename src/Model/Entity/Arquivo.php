<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Arquivo Entity
 *
 * @property int $idarquivo
 * @property string|null $no_doc
 * @property string|null $no_documento_original
 * @property string|null $ext_documento
 * @property string|null $path_documento
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Arquivo extends Entity
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
        'no_doc' => true,
        'no_documento_original' => true,
        'ext_documento' => true,
        'path_documento' => true,
        'created' => true,
        'modified' => true,
    ];
}
