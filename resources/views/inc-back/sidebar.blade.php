<div class="o-page__sidebar js-page-sidebar">
    <aside class="c-sidebar">
        <div class="c-sidebar__brand">
                <span>almokhtar bekkour</span>
        </div>

        <!-- Scrollable -->
        <div class="c-sidebar__body">
            <ul class="c-sidebar__list">
                <li class="c-sidebar__item has-submenu">
                    <a class="c-sidebar__link collapsed" data-toggle="collapse" href="#sidebar-submenu" aria-expanded="false" aria-controls="sidebar-submenu">
                        <span uk-icon="icon:  file-edit"></span> &nbsp;Post
                    </a>
                    <div>
                        <ul class="c-sidebar__list collapse" id="sidebar-submenu" style="">
                            <li><a class="c-sidebar__link" href="{{ route('post.create') }}"> <span uk-icon="icon: pencil"></span> &nbsp; New Post</a></li>
                            <li><a class="c-sidebar__link" href="#"><span uk-icon="icon: list"></span> &nbsp;  All Posts</a></li>
                        </ul>
                    </div>

                </li>
            </ul>

        </div>


        <a class="c-sidebar__footer" href="#">
            Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
        </a>
    </aside>
</div>
