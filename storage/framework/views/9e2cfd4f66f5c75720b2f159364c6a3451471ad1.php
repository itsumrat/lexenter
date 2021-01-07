<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="<?php echo e(route('context.index')); ?>">Lexenter</a>
            <div id="close-sidebar">
                <i class="material-icons">close</i>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo e(route('context.index')); ?>">
                        <i class="material-icons md-24">apps</i>
                        <span>Context List</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('context.create')); ?>">
                        <i class="material-icons md-24">apps</i>
                        <span>Add New Context</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('article.index')); ?>">
                        <i class="material-icons md-24">apps</i>
                        <span>Articles</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('term.index')); ?>">
                        <i class="material-icons md-24">apps</i>
                        <span>Terms</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('advancedsearch.index')); ?>">
                        <i class="material-icons md-24">apps</i>
                        <span>Advanced Search</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('search.history')); ?>">
                        <i class="material-icons md-24">apps</i>
                        <span>Search History</span>
                    </a>
                </li>
                <!--<li>-->
                <!--    <a href="<?php echo e(route('contextsearch.index')); ?>">-->
                <!--        <i class="material-icons md-24">apps</i>-->
                <!--        <span>Search Context</span>-->
                <!--    </a>-->
                <!--</li>-->
                <!--<li>-->
                <!--    <a href="<?php echo e(route('termsearch.index')); ?>">-->
                <!--        <i class="material-icons md-24">apps</i>-->
                <!--        <span>Search Term</span>-->
                <!--    </a>-->
                <!--</li>-->

                <?php if(\Auth::user()->role_id == 1): ?>
                    <li>
                    <a href="<?php echo e(route('user.index')); ?>">
                        <i class="material-icons md-24">apps</i>
                        <span>Users</span>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
</nav>
<!-- sidebar-wrapper  --><?php /**PATH /opt/lampp/htdocs/longi/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>