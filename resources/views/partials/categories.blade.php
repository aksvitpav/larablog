<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('welcome') }}">Все
              категории</a>
          </li>
          @foreach ($categories as $category)
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('category/'.$category->id)) ? 'active' : '' }}"
              href="{{ route('welcome.category', $category->id) }}">{{ $category->name }} <span
                class="badge badge-warning">{{$category->posts->count()}}</span></a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>