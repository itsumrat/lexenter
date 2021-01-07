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
                            <a href="{{route('article.create')}}" class="new-article-btn"><span class="material-icons">post_add</span>Create New Article</a>
                    		<table id="article-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Article ID & Title</th>
                                        <th>Chinese</th>
                                        <th>English</th>
                                        <th>Source</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                    	</div>
                    </div>
                </div>
            </div>
        </main>
      <!-- page-content" -->
      
@endsection

@section('scripts')
 <script type="text/javascript">
    $(document).ready(function () {
        var table = $('#article-list').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('article.index') }}",     
        columns: [
                    {data: 'idtitle', name: 'Article ID & Title'},
                    {data: 'title_cn', name: 'Chinese'},
                    {data: 'title_en', name: 'English'},
                    {data: 'source', name: 'Source'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                    // {data: 'subdepartment', name: 'subdepartment', orderable: false, searchable: false}
                ]
        });
    });
</script> 

@endsection