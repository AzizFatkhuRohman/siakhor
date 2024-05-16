<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body>
    @include('layouts.sidebar')
    <main id="main" class="main">
        @if(session('create'))
        <script>
            Swal.fire({
    title: 'Success',
    text: '{{ session('create') }}',
    icon: 'success',
    showConfirmButton: false
});
        </script>
        @endif
        @if(session('update'))
        <script>
            Swal.fire({
    title: 'Success',
    text: '{{ session('update') }}',
    icon: 'success',
    showConfirmButton: false
});
        </script>
        @endif
        @if(session('delete'))
        <script>
            Swal.fire({
    title: 'Success',
    text: '{{ session('delete') }}',
    icon: 'success',
    showConfirmButton: false
});
        </script>
        @endif
        @yield('main')
    </main><!-- End #main -->
    @include('layouts.footer')
</body>

</html>