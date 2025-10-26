<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Address;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userActive = User::query()->usersUnit()->where('is_active',true)->count();
        $userInactive = User::query()->usersUnit()->where('is_active',false)->count();
        $totalUser= User::query()->usersUnit()->count();
        $users = User::query()
        ->usersUnit()
        ->email(request()->email)
        ->name(request()->name)
        ->phone(request()->phone)
        ->active(request()->active)
        ->orderBy('created_at','DESC')
        ->paginate(10)
        ->appends(request()->query());
        return view('backend.users.index',
        ['users'=>$users,
        'totalUser'=>$totalUser,
        'userInactive'=>$userInactive,
        'userActive'=>$userActive
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modules = Module::all();
     
        return view('backend.users.create',['modules'=>$modules]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
  
      try {
        $data = request()->all();
        
      
        if(isset($data['address'])){
            $address = $data['address'];
            unset($data['address']);
            $addresModel = Address::create($address ?? []);
            $data['address_id'] = $addresModel->id;
        }

        $data['password'] = Hash::make($data['password']);
        $data['institution_id'] = Auth::user()->institution_id;
        
        if(isset($data['modules'])){
            $modules = $data['modules'];
            unset($data['modules']);
        }
        
    
        $user = User::create($data);
        $user->modules()->sync($modules ?? []);
        return redirect()->route('users.index')->with('success','Usuário criado com sucesso!');
      } catch (\Throwable $th) {

        return redirect()->route('users.index')->with('error','Erro ao criar usuário!');

      }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('backend.users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $modules = Module::all();
        return view('backend.users.edit',['user'=>$user,'modules'=>$modules]);
    }
 

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if(isset($data['address'])){
            $address = $data['address'];
            unset($data['address']);
        }

        $user->address()->update($address);

        if(isset($data['modules'])){
            $modules = $data['modules'];
            unset($data['modules']);
        }

      

        $user->modules()->sync($modules);

        $user->update($data);

        return back()->with('success','Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','Usuário deletado com sucesso!');
    }

    public function active(User $user){
        $user->is_active = request('active') ? true : false;
        $user->save();
        return redirect()->route('users.index')->with('success','Status atualizado com sucesso!');
    }
}
