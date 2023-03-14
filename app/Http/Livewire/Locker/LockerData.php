<?php

namespace App\Http\Livewire\Locker;

use App\Models\Locker;
use App\Models\LockerTransactionDetail;
use Livewire\Component;

class LockerData extends Component
{
    protected $listeners = ['destroyLocker','cencelDelete'];
    public $name,$price ,$locker_id;
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
        $this->locker_id = null;
    }

    public function closeModal(){
        $this->resetFields();
    }

    public function addLocker(){
        $validatedData = $this->validate();
        $validatedData['price'] = priceToInt($validatedData['price']);
        Locker::create($validatedData);
        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('success-added');
    }

    public function editLocker(int $id){
        $ticket = Locker::find($id);
        if($ticket){
            $this->locker_id = $ticket->id;
            $this->name = $ticket->name;
            $this->price = priceFormat($ticket->price);
        }else{
            return redirect()->to('/admin/locker/data');
        }
    }

    public function updateLocker()
    {
        $validatedData = $this->validate();
        $validatedData['price'] = priceToInt($validatedData['price']);
        Locker::where('id',$this->locker_id)
        ->update($validatedData);
        $this->dispatchBrowserEvent('close-update-modal');
        $this->resetFields();
        $this->dispatchBrowserEvent('success-updated');
    }

    public function deleteLocker($id)
    {
        $locker = Locker::find($id);
        $this->locker_id = $id;
        $this->dispatchBrowserEvent('deleted-confirm',[
            'name' => $locker->name
        ]);
    }

    public function destroyLocker()
    {
        $tr = LockerTransactionDetail::where('locker_id',$this->locker_id)->get();
        if(count($tr) > 0){
            Locker::destroy($this->locker_id);
        }else {
            Locker::where('id',$this->locker_id)
            ->forcedelete();
        }
        $this->resetFields();
        $this->dispatchBrowserEvent('deleted-success');
    }

    public function cencelDelete(){
        $this->resetFields();
    }
    public function render()
    {
        return view('livewire.locker.locker-data',[
            'lockers' => Locker::all()
        ]);
    }
}
