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
                            <h1>Term Search List</h1>
                        </div>
                        <div class="main-content article-list">
                            <table id="article-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Search Text</th>
                                        <th>Search Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($termSearch as $key => $search)
                                    <tr>
                                         <td>{{ ++$key }}</td>
                                        <td>
                                        {!!  $search->search_end_ter !!}
                                        </td>
                                        <td>
                                            {{ date('d-M-Y', strtotime($search->created_at)) }}
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