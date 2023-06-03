@extends('layouts.master')


@section('content')
    <div class="container-fluid m-5">
        <div class="page-url mx-3 mb-4">
            <span><a href="{{route('home')}}">Home</a></span>
            <i class="bi bi-chevron-right"></i>
            <span>Fashion</span>
        </div>
        <div class="d-flex">
            <div class="col-3">
                <div class="h-content mb-3 mt-1">
                    <h6><b>Filter By</b></h6>
                    <a href="{{route('filter.clear')}}" class="text-danger">Clear Filter</a>
                </div>    
                <form action="{{route('item.filter')}}">
                    <div class="form-group">
                        <label for="">Item Name</label>
                        <input type="text" name="name" value="{{$value->name}}" placeholder="Input Name" class="form-control">    
                    </div>    
                    <div class="form-group">
                        <label for="">Price Range</label>
                        <div class="d-flex"> 
                            <input type="number" value="{{$value->min}}" name="min" placeholder="Min" class="form-control">    
                            <input type="number" value="{{$value->max}}" name="max" placeholder="Max" class="form-control">    
                        </div>
                    </div>    
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category" class="form-control">
                            <option value="">Choose one</option>
                            @foreach($category as $data)
                                <option {{$value->cat == $data->id ? 'selected' : ''}} value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="form-group">
                        <label for="">Item Condition</label>
                        <select name="condition" class="form-control">
                            <option value="">Choose one</option>
                            @foreach($cond as $cond)
                                <option {{$value->cond == $cond->id ? 'selected' : ''}} value="{{$cond->id}}">{{$cond->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type" class="form-control">
                            <option value="">Choose one</option>
                            @foreach($type as $type)
                                <option {{$value->type == $type->id ? 'selected' : ''}} value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <button type="submit" class="btn btn-custom apply-btn">Apply Filter</button>
                </form>    
            </div>
            <div class="col-7">
                <div class="pag-link">
                    {{$item->links('pagination::bootstrap-5')}}  
                    <small>Found <b class="text-danger">{{$item->total()}} items</b> for you</small>      
                </div>
                <div class="row">
                    @foreach($item as $data)
                        <div class="col-lg-4 mb-4">
                            <div class="product-card">
                                <img src="{{asset('assets/image/items')}}/{{$data->image}}" width="240"  alt="Product Image" class="product-image">
                                <div class="product-details">
                                    <div class="name-status">
                                        <h6 class="product-name text">{{$data->name}}</h6>
                                        <p class="product-status">
                                            <b class="text-success">{{$data->condition->name}}</b>
                                        </p>
                                    </div>
                                    <p class="product-price sentence">${{$data->price}}</p>
                                    <div class="user-info">
                                        <i class="bi bi-person-circle user-icon"></i>
                                        <p class="post-owner text">{{$data->owner_name}}</p>
                                    </div>
                                </div>
                                <a href="{{url("/item/detail/$data->id")}}">
                                    <div class="cont">
                                        <div class="mt-4 mx-4">
                                            <h6>Description</h6>
                                            <small>{!!$data->description!!}</small>
                                        </div>
                                    </div>
                                </a>        
                            </div>
                        </div>
                    @endforeach   
                </div>
            </div>
        </div>
    </div>
@endsection