<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\UserManager;
use Faker\Provider\UserAgent;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $user = UserManager::orderBy('name', 'ASC')->paginate(5);

        return view('livewire.admin.user.index', ['user' => $user]);
    }

    // public $user_id;

    // public function deleteCategory($user_id)
    // {
    //     $this->user_id = $user_id;
    // }


    // public function destroyCategory()
    // {
    //     $user_id = UserManager::find($this->category_id);
    

    //     // Perform the soft-deletion
    //     $user_id->delete();
    
    //     session()->flash('message', 'User Manager deleted');
    //     $this->dispatchBrowserEvent('close-modal');
    // }
}
