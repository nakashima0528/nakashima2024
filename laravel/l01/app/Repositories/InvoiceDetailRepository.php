<?php

namespace App\Repositories;

use App\Models\InvoiceDetail;
use App\Repositories\BaseRepository;

/**
 * Class InvoiceDetailRepository
 * @package App\Repositories
 * @version August 22, 2022, 4:30 pm JST
*/

class InvoiceDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'invoice_id',
        'kind',
        'name',
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
        return InvoiceDetail::class;
    }
}
