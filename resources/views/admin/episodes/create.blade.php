@extends('layouts.admin')
@section('title')
{{ __('messages.episodes') }}
@endsection


@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title card_title_center"> {{ __('messages.Add_New') }} {{ __('messages.episodes') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('episodes.store') }}" method="post" enctype='multipart/form-data'>
            <div class="row">
                @csrf

                <div class="form-group col-md-6">
                    <label for="category_id"> {{ __('messages.products') }}</label>
                    <select class="form-control" name="product" id="product_id">
                        <option value=""> {{ __('messages.Select') }}</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('product')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

               
               
                <div class="form-group col-md-6">
                    <label for="name"> {{ __('messages.Name') }}</label>
                    <input name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-group col-md-6">
                    <label for="description"> {{ __('messages.description') }}</label>
                    <textarea name="description" id="description" class="form-control" rows="8">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="duration"> {{ __('messages.duration') }}</label>
                    <input name="duration" id="duration" class="form-control" value="{{ old('duration') }}">
                    @error('duration')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="show_time"> {{ __('messages.show_time') }}</label>
                    <input name="show_time" id="show_time" class="form-control" value="{{ old('show_time') }}">
                    @error('show_time')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <img src="" id="image-preview" alt="Selected Image" height="50px" width="50px"
                            style="display: none;">
                        <button class="btn"> photo</button>
                        <input type="file" id="Item_img" name="photo" class="form-control"
                            onchange="previewImage()">
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <img src="" id="image-preview" alt="Selected Image" height="50px" width="50px"
                            style="display: none;">
                        <button class="btn"> video</button>
                        <input type="file" id="Item_img" name="video" class="form-control"
                            onchange="previewImage()">
                        @error('video')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>


            <div class="form-group col-md-12 text-center">
                <button id="do_add_item_cardd" type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
                <a href="{{ route('episodes.index') }}" class="btn btn-danger">{{ __('messages.Cancel') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection
