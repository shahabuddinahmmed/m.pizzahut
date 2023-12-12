<div class="category-product-footer">
    <div class="tab_2">
        @foreach($menus as $menu)
        <a href="{{ url('/pizza/categories/'.$menu->id) }}">
            <button class="tablink {{ ($active_link['cat']==$menu->id) ? 'active' :'' }}">{{ $menu->name }}</button>
        </a>
        @endforeach
    </div>
</div>
<style>
    .tab_2 {
        overflow: auto;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        position: fixed;
        right: 0;
        bottom: 89px;
        left: 0;
        z-index: 1030;
        list-style: none;
        white-space: nowrap;
    }
</style>


