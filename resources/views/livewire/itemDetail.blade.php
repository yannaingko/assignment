@extends('layouts.master')

@section('content') 
    <div class="container mt-5"> 
        <div class="page-url">
            <span><a href="{{route('home')}}">Home</a></span>
            <i class="bi bi-chevron-right"></i>
            <span>Fashion</span>
            <i class="bi bi-chevron-right"></i>
            <span class="sentence"><b>{{$item->name}}</b></span>
        </div>
        <div class="product-img mt-3" style="text-align: center">
            <img src="{{asset('assets/image/items')}}/{{$item->image}}" width="400" alt="">
        </div>
        <div class="row p-3">
            <div class="col-6">
                <div class="my-2">
                    <h6><b>{{$item->name}}</b></h6>
                    <b class="sentence">${{$item->price}}</b>
                </div>
                <table class="table table-bordered" style="text-align: center">
                    <tr>
                        <th>Type</th>
                        <th>Conditon</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td><span class="badge badge-danger p-2">{{$item->type->name}}</span></td>
                        <td><span class="badge badge-info p-2">{{$item->condition->name}}</span></td>
                        <td>
                            @if($item->status == 0)
                                <span class="badge badge-danger p-2">Unavaliable</span>
                            @else
                                <span class="badge badge-success p-2">Avaliable</span>
                            @endif
                        </td>
                    </tr>
                </table>
                <div class="prod-detail">
                    <h6><b>Highlighted Lnformation</b></h6>
                    <p>Try a quick search to explore hundreds of affordable options</p>
                </div>
                <div class="prod-detail">
                    <h6><b>Product Description</b></h6>
                    <p>{{$item->description}}</p>
                </div>
                <div class="owner-info">
                    <h6><b>Owner Information</b></h6>
                    <div class="card-header">
                        <i class="bi bi-telephone"></i>
                        <small><b>Contact Number</b></small>
                        <p><b>+95 {{$item->phone}}</b></p>
                    </div>
                    <div class="d-flex p-2 mt-3 " style="background: rgba(206, 206, 206, 0.507)">
                        <i class="bi bi-person-circle user-icon"></i>
                        <div style="line-height: 5px">
                            <h6><b>{{$item->owner_name}}</b></h6>
                            <small>{{$item->address}}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <i class="bi bi-geo-alt"></i>
                <strong>Location</strong>
                <p><b>{{$item->address}}</b></p>
                <iframe class="g-map"
                width="100%" 
                height="90%" 
                frameborder="0" 
                scrolling="no" 
                marginheight="0" 
                marginwidth="0" 
                src="https://maps.google.com/maps?q={{$item->lat}},{{$item->lon}}&hl=es&z=16&amp;output=embed"
                >
                </iframe>

            </div>
        </div>
    </div>
@endsection