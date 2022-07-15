<script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="{{ url('/storage/js/jquery-3.6.0.js') }}"></script>
<script src="{{ url('/storage/js/carouselConfig.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="{{ url('/storage/js/main.js') }}"></script>
@if (Request::is('admin/create-category'))
    <script src="{{ url('/storage/js/category-form.js') }}"></script>
@endif
@if (Request::is('admin/gamelist-data/create'))
    <script src="{{ url('storage/js/gamelist-form.js') }}"></script>
@endif
@if (Request::is('admin/payment-gateway'))
    <script src="{{ url('/storage/js/admin-form.js') }}"></script>
@endif
@if (Request::is('admin/galleries'))
    <script src="{{ url('/storage/js/galleries.js') }}"></script>
@endif
@if (Request::route()->getName() == 'profile')
    <script src="{{ url('/storage/js/profile.js') }}"></script>
@endif
