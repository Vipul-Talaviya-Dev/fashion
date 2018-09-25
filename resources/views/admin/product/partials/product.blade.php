<fieldset title="1">
    <legend class="text-semibold">Category Info</legend>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Main Category: <span class="text-danger">*</span></label>
                <select data-placeholder="Select Main Category" class="form-control category" name="categoryId">
                    <option value="">-- Select Main Category --</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('categoryId') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach        
                </select>
                @if($errors->get('categoryId'))
                @foreach($errors->get('categoryId') as $error)
                <span style="color: red;">{{$error}}</span>
                @endforeach
                @endif
            </div>
        </div>
        <div id="subCategoryDiv"></div>
        <!-- <div class="col-md-6"><div class="form-group"><label>Sub Category: <span class="text-danger">*</span></label><select name="category"  data-placeholder="Select Type First" class="select required" id="subCategory"></select></div></div> -->
</div>
</fieldset>