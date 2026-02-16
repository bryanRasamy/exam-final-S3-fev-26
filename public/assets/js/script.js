// ===========================
// BNGRC - Script principal
// ===========================

document.addEventListener('DOMContentLoaded', function () {

    // === Sidebar toggle (mobile) ===
    const sidebar        = document.getElementById('sidebar');
    const sidebarToggle  = document.getElementById('sidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function openSidebar()  { sidebar.classList.add('open');    sidebarOverlay.classList.add('visible'); }
    function closeSidebar() { sidebar.classList.remove('open'); sidebarOverlay.classList.remove('visible'); }

    if (sidebarToggle) sidebarToggle.addEventListener('click', function () {
        sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
    });

    if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);

    // === Active link highlight (based on current filename) ===
    var currentPath = window.location.pathname;
    var currentFile = currentPath.substring(currentPath.lastIndexOf('/') + 1) || 'modele.php';
    document.querySelectorAll('.nav-link').forEach(function (link) {
        var href = link.getAttribute('href');
        if (href) {
            var linkFile = href.substring(href.lastIndexOf('/') + 1);
            if (linkFile === currentFile) {
                link.classList.add('active');
            }
        }
    });

    // === Filtre par région (dashboard) ===
    var filterSelect = document.getElementById('filterRegion');
    var regionCount  = document.getElementById('regionCount');

    if (filterSelect) {
        filterSelect.addEventListener('change', function () {
            var value = this.value;
            var sections = document.querySelectorAll('.region-section');
            var visible = 0;

            sections.forEach(function (section) {
                if (value === 'all' || section.getAttribute('data-region') === value) {
                    section.classList.remove('hidden');
                    section.classList.add('fade-in');
                    visible++;
                } else {
                    section.classList.add('hidden');
                    section.classList.remove('fade-in');
                }
            });

            if (regionCount) {
                regionCount.textContent = visible;
            }
        });
    }

});
