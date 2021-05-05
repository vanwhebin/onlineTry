<div class="sidebar-column col-lg-3"
     style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

    <div class="theiaStickySidebar"
         style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 768.188px;">
        <aside class="widget-area">
            @if(!empty($posts))
                @include('post.partials.widget-hot')
                @include('post.partials.widget-tags')
                @include('post.partials.widget-recommends')
            @else
                @include('post.partials.widget-latest')
                @include('post.partials.widget-tags')
                @include('post.partials.widget-hot')
            @endif
        </aside>
    </div>
</div>