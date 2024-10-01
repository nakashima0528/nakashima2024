<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Parcel;
use App\Repositories\BaseRepository;

/**
 * Class AddressRepository
 * @package App\Repositories
 * @version August 22, 2022, 8:24 am JST
*/

class AddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'kind',
        'default',
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
        return Address::class;
    }

    /**
     * ユーザの全てのAddressのdefaultをOFFにする
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function allUpdateDefaultOff($id)
    {
        $query = $this->model->newQuery();
        $query->where('user_id', $id);
        $models = $query->get(); 

        foreach($models as $model) {
            $model->default = config('const.check.cd.OFF');
            $model->save();
        }

        return $models;
    }

    /**
     * 使用されているアドレス判定
     *
     * @param Address $address
     *
     */
    public function isUsed($address)
    {
        $count = Parcel::where('address_id', $address->id)->count();

        if($count > 0) {
            return true;
        }

        return false;
    }

}
