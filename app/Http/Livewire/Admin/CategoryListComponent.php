<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryListComponent extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $cat = Category::find($id);
        $cat->delete();
        session()->flash('info', 'Data Delete successfully.');
        return back();
    }
    public function render()
    {
        $category = Category::paginate(6);
        return view('livewire.admin.category-list-component',[
            'category' => $category,
        ]);
    }
}
