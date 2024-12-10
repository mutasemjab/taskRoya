@extends('layouts.admin')
@section('title')
    {{ __('messages.episodes') }}
@endsection


@section('contentheaderactive')
    {{ __('messages.show') }}
@endsection



@section('content')



    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center"> {{ __('messages.episodes') }}
            </h3>
            <input type="hidden" id="token_search" value="{{ csrf_token() }}">

            <a href="{{ route('episodes.create') }}" class="btn btn-sm btn-success"> {{ __('messages.New') }}
                {{ __('messages.episodes') }}
            </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">

                    {{-- <input type="radio" name="searchbyradio" id="searchbyradio" value="name"> name --}}

                    {{-- <input autofocus style="margin-top: 6px !important;" type="text" id="search_by_text"
                    placeholder=" name" class="form-control"> <br> --}}

                </div>

            </div>
            <div class="clearfix"></div>

            <div id="ajax_responce_serarchDiv" class="col-md-12">

                @if (isset($data) && !$data->isEmpty())
                    @can('episode-table')
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="custom_thead">
                                <th>{{ __('messages.Name') }}</th>
                                <th>{{ __('messages.description') }}</th>
                                <th>{{ __('messages.duration') }}</th>
                                <th>{{ __('messages.show_time') }}</th>
                                <th>{{ __('messages.Product') }}</th>
                                <th>{{ __('messages.photo') }}</th>
                                <th>{{ __('messages.video') }}</th>
                                <th>{{ __('messages.Action') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr>


                                        <td>{{ $info->name }}</td>
                                        <td>{{ $info->description }}</td>
                                        <td>{{ $info->duration }}</td>
                                        <td>{{ $info->show_time }}</td>

                                        <td>
                                            @if ($info->product)
                                                <a
                                                    href="{{ route('products.index', ['id' => $info->product->id]) }}">{{ $info->product->name }}</a>
                                            @else
                                                No product
                                            @endif
                                        </td>
                                      
                                        <td>
                                            <div class="image">
                                                <img class="custom_img"
                                                    src="{{ asset('assets/admin/uploads') . '/' . $info->photo }}">
    
                                            </div>
                                        </td>
                                        <td>
                                            <div class="image">
                                                <img class="custom_img"
                                                    src="{{ asset('assets/admin/uploads') . '/' . $info->video }}">
    
                                            </div>
                                        </td>

                                        <td>
                                            @can('episode-edit')
                                                <a href="{{ route('episodes.edit', $info->id) }}"
                                                    class="btn btn-sm btn-primary">{{ __('messages.Edit') }}</a>
                                            @endcan
                                            @can('episode-delete')
                                                <form action="{{ route('episodes.destroy', $info->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger">{{ __('messages.Delete') }}</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endcan
                    <br>
                    {{ $data->links() }}
                @else
                    <div class="alert alert-danger">
                        {{ __('messages.No_data') }} </div>
            </div>
            @endif

        </div>



    </div>

    </div>

    </div>

@endsection
