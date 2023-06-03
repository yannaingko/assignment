<?php

namespace App\Http\Livewire\Admin;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemListComponent extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();
        session()->flash('info', 'Data Delete successfully.');
        return back();
    }
    public function render()
    {
        $items = Item::latest()->paginate(6);
        return view('livewire.admin.item-list-component',[
            'items' => $items,
        ]);
    }
}
