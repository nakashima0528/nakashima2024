<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Ticket;
use App\Models\User;

use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version August 22, 2022, 3:05 pm JST
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'title',
        'forename',
        'surname',
        'birth',
        'remarks',
        'password'
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
        return User::class;
    }

    /**
     * Create Address
     **/
    public function createAddress($input)
    {
        $address = $this->app->make(Address::class);
        $model = $address->newInstance($input);
        $model->save();
        return $model;
    }

    /**
     * Create Current Address
     **/
    public function createCurrentAddress($input,$user_id)
    {
        $input['user_id'] = $user_id;
        $input['type'] = config('const.address.type.CURRENT');
        $input['name'] = config('const.address.name');
        $input['recipient'] = config('const.user.title_list.'.$input['title']) .' '. $input['forename'] .' '. $input['surname'];
        $input['default'] = config('const.check.cd.ON');
        $model = $this->createAddress($input);
        return $model;
    }

    /**
     * get Ticket by user id
     **/
    public function getUserTicket($user_id)
    {
        return Ticket::where('user_id', $user_id)
                      ->where('status',config('const.ticket.status.SHOW'))
                      ->orderBy('id')
                      ->get();
    }


}
