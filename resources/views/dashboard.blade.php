@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Borrowed Books
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Date Borrowed</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->bookRequests as $users)
                            <tr>
                                <td><img src="{{asset('images/'.$users->book->image)}}" class='img-thumbnail'></td>
                                <td>{{$users->book->title}}</td>
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
