
{{ $menuService->isCurrent( request()->path() ) }}
<div class="sidebar-header">
    <div class="col-md-4 sidebar-nav-btn">
        <i class="fa fa-bars"></i>
    </div>
    <div class="col-md-8 sidebar-logo">
        <img src="{{ asset('img/recrut.png') }}" alt="">
    </div>
</div>

<div class="sidebar-nav">
<ul>
        @foreach( $menuService->getMenu() as $name )
            <li>
                <a href="{{url($name['url'])}}" @if($name['active'] == 1) class="active" @endif>
                    <img src="{{ asset($name['img']) }}" alt="">
                    <span>{{$name['label']}}</span>
                </a>
                @if($name['active'] == 1)
                @if(array_key_exists('children', $name))
                    <ul>
                        @foreach( $name['children'] as $subName )
                            <li>
                                <a href="{{url($subName['url'])}}"  @if($subName['active'] == 1) class="active" @endif>
                                    <img src="{{ asset($subName['img']) }}" alt="">
                                    <span>{{$subName['label']}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
                @endif
            </li>
        @endforeach
</ul>
</div>