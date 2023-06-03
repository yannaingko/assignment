<div>
    <div>
        <div>
            <div class="box p-3">
                <p>Categories > <span><b></b> Add Categories</span></p>
        
                <div class="card">
                    <div class="card-header content-head"><b>Add Categories</b> </div>
                    <form action="{{route('category.update',['id' => $category->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-1 card-body">
                            <div class="input-group footer-btn">
                                <a href="{{route('admin.category')}}" class="btn">Cancel</a>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>           
    
                            <div class="form-group">
                                <label for="name">Category</label><br>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control"  placeholder="Input Name" required>                  
                            </div>    
        
                            <div class="form-group">
                                <label>Category Photo</label>
                                <div class="uploadOuter">
                                    <div class="dragBox" >
                                        <input type="file" onChange="dragNdrop(event)"  ondragover="drag()" ondrop="drop()" id="uploadFile" value="{{$category->image}}"   name="image" />
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
                            <label>Status</label>
                            <div class="form-group">
                                @if($category->publish == 1)
                                    <input type="checkbox" checked name="status" value="1"  >
                                @else
                                    <input type="checkbox" name="status" value="1" >
                                @endif
                                <b>Publish</b>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>    
</div>
