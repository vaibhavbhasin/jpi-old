<div class="collapsible-body"
     style="display:{{ !empty($menu->submenu) ? request()->is($menu->url.'*') ? 'block' : '' : ''}}">
    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
        @foreach ($sub_menus as $sub_menu)
            @if(isset($sub_menu->role))
                @if(auth()->user()->hasRole($sub_menu->role))
                    <li class="{!! is_active($sub_menu,1) !!}">
                        <a href="@if(($sub_menu->url)==='javascript:void(0)'){{$sub_menu->url}} @else @if(isset($sub_menu->href_type) && $sub_menu->href_type==='route') {{route($sub_menu->url)}} @else {{url($sub_menu->url)}} @endif @endif"
                           class="{{@$sub_menu->class}} {{is_active($sub_menu,2)}} {{$configData['activeMenuColor']}}"
                           @if(!empty($configData['activeMenuColor'])) {{'style=background:none;box-shadow:none;'}} @endif
                           target="{{isset($sub_menu->newTab) ? '_blank':''}}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span>{{ __($sub_menu->name)}}</span>
                        </a>
                        @if (isset($sub_menu->submenu))
                            @include('panels.submenu', ['menu' => $menu->submenu,'sub_menus'=>$menu->submenu])
                        @endif
                    </li>
                @endif
            @endif
        @endforeach
    </ul>
</div>
