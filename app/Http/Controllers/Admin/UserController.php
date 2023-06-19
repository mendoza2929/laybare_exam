<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\UserManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function index(){
        return view('admin.user.index');
    }

    
    public function create(){
        return view('admin.user.create');
    }

    public function userstore(UserFormRequest $request)
    {
        $validatedData = $request->validated();
    
        // Check if email already exists
        $existingUser = UserManager::where('email', $validatedData['email'])->first();
        if ($existingUser) {
            return redirect()->back()->withErrors(['email' => 'The email already exists']);
        }
    
        $validator = Validator::make($validatedData, [
            'name' => 'required|string',
            'fname' => 'required|string',
            'mname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|string|email',
            'password' => [
                'required',
                'string',
                'min:8', // Minimum length of 8 characters
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', // At least one lowercase, one uppercase, and one digit
            ],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $user = new UserManager();
        $user->name = $validatedData['name'];
        $user->fname = $validatedData['fname'];
        $user->mname = $validatedData['mname'];
        $user->lname = $validatedData['lname'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']); 
    
        $user->save();
    
        return redirect('admin/user')->with('message', 'User Manager Added Successfully');
    }


    public function edit(UserManager $user){
        return view('admin.user.edit', compact('user'));
    }


    public function update(UserFormRequest $request, $user)
{
    $validatedData = $request->validated();

    $user = UserManager::findOrFail($user);

    $user->name = $validatedData['name'];
    $user->fname = $validatedData['fname'];
    $user->mname = $validatedData['mname'];
    $user->lname = $validatedData['lname'];
    $user->email = $validatedData['email'];
    $user->save();

    return redirect('admin/user')->with('message', 'User Manager Updated Successfully');
}

public function destroy(int $users_id){
    $user = UserManager::findOrFail($users_id);
    $user->delete();
    return redirect()->back()->with('message', 'User Deleted successfully');
}




    
    
    
}
