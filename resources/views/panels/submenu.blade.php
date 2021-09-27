<div class="collapsible-body">
    <ul class="collapsible collapsible-sub" data-collapsible="accordion">
        @foreach ($menu as $submenu)
            @if(isset($submenu->role))
                @if(auth()->user()->hasRole($submenu->role))
                <li class="{{(request()->is($submenu->url.'*')) ? 'active' : '' }}">
                    <a href="@if(($submenu->url)==='javascript:void(0)'){{$submenu->url}} @else @if(isset($submenu->href_type) && $submenu->href_type==='route') {{route($submenu->url)}} @else {{url($submenu->url)}} @endif @endif"
                       class="{{@$submenu->class}} @if(isset($submenu->href_type) && $submenu->href_type==='route') {{ \Route::current()->getName() === $submenu->url ? 'active '.$configData['activeMenuColor'] : '' }} @else {{(request()->is($submenu->url.'*') && $submenu->url !=='') ? 'active '.$configData['activeMenuColor'] : '' }} @endif"
                       @if(!empty($configData['activeMenuColor'])) {{'style=background:none;box-shadow:none;'}} @endif
                       target="{{isset($submenu->newTab) ? '_blank':''}}">
                        <i class="material-icons">radio_button_unchecked</i>
                        <span>{{ __($submenu->name)}}</span>
                    </a>
                    @if (isset($submenu->submenu))
                        @include('panels.submenu', ['menu' => $submenu->submenu])
                    @endif
                </li>
                @endif
            @endif
        @endforeach
    </ul>
</div>
