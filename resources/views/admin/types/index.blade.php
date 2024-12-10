@extends('layouts.admin')
@section('title')
    {{ __('messages.types') }}
@endsection



@section('content')



    <div class="card">
        <div class="card-header">
            <h3 class="card-title card_title_center"> {{ __('messages.types') }} </h3>

            <a href="{{ route('types.create') }}" class="btn btn-sm btn-success"> {{ __('messages.New') }}
                {{ __('messages.types') }}</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">


                </div>

            </div>
            <div class="clearfix"></div>

            <div id="ajax_responce_serarchDiv" class="col-md-12">
                @can('type-table')
                @if (@isset($data) && !@empty($data) && count($data) > 0)
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="custom_thead">


                            <th>{{ __('messages.Name') }}</th>
                           

                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($data as $info)
                                <tr>

                                    <td>{{ $info->name }}</td>
                                  
                                    <td>
                                        @can('type-delete')
                                        <a href="{{ route('types.edit', $info->id) }}"
                                            class="btn btn-sm  btn-primary">{{ __('messages.Edit') }}</a>
                                        @endcan
                                            @can('type-delete')
                                            <form action="{{ route('types.destroy', $info->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">{{ __('messages.Delete') }}</button>
                                            </form>
                                        @endcan

                                    </td>


                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                    <br>
                    {{ $data->links() }}
                @else
                    <div class="alert alert-danger">
                        {{ __('messages.No_data') }} </div>
                @endif
                @endcan

            </div>



        </div>

    </div>

    </div>

@endsection


