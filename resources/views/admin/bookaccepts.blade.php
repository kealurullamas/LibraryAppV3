@extends('Layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Book Accepts
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Requester</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($book_accepts)>0)
                                @foreach($book_accepts as $bookreq)
                   
                                        <tr>
                                            <td><img src="{{asset('storage/images/'.$bookreq->book->image)}}" class='img-thumbnail'></td>
                                            <td>{{$bookreq->book->title}}</td>
                                            <td><a href="{{route('admin.show',$bookreq->user->id)}}">{{$bookreq->user->name}}</a></td>
                                            <td>{{$bookreq->status}}</td>
                                            <!--<td><a href="" class="btn btn-success">Accept</td>-->
                                            <td>
                                                {!!Form::open(['action'=>['BookAcceptsController@update',$bookreq->id],'method'=>'POST'])!!}
                                                    {{Form::hidden('status','Received')}}
                                                    {{Form::submit('Received',['class'=>'btn btn-success'])}}
                                                    {{Form::hidden('_method','PUT')}}
                                                {!!Form::close()!!}
                                            </td>
                                            <td>
                                                {!!Form::open(['action'=>['BookAcceptsController@update',$bookreq->id],'method'=>'POST'])!!}
                                                    {{Form::hidden('status','Cancelled')}}
                                                    {{Form::submit('Cancelled',['class'=>'btn btn-danger'])}}
                                                    {{Form::hidden('_method','PUT')}}
                                                {!!Form::close()!!}
                                            </td>
                                        </tr>
                                  
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{$book_accepts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection