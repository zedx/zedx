<header class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a href="{{ url("") }}" id="zedx-home-link"><img src="{{ public_asset('logo.png') }}" id="zedx-logo" class="logo"></a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <nav class="navbar-collapse collapse" id="navbar-main">
      <ul class="nav navbar-nav">
        {!! renderMenu('header', [
            "parent" => [
                'li' => [
                    'withoutChildren' => 'class="{active}"',
                    'withChildren' => '',
                ],
                'link' => [
                    'withoutChildren' => '',
                    'withChildren' => 'role="button" data-toggle="dropdown" data-target="#"',
                ],
                'ul' => 'class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu"',
            ],
            "children" => [
                'li' => [
                    'withoutChildren' => '',
                    'withChildren' => 'class="dropdown-submenu"',
                ],
                'link' => [
                    'withoutChildren' => 'tabindex="-1"',
                    'withChildren' => '',
                ],
                'ul' => 'class="dropdown-menu"',
            ],
        ]) !!}
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
        <li class="@if (Route::is('user.register')) active @endif">
            <a href="{{ route('user.register') }}" >
                <i class="fa fa-user"></i> {{ trans('frontend.user.account.create_account') }}
            </a>
        </li>
        <li class="@if (Route::is('user.login')) active @endif">
            <a href="{{ route('user.login') }}" >
                <i class="fa fa-plus"></i> {{ trans('frontend.user.account.login_in') }}
            </a>
        </li>
        @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if (Auth::user()->avatar != '')
                <img src="{{ image_route('avatar', Auth::user()->avatar) }}" class="img-circle avatar-header-img">
                 @else
                <div class="avatar-circle-sm avatar-header-img">
                  <span class="initials">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                </div>
                @endif
                {{ Auth::user()->name }} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                {!! renderMenu('user-header', [
                    "parent" => [
                        'li' => [
                            'withoutChildren' => 'class="{active}"',
                            'withChildren' => '',
                        ],
                        'link' => [
                            'withoutChildren' => '',
                            'withChildren' => 'role="button" data-toggle="dropdown" data-target="#"',
                        ],
                        'ul' => 'class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu"',
                    ],
                    "children" => [
                        'li' => [
                            'withoutChildren' => '',
                            'withChildren' => 'class="dropdown-submenu"',
                        ],
                        'link' => [
                            'withoutChildren' => 'tabindex="-1"',
                            'withChildren' => '',
                        ],
                        'ul' => 'class="dropdown-menu"',
                    ],
                ]) !!}
            </ul>
        </li>
        @endif
      </ul>
    </nav>
  </div>
</header>
