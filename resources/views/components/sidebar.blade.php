<section class="sidebar d-flex flex-column">
    <h2 class="text-center py-3">Sidebar</h2>
    <nav class="nav flex-column px-3">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
        @if (Auth::user()->role == 'sm')
            {{-- <a href="{{ route('users.create') }}" class="nav-link">Add User</a>
            <a href="{{ route('stockcode.create') }}" class="nav-link">Add User</a> --}}
        @endif
        <a href="#" class="nav-link">About</a>
        <a href="#" class="nav-link">Services</a>
        <a href="#" class="nav-link">Contact</a>
        <a href="/logout" class="nav-link">Logout</a>
    </nav>
</section>
