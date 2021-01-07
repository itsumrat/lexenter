@extends("layouts.app")

@section("title", "Lexenter")

@section("content")

    @include("partials.sidebar")
    @include("partials.header")
    <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    	<div class="page-title">
                    		<h1>articles</h1>
                    	</div>
                    	<div class="main-content article-list">
                            <a href="{{route('article.create')}}" class="new-article-btn"><span class="material-icons">post_add</span>Create Article</a>
                            
                            <div class="file-upload">
                                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div> 
                                        <input type="file" name="file" id="chooseFile">
                                    </div>
                                    <button type="submit" class="btn import-btn"><span class="material-icons">publish</span> Import Article</button>
                                </form>
                            </div>
                            <table id="article-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Article ID</th>
                                        <th>Title</th>
                                        <th>Source</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $article)
                                    <tr>
                                        <td><a href="{{route('viewArticle', $article->id) }}">{{ $article->article_code }}
                                        </a>
                                        </td>
                                        <td>{{ $article->title_en }} <br> {{ $article->title_cn }}</td>
                                        <td>{{ $article->source_cn }} <br> {{ $article->source_en }}</td>
                                        <td>
                                        {!! Form::open(['method' => 'DELETE','route' => ['article.destroy', $article->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
                                        <button class="admin-actionbtn delete-btn" type="submit">
                                            <i class="material-icons">close</i>
                                        </button>
                                        {!! Form::close() !!}
                                        <a class="admin-actionbtn" href="{{ route('article.edit',$article->id) }}">
                                    <span class="material-icons">create</span>
                                        </a> 
                                        <a class="admin-actionbtn favourite {{ $article->isBookmarked($article->id)>0?'booked':''}}" data-id="{{$article->id}}" >
                                        <span class="material-icons">star_rate</span>                                       
                                         </a> 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    	</div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
@endsection

@section('script')
 <script type="text/javascript">
    $(document).ready(function () {
            $('.favourite').on('click',function(e){
             $(this).addClass("booked");
            // $(this).hide();
            var article_id = $(this).data("id");

            $.ajax({
                    type: 'POST',
                    url: "{{url('bookmark/save')}}",
                    data: {
                        "article_id": article_id,
                        "_token": "{{ csrf_token() }}",
                        },
                    success: function (response) {
                        console.log(response);

                    }
                });
        });
        // var table = $('#article-list').DataTable({
/*        $('#article-list').DataTable({
        // processing: true,
        // serverSide: true,
        // responsive: true,
        // ajax: "",     
        // columns: [
        //             {data: 'idtitle', name: 'Article ID & Title'},
        //             {data: 'title_cn', name: 'Chinese'},
        //             {data: 'title_en', name: 'English'},
        //             {data: 'source', name: 'Source'},
        //             {data: 'action', name: 'action', orderable: false, searchable: false}
        //             // {data: 'subdepartment', name: 'subdepartment', orderable: false, searchable: false}
        //         ]
        });*/
    });
</script> 

@endsection