<div>
    <style>
        .pub{
            appearance: none;
            height: 1.5rem;
            width: 3rem;
            border-radius: 1rem;
            position: relative;
            background-color: #ccc;
            transition: background-color .2s ease;
            
            &:hover{
                background-color: #009EE3;
                
                &::before{
                color: #fff;
                }
            }
            }

            .pub::after{
            content: "";
            display: block;
            position: absolute;
            left: 0;
            height: 1rem;
            width: 1rem;
            background-color: #fff;
            border-radius: 50%;
            margin: .25rem;
            z-index: 9;
            will-change: transform;
            transition: transform .2s ease;
            }

            .pub::before{
            display: block;
            position: absolute;
            margin: .25rem .5rem;
            right:0;
            color: red;
            }

            .pub:checked{
            background-color: #5509d1;
            
            &:hover{
                background-color: #009EE3;
            }
            
            &::before{
                left: 0;
                color: #fff;
            }
            
            &::after{
                transform: translateX(1.5rem);
            }
            }
            .button{
                color: white;
                position: absolute;
                width: max-content;
                z-index: 1;
                right: 18px;
                background-color: #5509d1;

            }
            .select{
                width: 200px;
                border: 1px solid rgba(0, 0, 0, 0.219)
            }
            .action{
                width: 100px;
            }
            .text {
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 1; /* number of lines to show */
                        line-clamp: 1; 
                -webkit-box-orient: vertical;
                }
            .link-btn{
                width: 100%;
            }
            .table-head{
                color: white;
                background-color: #5509d1;
            }
 
    </style>
    
    <div class="box p-3">
        <div class="my-flex">
            <div class="input-group">
                <button class="btn" disabled>Show:</button>
                <div class="select">
                    <select class="form-control">
                        <option value="">10 rows</option>
                    </select>
                </div>
            </div>    
            <a href="{{route('item.add')}}" class="btn button"><i class="fa-solid fa-plus"></i> Add items</a>
        </div>
        <table class="table table-bordered mt-3">
            <tr class="table-head">
                <th class="action">Action</th>
                <th>No</th>
                <th>Item</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Owner</th>
                <th>public</th>
            </tr>
            @foreach($items as $item)
                <tr>
                    <td>
                        <span><a href="{{route('item.update',['id'=> $item->id])}}" class="btn btn-success btn-sm"><i class="fa-solid fa-pencil"></i></a></span>
                        <span><a href="#" wire:click.prevent="delete({{$item->id}})" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></span>
                    </td>
                    <td>{{$item->id}}</td>
                    <td><span class="text"> {{$item->name}} </span></td>
                    <td><span class="text"> {{$item->category->name}} </span></td>
                    <td><span class="text"> {!!$item->description!!} </span></td>
                    <td><span> ${{$item->price}} </span></td>
                    <td><span class="text"> {{$item->owner_name}} </span></td>
                    <td>
                        @if($item->status == 0)
                            <input class="pub" type="checkbox" />
                        @else
                            <input class="pub" type="checkbox" checked />  
                        @endif 
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="link-btn mt-2">
            {{$items->links('pagination::bootstrap-5')}}
        </div>
        @if (session('info'))
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endif

    </div>
</div>
 class="text"