<aside
    class="{{$configData['sidenavMain']}} @if(!empty($configData['activeMenuType'])) {{$configData['activeMenuType']}} @else {{$configData['activeMenuTypeClass']}}@endif @if(($configData['isMenuDark']) === true) {{'sidenav-dark'}} @elseif(($configData['isMenuDark']) === false){{'sidenav-light'}}  @else {{$configData['sidenavMainColor']}}@endif">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{asset('/')}}">
                @if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType']))
                    @if($configData['mainLayoutType']=== 'vertical-modern-menu')
                        <img class="hide-on-med-and-down" src="{{asset($configData['largeScreenLogo'])}}"
                             alt="materialize logo"/>
                        <img class="show-on-medium-and-down hide-on-med-and-up"
                             src="{{asset($configData['smallScreenLogo'])}}" alt="materialize logo"/>
                    @elseif($configData['mainLayoutType']=== 'vertical-menu-nav-dark')
                        <img src="{{asset($configData['smallScreenLogo'])}}" alt="materialize logo"/>

                    @elseif($configData['mainLayoutType']=== 'vertical-gradient-menu')
                        <img class="show-on-medium-and-down hide-on-med-and-up"
                             src="{{asset($configData['largeScreenLogo'])}}"
                             alt="materialize logo"/>
                        <img class="hide-on-med-and-down" src="{{asset($configData['smallScreenLogo'])}}"
                             alt="materialize logo"/>

                    @elseif($configData['mainLayoutType']=== 'vertical-dark-menu')
                        <img class="show-on-medium-and-down hide-on-med-and-up"
                             src="{{asset($configData['largeScreenLogo'])}}"
                             alt="materialize logo"/>
                        <img class="hide-on-med-and-down" src="{{asset($configData['smallScreenLogo'])}}"
                             alt="materialize logo"/>
                @endif
            @endif
            <!-- <span class="logo-text hide-on-med-and-down">
          @if(!empty ($configData['templateTitle']) && isset($configData['templateTitle']))
                {{$configData['templateTitle']}}
            @else

            @endif
                </span> -->
            </a>
            <!-- <a class="navbar-toggler" href="javascript:void(0)"><i class="material-icons">radio_button_checked</i></a> -->
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out"
        data-menu="menu-navigation" data-collapsible="menu-accordion">
        {{-- Foreach menu item starts --}}
        @if(!empty($menuData[0]) && isset($menuData[0]))
            @foreach ($menuData[0]->menu as $menu)
                @if(isset($menu->navheader))
                    <li class="navigation-header">
                        <a class="navigation-header-text">{{ $menu->navheader }}</a>
                        <i class="navigation-header-icon material-icons">{{$menu->icon }}</i>
                    </li>
                @else
                    @if((\Auth::user()->hasRole($menu->role)) OR $menu->role === '')
                        <li class="menu-link-li bold {{ !empty($menu->submenu) ? request()->is($menu->url.'*') ? 'active open' : '' : ''}}">
                            @if(isset($menu->submenu))
                                <a class="{{@$menu->class}}" href="javascript:void(0)">
                                    {!! menuIcon($menu->icon) !!}
                                    <span class="menu-title">{{ $menu->name}}</span>
                                </a>
                            @else
                                <a class="{{@$menu->class}} @if(isset($menu->href_type) && $menu->href_type==='route') {{ \Route::current()->getName() === $menu->url ? 'active '.$configData['activeMenuColor'] : '' }} @else {{(request()->is($menu->url.'*') && $menu->url !=='') ? 'active '.$configData['activeMenuColor'] : '' }} @endif"
                                   @if(!empty($configData['activeMenuColor'])) {{'style=background:none;box-shadow:none;'}} @endif
                                   href="@if(($menu->url)==='javascript:void(0)'){{$menu->url}} @else @if(isset($menu->href_type) && $menu->href_type==='route') {{route($menu->url)}} @else {{url($menu->url)}} @endif @endif"
                                    {{isset($menu->newTab) ? 'target="_blank"':''}}>
                                    <i class="material-icons">{{$menu->icon}}</i>
                                    <span class="menu-title">{{ $menu->name}}</span>
                                    @if(isset($menu->tag))
                                        <span class="{{$menu->tagcustom}}">{{$menu->tag}}</span>
                                    @endif
                                </a>
                            @endif
                            @if(isset($menu->submenu))
                                @include('panels.submenu', ['menus' => $menu->submenu,'sub_menus'=>$menu->submenu])
                            @endif
                        </li>
                    @endif
                @endif
            @endforeach
        @endif

        <li class="bold inviteusersidebar"><a href="javascript:void(0)" class="waves-effect waves-light btn-small " id="inviteuser" style="display: inline-flex;"><i class="material-icons">person_outline</i> Invite Users</a>
        </li>
        <li class="bold needhelp--modal-li"><a class="waves-effect waves-cyan needhelp--modal" href="javascript:void(0);" data-toggle="modal" href="#needhelp_modal"><i class="material-icons">help_outline</i><span class="menu-title" data-i18n="Support">Need help?</span></a>
        </li>
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only"
       href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
