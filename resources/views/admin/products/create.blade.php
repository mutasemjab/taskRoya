@extends('layouts.admin')
@section('title')
{{ __('messages.products') }}
@endsection


@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title card_title_center"> {{ __('messages.Add_New') }} {{ __('messages.products') }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="post" enctype='multipart/form-data'>
            <div class="row">
                @csrf
                <div class="form-group col-md-6">
                    <label for="category_id"> {{ __('messages.categories') }}</label>
                    <select class="form-control" name="category" id="category_id">
                        <option value=""> {{ __('messages.Select') }}</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="unit_id"> {{ __('messages.Type') }}</label>
                    <select class="form-control" name="type" id="type_id">
                        <option value="">{{ __('messages.Select') }} </option>
                        @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type')
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
                    <label for="show_time"> {{ __('messages.show_time') }}</label>
                    <input name="show_time" id="show_time" class="form-control" value="{{ old('show_time') }}">
                    @error('show_time')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>


            <div class="form-group col-md-12 text-center">
                <button id="do_add_item_cardd" type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
                <a href="{{ route('products.index') }}" class="btn btn-danger">{{ __('messages.Cancel') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection
