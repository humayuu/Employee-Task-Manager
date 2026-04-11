<h1>Dashboard</h1>



<form method="POST" action="{{ route('user.logout') }}">
    @csrf
    <button>Logout</button>
</form>
