<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;

class ContactUpdate extends Component
{

    use WithFileUploads;

    public $contact_id;

    public $contact;

    public $email;

    public $phone_num;

    public $firstname;

    public $lastname;

    public $img_file;

    public $updateSuccess = '';

    public function render()
    {
        return view('livewire.contact-update', ['contact' => $this->contact]);
    }

    public function mount() {
        $this->contact = Contact::find($this->contact_id); 
        $this->email = $this->contact->email;
        $this->firstname = $this->contact->firstname;
        $this->lastname = $this->contact->lastname;
        $this->phone_num = $this->contact->phone_num;
    }

    public function updateContact() 
    {
        $this->updateSuccess = 'Update Not Done!';
        $data = $this->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email'=> 'required|email|unique:contacts,email,'.$this->contact->id,
            'phone_num' => 'nullable|numeric|regex:/[0-9]{10}/|unique:contacts,phone_num,'.$this->contact->id,
        ]);

        if(isset($this->img_file))
        {
            if($this->contact)
            {
                Storage::disk('public')->delete($this->contact->img_path);
            }  
            $this->contact->img_path = $this->img_file->store('contact-img/','public');
            $this->img_file = null;
        }
        $this->contact->firstname = $data['firstname']; 
        $this->contact->lastname = $data['lastname']; 
        $this->contact->email = $data['email']; 
        $this->contact->phone_num = $data['phone_num']; 

        $status = $this->contact->save();  
        if($status) {
            $this->updateSuccess = 'Update is completed!';
        }
    }
}
