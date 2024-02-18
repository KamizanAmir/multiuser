@if(auth()->check()) <!-- Check if the user is authenticated -->
<style>
    /* General sidebar styles */
    .sidebar {
        float: left;
        width: 200px;
        height: 100vh;
        background: #333; /* Darker shade for a more modern look */
        padding: 20px;
        border-radius: 5px;
    }

    .sidebar a {
        display: block;
        color: #ddd; /* Lighter text for contrast */
        padding: 10px;
        margin: 5px 0;
        border-radius: 4px;
        transition: background-color 0.3s; /* Smooth background transition */
    }

    .sidebar a:hover {
        background-color: #444; /* Slightly lighter on hover */
    }

    .sidebar .user-info {
        margin-bottom: 30px; /* Increased space from the username to the menu */
        padding-bottom: 10px;
        border-bottom: 1px solid #555; /* Divider below the username */
        color: #fff;
    }

    .child-link {
        font-size: 0.9em;
        padding-left: 30px;
        text-align: left;
        position: relative;
    }

    .child-link:before,
    .child-link:after {
        content: '';
        position: absolute;
        border-color: #777; /* Subtle lines for elegance */
    }

    .child-link:before {
        top: 0;
        left: 15px;
        height: 100%;
        border-left: 1px solid;
    }

    .child-link:after {
        top: 50%;
        left: 15px;
        width: 10px;
        border-bottom: 1px solid;
        transform: translateY(-50%);
    }

    #additional-links a {
        margin-left: 15px; /* Indent child links */
        border-left: 3px solid #777; /* Visible divider for child links */
        padding-left: 25px;
    }

    #more-btn:after {
        content: '\f0d7';
        font-family: 'Font Awesome 5 Free';
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        font-weight: 900;
    }

    /* Logout button specific styles */
    .logout-btn {
        background-color: #d9534f; /* Bootstrap 'btn-danger' color */
        color: white;
        text-align: center;
        padding: 10px;
        margin-top: 20px; /* Additional space from the last link */
        border: none;
        width: 100%;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .logout-btn:hover {
        background-color: #c9302c; /* Darken on hover */
    }

</style>
<div class="sidebar">
    <!-- Display User Info with Profile Icon -->
    <div class="user-info">
        <i class="fas fa-user-circle"></i> <span>{{ auth()->user()->name }}</span>
    </div>

    <!-- Sidebar Links -->
    <!-- Superadmin View -->
    @if(auth()->user()->role == '1') 
        <!-- Superadmin Links -->
        <a href="/superadmin" style="display: block; margin-bottom: 10px; color: white;"><i class="fas fa-tachometer-alt" style="color: yellow;"></i> All Dashboard</a>
        
        <!-- Toggleable More Button with Gear Icon -->
        <a href="javascript:void(0);" id="more-btn" style="display: block; margin-bottom: 10px; color: white; cursor: pointer;"><i class="fa fa-plus-circle" style="color: blue;"></i> More</a>
        
        <!-- Additional Links -->
        <div id="additional-links" style="display: none;">
            <a href="/add-trainer" class="child-link" style="display: block; margin-bottom: 10px; color: #fff;">
                <i class="fas fa-user-plus" style="color: greenyellow;"></i> Add Trainer
            </a>
            <a href="/manage-trainer" class="child-link" style="display: block; margin-bottom: 10px; color: #fff;">
                <i class="fas fa-users-cog" style="color: purple"></i> Manage Trainer
            </a>
            <a href="/setting" class="child-link" style="display: block; margin-bottom: 10px; color: #fff;">
                <i class="fas fa-cog" style="color: yellow"></i> Account Setting
            </a>
        </div>

        <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-minus-circle"></i> Logout
    </button>
    @elseif(auth()->user()->role == '2')
        <!-- Admin Links -->
        <!-- Admin Links -->
        <a href="/admin" style="display: block; margin-bottom: 10px; color: white;"><i class="fas fa-tachometer-alt" style="color: yellow;"></i>Employee Dashboard</a>
        
        <!-- Toggleable More Button with Gear Icon -->
        <a href="javascript:void(0);" id="more-btn" style="display: block; margin-bottom: 10px; color: white; cursor: pointer;"><i class="fa fa-plus-circle" style="color: blue;"></i> More</a>
        
        <!-- Additional Links -->
        <div id="additional-links" style="display: none;">
            <a href="/add-employee" class="child-link" style="display: block; margin-bottom: 10px; color: #fff;">
                <i class="fas fa-user-plus" style="color: greenyellow;"></i> Add Employee
            </a>
            <a href="/manage-employee" class="child-link" style="display: block; margin-bottom: 10px; color: #fff;">
                <i class="fas fa-users-cog" style="color: purple"></i> Manage Employee
            </a>
            <a href="/setting" class="child-link" style="display: block; margin-bottom: 10px; color: #fff;">
                <i class="fas fa-cog" style="color: yellow"></i> Account Setting
            </a>
        </div>

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" style="display: block; margin-bottom: 10px; color: white;">
            <i class="fa fa-minus-circle" style="color: red;"></i> Logout
        </a>
        <!-- more links for Admin -->
    @elseif(auth()->user()->role == '3')
        <!-- Employee Links -->
        <a href="/employee" style="display: block; margin-bottom: 10px; color: white;"><i class="fas fa-tachometer-alt" style="color: yellow;"></i>Your Dashboard</a>
        
        <!-- Toggleable More Button with Gear Icon -->
        <a href="javascript:void(0);" id="more-btn" style="display: block; margin-bottom: 10px; color: white; cursor: pointer;"><i class="fa fa-plus-circle" style="color: blue;"></i> More</a>
        
        <!-- Additional Links -->
        <div id="additional-links" style="display: none;">
            <a href="/setting" class="child-link" style="display: block; margin-bottom: 10px; color: #fff;">
                <i class="fas fa-cog" style="color: purple"></i> Account Setting
            </a>
        </div>

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" style="display: block; margin-bottom: 10px; color: white;">
            <i class="fa fa-minus-circle" style="color: red;"></i> Logout
        </a>
        <!-- more links for Employee -->
    @endif

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<script>
// JavaScript to toggle the additional links
document.getElementById('more-btn').addEventListener('click', function() {
    var x = document.getElementById('additional-links');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
});
</script>
@endif