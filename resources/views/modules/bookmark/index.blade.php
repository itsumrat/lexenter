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
                    		<h1>Bookmarks</h1>
                    	</div>
                    	<div class="main-content">
                        <div class="card">
                            <!-- <h5 class="card-header">Latest 10</h5> -->
                            <div class="card-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-articles-tab" data-toggle="pill" href="#pills-articles" role="tab" aria-controls="pills-articles" aria-selected="false">Articles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contexts-tab" data-toggle="pill" href="#pills-contexts" role="tab" aria-controls="pills-purchase" aria-selected="false">Contexts</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-articles" role="tabpanel" aria-labelledby="pills-articles-tab">
                                <table id="bookmarkedarticle-list" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Article ID</th>
                                            <th>Title</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookmarks as $bookmark)
                                        <tr>
                                            <td><a href="{{route('viewArticle', $bookmark->id) }}">{{$bookmark->article_code}}
                                            </a>
                                            </td>
                                            <td>{{ $bookmark->title_en }}</td>
                                        <td> 
                                        {!! Form::open(['method' => 'POST','route' => ['deleteArtBookmark', $bookmark->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
                                                <button class="admin-actionbtn delete-btn" type="submit">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            {!! Form::close() !!}
                                            </td>
                                        


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pills-contexts" role="tabpanel" aria-labelledby="pills-contexts-tab">
                                <table id="bookmarkedContext-list" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>English</th>
                                            <th>Chinese</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($conBookmarks as $cbookmark)
                                        <tr>
                                            <td><a href="{{route('viewmore', $cbookmark->id) }}">{{preg_replace('/<[^>]*>/', '', $cbookmark->eparagraph)}}
                                            </a>
                                            </td>
                                            <td>{{ preg_replace('/<[^>]*>/', '', $cbookmark->cparagraph) }}</td>
                                        <td> 
                                        {!! Form::open(['method' => 'POST','route' => ['deleteConBookmark', $cbookmark->id],'style'=>'display:inline', 'class'=>'delete_form']) !!}
                                                <button class="admin-actionbtn delete-btn" type="submit">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            {!! Form::close() !!}
                                            </td>
                                        


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    	</div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->


@endsection

@section('script')
<script>
    $(document).ready(function() {

        $('.nav-pills').find('li > a:first').click();


        var table = $('#bookmarkedarticle-list').DataTable({
          
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "",     
        columns: [
                    {data: 'eparagraph', name: 'English'},
                    {data: 'cparagraph', name: 'Chinese'},
                     ]
    
    });
    
    var table2 = $('#bookmarkedContext-list').DataTable({
          
          processing: true,
          serverSide: true,
          responsive: true,
          ajax: "",     
          columns: [
                      {data: 'article_code', name: 'Article ID & Title'},
                      {data: 'etitle', name: 'English'},
                       ]
      
      });  
    
    
    
    
    
    
    
        });
</script>
@endsection