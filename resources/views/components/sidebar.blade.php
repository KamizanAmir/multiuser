<!-- sidebar.blade.php -->
@if(auth()->check()) <!-- Check if the user is authenticated -->
<style>
        .child-link {
            font-size: 0.9em; /* Smaller font size */
            padding-left: 30px; /* Increase indentation to accommodate lines */
            position: relative; /* Needed for absolute positioning of pseudo-elements */
            text-align: left; /* Align text to the left */
        }

        .child-link:before {
            content: ''; /* Add content for the pseudo-element */
            position: absolute;
            top: 0;
            left: 10px; /* Position to the left of the text */
            height: 100%; /* Extend the line to full height of the element */
            border-left: 1px solid #fff; /* Create the line */
        }

        .child-link:after {
            content: ''; /* Add content for the pseudo-element */
            position: absolute;
            top: 50%;
            left: 10px; /* Position to the left of the line */
            width: 10px; /* Width of the horizontal line */
            border-bottom: 1px solid #fff; /* Create the horizontal line */
            transform: translateY(-50%); /* Center vertically */
        }

        #additional-links a:first-child:before {
            top: 50%; /* Start the line from the middle of the first child */
        }

        #additional-links a:last-child:before {
            height: 50%; /* End the line at the middle of the last child */
        }

        #more-btn:after {
            content: '\f0d7'; /* FontAwesome down arrow */
            font-family: 'Font Awesome 5 Free'; /* Specify the font family for FontAwesome */
            position: absolute;
            right: 10px; /* Position to the right of the text */
            top: 50%;
            transform: translateY(-50%);
            font-weight: 900; /* Required for FontAwesome solid icons */
        }
</style>
<div class="sidebar" style="float: left; width: 200px; height: 100vh; background: grey; padding: 20px; border-radius: 5px;">
    <!-- Display User Info with Profile Icon -->
    <div class="user-info" style="margin-bottom: 20px; color: #fff;">
        <i class="fas fa-user-circle"></i> <p style="display: inline;">{{ auth()->user()->name }}</p>
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

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" style="display: block; margin-bottom: 10px; color: white;">
            <i class="fa fa-minus-circle" style="color: red;"></i> Logout
        </a>
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