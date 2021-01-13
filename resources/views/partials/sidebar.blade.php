<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="{{route('context.index')}}">Lexenter</a>
            <div id="close-sidebar">
                <i class="material-icons">close</i>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('context.index')}}">
                        <i class="material-icons md-24">apps</i>
                        <span>Context List</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('context.create')}}">
                        <i class="material-icons md-24">apps</i>
                        <span>Add New Context</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('article.index')}}">
                        <i class="material-icons md-24">apps</i>
                        <span>Articles</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('term.index')}}">
                        <i class="material-icons md-24">apps</i>
                        <span>Terms</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('advancedsearch.index')}}">
                        <i class="material-icons md-24">apps</i>
                        <span>Advanced Search</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('search.history')}}">
                        <i class="material-icons md-24">apps</i>
                        <span>Search History</span>
                    </a>
                </li>
                <!--<li>-->
                <!--    <a href="{{route('contextsearch.index')}}">-->
                <!--        <i class="material-icons md-24">apps</i>-->
                <!--        <span>Search Context</span>-->
                <!--    </a>-->
                <!--</li>-->
                <!--<li>-->
                <!--    <a href="{{route('termsearch.index')}}">-->
                <!--        <i class="material-icons md-24">apps</i>-->
                <!--        <span>Search Term</span>-->
                <!--    </a>-->
                <!--</li>-->

                @if(\Auth::user()->role_id == 1)
                    <li>
                    <a href="{{route('user.index')}}">
                        <i class="material-icons md-24">apps</i>
                        <span>Users</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
</nav>
<!-- sidebar-wrapper  -->