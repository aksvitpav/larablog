<ul class="nav nav-pills flex-column">
  <li class="nav-item">
    <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" href="/home">Статистика</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ (request()->is('home/posts')) ? 'active' : '' }}" href="{{ route('posts.index') }}">Посты</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ (request()->is('home/categories')) ? 'active' : '' }}" href="{{ route('categories.index') }}">Категории</a>
  </li>
</ul>