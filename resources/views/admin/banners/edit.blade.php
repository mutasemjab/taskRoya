@extends('layouts.admin')
@section('title')
    {{ __('messages.Edit') }} {{ __('messages.banners') }}
@endsection



@section('contentheaderlink')
    <a href="{{ route('banners.index') }}"> {{ __('messages.banners') }} </a>
@endsection

@section('contentheaderactive')
    {{ __('messages.Edit') }}
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center"> {{ __('messages.Edit') }} {{ __('messages.banners') }} </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <form action="{{ route('banners.update', $data['id']) }}" method="post" enctype='multipart/form-data'>
                <depisodesiv class="row">
                    @csrf
                    @method('PUT')

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
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rating">{{ __('messages.Rating') }}</label>
                            <input type="text" name="rating" id="rating" class="form-control"
                                value="{{ old('rating', $data['rating']) }}">
                            @error('rating')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">{{ __('messages.Type') }}</label>
                            <select class="form-control" name="type" id="type">
                                <option value=""> {{ __('messages.Select') }}</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}" @if($data->type_id == $type->id) selected @endif>{{
                                    $type->name }}</option>
                                @endforeach
                            </select>
                            @error('type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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
                        <div class="form-group text-center">
                            <button id="do_add_item_cardd" type="submit" class="btn btn-primary btn-sm">
                                {{ __('messages.Update') }}</button>
                            <a href="{{ route('banners.index') }}"
                                class="btn btn-sm btn-danger">{{ __('messages.Cancel') }}</a>

                        </div>
                    </div>

                </div>
            </form>



        </div>




    </div>
    </div>
@endsection

@section('script')
    <script>
        function previewImage() {
            var preview = document.getElementById('image-preview');
            var input = document.getElementById('Item_img');
            var file = input.files[0];
            if (file) {
                preview.style.display = "block";
                var reader = new FileReader();
                reader.onload = function() {
                    preview.src = reader.result;
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = "none";
            }
        }
    </script>
@endsection
