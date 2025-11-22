<!-- @extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Menu</h1>

    <div class="menu-list">
        {{-- Loop data menu --}}
        @foreach ($menus as $menu)
            <div class="menu-item">
                <h3>{{ $menu->nama }}</h3>
                <p>{{ $menu->deskripsi }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection -->
