
document.addEventListener('DOMContentLoaded', function () {

    // =========================
    // LANGUAGE TABS
    // =========================

    const languageTabs = document.querySelectorAll('.language-tab');
    const languageContents = document.querySelectorAll('.language-content');

    languageTabs.forEach(tab => {
        tab.addEventListener('click', function () {

            const language = this.dataset.language;

            languageTabs.forEach(tab => {
                tab.classList.remove('active');
            });

            languageContents.forEach(content => {
                content.classList.remove('active');
            });

            this.classList.add('active');

            const selectedContent = document.getElementById(
                `language-${language}`
            );

            if (selectedContent) {
                selectedContent.classList.add('active');
            }
        });
    });


    // =========================
    // DELETE CONFIRMATION
    // =========================

    document.addEventListener('submit', function (event) {

        if (!event.target.classList.contains('delete-form')) {
            return;
        }

        event.preventDefault();

        const form = event.target;
        const title = form.dataset.title || 'this';

        if (typeof Swal === 'undefined') {
            form.submit();
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete: "${title}"`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary'
            },
            buttonsStyling: false
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });

    });


    // =========================
    // FRONTEND SEARCH
    // =========================

    const searchToggle = document.getElementById('searchToggle');
    const frontendSearch = document.getElementById('frontendSearch');

    if (searchToggle && frontendSearch) {

        searchToggle.addEventListener('click', function () {

            frontendSearch.classList.toggle('active');

            const input = frontendSearch.querySelector('input');

            if (frontendSearch.classList.contains('active') && input) {
                input.focus();
            } else if (input) {
                input.value = '';
            }

        });

    }


    // =========================
    // FRONTEND HAMBURGER SIDEBAR
    // =========================

    const menu = document.getElementById('frontend-navigation');
    const openButton = document.getElementById('frontend-menu-toggle');
    const closeButton = document.getElementById('frontend-menu-close');
    const overlay = document.getElementById('frontend-menu-overlay');

    if (menu && openButton && closeButton && overlay) {

        function openMenu() {
            menu.classList.add('active');
            overlay.classList.add('active');

            document.body.classList.add('frontend-menu-open');

            openButton.setAttribute('aria-expanded', 'true');
            openButton.setAttribute('aria-label', 'Close navigation menu');
        }

        function closeMenu() {
            menu.classList.remove('active');
            overlay.classList.remove('active');

            document.body.classList.remove('frontend-menu-open');

            openButton.setAttribute('aria-expanded', 'false');
            openButton.setAttribute('aria-label', 'Open navigation menu');
        }

        // Open and close using hamburger button
        openButton.addEventListener('click', function () {

            if (menu.classList.contains('active')) {
                closeMenu();
            } else {
                openMenu();
            }

        });

        // Close using X button
        closeButton.addEventListener('click', closeMenu);

        // Close when clicking outside the sidebar
        overlay.addEventListener('click', closeMenu);

        // Close when a navigation link is clicked
        menu.querySelectorAll('.frontend-nav-links a').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // Close using Escape key
        document.addEventListener('keydown', function (event) {

            if (event.key === 'Escape') {
                closeMenu();
            }

        });

        // Close sidebar when returning to desktop layout
        window.addEventListener('resize', function () {

            if (window.innerWidth > 1000) {
                closeMenu();
            }

        });

    }

});
