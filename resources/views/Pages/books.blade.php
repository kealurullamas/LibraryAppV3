@extends('Layouts.app')

@section('content')
    @if(count($books)>0)
        {{--  <div class="container">
            <h1><strong>Books</strong></h1>
        </div>
        @foreach($books as $book)
            <div class="container">
                <a href="{{route('books.show',$book->id)}}"><img style="width: 25%;" src="{{asset('images/'.$book->image)}}"></a>
                <h5><a href="{{route('books.show',$book->id)}}">{{$book->title}}</a></h3>
                <h6>{{$book->author}}</h6>
            </div>
        @endforeach
        {{$books->links()}}  --}}
        <div class="layout">
			<section class="inner">
				<ul class="grid">
                    @foreach($books as $book)
					<li class="grid-tile">
						<div class="item">
                            <div class="item-img">
                                    <img style="width:95% !important; height:500px;
                                    margin: 10px;"src="{{asset('images/'.$book->image)}}">
                            </div>
							<div class="item-pnl">
								<div class="pnl-wrapper">
									<div class="pnl-description">
                                        <span class="pnl-label"><a href="{{route('books.show',$book->id)}}">{{$book->title}}</a></span>
                                        <h5>{{$book->author}}</h5>
									</div>
									
								</div>
							</div>
						</div>
					</li>
                    @endforeach
                    {{$books->appends(\Request::except('page'))->links()}}
				</ul>
            </section>
            
		</div>
    @endif
@endsection