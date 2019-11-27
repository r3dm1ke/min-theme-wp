(function() {
    document.addEventListener("DOMContentLoaded", function() {
        const glitch_elements = document.getElementsByClassName("glitch");
        for (let item of glitch_elements) {
            if (!item.hasAttribute("data-glitch"))
                item.setAttribute("data-glitch", item.innerHTML);
        }
    })
})();