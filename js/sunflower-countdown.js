jQuery(document).ready(function($) {
    $('.digital-countdown').each(function() {
        var endDate = $(this).data('end-date');
        var countdown = $(this);

        function updateCountdown() {
            var now = new Date().getTime();
            var distance = new Date(endDate).getTime() - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (days > 0) {
                // Zeige Tage, Stunden, Minuten und Sekunden
                countdown.html(
                    days + (days === 1 ? ' Tag, ' : ' Tage, ') +
                    (hours < 10 ? '0' + hours : hours) + ':' +
                    (minutes < 10 ? '0' + minutes : minutes) + ':' +
                    (seconds < 10 ? '0' + seconds : seconds)
                );
            } else {
                // Zeige nur Stunden, Minuten und Sekunden im Format HH:MM:SS
                countdown.html(
                    (hours < 10 ? '0' + hours : hours) + ':' +
                    (minutes < 10 ? '0' + minutes : minutes) + ':' +
                    (seconds < 10 ? '0' + seconds : seconds)
                );
            }

            if (distance < 0) {
                clearInterval(interval);
                countdown.html('EXPIRED');
            }
        }

        updateCountdown();
        var interval = setInterval(updateCountdown, 1000);
    });
});