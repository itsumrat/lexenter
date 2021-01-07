@extends("layouts.app")

@section("title", "Lexenter")

@section("content")

    @include("partials.sidebar")
    @include("partials.header")

    <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title">
                            <h1>Term Search List</h1>
                        </div>
                        <div class="main-content article-list">
                            <table id="article-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Search By</th>
                                        <th>Search Text</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($termSearch as $key => $search)
                                    <tr>
                                        <td>
                                        {{ $search->userTerm ? $search->userTerm->name : 'No Found' }}
                                        </td>
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
                    <div class="col-6">
                        <div class="page-title">
                            <h1>Context Search List</h1>
                        </div>
                        <div class="main-content article-list">
                            <table id="search-list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Search By</th>
                                        <th>Search Text</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contextSearch as $key => $search)
                                    <tr>
                                        <td>
                                        {{ $search->userContext ? $search->userContext->name : 'No Found' }}
                                        </td>
                                        <td>
                                        {!!  $search->search_end_con !!}
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