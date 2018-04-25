@extends('Layouts.admin')

@section('content')
<div class="admincontainer">
    <div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Book Log
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Book Title</th>
                            <th scope="col">No. Books Borrowed</th>
                            <th scope="col">No. Books Returned  </th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(!empty($logs))
                                @foreach($logs as $log)
                   
                                        <tr>
                                         <td><img src="{{asset('storage/images/'.$log->book->image)}}" alt="" class='img-thumbnail'></td>
                                         <td>{{$log->book->title}}</td>
                                         <td>{{$log->Receives}}</td>
                                         <td>{{$log->Returns}}</td>
                                        </tr>
                                  
                                @endforeach
                                
                            @else
                            <td><p class="text-success">No results found for: {{$result}}</p></td>
                            @endif

                        </tbody>
                    </table>
                    {{$logs->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection