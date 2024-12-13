<div class="sidebar-container d-none d-md-flex flex-column p-0 m-0">
    <!-- Header -->
    <div class="sidebar-header d-flex flex-column align-items-center">
        <img src="./../Upload/RAWR.png" alt="Logo" width="70">
    </div>

    <nav>
        <a href="#" class="sidebar-link" onclick="showSection(event, 'homes')">
            <i class="bx bx-home"></i>
            <span>Home</span>
        </a>
        <a href="#" class="sidebar-link" onclick="showSection(event, 'check')">
            <i class='bx bx-calendar-check'></i>
            <span>Recorded</span>
        </a>
        <a href="#" class="sidebar-link" onclick="showSection(event, 'injury')">
            <i class="fa-solid fa-user-injured x0.4"></i>
            <span>Injury Status</span>
        </a>
    </nav>
</div>

<script>
    function showSection(event, sectionID) {
        // Remove 'active' class from all links (both sidebar and header)
        document.querySelectorAll('.sidebar-link, .menu-link').forEach(link => {
            link.classList.remove('active');
        });

        // Mark clicked link as active
        if (event && event.target) {
            const clickedLink = event.target.closest('.sidebar-link, .menu-link');
            if (clickedLink) {
                clickedLink.classList.add('active');
            }
        }

        // Hide all sections
        document.querySelectorAll('#homes, #check, #injury, #stud-profile').forEach(section => {
            section.style.display = 'none';
        });

        // Show the active section
        const activeSection = document.getElementById(sectionID);
        if (activeSection) {
            activeSection.style.display = 'block';
        }
    }

    window.onload = function() {
        // Set the dashboard as the default active section and link
        showSection(null, 'homes'); 

        // Mark the dashboard link as active on load
        document.querySelector('a[href="#"][onclick*="homes"]').classList.add('active');
    };
</script>