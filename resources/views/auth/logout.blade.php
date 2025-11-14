<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="dropdown-item text-danger">
        <i class="fas fa-sign-out-alt me-2"></i>
        Logout
    </button>
</form>
