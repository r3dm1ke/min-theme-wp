let getSiblings = function (elem) {

    // Setup siblings array and get the first sibling
    let siblings = [];
    let sibling = elem.parentNode.firstChild;

    // Loop through each sibling and push to the array
    while (sibling) {
        if (sibling.nodeType === 1 && sibling !== elem) {
            siblings.push(sibling);
        }
        sibling = sibling.nextSibling
    }

    return siblings;

};


(function() {
    document.addEventListener('DOMContentLoaded', function() {
        const search_trigger = document.querySelector('.search-trigger a');
        const search_hide_trigger = document.querySelector('#search-hide-trigger');
        const search_form = document.querySelector('.search-form-hideable');
        const siblings = getSiblings(search_form);
        siblings.push(search_form);
        console.log(siblings);

        const toggle_search = function() {
            for (let sibling of siblings) {
                sibling.classList.toggle('hidden-by-search');
                if (sibling.classList.contains('hidden-by-search')) sibling.setAttribute('aria-hidden', 'true');
                else sibling.setAttribute('aria-hidden', 'false');
            }
        };

        search_trigger.onclick = toggle_search;
        search_hide_trigger.onclick = toggle_search;
    })
})();