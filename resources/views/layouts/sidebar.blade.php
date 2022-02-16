<div class="iconsidebar-menu">
    <div class="sidebar">
        <ul class="iconMenu-bar custom-scrollbar">
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-home"></i><span>General </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li class="iconbar-header">Dashboard</li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-home"></i><span>User Menu </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('menu.index') }}">Menu</a></li>
                    <li><a href="{{ route('menu_group.index') }}">Menu Group</a></li>
                    <li><a href="{{ route('slot.index') }}">Slot</a></li>
                    <li><a href="{{ route('menu_slot.index') }}">Menu Slot</a></li>
                    <li><a href="{{ route('content_type.index') }}">Content Type</a></li>
                    <li><a href="{{ route('slot_content.index') }}">Menu Slot Content</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-home"></i><span>News </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('news_category.index') }}">News Category</a></li>
                    <li><a href="{{ route('news.index') }}">News</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
