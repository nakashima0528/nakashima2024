<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateParcelItemRequest;
use App\Http\Requests\UpdateParcelItemRequest;
use App\Repositories\ParcelItemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ParcelItemController extends AppBaseController
{
    /** @var ParcelItemRepository $parcelItemRepository*/
    private $parcelItemRepository;

    public function __construct(ParcelItemRepository $parcelItemRepo)
    {
        $this->parcelItemRepository = $parcelItemRepo;
    }

    /**
     * Show the form for creating a new ParcelItem.
     *
     * @return Response
     */
    public function create($parcel_id)
    {
        $parcel = $this->parcelItemRepository->findParcel($parcel_id);
        $user = $this->parcelItemRepository->findUser($parcel->user_id);
        return view('admin.parcel_items.create')->with('parcel', $parcel)
                                                ->with('user', $user);
    }

    /**
     * Store a newly created ParcelItem in storage.
     *
     * @param CreateParcelItemRequest $request
     *
     * @return Response
     */
    public function store(CreateParcelItemRequest $request)
    {
        $input = $request->all();

        $parcelItem = $this->parcelItemRepository->create($input);

        Flash::success('Parcel Item saved successfully.');

        return redirect(route('parcels.show',$parcelItem->parcel_id));
    }

    /**
     * Display the specified ParcelItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parcelItem = $this->parcelItemRepository->find($id);
        $parcel = $this->parcelItemRepository->findParcel($parcelItem->parcel_id);
        $user = $this->parcelItemRepository->findUser($parcel->user_id);

        if (empty($parcelItem)) {
            Flash::error('Parcel Item not found');

            return redirect(route('admin-home'));
        }

        return view('admin.parcel_items.show')->with('parcelItem', $parcelItem)
                                              ->with('parcel', $parcel)
                                              ->with('user', $user);
    }

    /**
     * Show the form for editing the specified ParcelItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parcelItem = $this->parcelItemRepository->find($id);
        $parcel = $this->parcelItemRepository->findParcel($parcelItem->parcel_id);
        $user = $this->parcelItemRepository->findUser($parcel->user_id);

        if (empty($parcelItem)) {
            Flash::error('Parcel Item not found');

            return redirect(route('admin-home'));
        }

        return view('admin.parcel_items.edit')->with('parcelItem', $parcelItem)
                                              ->with('parcel', $parcel)
                                              ->with('user', $user);
    }

    /**
     * Update the specified ParcelItem in storage.
     *
     * @param int $id
     * @param UpdateParcelItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParcelItemRequest $request)
    {
        $parcelItem = $this->parcelItemRepository->find($id);

        if (empty($parcelItem)) {
            Flash::error('Parcel Item not found');

            return redirect(route('admin-home'));
        }

        $parcelItem = $this->parcelItemRepository->update($request->all(), $id);

        Flash::success('Parcel Item updated successfully.');

        return redirect(route('parcels.show',$parcelItem->parcel_id));
    }

    /**
     * Remove the specified ParcelItem from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parcelItem = $this->parcelItemRepository->find($id);

        if (empty($parcelItem)) {
            Flash::error('Parcel Item not found');

            return redirect(route('admin-home'));
        }

        $this->parcelItemRepository->delete($id);

        Flash::success('Parcel Item deleted successfully.');

        return redirect(route('parcels.show',$parcelItem->parcel_id));
    }
}
