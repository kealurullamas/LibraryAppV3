@extends('layouts.app')

@section('content')
<div class="non-admin-dashboard">
        <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Borrowed Books</div>
        
                        <div class="panel-body responsive-table">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Book Title</th>
                                    <th scope="col">Date Borrowed</th>
                                    <th scope="col">Due Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookaccepts as $accepts)
                                    @if($accepts->status=='Received')
                                        <tr>
                                            
                                        <td><a href="{{route('bookShow',$accepts->book->id)}}">{{$accepts->book->title}}</a></td>
                                        <td>{{$accepts->created_at}}</td>
                                        @if($accepts->due_date==$dayBefore)
                                            <td><p class="text-danger">{{$accepts->due_date}}</p></td>
                                        @else
                                            <td><p class="text-success">{{$accepts->due_date}}</p></td>
                                        @endif
                                        </tr>
                                    @endif
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
                <div class="panel-heading">Requested Books</div>

                <div class="panel-body responsive-table">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Book Title</th>
                            <th scope="col">Date Borrowed</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookrequest as $requests)
                            
                            <tr>
                             
                                <td><a href="{{route('bookShow',$requests->book->id)}}">{{$requests->book->title}}</a></td>
                                <td>{{$requests->created_at}}</td>
                                <td>{{$requests->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$bookrequest->links()}}
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
@endsection
