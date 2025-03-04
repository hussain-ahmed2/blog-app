<nav class="nav">
    <a class="logo" href="/">Blog</a>

    <div class="link-group">
        <a class="link {{ Request::is('/') ? "text-cyan-500" : ""}}" href="/">Home</a>
        <a class="link {{ Request::is('posts') ? "text-cyan-500" : ""}}" href="/posts">Posts</a>
        <a class="link {{ Request::is('categories') ? "text-cyan-500" : ""}}" href="/categories">Categories</a>
        <a class="link {{ Request::is('search') ? "text-cyan-500" : ""}}" href="/search">Search</a>
    </div>

    @auth
        <div class="link-group">
            <a class="link {{ Request::is('posts/create') ? "text-cyan-500" : ""}}" href="/posts/create">Create</a>
            <a class="link {{ Request::is('dashboard') ? "text-cyan-500" : ""}}" href="/dashboard">Dashboard</a>
            <form method="POST" action="/logout">
                @csrf
                @method("DELETE")
                
                <button class="btn cursor-pointer bg-rose-500 text-white hover:bg-rose-600">Log Out</button>
            </form>
        </div>
    @else
        <div class="link-group">
            <a class="btn hover:border-slate-300 {{ Request::is('login') ? "text-cyan-500" : ""}}" href="/login">Login</a>
            <a class="btn {{ Request::is('register') ? "bg-cyan-500 text-white" : "bg-slate-200 hover:bg-slate-300"}}" href="/register">Register</a>
        </div>
    @endauth
</nav>
