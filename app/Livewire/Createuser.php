<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\user;
use Livewire\Attributes\On; 
use Exception;
class Createuser extends Component
{
    public $email;
    public $password;
    public $names;
    public $lastnames;
    public $phone_number;
    public function createUser(){
        $user = User::where('email',$this->email)->first();
        if ($user) {
        return $this->dispatch("email-warning",['email'=>$this->email]);
        }
        user::create([
            'email'=>$this->email,
            'password'=>bcrypt($this->password),
            'names'=>$this->names,
            'lastnames'=>$this->lastnames,
            'phone_number'=>$this->phone_number,
            'active'=>1,
            ]);
        $this->dispatch("created-warning",[ 'email'=>$this->email,
            'names'=>$this->names,
            'lastnames'=>$this->lastnames,]);
    }
    #[On('render')] 
    public function render()
    {
        return view('livewire.createuser');
    }
}
