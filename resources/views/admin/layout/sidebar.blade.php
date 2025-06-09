<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            <!-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> -->

            <li class="nav-item dropdown {{ Request::is('admin/home-banner') ? 'active' : '' }} || {{ Request::is('admin/home-welcome') ? 'active' : '' }} || {{ Request::is('admin/home-counter') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Home Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/home-banner') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_banner') }}"><i class="fas fa-angle-right"></i> Home Banner</a></li>
                    <li class="{{ Request::is('admin/home-welcome') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_welcome') }}"><i class="fas fa-angle-right"></i> Home Welcome</a></li>
                    <li class="{{ Request::is('admin/home-counter') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_counter') }}"><i class="fas fa-angle-right"></i> Home Counter</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/speaker/*') ? 'active' : '' }} || {{ Request::is('admin/schedule-day/*') ? 'active' : '' }} || {{ Request::is('admin/schedule/*') ? 'active' : '' }} || {{ Request::is('admin/speaker-schedule/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Speaker Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/speaker/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_speaker_index') }}"><i class="fas fa-angle-right"></i> Speaker</a></li>
                    <li class="{{ Request::is('admin/schedule-day/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_schedule_day_index') }}"><i class="fas fa-angle-right"></i> Schedule Days</a></li>
                    <li class="{{ Request::is('admin/schedule/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_schedule_index') }}"><i class="fas fa-angle-right"></i> Schedule</a></li>
                    <li class="{{ Request::is('admin/speaker-schedule/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_speaker_schedule_index') }}"><i class="fas fa-angle-right"></i> Speaker Schedules</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/sponsor-category/*') ? 'active' : '' }} || {{ Request::is('admin/sponsor/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Sponsor Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/sponsor-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sponsor_category_index') }}"><i class="fas fa-angle-right"></i> Sponsor Categories</a></li>
                    <li class="{{ Request::is('admin/sponsor/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sponsor_index') }}"><i class="fas fa-angle-right"></i> Sponsor</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/organizer/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_organizer_index') }}"><i class="fas fa-hand-point-right"></i> <span>Organizers</span></a></li>

            <li class="{{ Request::is('admin/accommodation/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_accommodation_index') }}"><i class="fas fa-hand-point-right"></i> <span>Accommodations</span></a></li>

            <li class="{{ Request::is('admin/photo-gallery/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_photo_gallery_index') }}"><i class="fas fa-hand-point-right"></i> <span>Photo Gallery</span></a></li>

            <li class="{{ Request::is('admin/video-gallery/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_video_gallery_index') }}"><i class="fas fa-hand-point-right"></i> <span>Video Gallery</span></a></li>

            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_index') }}"><i class="fas fa-hand-point-right"></i> <span>Faq</span></a></li>

            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_testimonial_index') }}"><i class="fas fa-hand-point-right"></i> <span>Testimonials</span></a></li>

        </ul>
    </aside>
</div>