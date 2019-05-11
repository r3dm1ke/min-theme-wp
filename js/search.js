(function() {
    document.addEventListener('DOMContentLoaded', function() {
        const search_trigger = document.querySelector('.search-trigger a');
        const menu_container = document.querySelector('.menu-main-menu-container');
        const search_hide_trigger = document.querySelector('#search-hide-trigger');
        const search_container = document.querySelector('.search-form');

        const toggle_search = function() {
            console.log('tock');
            menu_container.classList.toggle('hidden');
            search_container.classList.toggle('hidden');
        };

        search_trigger.onclick = toggle_search;
        search_hide_trigger.onclick = toggle_search;
    })
})();