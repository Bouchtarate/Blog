@php
use App\Models\Categories;
    $categories = Categories::all()
@endphp
<footer class="bg-dark bg-opacity-90 text-light">
  <div class="container mt-5">
    <div class="row row-cols-1 text-center row-cols-sm-3">
      <div class="col mt-5">
        <h3 class="mb-3">
          Categories
        </h3>
        <ul class="navbar-nav">
          @foreach ($categories as $category)
          <li><a
            href="/categories/{{$category->slug}}"
            class="text-light text-opacity-50 fw-bold nav-link ">{{$category->title}}
          </a></li>
            @endforeach
        </ul>
      </div>
      <div class="col mt-5">
      <h3 class="mb-3">
        Hot's
      </h3>
      <ul class="navbar-nav">
        <li><a
            href="/blog"
          class="text-light text-opacity-50 fw-bold nav-link">Most comments</a></li>
        <li><a
            href="/blog"
          class="text-light text-opacity-50 fw-bold nav-link">Most comments</a></li>
        <li><a
            href="/blog"
          class="text-light text-opacity-50 fw-bold nav-link">Most comments</a></li>
        <li><a
            href="/blog"
          class="text-light text-opacity-50 fw-bold nav-link">Most comments</a></li>
      </ul>
      </div>
      <div class="col mt-5">
        <h3 class="mb-3">
          About us
        </h3>
        <ul class="navbar-nav">
          <li><a
            href="/contact_us"
            class="text-light text-opacity-50 fw-bold nav-link">Facebook</a></li>
          <li><a href="/contact_us"
            class="text-light text-opacity-50 fw-bold nav-link">Youtube</a></li>
          <li><a href="/contact_us"
            class="text-light text-opacity-50 fw-bold nav-link">Instagram</a></li>
          <li><a href="/contact_us"
            class="text-light text-opacity-50 fw-bold nav-link">Twitter</a></li>
        </ul>
      </div>
    </div>
  </div>
  <h4 class="text-center p-4 fw-bold text-primary mb-0">
    Copyright  2023 Hamza Bouchtarate. All Rights Reserved
  </h4>
</footer>
