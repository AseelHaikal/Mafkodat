<?php


namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    private $ViewURL="users.";
    public function index(Request $request)
    {


        $data = User::select()->orderBy('id','DESC')->with(['roles'=>function($s){
            return $s->select('roles.name as role_name');
        }])->get();
        //dd($data);


        return view('users.index',compact('data'));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $user= new User();
        $user->name=$request['name'];
        $user->phone=$request['phone'];
        $user->email=$request['email'];
        $user->password=Hash::make($request['password']);

        // if ($request['is_admin'] == "on") {
        //     $user->is_admin=1;
        // }
        $user->save();

        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();


        return view('users.edit',compact('user','roles','userRole'));
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $user = User::find($id);

        $user->name=$request['name'];
        $user->phone=$request['phone'];
        $user->email=$request['email'];


        if(!empty($request['password'])){
            $user->password=Hash::make($request['password']);
        }

        $user->save();

        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
    public function eye($id)
    {

        $affected = User::find($id);
        if ($affected->is_active == 1) {
            $affected->is_active = 0;
            $affected->save();
            echo ' <i style="color: red;" class="fa fa-eye-slash"></i>';
        } else {
            $affected->is_active = 1;
            $affected->save();
            echo '<i  class="fa fa-eye"></i>';
        }


    }
    public function showAdmins(){
        $data = User::role('Admin')->with(['roles'=>function($s){
            return $s->select('roles.name as role_name');
        }])->get();
        return view('users.admins',compact('data'));
    }
}
