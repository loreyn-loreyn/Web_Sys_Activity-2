<!-- resources/views/components/logout.blade.php -->
<form method="POST" action="{{ route('logout') }}"
      style="position:fixed; top:15px; right:15px; z-index:1000;"
      onsubmit="return confirm('Are you sure you want to log out?');">
    @csrf
    <button type="submit" class="logout-btn" title="Logout"
        style="background:#e74c3c;border:none;cursor:pointer;padding:10px;
               border-radius:50%;display:flex;align-items:center;justify-content:center;
               box-shadow:0 3px 8px #e74c3c;transition:background 0.3s ease,transform 0.2s ease;">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" viewBox="0 0 24 24">
            <path d="M16 13v-2H7V8l-5 4 5 4v-3h9zm3-10H5c-1.1 0-2 
                    .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.9 
                    2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
        </svg>
    </button>
</form>
