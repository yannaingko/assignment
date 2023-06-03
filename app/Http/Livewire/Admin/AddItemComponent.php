<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\Console\Input\Input;

class AddItemComponent extends Component
{

    use WithFileUploads;
    public function save(Request $request)
    {
        $item = new Item();
        $item->name = request()->name;
        $item->category_id = request()->category_id;
        $item->price = request()->price;
        $item->description = request()->content;
        $item->condition_id = request()->cond;
        $item->type_id = request()->type;
        if($request->has('status')) {
            $item->status = request()->status;
        }else{
            $item->status = 0 ;
        }
        $imageName = request()->image->getClientOriginalName();
        request()->image->storeAs('items/',$imageName);
        $item->image = $imageName;
        $item->owner_name = request()->owner_name;
        $item->phone = request()->phone;
        $item->address = request()->address;
        $item->lat = request()->lat;
        $item->lon =request()->lon;
        $item->save();
        session()->flash('info', 'Data Create successfully.');
        return redirect(route('admin.item'));

    }
    public function render()
    {
        $cond = Condition::all();
        $type = Type::all();
        $category = Category::all();
        return view('livewire.admin.add-item-component',[
            'category' => $category,
            'cond' => $cond,
            'type' => $type,
        ]);
    }
}
