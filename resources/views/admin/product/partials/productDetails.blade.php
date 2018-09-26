<fieldset title="2">
    <legend class="text-semibold">Product Details</legend>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Product Name: <span class="text-danger">*</span></label>
                <input type="text" name="name" placeholder="Enter Product"
                       class="form-control required" value="{{ old('name') }}">
                @if($errors->get('name'))
                    @foreach($errors->get('name') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Select Brand: <span class="text-danger">*</span></label>
                <select name="brand" data-placeholder="Select Brand Name"
                        class="form-control">
                    <option value=""> -- Select Brand --</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                @if($errors->get('brand'))
                    @foreach($errors->get('brand') as $error)
                        <span style="color: red;">{{$error}}</span>
                    @endforeach
                @endif
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Price: <span class="text-danger">*</span></label>
                <input type="number" name="price" placeholder="Enter Price" class="form-control required" value="{{ old('price') }}" pattern="[0-9]" min="0">
            </div>
            @if($errors->get('price'))
                @foreach($errors->get('price') as $error)
                    <span style="color: red;">{{$error}}</span>
                @endforeach
            @endif
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>MaxPrice: <span class="text-danger">*</span></label>
                <input type="number" name="maxPrice" placeholder="Enter Max Price" class="form-control required" value="{{ old('maxPrice') }}" pattern="[0-9]" min="0">
                @foreach($errors->get('maxPrice') as $error)
                    <span style="color: red;">{{$error}}</span>
                @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Description :</label>
                <textarea name="description" class="form-control" data-placeholder="Enter Product Details"></textarea>
            </div>
        </div>
    </div>

    <div class="addmore">
        <div id="product0">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Color: <span class="text-danger">*</span></label>
                        <select name="colors[]" class="form-control color" required>
                            <option value="">Choose a Color...</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}"
                                        style="background-color: {{ $color->code }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Size: <span class="text-danger">*</span></label>
                        <select name="sizes[]" class="form-control">
                            <option value="">Choose a Size...</option>
                            @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Price: <span class="text-danger">*</span></label>
                        <input type="number" name="prices[]" placeholder="Enter Product Price"
                               class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Quantity: <span class="text-danger">*</span></label>
                        <input type="number" name="quantities[]" placeholder="Enter Quantity"
                               class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="button" id="add" class="btn bg-teal" name="add" value="ADD MORE">
                </div>
            </div>
        </div>
    </div>
</fieldset>