<nav class="nav">
    <a class="logo" href="/">Blog</a>

    <div class="link-group">
        <a class="link" href="/">Home</a>
        <a class="link" href="/posts">Posts</a>
        <a class="link" href="/categories">Categories</a>
        <a class="link" href="/search">Search</a>
    </div>

    @auth
        <div class="link-group">
            <a class="link" href="/dashboard">Dashboard</a>
            <form method="POST" action="/logout">
                @csrf
                @method("DELETE")
                
                <button class="btn cursor-pointer bg-rose-500 text-white hover:bg-rose-600">Log Out</button>
            </form>
        </div>
    @else
        <div class="link-group">
            <a class="btn hover:border-slate-300" href="/login">Login</a>
            <a class="btn bg-slate-200 hover:bg-slate-300" href="/register">Register</a>
        </div>
    @endauth
</nav>
