<?php

namespace App\Http\Livewire\Bar;

use App\Models\Bar;
use App\Models\BarTransactionDetail;
use Livewire\Component;

class BarData extends Component
{
    protected $listeners = ['destroyBar','cencelDelete'];
    public $name,$price ,$bar_id;
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
        $this->bar_id = null;
    }

    public function closeModal(){
        $this->resetFields();
    }

    public function addBar(){
        $validatedData = $this->validate();
        $validatedData['price'] = priceToInt($validatedData['price']);
        Bar::create($validatedData);
        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('success-added');
    }

    public function editBar(int $id){
        $bar = Bar::find($id);
        if($bar){
            $this->bar_id = $bar->id;
            $this->name = $bar->name;
            $this->price = priceFormat($bar->price);
        }else{
            return redirect()->to('/admin/bar/data');
        }
    }

    public function updateBar()
    {
        $validatedData = $this->validate();
        $validatedData['price'] = priceToInt($validatedData['price']);
        Bar::where('id',$this->bar_id)
        ->update($validatedData);
        $this->dispatchBrowserEvent('close-update-modal');
        $this->resetFields();
        $this->dispatchBrowserEvent('success-updated');
    }

    public function deleteBar($id)
    {
        $bar = Bar::find($id);
        $this->bar_id = $id;
        $this->dispatchBrowserEvent('deleted-confirm',[
            'name' => $bar->name
        ]);
    }

    public function destroyBar()
    {
        $tr = BarTransactionDetail::where('bar_id',$this->bar_id)->get();
        if(count($tr) > 0){
            Bar::destroy($this->bar_id);
        }else {
            Bar::where('id',$this->bar_id)
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
        return view('livewire.bar.bar-data',[
            'bars' => Bar::all()
        ]);
    }
}
