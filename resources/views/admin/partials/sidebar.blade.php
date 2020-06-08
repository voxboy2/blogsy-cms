<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        

        @if(auth()->user()->isAdmin())
        <li>
          <a class="app-menu__item {{ Route::currentRouteName() == 'users.index' ? 'active' : ''}}" href="{{ route('users.index') }}"
            ><i class="app-menu__icon fa fa-trash" aria-hidden="true"></i>
            <span class="app-menu__label">users</span></a
          >
        </li>

        <li>
          <a class="app-menu__item {{ Route::currentRouteName() == 'settings' ? 'active' : ''}}" href="{{ route('settings') }}"
            ><i class="app-menu__icon fa fa-cogs"></i
            ><span class="app-menu__label">Setttings</span></a
          >
        </li>
        @endif


        <li>
          <a class="app-menu__item {{ Route::currentRouteName() == 'categories.index' ? 'active' : ''}}" href="{{ route('categories.index') }}"
            ><i class="app-menu__icon fa fa-tags"></i
            ><span class="app-menu__label">Categories</span></a
          >
        </li>

        <li>
          <a class="app-menu__item {{ Route::currentRouteName() == 'posts.index' ? 'active' : ''}}" href="{{ route('posts.index') }}"
            ><i class="app-menu__icon fa fa-th"></i
            ><span class="app-menu__label">Posts</span></a
          >
        </li>

        <li>
          <a class="app-menu__item {{ Route::currentRouteName() == 'tags.index' ? 'active' : ''}}" href="{{ route('tags.index') }}"
            ><i class="app-menu__icon fa fa-briefcase"></i
            ><span class="app-menu__label">Tags</span></a
          >
        </li>

        <li>
          <a class="app-menu__item {{ Route::currentRouteName() == 'user.profile' ? 'active' : ''}}" href="{{ route('user.profile') }}"
            ><i class="app-menu__icon fa fa-product-hunt" aria-hidden="true"></i></i
            ><span class="app-menu__label">Profile</span></a
          >
        </li>



        <hr>
    
        <li>
          <a class="app-menu__item {{ Route::currentRouteName() == 'trashed-posts.index' ? 'active' : ''}}" href="{{ route('trashed-posts.index') }}"
            ><i class="app-menu__icon fa fa-trash" aria-hidden="true"></i>
            <span class="app-menu__label">Deleted Posts</span></a
          >
        </li>



      </ul>
    </aside>