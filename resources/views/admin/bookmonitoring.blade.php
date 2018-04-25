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
                        Book Monitoring
                        <br><br>
                        {!!Form::open(['action'=>'BookMonitoringController@search','method'=>'POST'])!!}
                        {{Form::text('user','',['placeholder'=>"Enter Borrower's Name",'class'=>'form-control tb-same-line'])}}
                        {{Form::submit('Search',['class'=>'btn btn-primary btn-same-line'])}}
                        {!!Form::close()!!}
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Borrowed By</th>
                                <th scope="col">Due Date</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(!empty($books))
                                    @foreach($books as $book)
                       
                                            <tr>
                                                <td><img src="{{asset('storage/images/'.$book->book->image)}}" class='img-thumbnail'></td>
                                                <td>{{$book->book->title}}</td>
                                                <td><a href="{{route('admin.show',$book->user->id)}}">{{$book->user->name}}</a></td>
                                                @if($today==$book->due_date)
                                                    <td><p class="text-danger">{{$book->due_date}}</p></td>
                                                @else
                                                    <td><p class="text-success">{{$book->due_date}}</p></td>
                                                @endif
                                                <td><a href="{{route('return',$book->id)}}" class="btn btn-success">Returned</a></td>
                                                <td><a href="{{route('notify',$book->id)}}" class="btn btn-primary">Notify Due Date</a></td>
                                                <!--<td><a href="" class="btn btn-success">Accept</td>-->
                                                <td>
                                                    {{--  {!!Form::open(['action'=>'BookAcceptsController@store','method'=>'POST'])!!}
                                                        {{Form::hidden('id',$bookreq->id)}}
                                                        {{Form::hidden('uid',$bookreq->user->id)}}
                                                        {{Form::hidden('bookid',$bookreq->book->id)}}
                                                        {{Form::hidden('status','Received')}}
                                                        {{Form::submit('Received',['class'=>'btn btn-success'])}}
                                                    {!!Form::close()!!}  --}}
                                                </td>
                                                <td>
                                                    {{--  {!!Form::open(['action'=>'BookAcceptsController@store','method'=>'POST'])!!}
                                                        {{Form::hidden('id',$bookreq->id)}}
                                                        {{Form::hidden('status','Cancelled')}}
                                                        {{Form::submit('Cancelled',['class'=>'btn btn-danger'])}}
                                                    {!!Form::close()!!}  --}}
                                                </td>
                                            </tr>
                                      
                                    @endforeach
                                    
                                @else
                                <td><p class="text-success">No results found for: {{$result}}</p></td>
                                @endif

                            </tbody>
                        </table>
                        {{$books->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection