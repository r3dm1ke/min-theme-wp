(function() {
    document.addEventListener("DOMContentLoaded", function() {
        let is_night_mode = 0;
        let allowed = 0;
        // Now check for stored value
        const data = localStorage.getItem('night_mode');
        if (data !== null) {
            allowed = 1;
        }

        if (data === '1') is_night_mode = 1;

        if (is_night_mode === 1) {
            document.getElementsByTagName('body')[0].classList.add('night_mode');
        }

        const toggle = document.querySelector('.night_mode_toggle');
        toggle.onclick = function () {
            if (allowed === 0) {
                allowed = 1;
            }
            if (is_night_mode === 1) {
                is_night_mode = 0;
                document.getElementsByTagName('body')[0].classList.remove('night_mode');
                localStorage.setItem('night_mode', 0);
            } else {
                is_night_mode = 1;
                document.getElementsByTagName('body')[0].classList.add('night_mode');
                localStorage.setItem('night_mode', 1);
            }
        }

    });
})();