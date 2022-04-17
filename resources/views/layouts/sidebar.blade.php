<div class="iconsidebar-menu">
    <div class="sidebar">
        <ul class="iconMenu-bar custom-scrollbar">
            @if(Auth::guard('company')->check())
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-home"></i><span>Company Directory </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('company.company_directory.index') }}">Registered Companies</a></li>
                    <li><a href="{{ route('company.company_document.index') }}">Documents</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::guard('web')->check())
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-helm"></i><span>Manage Admin</span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('manage_admin.index') }}">Admin</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-network"></i><span>Company Directory </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('company_directory_topic.index') }}">Company Topic</a></li>
                    <li><a href="{{ route('company_directory.index') }}">Registered Companies</a></li>
                    <li><a href="{{ route('company_document_category.index') }}">Document Category</a></li>
                    <li><a href="{{ route('company_document.index') }}">Documents</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-box1"></i><span>Projects </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('project.index') }}">Our Project</a></li>
                    <li><a href="{{ route('project_category.index') }}">Project Category</a></li>

                </ul>
            </li>
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
                    <i class="pe-7s-user"></i><span>Config Content </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('menu.index') }}">Menu</a></li>
                    <li><a href="{{ route('slot.index') }}">Slot</a></li>
                    <li><a href="{{ route('content.index') }}">Content</a></li>
                </ul>
            </li>
            <!-- <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-user"></i><span>User Menu </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('menu.index') }}">Menu</a></li>
                    <li><a href="{{ route('menu_group.index') }}">Menu Group</a></li>
                    <li><a href="{{ route('slot.index') }}">Slot</a></li>
                    <li><a href="{{ route('menu_slot.index') }}">Menu Slot</a></li>
                    <li><a href="{{ route('content_type.index') }}">Content Type</a></li>
                    <li><a href="{{ route('slot_content.index') }}">Menu Slot Content</a></li>
                </ul>
            </li> -->
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-news-paper"></i><span>News </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('news_category.index') }}">News Category</a></li>
                    <li><a href="{{ route('news.index') }}">News</a></li>
                    <li><a href="{{ route('news_category.sidebar') }}">Headline Category</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-map-2"></i><span>Region </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('country.index') }}">Country</a></li>
                    <li><a href="{{ route('region.index') }}">Region</a></li>
                    <li><a href="{{ route('city.index') }}">City</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-server"></i><span>Language </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('language.index') }}">Language</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-link"></i><span>Event / Schedule </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('event.index') }}">Event</a></li>
                    <li><a href="{{ route('event_category.index') }}">Category</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-way"></i><span>Social Media</span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('social_media.index') }}">Manage Link</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-science"></i><span>Our Activities </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('activity.index') }}">Activity</a></li>
                    <li><a href="{{ route('activity_category.index') }}">Category</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-signal"></i><span>Our Sponsor</span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('sponsor.index') }}">Sponsor</a></li>
                    <li><a href="{{ route('group.index') }}">Sponsor Group</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-science"></i><span>Video Publication </span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('video_publication.index') }}">Publication</a></li>
                </ul>
            </li>
            <li>
                <a class="bar-icons" href="#">
                    <i class="pe-7s-mail"></i><span>Newsletter</span>
                </a>
                <ul class="iconbar-mainmenu custom-scrollbar">
                    <li><a href="{{ route('newsletter.index') }}">Send Newsletter</a></li>
                    <li><a href="{{ route('subscriber.index') }}">List Subscriber</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>
