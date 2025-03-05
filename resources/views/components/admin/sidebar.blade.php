<aside class="w-64 bg-slate-900 text-white p-4">
    <h2 class="text-lg font-semibold mb-4">Blog Panel</h2>
    <ul>
        <li class="mb-2"><a href="/dashboard" class="block px-4 py-2 {{ Request::is('dashboard') ? "bg-cyan-700" : "hover:bg-slate-700"}}">Dashboard</a></li>
        <li class="mb-2"><a href="/dashboard/posts" class="block px-4 py-2 {{ Request::is('dashboard/posts') ? "bg-cyan-700" : "hover:bg-slate-700"}}">My Posts</a></li>
        <li class="mb-2"><a href="/dashboard/create" class="block px-4 py-2 {{ Request::is('dashboard/create') ? "bg-cyan-700" : "hover:bg-slate-700"}}">Create Post</a></li>
        <li class="mb-2"><a href="/dashboard/comments" class="block px-4 py-2 {{ Request::is('dashboard/comments') ? "bg-cyan-700" : "hover:bg-slate-700"}}">Comments</a></li>
        <li class="mb-2"><a href="/dashboard/settings" class="block px-4 py-2 {{ Request::is('dashboard/settings') ? "bg-cyan-700" : "hover:bg-slate-700"}}">Settings</a></li>
    </ul>
</aside>
