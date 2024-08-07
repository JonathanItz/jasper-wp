<header class="banner">
    {{-- <div class="text-center pt-8 pb-2">
        <a href="{{ home_url('/') }}" class="inline-block">
            <img class="h-24 w-full" src="{{$headerImage['url']}}" alt="{{$headerImage['alt']}}">
        </a>
    </div> --}}

    @php
        // $navArgs = [
        //     'theme_location' => 'primary_navigation',
        //     'walker' => new Tailwind_Alpine_Walker(), // Use the custom walker here
        //     'echo' => false
        // ]
        $navArgs = [
            'theme_location'  => 'primary_navigation',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_class' => 'primary-navigation',
            'container_id'    => 'primary-navigation',
            'menu_class'      => 'flex gap-4',
            'walker'          => new DesktopNavWalker(),
        ];
    @endphp

    @if (has_nav_menu('primary_navigation'))
        <nav class="absolute text-white w-full z-10 left-0 @if(is_user_logged_in()) top-12 @else top-4 @endif" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            <div class="px-6 font-thin text-sm">
                {!! wp_nav_menu($navArgs) !!}
            </div>
        </nav>
    @endif
</header>
