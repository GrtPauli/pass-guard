<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\Password;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Dashboard extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $platform_name, $platform_url, $platform_password, $password_id;
    public $search = '';
    public $password_type = 'password';
    public $password_checkbox = false;

    protected function rules()
    {
        return [
            'platform_name' => 'required|string|min:3',
            'platform_url' => 'required|string|min:3',
            'platform_password' => 'required|string|min:3',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function togglePassword(){
        if($this->password_type == 'password'){
            $this->password_type = 'text';
        } else {
            $this->password_type = 'password';
        }
    }

    public function savePassword()
    {
        $validatedData = $this->validate();
        $validatedData['user_id'] = auth()->id();
        $validatedData['platform_password'] = Crypt::encryptString($validatedData['platform_password']);

        Password::create($validatedData);
        session()->flash('message','Password Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function decryptPassword(string $encryptedPassword){
        return Crypt::decryptString($encryptedPassword);
    }

    public function copyToClipboard($encryptedPassword) {
        $decryptedPassword = Crypt::decryptString($encryptedPassword['platform_password']);
        $this->dispatchBrowserEvent('copy-password', ['password' => $decryptedPassword]);
        session()->flash('message','Password Copied Successfully');
    }

    public function editPassword(int $password_id)
    {
        $password = Password::find($password_id);
        if($password){

            $this->password_id = $password->id;
            $this->platform_name = $password->platform_name;
            $this->platform_url = $password->platform_url;
            $this->platform_password = $this->decryptPassword($password->platform_password);
        }else{
            return redirect()->to('/dashboard');
        }
    }

    public function updatePassword()
    {
        $validatedData = $this->validate();
        $validatedData['platform_password'] = Crypt::encryptString($validatedData['platform_password']);

        Password::where('id',$this->password_id)->update([
            'platform_name' => $validatedData['platform_name'],
            'platform_url' => $validatedData['platform_url'],
            'platform_password' => $validatedData['platform_password']
        ]);
        session()->flash('message','Password Updated Successfully');
        $this->togglePassword();
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deletePassword(int $password_id)
    {
        $this->password_id = $password_id;
    }

    public function destroyPassword()
    {
        Password::find($this->password_id)->delete();
        session()->flash('message','Password Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->togglePassword();
    }

    public function resetInput()
    {
        $this->platform_name = '';
        $this->platform_password = '';
        $this->platform_url = '';
        $this->password_checkbox = false;
    }

    public function render()
    {
        $total_passwords = count(auth()->user()->passwords()->get());
        $passwords = auth()->user()->passwords()->orderBy('id','DESC')->paginate(5);
        return view('livewire.dashboard', ['passwords' => $passwords, 'total_passwords' => $total_passwords]);
    }
}

