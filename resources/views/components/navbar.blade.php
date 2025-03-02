<nav class="nav">
    <a class="logo" href="/">Blog</a>

    <div class="link-group">
        <a class="link" href="/">Home</a>
        <a class="link" href="/blogs">Blogs</a>
        <a class="link" href="/categories">Categories</a>
        <a class="link" href="/search">Search</a>
    </div>

    @auth
        <div class="link-group">
            <a class="link" href="/dashboard">Dashboard</a>
        </div>
    @else
        <div class="link-group">
            <a class="btn hover:border-slate-300" href="/login">Login</a>
            <a class="btn bg-slate-200 hover:bg-slate-300" href="/register">Register</a>
        </div>
    @endauth
</nav>
