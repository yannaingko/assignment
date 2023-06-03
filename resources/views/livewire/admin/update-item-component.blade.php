<div>
    <div class="box p-3">
        <p>Item List ><span>Add Items</span></p>

        <div class="card">
            <div class="card-header content-head">Add Items</div>
            <form action="{{route('item.update',['id' => $item->id])}}" method="POST" class="d-flex" enctype="multipart/form-data">
                @csrf
                <div class="card-1 card-body">
                    <h6><b>Item Information</b> </h6>
                    <div class="form-group">
                        <label for="name">Item Name</label><br>
                        <input required type="text" name="name" class="form-control" value="{{$item->name}}" placeholder="Input Name" >                  
                    </div>    
                    <div class="form-group">
                        <label>Select Category</label><br>
                        <select required name="category_id" class="form-control" r>
                            <option value="">Select category</option>
                            @foreach($category as $data)
                                <option {{$item->category_id == $data->id ? 'selected':''}} value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>                     
                    </div>       
                    <div class="form-group">
                        <label>Price</label>
                        <input required type="text" name="price" value="{{$item->price}}" class="form-control" placeholder="Enter Price" >                        
                    </div>           
                    <div class="form-group">
                        <label for="content">Description</label>
                        <textarea required name="content" id="description" rows="5" class="form-control" >
                            {{ $item->description }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Select Item Condition</label>
                        <select required name="cond" class="form-control" >
                            <option value="">Select Item Condtion</option>
                            @foreach($cond as $con)
                                <option {{$item->condition_id == $con->id ? 'selected':''}} value="{{$con->id}}">{{$con->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Item Type</label>
                        <select required name="type" class="form-control" >
                            <option value="">Select Item Type</option>
                            @foreach($type as $type)
                                <option {{$item->type_id == $type->id ? 'selected':''}} value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label>Status</label>
                    <div class="form-group">
                        @if($item->status == 1)
                            <input type="checkbox" checked name="status" value="1" >
                        @else
                            <input type="checkbox" name="status" value="1" >
                        @endif
                        <b>Publish</b>
                    </div>
                    <div class="form-group">
                        <label>Item Photo</label>
                        <div class="uploadOuter">
                            <div class="dragBox" >
                                <input type="file" onChange="dragNdrop(event)"  ondragover="drag()" ondrop="drop()" id="uploadFile"  name="image" value="{{$item->image}}" required/>
                                <div class="upload-btn">
                                    <strong><i class="fa-solid fa-cloud-arrow-up upload-icon"></i></strong><br>
                                    <small>Darg and Drop here</small><br>
                                    <small>or</small><br>
                                    <label for="uploadFile" class="btn btn-primary">Upload Image</label>
                                </div>
                            </div>
                        </div>
                        <div id="preview"></div>                        
                    </div>
                </div>
                <div class="card-2 card-body">
                    <h6><b>Owner Information</b></h6>
                    <div class="form-group">
                        <label for="">Owner Name</label>
                        <input required type="text" class="form-control" value="{{$item->owner_name}}" placeholder="Input Owner Name" name="owner_name" >
                    </div>
                    <div class="form-group">
                        <label for="">Contact Number</label>
                        <div class="input-group">
                            <button class="btn" style="border: 1px solid rgba(128, 128, 128, 0.404)" disabled>+95</button>
                            <input required type="text" class="form-control" value="{{$item->phone}}" placeholder="Add Number" name="phone" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea required name="address" class="form-control" rows="3" placeholder="Enter Address">{{$item->address}}</textarea>
                    </div>
                    <div id="map"></div>

                    <div class="input-group">
                        <div class="form-group">
                            <input required type="hidden" class="form-control" value="{{$item->lat}}"  id="latitude" name="lat" required>
                            <input required type="hidden" class="form-control" value="{{$item->lon}}" id="longitude" name="lon"  required>                     
                        </div>
                    </div>
                    <div class="input-group footer-btn   pb-5">
                        <a href="" class="btn">Cancel</a>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>           
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
