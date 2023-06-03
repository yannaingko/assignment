@extends('layouts.master')

@section('content')
    <div class="container-fluid mt-3 mx-5">
        <div class="page-url mb-5">
            <span><a href="{{route('home')}}">Home</a></span>
            <i class="bi bi-chevron-right"></i>
            <span>Fashion</span>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="h-content mb-3 mt-1">
                    <h6><b>Filter By</b></h6>
                    <a href="{{route('item.filter')}}" class="text-danger">Clear Filter</a>
                </div>    
                <form action="{{route('item.filter')}}">
                    @csrf
                    <div class="form-group">
                        <label for="">Item Name</label>
                        <input type="text" name="name" placeholder="Input Name" class="form-control">    
                    </div>    
                    <div class="form-group">
                        <label for="">Price Range</label>
                        <div class="d-flex"> 
                            <input type="number" name="min" placeholder="Min" class="form-control">    
                            <input type="number" name="max" placeholder="Max" class="form-control">    
                        </div>
                    </div>    
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category" class="form-control">
                            <option value="">Choose one</option>
                            @foreach($category as $data)
                                <option {{$selCatId == $data->id ? 'selected' : ''}} value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="form-group">
                        <label for="">Item Condition</label>
                        <select name="condition" class="form-control">
                            <option value="">Choose one</option>
                            @foreach($cond as $con)
                                <option value="{{$con->id}}">{{$con->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="form-group">
                        <label for="">Type</label>
                        <select name="type" class="form-control">
                            <option value="">Choose one</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <button type="submit" class="btn btn-custom apply-btn">Apply Filter</button>
                </form>    
            </div>
            <div class="col-8">
                <div class="row">
                    @foreach($item as $data)
                        <div class="col-4 mb-4">
                            <div class="product-card">
                                <img src="{{asset('assets/image/items')}}/{{$data->image}}" width="240"  alt="Product Image" class="product-image">
                                <div class="product-details">
                                    <div class="name-status">
                                        <h6 class="product-name text">{{$data->name}}</h6>
                                        <p class="product-status">
                                            <b class="text-primary" style="text-transform: capitalize">{{$data->condition->name}}</b>
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