<div class="container mx-auto flex justify-between items-center px-6">
    <h1 class="text-xl font-bold"><a href="{{ route('posts.index') }}">Blogify</a></h1>
    <nav class="flex items-center space-x-4">
        <a href="{{ route('posts.index') }}" class="hover:text-gray-300">Home</a>
        @auth
            <!-- Kullanıcı Oturum Açmışsa -->
            <a href="{{ route('account.index') }}" class="hover:text-gray-300">Hoşgeldin, {{ Auth::user()->name }}</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="hover:text-gray-300">Logout</button>
            </form>
        @else
            <!-- Kullanıcı Oturum Açmamışsa -->
            <a href="{{ route('login') }}" class="hover:text-gray-300">Login</a>
            <a href="{{ route('register') }}" class="hover:text-gray-300">Register</a>
        @endauth
    </nav>
</div>
