<div>
    <div>
        <div class="box p-3">    
            <div class="card">
                <div class="card-header content-head"><b>Add Categories</b> </div>
                <form action="{{route('category.save')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-1 card-body">
                        <div class="footer-btn">
                            <a href="" class="btn">Cancel</a>
                            <button type="submit" class="btn btn-inf">Save</button>
                        </div>           
    
                        <div class="form-group">
                            <label for="name">Category</label><br>
                            <input type="text" name="name" class="form-control" placeholder="Input Name"  required>                  
                        </div>    
    
                        <div class="form-group">
                            <label>Category Photo</label>
                            <div class="uploadOuter">
                                <div class="dragBox" >
                                    <input type="file" onChange="dragNdrop(event)"  ondragover="drag()" ondrop="drop()" id="uploadFile"  name="image"  required/>
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
                        <label>Status</label>
                        <div class="form-group">
                            <input type="checkbox" name="status"  value="1" >
                            <b>Publish</b>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    
</div>
