<div class="profile-dataleft">
    <h4>My Account</h4>
    <ul class="myaccount-link">
        <li class="{{ Route::currentRouteName() == "favourites" ? "active" : "" }}">
            <a href="{{route('favourites')}}" title="Favourites">Favourites</a>
        </li>
        <li class="{{ Route::currentRouteName() == "account" ? "active" : "" }}">
            <a href="{{route('account')}}" title="Account">Account</a>
        </li>
        <li class="{{ Route::currentRouteName() == "manage-categories" ? "active" : "" }}">
            <a href="{{route('manage-categories')}}" title="Manage Categories">Manage Categories</a>
        </li>
        <li class="{{ Route::currentRouteName() == "change-password" ? "active" : "" }}">
            <a href="{{route('change-password')}}" title="Change Password">Change Password</a>
        </li>
    </ul><!--/.myaccount-link -->
</div>