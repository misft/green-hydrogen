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
                    <li><a href="{{ route('menu.group.index') }}">Menu Group</a></li>
                    <li><a href="{{ route('menu.slot.index') }}">Slot</a></li>
                    <li><a href="{{ route('menu.menu_slot.index') }}">Menu Slot</a></li>
                    <li><a href="{{ route('menu.content_type.index') }}">Content Type</a></li>
                    <li><a href="{{ route('menu.slot_content.index') }}">Menu Slot Content</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
