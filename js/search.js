(function() {
    document.addEventListener('DOMContentLoaded', function() {
        const search_trigger = document.querySelector('.search-trigger a');
        const menu_container = document.querySelector('.primary-menu-container');
        const search_hide_trigger = document.querySelector('#search-hide-trigger');
        const search_container = document.querySelector('.search-form');
        const permanent_menu_container = document.querySelector('.permanent-menu-container')

        const toggle_search = function() {
            console.log('tock');
            menu_container.classList.toggle('hidden');
            search_container.classList.toggle('hidden');
            permanent_menu_container.classList.toggle('hidden');

            if (menu_container.classList.contains('hidden')) menu_container.setAttribute('aria-hidden', 'true');
            else menu_container.setAttribute('aria-hidden', 'false');

            if (search_container.classList.contains('hidden')) menu_container.setAttribute('aria-hidden', 'true');
            else search_container.setAttribute('aria-hidden', 'false');

            if (permanent_menu_container.classList.contains('hidden')) menu_container.setAttribute('aria-hidden', 'true');
            else permanent_menu_container.setAttribute('aria-hidden', 'false');
        };

        search_trigger.onclick = toggle_search;
        search_hide_trigger.onclick = toggle_search;
    })
})();