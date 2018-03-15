@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Requested Books</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Date Borrowed</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->bookRequests as $users)
                            <tr>
                                <td><img src="{{asset('storage/images/'.$users->book->image)}}" class='img-thumbnail'></td>
                                <td>{{$users->book->title}}</td>
                                <td>{{$users->created_at}}</td>
                                <td>{{$users->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Borrowed Books</div>
    
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Date Borrowed</th>
                                <th scope="col">Due Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->bookAccepts as $accepts)
                                <tr>
                                   <td><img src="{{asset('storage/images/'.$accepts->book->image)}}" class='img-thumbnail'></td>
                                   <td>{{$accepts->book->title}}</td>
                                   <td>{{$accepts->created_at}}</td>
                                   @if($accepts->due_date==$dayBefore)
                                    <td><p class="text-danger">{{$accepts->due_date}}</p></td>
                                   @else
                                    <td><p class="text-success">{{$accepts->due_date}}</p></td>
                                   @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
