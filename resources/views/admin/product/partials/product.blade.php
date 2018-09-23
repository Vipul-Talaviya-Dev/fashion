<fieldset title="1">
    <legend class="text-semibold">Seller Info</legend>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Seller Name : <span class="text-danger">*</span></label>
                <select name="seller" data-placeholder="Select Seller" class="select required">
                    <option></option>
                    @foreach($seller as $seller)
                        @if(!empty($seller->store))
                            <option value="{{ $seller->id }}" {{ old('seller') == $seller->id ? 'selected' : '' }}>{{ $seller-> fname }} {{ $seller->lname }}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->get('seller'))
                    @foreach($errors->get('seller') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Select Type: <span class="text-danger">*</span></label>
                <select name="type" id="type" data-placeholder="Select type"
                        class="select required">
                    <option></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('type') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if($errors->get('type'))
                    @foreach($errors->get('type') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Select Category: <span class="text-danger">*</span></label>
                <select name="category" id="category" data-placeholder="Select Type First"
                        class="select required">
                    <option></option>
                </select>
                @if($errors->get('category'))
                    @foreach($errors->get('category') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
            </div>
        </div>
        {{--<button class="cloudinary">Cloudinary</button>--}}
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group attr">

            </div>
        </div>
    </div>
</fieldset>