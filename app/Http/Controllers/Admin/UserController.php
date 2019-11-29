<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\DataTables\UsersDataTable;
use App\Http\Requests;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // variables for dependecy injection.
    
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        //alert()->message('Message', 'Optional Title');
        return $dataTable->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getUserById($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all()->pluck('name');
        $user = $this->userRepository->getUserById($id);
        $userRole = $user->getRoleNames();
        $data = array(
            'roles' => $roles,
            'userRole' => $userRole,
            'user' => $user
        );
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'status' => 'required',
            'bio' => 'max:255',
            'role' => 'required'
        ]);
        $user = $this->userRepository->updateUser($id, $request);
        //if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('superadmin')){
            $user->syncRoles($request->role);
        //}
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->delete($id);
        return redirect()->back()->with("User Deleted successfully.");
    }

    /**
     * Get all roles.
     */
    public function roles(){
        $roles = $this->userRepository->getRole();
        return $roles;
    }

    /**
     * Block Unblock user.
     */
    public function blockUnblock($id){
        $user = $this->userRepository->getUserById($id);
        if($user->status == 'active'){
            $user->status = 'blocked';
        }else{
            $user->status = 'active';
        }
        $user->save();
        alert()->message('success','User status changed successfully.');
        return redirect()->back()->with('success','User status changed successfully.');
    }
}
