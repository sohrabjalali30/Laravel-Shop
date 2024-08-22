<div id="top-bar">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-auto">
                <p class="mb-0 py-2 text-center text-md-start"><strong>Call:</strong> 0123-456-789 | <strong>Email:</strong> info@shop.com</p>
            </div>
            <div class="col-12 col-md-auto">
                <div class="top-links on-click">
                    @if(Route::has('login'))
                        @auth
                            <div style="margin:5px;border-radius: 5px;padding: 5px;text-align: center;background: #13b979;height: 40px;color: white!important;border: grey 1px solid">
                            <form class="logout_view" method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                            </div>
                        @else

                    <ul class="top-links-container">
                        <li class="top-links-item"><a href={{url('/login')}}>Login</a>
                        <li class="top-links-item"><a href={{url('/register')}}>Register</a>
                        </li>
                    </ul>
                        @endauth
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
