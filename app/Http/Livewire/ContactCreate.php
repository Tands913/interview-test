<?php

namespace App\Http\Livewire;


use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Contact;

class ContactCreate extends Component
{
    use WithFileUploads;


    const REDIRECT_ROUTE = 'contact.show';

    public $email;

    public $phone_num;

    public $firstname;

    public $lastname;

    public $img_file;

    public $contact;


    public function render()
    {
        return view('livewire.contact-create');
    }


    //create the contact
    public function addContact()
    {
        $data = $this->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email'=> 'required|email|unique:contacts,phone_num',
            'phone_num' => 'nullable|numeric|regex:/[0-9]{10}/|unique:contacts,phone_num'
        ]);
        
        if(isset($this->img_file))
        {
            $data['img_path'] = $this->img_file->store('contact-img/','public');
        }

        $this->contact = Contact::create($data);

        return redirect()->route(self::REDIRECT_ROUTE);
    }
}
