@extends('layouts.master')

@section('content')
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        }
    </style>
    <div class="control-banner">
        <img class="banner" src="{{asset('assets/image/banner.jpg')}}" alt="" srcset="">
    </div>

    <div class="container content">
        <form action="{{url('/item/search')}}">
            @csrf
            <div class="d-flex header-search mb-5">
                <div class="search-card">
                    <div class="input-group bg-white">
                        <div class="search-container">
                        <input type="text" class="search-input form-control" name="search" placeholder="Search...">
                        <span class="search-icon">
                            <i class="bi bi-search "></i>  
                        </span>
                        </div>
                        <div>
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                            Category
                            </button>
                            <ul class="dropdown-menu">
                                @foreach($category as $data)
                                    <li><a class="dropdown-item" href="{{url("/item/category/$data->id")}}">{{$data->name}}</a></li>
                                @endforeach
                            </ul>              
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-custom search-btn ">Search</button>
            </div>
        </form>
        <div class="h-content mb-3 mt-1">
            <h5><b>What are you looking for ?</b></h5>
            <a href="#">View More <i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="row text-center mb-3">
            <div class="col-md-2">
                <a href="#">
                  <div class="card service-card card-inverse">
                    <div class="av">
                        <span class="icon">
                            <i class="bi bi-laptop"></i>                    
                        </span>
                      <h6 class="card-title">Computer</h6>
                    </div>
                  </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#">
                  <div class="card service-card card-inverse">
                    <div class="av">
                        <span class="icon">
                            <i class="bi bi-phone"></i>                    
                        </span>
                      <h6 class="card-title">Computer</h6>
                    </div>
                  </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#">
                  <div class="card service-card card-inverse">
                    <div class="av">
                        <span class="icon">
                            <i class="bi bi-house-door-fill"></i>                    
                        </span>
                      <h6 class="card-title">Property</h6>
                    </div>
                  </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#">
                  <div class="card service-card card-inverse">
                    <div class="av">
                        <span class="icon">
                            <i class="bi bi-music-note-beamed"></i>                    
                        </span>
                      <h6 class="card-title">Music</h6>
                    </div>
                  </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#">
                  <div class="card service-card card-inverse">
                    <div class="av">
                        <span class="icon">
                            <i class="bi bi-incognito"></i>                    
                        </span>
                      <h6 class="card-title">Fashions</h6>
                    </div>
                  </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="#">
                  <div class="card service-card card-inverse">
                    <div class="av">
                        <span class="icon">
                            <i class="bi bi-wrench"></i>                   
                        </span>
                      <h6 class="card-title">Service</h6>
                    </div>
                  </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="h-content mb-3">
            <h5><b>Recent Items</b></h5>
            <a href="#">View More <i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="row product-c">
            @foreach($item as $data)
                <div class="col mb-4">
                    <div class="product-card">
                        <img src="{{asset('assets/image/items')}}/{{$data->image}}" width="240"  alt="Product Image" class="product-image">
                        <div class="product-details">
                            <div class="name-status">
                                <h6 class="product-name text">{{$data->name}}</h6>
                                <p class="product-status">
                                    <small><b class="text-primary">{{$data->condition->name}}</b></small>
                                </p>
                            </div>
                            <small class="product-price sentence">${{$data->price}}</small>
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
        <div class="link-btn">
            {{$item->links('pagination::bootstrap-5')}}        
        </div>
          
    </div>
    <a href="{{route('login')}}" class="btn btn-custom admin-btn">For Admin</a>
@endsection