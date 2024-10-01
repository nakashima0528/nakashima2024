<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Repositories\AddressRepository;
use App\Http\Controllers\AppBaseController;
use Auth;
use Illuminate\Http\Request;
use Flash;
use Response;

class AddressController extends AppBaseController
{
    /** @var AddressRepository $addressRepository*/
    private $addressRepository;

    public function __construct(AddressRepository $addressRepo)
    {
        $this->addressRepository = $addressRepo;
    }

    /**
     * Show the form for creating a new Address.
     *
     * @return Response
     */
    public function create($user_id)
    {
        $user = $this->addressRepository->findUser($user_id);
        return view('admin.addresses.create')->with('user', $user);
    }

    /**
     * Store a newly created Address in storage.
     *
     * @param CreateAddressRequest $request
     *
     * @return Response
     */
    public function store(CreateAddressRequest $request)
    {
        $input = $request->all();

        $address = $this->addressRepository->create($input);

        Flash::success('Address saved successfully.');

        return redirect(route('addresses.show',$address->id));
    }

    /**
     * Display the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $address = $this->addressRepository->find($id);
        $user = $this->addressRepository->findUser($address->user_id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('admin-home'));
        }

        return view('admin.addresses.show')->with('address', $address)
                                           ->with('user', $user);
    }

    /**
     * Show the form for editing the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $address = $this->addressRepository->find($id);
        $user = $this->addressRepository->findUser($address->user_id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('admin-home'));
        }

        return view('admin.addresses.edit')->with('address', $address)
                                         ->with('user', $user);
    }

    /**
     * Update the specified Address in storage.
     *
     * @param int $id
     * @param UpdateAddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAddressRequest $request)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('admin-home'));
        }

        $address = $this->addressRepository->update($request->all(), $id);

        Flash::success('Address updated successfully.');

        return redirect(route('addresses.show',$id));
    }

    /**
     * Remove the specified Address from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('admin-home'));
        }

        $this->addressRepository->delete($id);

        Flash::success('Address deleted successfully.');

        return redirect(route('users.show', [$address->user_id]));
    }




    /**
     * Home -- Show the ADDRESS BOOK.
     */
    public function addresses()
    {
        $user = Auth::user();

        $addresses = $this->addressRepository->getAddress($user->id);
        $currentAddress = [];
        $sippingAddresses = [];
        foreach($addresses as $address) {
            if($address->type == config('const.address.type.CURRENT')) {
                $currentAddress = $address;
            }else{
                $sippingAddresses[] = $address;
            }
        }

        return view('home.addresses.index')->with('currentAddress',$currentAddress)
                                           ->with('sippingAddresses',$sippingAddresses);
    }
    
    /**
     * Home -- Show the shipping Address Create.
     */
    public function createAddress()
    {
        $user = Auth::user();

        $address = $this->addressRepository->getAddress($user->id);
        // シッピングアドレスの最大登録数超え　Currentも含まれている
        if(count($address) > 5){
            Flash::error('5 shipping addresses have already been registered.');
            return redirect(route('home.addresses'));
        }

        return view('home.addresses.create')->with('user',$user);;
    }

    /**
     * Home -- Store a newly created shipping Address in storage.
     *
     * @param CreateAddressRequest $request
     *
     * @return Response
     */
    public function storeAddress(CreateAddressRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();
        $input['user_id'] = $user->id;

        $address = $this->addressRepository->create($input);

        \Session::flash('flash_success', 'Address has been successfully saved.');

        return redirect(route('home.addresses'));
    }

    /**
     * Home -- Show the form for editing the specified shipping Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function editAddress($id)
    {
        $address = $this->addressRepository->find($id);
        // アクセス許可判定
        $this->authorize('view', $address);

        if (empty($address)) {
            \Session::flash('flash_error', 'Address not found.');
        }

        return view('home.addresses.edit')->with('address', $address);
    }

    /**
     * Home -- Update the specified shipping Address in storage.
     *
     * @param int $id
     * @param UpdateAddressRequest $request
     *
     * @return Response
     */
    public function updateAddress(UpdateAddressRequest $request)
    {
        $address = $this->addressRepository->find($request->id);
        // アクセス許可判定
        $this->authorize('view', $address);

        if (empty($address)) {
            \Session::flash('flash_error', 'Address not found.');
            return redirect(route('home.addresses'));
        }

        $address = $this->addressRepository->update($request->all(), $request->id);

        \Session::flash('flash_success', 'Address has been successfully saved.');

        return redirect(route('home.addresses'));
    }

    /**
     * Home --  Remove the specified shipping Address from storage.
     *
     * @param Request $request
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroyAddress(Request $request)
    {
        $address = $this->addressRepository->find($request->id);

        if (empty($address)) {
            \Session::flash('flash_error', 'Address not found.');
            return redirect(route('home.addresses'));
        }
        if($this->addressRepository->isUsed($address)){
            \Session::flash('flash_error', 'Address is already in use.');
            return redirect(route('home.addresses'));
        }

        // 削除対象がdefaultの場合、初期化して先頭にdefaultを付けなおす　先頭には必ずCurrentが存在する
        if($address->default == config('const.check.cd.ON')){
            $user = Auth::user();
            $addresses = $this->addressRepository->allUpdateDefaultOff($user->id);
            $this->addressRepository->update(['default'=>config('const.check.cd.ON')], $addresses[0]->id);
        }
        $this->addressRepository->forceDelete($request->id);

        \Session::flash('flash_success', 'Address has been deleted.');

        return redirect(route('home.addresses'));
    }

    /**
     * Home --  Update the defalt shipping Address in storage.
     *
     * @param Request $request
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function updateAddressDefault(Request $request)
    {
        $address = $this->addressRepository->find($request->id);

        if (empty($address)) {
            \Session::flash('flash_error', 'Address not found.');
            return redirect(route('home.addresses'));
        }

        // 初期化して先頭にdefaultを付けなおす
        $user = Auth::user();
        $this->addressRepository->allUpdateDefaultOff($user->id);
        $address = $this->addressRepository->update(['default'=>config('const.check.cd.ON')], $request->id);

        \Session::flash('flash_success', 'Default address has been successfully saved.');

        return redirect(route('home.addresses'));
    }


}
