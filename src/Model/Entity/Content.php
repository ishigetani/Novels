<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Content Entity.
 */
class Content extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'sentence' => true,
        'sort' => true,
        'novel_id' => true,
        'novel' => true,
        'title' => true,
    ];
}
