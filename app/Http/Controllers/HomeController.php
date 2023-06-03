<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Type;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use stdClass;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    // public $min;
    // public $max;
    // public $cat;
    // public $cond;
    // public $type;

    use WithPagination;
    public function home()
    {
        $category = Category::all();
        $item = Item::latest()->paginate(8);
        return view('livewire.home',[
            'item' => $item,
            'category' => $category,
        ]);
    }
    public function search()
    {
        $item = Item::where('name', 'LIKE', '%' . request()->search . '%')->paginate(8);
        $category = Category::all();

        $userInput = request()->search;
        return view('livewire.search',[
            'item' => $item,
            'category' => $category,
            'input' => $userInput,
        ]);
    }
    public function category($id)
    {
        $selCatId = $id;
        $category = Category::all();
        $item = Item::where('category_id',$id)->paginate(8);
        $cond = Condition::all();
        $types = Type::all();
        return view('livewire.category',[
            'item' => $item,
            'category' => $category,
            'selCatId' => $selCatId,
            'cond' => $cond,
            'types' => $types,
        ]);
    }

    public function filterItems(Request $request)
    {
        $data = new stdClass;
        $data->name = $request->input('name');
        $data->min = $request->input('min');
        $data->max = $request->input('max');
        $data->cat = $request->input('category');
        $data->cond = $request->input('condition');
        $data->type = $request->input('type');

        $query = Item::query();
        // Filter by name
        if ($request->filled('name')) {
            $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }
    
        // Filter by price range
        if ($request->filled('min')) {
            $query->where('price', '>=',$request->input('min'));
        }
    
        if ($request->filled('max')) {
            $query->where('price', '<=',$request->input('max'));
        }
    
        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id',(int) $request->input('category'));
        }
    
        // Filter by condition
        if ($request->filled('condition')) {
            $query->where('condition_id', $request->input('condition'));
        }
    
        // Filter by type
        if ($request->filled('type')) {
            $query->where('type_id', $request->input('type'));
        }

        $item = $query->orderBy('price','ASC')->paginate(6);
        $category = Category::all();
        $codn = Condition::all();
        $type = Type::all();
        return view('livewire.filter',[
            'item' => $item,
            'category' => $category,
            'value' => $data,
            'cond' => $codn,
            'type' => $type,
        ]);
    }
    public function clearFilter()
    {
        return redirect()->route('item.filter');
    }

    public function detail($id)
    {
        $item = Item::find($id);
        return view('livewire.itemDetail',[
            'item' => $item,
        ]);
    }
    public function loggout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
