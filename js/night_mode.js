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
                if (confirm('Enabling night mode means a cookie will be stored to make night mode persistent. It will ' +
                    'be a 0 or a 1, meaning night mode is off and on, respectively. That is the only piece of info stored. ' +
                    'Do you wish to proceed?')) {
                    allowed = 1;
                } else return;
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