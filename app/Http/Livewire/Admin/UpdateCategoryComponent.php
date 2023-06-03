<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateCategoryComponent extends Component
{
    public $categoryId;
    public function mount($id)
    {
        $this->categoryId = $id;
    }

    public function update(Request $request, $id)
    {
        $cat =Category::find($id);
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
        session()->flash('info', 'Data Update successfully.');
        return redirect()->route('admin.category');
    }

    public function render()
    {
        $category = Category::where('id',$this->categoryId)->first();
        return view('livewire.admin.update-category-component',[
            'category' => $category
        ]);
    }
}
