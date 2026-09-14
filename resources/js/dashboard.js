const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
    const li = item.parentElement;

    item.addEventListener('click', function () {
        allSideMenu.forEach(i => {
            i.parentElement.classList.remove('active');
        });

        li.classList.add('active');
    });
});


const menuBar = document.querySelector('#content nav .bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
});


const searchButton = document.querySelector(
    '#content nav form .form-input button'
);

const searchButtonIcon = document.querySelector(
    '#content nav form .form-input button .bx'
);

const searchForm = document.querySelector(
    '#content nav form'
);

searchButton.addEventListener('click', function (e) {

    if (window.innerWidth < 576) {

        e.preventDefault();

        searchForm.classList.toggle('show');

        if (searchForm.classList.contains('show')) {
            searchButtonIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
        }
    }
});


if (window.innerWidth < 768) {
    sidebar.classList.add('hide');
}


window.addEventListener('resize', function () {

    if (window.innerWidth > 576) {
        searchButtonIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }

    if (window.innerWidth < 768) {
        sidebar.classList.add('hide');
    } else {
        sidebar.classList.remove('hide');
    }

});


const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {

    if (this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }

});

// ABOUT PAGE LANGUAGE TABS
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

        const selectedContent = document.getElementById(`language-${language}`);

        if (selectedContent) {
            selectedContent.classList.add('active');
        }
    });
});