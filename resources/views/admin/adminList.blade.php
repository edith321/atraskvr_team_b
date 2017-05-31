@extends('admin.adminBase')

@section('adminList')
    <div class="container">
        <h2> {{$listName}}</h2>
        <table class="table table-hover">
            @if(isset($url))
                <a href="{{$url}}" class="btn btn-primary" role="button">
                    Add new</a>
                <hr/>
            @endif
            <thead>
            <tr>

            @foreach($list[0] as $key => $value)
                        <th>{{$key}}</th>
            @endforeach

            </tr>

            </thead>
            <tbody>
            @foreach ($list as $key => $record)
                <tr>
                    @foreach ($record as $key => $value)

                        @if ($key == $ignore)


                        @elseif($key == 'roles_connection_data')

                            @foreach($record['roles_connection_data'] as $role)

                                <td>{{$role['name']}}</td>
                            @endforeach

                        @elseif($key == 'category_translations')
                            @foreach($record['category_translations'] as $translation)

                                <td>{{$translation['name']}}</td>
                            @endforeach

                        @elseif($key == 'translations')

                            @foreach($record['translations'] as $translation)

                                <td>{{$translation['name']}}</td>
                            @endforeach

                        @else
                            <td>
                                {{$value}}
                            </td>
                        @endif


                    @endforeach

                    @if(isset($showDelete))

                        <td><a href="{{route($showDelete, $record['id'])}}"
                               class="btn btn-primary btn-sm">View</a>
                        </td>
                    @endif

                    @if(isset($edit))

                        <td><a href="{{route($edit, $record['id'])}}" class="btn btn-info btn-sm">Edit</a>
                        </td>
                    @endif
                    @if(isset($showDelete))
                            <td><a onclick="deleteItem('{{route($showDelete, $record['id'])}}')"
                                class="btn btn-info btn-sm">Delete</a>
                            </td>
                    @endif

                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
@endsection

@section('scripts')

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteItem(route) {
            $.ajax({
                url: route,
                dataType: 'json',
                type: 'DELETE',
                success: function () {
                    alert('DELETED');
                },
                error: function () {
                    alert('ERROR');
                }
            });
        }

    </script>
@endsection
