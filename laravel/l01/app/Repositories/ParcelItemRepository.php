<?php

namespace App\Repositories;

use App\Models\ParcelItem;
use App\Repositories\BaseRepository;

/**
 * Class ParcelItemRepository
 * @package App\Repositories
 * @version August 23, 2022, 8:01 am JST
*/

class ParcelItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parcel_id',
        'name',
        'quantity',
        'value'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ParcelItem::class;
    }
}
