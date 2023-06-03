<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Type;
use Livewire\Component;

class UpdateItemComponent extends Component
{
    public $productId;
    public function mount($id)
    {
        $this->productId = $id;
    }
    public function update($id)
    {
        $item = Item::find($id);
        $item->name = request()->name;
        $item->category_id = request()->category_id;
        $item->price = request()->price;
        $item->description = request()->content;
        $item->condition_id = request()->cond;
        $item->type_id = request()->type;
        $item->status = request()->status;

        $imageName = request()->image->getClientOriginalName();
        request()->image->storeAs('items/',$imageName);
        $item->image = $imageName;
        
        $item->owner_name = request()->owner_name;
        $item->phone = request()->phone;
        $item->address = request()->address;
        $item->lat = request()->lat;
        $item->lon =request()->lon;
        $item->save();
        session()->flash('info', 'Data Update successfully.');
        return redirect(route('admin.item'));

    }
    public function render()
    {
        $category = Category::all();
        $cond = Condition::all();
        $type = Type::all();
        $item = Item::where('id',$this->productId)->first();
        return view('livewire.admin.update-item-component',[
            'category' => $category,
            'item' => $item,
            'cond' => $cond,
            'type' => $type,
        ]);
    }
}
