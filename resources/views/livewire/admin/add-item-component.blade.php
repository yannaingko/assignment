<div>
    <div class="box p-3">
        <div class="card">
            <div class="card-header content-head"><b> Add Items</b></div>
            <form action="{{route('item.save')}}" method="POST" class="d-flex" enctype="multipart/form-data">
                @csrf
                <div class="card-1 card-body">
                    <h5><b>Item Information</b> </h5>
                    <div class="form-group">
                        <label for="field1">Item Name</label><br>
                        <input required type="text" name="name" class="form-control inputField" id="field1" placeholder="Input Name" >                  
                    </div>    
                    <div class="form-group">
                        <label for="field2">Select Category</label><br>
                        <select required name="category_id" class="form-control inputField" id="field2" >
                            <option value="">Select category</option>
                            @foreach($category as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>                     
                    </div>       
                    <div class="form-group">
                        <label for="field3">Price</label>
                        <input required type="text" name="price" class="form-control inputField" placeholder="Enter Price" id="field3">                        
                    </div>           
                    <div class="form-group">
                        <label for="content">Description</label>
                        <textarea name="content" id="description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="field4">Select Item Condition</label>
                        <select required name="cond" class="form-control inputField" id="field4">
                            <option value="">Select Item Condtion</option>
                            @foreach($cond as $cond)
                                <option value="{{$cond->id}}">{{$cond->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="field5">Select Item Type</label>
                        <select required name="type" class="form-control inputField" id="field5">
                            <option value="">Select Item Type</option>
                            @foreach($type as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <label>Status</label>
                    <div class="form-group">
                        <input required type="checkbox" name="status" value="1" >
                        <b>Publish</b>
                    </div>
                    <div class="form-group">
                        <label>Item Photo</label>
                        <div class="uploadOuter">
                            <div class="dragBox" >
                                <input required type="file" onChange="dragNdrop(event)"  ondragover="drag()" ondrop="drop()" id="uploadFile"  name="image" />
                                <div class="upload-btn">
                                    <strong><i class="fa-solid fa-cloud-arrow-up upload-icon"></i></strong><br>
                                    <small>Darg and Drop here</small><br>
                                    <small>or</small><br>
                                    <label for="uploadFile" class="btn btn-inf">Upload Image</label>
                                </div>
                            </div>
                        </div>
                        <div id="preview"></div>                        
                    </div>
                </div>
                <div class="card-2 card-body">
                    <h5><b>Owner Information</b></h5>
                    <div class="form-group">
                        <label for="field6">Owner Name</label>
                        <input required type="text" id="field6" class="form-control inputField" placeholder="Input Owner Name" name="owner_name" >
                    </div>
                    <div class="form-group">
                        <label for="field7">Contact Number</label>
                        <div class="input-group">
                            <button class="btn"  style="border: 1px solid rgba(128, 128, 128, 0.404)" disabled>+95</button>
                            <input required id="field7" type="text" class="form-control inputField" placeholder="Add Number" name="phone" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field8">Address</label>
                        <textarea required name="address" id="field8" class="form-control inputField" rows="3" placeholder="Enter Address"></textarea>
                    </div>
                    <div id="map"></div>

                    <div class="input-group">
                        <div class="form-group">
                            <input required type="hidden" class="form-control"  id="latitude" name="lat" required>
                            <input required type="hidden" class="form-control"  id="longitude" name="lon" required>                     
                        </div>
                    </div>
                    <div class="footer-btn pb-5">
                        <a href="" class="btn">Cancel</a>
                        <button onclick="checkInputs()" type="submit" class="btn btn-inf">Save</button>
                    </div>           
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
