<?php

namespace App\Repositories;

use App\Models\Parcel;

use App\Repositories\BaseRepository;

/**
 * Class ParcelRepository
 * @package App\Repositories
 * @version August 18, 2022, 10:23 am JST
*/

class ParcelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'status',
        'weight',
        'shipping',
        'stored',
        'shipped'
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
        return Parcel::class;
    }

}
