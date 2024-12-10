@extends('layouts.admin')
@section('title')
{{ __('messages.Edit') }} {{ __('messages.categories') }}
@endsection



@section('contentheaderlink')
<a href="{{ route('categories.index') }}"> {{ __('messages.categories') }} </a>
@endsection

@section('contentheaderactive')
{{ __('messages.Edit') }}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title text-center">{{ __('messages.Edit') }} {{ __('messages.categories') }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $data['id']) }}" method="post" enctype='multipart/form-data'>
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ __('messages.Name') }}</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $data['name']) }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
               
                <div class="col-md-12 text-center">
                    <div class="form-group">
                        <button id="do_add_item_cardd" type="submit" class="btn btn-primary btn-sm">{{
                            __('messages.Update') }}</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-danger btn-sm">{{ __('messages.Cancel')
                            }}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
