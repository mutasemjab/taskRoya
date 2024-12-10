@extends('layouts.admin')
@section('title')

{{ __('messages.Edit') }} {{ __('messages.products') }}
@endsection



@section('contentheaderlink')
<a href="{{ route('products.index') }}"> {{ __('messages.products') }} </a>
@endsection

@section('contentheaderactive')
{{ __('messages.Edit') }}
@endsection




@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title card_title_center"> {{ __('messages.Edit') }} {{ __('messages.products') }} </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">


        <form action="{{ route('products.update',$data['id']) }}" method="post" enctype='multipart/form-data'>
            <div class="row">
                @csrf
                @method('PUT')


                <div class="form-group col-md-6">
                    <label for="category">{{ __('messages.categories') }}</label>
                    <select class="form-control" name="category" id="category">
                        <option value=""> {{ __('messages.Select') }}</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $data->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="type_id">{{ __('messages.Type') }}</label>
                    <select class="form-control" name="type" id="type_id">
                        <option value="">{{ __('messages.Select') }}</option>
                        @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == $data->type_id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label> {{ __('messages.Name') }}</label>
                        <input name="name" id="name" class="form-control"
                            value="{{ old('name', $data->name) }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label> {{ __('messages.description') }}</label>
                        <textarea name="description" id="description" class="form-control"
                            value="{{ old('description') }}" rows="8">{{$data->description}}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label> {{ __('messages.show_time') }}</label>
                        <input name="show_time" id="show_time" class="form-control"
                            value="{{ old('show_time', $data->show_time) }}">
                        @error('show_time')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
               


                <div class="col-md-12">
                    <div class="form-group text-center">
                        <button id="do_add_item_cardd" type="submit" class="btn btn-primary btn-sm"> update</button>
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-danger">cancel</a>

                    </div>
                </div>
            </div>

        </form>



    </div>


</div>

@endsection
