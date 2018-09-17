<!-- Sidebar  -->
<nav id="sidebar">
    <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
    </div>
    <div class="sidebar-header text-center">
        <img src="{{ asset('img/brtth-logo.png') }}" class="rounded mx-auto d-block" height="100px">
        <span>{{ config('app.name', 'Laravel') }}</span>
    </div>
    <ul class="list-unstyled components">
        <p>Content</p>
        <li id="home">
            <a href="/directory/public"> <i class="fa fa-home"></i> Home</a>
        </li>
        <li id="profile">
            <a href="/directory/public/profile"> <i class="fa fa-hospital"></i> Profile</a>
        </li>
        <li id="services">
            <a href="/directory/public/services"> <i class="fa fa-cogs"></i> Services</a>
        </li>
        <li id="clinics">
            <a href="/directory/public/clinics"> <i class="fa fa-calendar-plus"></i> Clinic Schedule</a>
        </li>
        <li id="rates">
            <a href="/directory/public/rates"> <i class="fa fa-dollar-sign"></i> Service Rates</a>
        </li>
        <li id="specialists">
            <a href="/directory/public/specialists"> <i class="fa fa-user-md"></i> Medical Specialist Pool</a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
        </li>
        <li>
            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
        </li>
    </ul>
</nav>