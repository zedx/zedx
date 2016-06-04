<div class="inner-box">
    <nav class="navbar navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metis-menu" id="user-menu">
            {!! renderMenu('user', [
                "parent" => [
                    'li' => [
                        'withoutChildren' => 'class="{active}"',
                        'withChildren' => '',
                    ],
                    'link' => [
                        'withoutChildren' => '',
                        'withChildren' => '',
                    ],
                    'ul' => 'class="nav nav-second-level"',
                ],
                "children" => [
                    'li' => [
                        'withoutChildren' => '',
                        'withChildren' => '',
                    ],
                    'link' => [
                        'withoutChildren' => '',
                        'withChildren' => '',
                    ],
                    'ul' => 'class="nav nav-third-level"',
                ],
            ]) !!}
            </ul>
        </div>
    </nav>
</div>
