<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\user;
use Livewire\Attributes\On; 
use Exception;
class Userscrud extends Component
{
    public $search;
    public $users;
    public $user;
    public $email;
    public $password;
    public $names;
    public $lastnames;
    public $phone_number;
    public function render()
    {
        $this->users = user::where('names', 'like', '%' . $this->search . '%')
        ->orWhere('lastnames', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' .$this->search . '%')
        ->Where('active',1)
        ->get();
        return view('livewire.userscrud',['users' => $this->users]);
    }
    public function showUser($id){
        $this->user= user::find($id);
        $this->email=$this->user->email;
        $this->names=$this->user->names;
        $this->lastnames=$this->user->lastnames;
        $this->phone_number=$this->user->phone_number;
    } 
    public function updateUser(){
        $dataToUpdate = [];
        $this->user->email=$this->email;
        $this->user->names=$this->names;
        $this->user->lastnames=$this->lastnames;
        $this->user->phone_number=$this->phone_number;
        if (!empty($this->email)) {
            $dataToUpdate['email'] = $this->email;
        }
        if (!empty($this->names)) {
            $dataToUpdate['names'] = $this->names;
        }
        if (!empty($this->lastnames)) {
            $dataToUpdate['lastnames'] = $this->lastnames;
        }
        if (!empty($this->phone_number)) {
            $dataToUpdate['phone_number'] = $this->phone_number;
        }
        if (!empty($this->password)) {
            $dataToUpdate['password'] = $this->password;;
        }
        try {
            $this->user->update($dataToUpdate);
            $this->dispatch("render");
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw new Exception("Error al guardar el usuario: " . $e->getMessage());
        }
    }
    public function delete($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
            $this->dispatch('render');
        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->dispatch('userDeleteFailed', ['message' => 'Error al eliminar el usuario.']);
    }
}
}
