<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\user;
use Livewire\Attributes\On; 
class Createuser extends Component
{
    public $email;
    public $password;
    public $names;
    public $lastnames;
    public $phone_number;
    public function createUser(){
        user::create([
            'email'=>$this->email,
            'password'=>$this->password,
            'names'=>$this->names,
            'lastnames'=>$this->lastnames,
            'phone_number'=>$this->phone_number,
            'active'=>1,
            ]);
        $this->dispatch("render");
    }
    #[On('render')] 
    public function render()
    {
        return view('livewire.createuser');
    }
}
