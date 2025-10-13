<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\Address;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->usersUnit()->orderBy('created_at','DESC')->paginate(10);
        return view('backend.users.index',['users'=>$users]);
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
        $data = $request->all();
        
      
        if(isset($data['address'])){
            $address = $data['address'];
            unset($data['address']);
            $addresModel = Address::create($address ?? []);
            $data['address_id'] = $addresModel->id;
        }

        $data['password'] = bcrypt($data['password']);
        $data['institution_id'] = auth()->user()->institution_id;
        
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
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
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
        $user->is_active = request()->has('active');
        $user->save();
        return redirect()->route('users.index')->with('success','Status atualizado com sucesso!');
    }
}
