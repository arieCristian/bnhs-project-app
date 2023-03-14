<?php

namespace App\Http\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class TicketData extends Component
{
    protected $listeners = ['destroyTicket','cencelDelete'];
    public $name,$price ,$ticket_id;
    protected $rules = [
        'name' => 'required',
        'price' => 'required'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function resetFields(){
        $this->name = '';
        $this->price = null;
        $this->ticket_id = null;
    }

    public function closeModal(){
        $this->resetFields();
    }

    // public function closeUpdateModal(){
    //     $this->resetFields();
    // }
 
    public function addTicket(){
        $validatedData = $this->validate();
        $validatedData['price'] = priceToInt($validatedData['price']);
        Ticket::create($validatedData);
        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('success-added');
    }

    public function editTicket(int $id){
        $ticket = Ticket::find($id);
        if($ticket){
            $this->ticket_id = $ticket->id;
            $this->name = $ticket->name;
            $this->price = priceFormat($ticket->price);
        }else{
            return redirect()->to('/admin/ticket/data');
        }
    }

    public function updateTicket()
    {
        $validatedData = $this->validate();
        $validatedData['price'] = priceToInt($validatedData['price']);
        Ticket::where('id',$this->ticket_id)
        ->update($validatedData);
        $this->dispatchBrowserEvent('close-update-modal');
        $this->resetFields();
        $this->dispatchBrowserEvent('success-updated');
    }

    public function deleteTicket($id)
    {
        $ticket = Ticket::find($id);
        $this->ticket_id = $id;
        $this->dispatchBrowserEvent('deleted-confirm',[
            'name' => $ticket->name
        ]);
    }

    public function destroyTicket()
    {
        Ticket::destroy($this->ticket_id);
        $this->resetFields();
        $this->dispatchBrowserEvent('deleted-success');
    }

    public function cencelDelete(){
        $this->resetFields();
    }
    public function render()
    {
        return view('livewire.ticket.ticket-data',[
            'tickets' => Ticket::all()
        ]);
    }
}
