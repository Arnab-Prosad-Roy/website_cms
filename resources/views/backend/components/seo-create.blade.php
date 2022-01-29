                <div class="col-12">
                  <label for="inputNanme4" class="form-label"><b>Authors</b></label>
                  <input type="text" class="form-control" name="authors" value="{{old('authors')}}">
                      @error('authors')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>  
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Meta Title</b></label>
                  <input type="text" class="form-control" name="meta_title" value="{{old('meta_title')}}">
                      @error('meta_title')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Meta Description</b></label>
                  <textarea class="form-control" name="meta_description">{{old('meta_description')}}</textarea>
                      @error('meta_description')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Meta Tags</b></label>
                  <input type="text" class="form-control" name="meta_tags" value="{{old('meta_tags')}}">
                      @error('meta_tags')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div> 
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>OG Meta Title</b></label>
                  <input type="text" class="form-control" name="og_meta_title" value="{{old('og_meta_title')}}">
                      @error('og_meta_title')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>OG Meta Description</b></label>
                  <textarea class="form-control" name="og_meta_description">{{old('og_meta_description')}}</textarea>
                      @error('og_meta_description')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>OG Meta Image</b></label>
                  <input type="file" class="form-control" name="og_meta_image" value="{{old('og_meta_image')}}">
                  
                      @error('og_meta_image')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                
                <div class="col-12 mt-5 mb-5">
                  <label for="inputNanme4" class="form-label"><b>OG Meta Tags</b></label>
                  <input type="text" class="form-control" name="og_meta_tags" value="{{old('og_meta_tags')}}">
                      @error('og_meta_tags')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>