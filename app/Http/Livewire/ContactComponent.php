<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination;

class ContactComponent extends Component
{
    use WithPagination;

    public $currentOrderProperty;


    public $currentOrder = 'asc';


    public $pageNum = 5;

    public $searchEmail = "";

    public function mount() 
    {

    }

    public function render()
    {

        $contacts = [];
      
        $contacts = Contact::where('email', 'like', '%'.$this->searchEmail.'%');;

        if(!is_null($this->currentOrderProperty) && $this->currentOrder !== '')
        {
            $contacts = $contacts -> orderBy($this->currentOrderProperty,$this->currentOrder);  
        }
        

        $contacts = $contacts->paginate($this->pageNum);

        return view('livewire.contact', ['contacts' => $contacts]);
    }


    /**
     * change order status
     * 
     * @return void
     */
    public function contactOrder($property)
    {
        if($property === $this->currentOrderProperty)
        {
           $this->currentOrder = ($this->currentOrder === 'asc') ? 'desc' : (($this->currentOrder === 'desc') ? '' : 'asc');
        }
        else
        {
            $this->currentOrder = 'asc';
            $this->currentOrderProperty = $property;
        }
    }

}
