<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;

class AddCategoryComponent extends Component
{
    public function save(Request $request)
    {
        $cat = new Category;
        $cat->name = request()->name;

        $imageName = request()->image->getClientOriginalName();
        request()->image->storeAs('category/',$imageName);
        $cat->image = $imageName;

        if($request->has('status')) {
            $cat->publish = request()->status;
        }else{
            $cat->publish = 0;
        }
        $cat->save();
        session()->flash('info', 'Data Create successfully.');
        return redirect(route('admin.category'));
    }
    public function render()
    {
        return view('livewire.admin.add-category-component');
    }
}
