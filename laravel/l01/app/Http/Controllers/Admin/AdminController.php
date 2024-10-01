<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Repositories\AdminRepository;
use App\Http\Controllers\AppBaseController;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Flash;
use Response;

class AdminController extends AppBaseController
{
    /** @var AdminRepository $adminRepository*/
    private $adminRepository;

    public function __construct(AdminRepository $adminRepo)
    {
        $this->adminRepository = $adminRepo;
    }

    /**
     * Display a listing of the Admin.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $admins = $this->adminRepository->all()->sortByDesc("id");

        return view('admin.admins.index')
            ->with('admins', $admins);
    }

    /**
     * Show the form for creating a new Admin.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created Admin in storage.
     *
     * @param CreateAdminRequest $request
     *
     * @return Response
     */
    public function store(CreateAdminRequest $request)
    {
        $input = array_merge($request->all(),['password' => Hash::make($request->password)]);

        $admin = $this->adminRepository->create($input);

        Flash::success('Admin saved successfully.');

        return redirect(route('admins.index'));
    }

    /**
     * Display the specified Admin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        return view('admin.admins.show')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified Admin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        return view('admin.admins.edit')->with('admin', $admin);
    }

    /**
     * Update the specified Admin in storage.
     *
     * @param int $id
     * @param UpdateAdminRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdminRequest $request)
    {
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }
        $admin = $this->adminRepository->update($request->all(),$id);

        Flash::success('Admin updated successfully.');

        return redirect(route('admins.index'));
    }

    /**
     * Remove the specified Admin from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $admin = $this->adminRepository->find($id);

        if (empty($admin)) {
            Flash::error('Admin not found');

            return redirect(route('admins.index'));
        }

        $this->adminRepository->delete($id);

        Flash::success('Admin deleted successfully.');

        return redirect(route('admins.index'));
    }

    /**
     * Show the Change password.
     *
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        return view('admin.admins.password');
    }
    public function updatePassword(Request $request)
    {
        //新規パスワードの確認
        $this->validator($request->all())->validate();

        $user = Auth::user();
        if(!password_verify($request->current_password,$user->password)) {
            Flash::error('Current Password is incorrect.');
            return redirect(route('password.edit'));
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        Flash::success('Password changed successfully.');
        return redirect(route('password.edit'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data,[
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required',
        ]);
    }


}
