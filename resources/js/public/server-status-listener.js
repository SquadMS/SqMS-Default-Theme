document.addEventListener('DOMContentLoaded', function() {
    /* Define class needles, properties/updaters and event fields for automated updating */
    const DEFINITIONS = [
        [
            'data-server-name',
            'innerText',
            'name'
        ],
        [
            'data-count',
            'innerText',
            'count'
        ],
        [
            'data-queue',
            'innerText',
            'queue'
        ],
        [
            'data-slots',
            'innerText',
            'slots'
        ],
        [
            'data-reserved',
            'innerText',
            'reserved'
        ]
    ];

    /* Check if Echo is installed, loaded and instanciated */
    if (window.Echo) {
        /* Get all servers elements */
        const servers = document.getElementsByClassName('server');

        for (const server of servers) {
            Echo.channel(`server.${server.getAttribute('server-id')}`).listen('.SquadMS\\Servers\\Events\\ServerStatusUpdated', (event) => {
                for (const triple of DEFINITIONS) {
                    for (const element of server.getElementsByClassName(triple[0])) {
                        if (isFunction(triple[1])) {
                            triple[1](element, event[triple[2]]);
                        } else {
                            element[triple[1]] = event[triple[2]];
                        }
                        
                    }
                }

                toggleOnlineVisibility(server, event.online);
            });
        }
    }

    function toggleOnlineVisibility(root, state = true) {
        for (const element of root.getElementsByClassName('data-show-online')) {
            element.classList.toggle('d-none', !state);
        }

        for (const element of root.getElementsByClassName('data-show-offline')) {
            element.classList.toggle('d-none', state);
        }
    }

    function isFunction(functionToCheck) {
        return functionToCheck && {}.toString.call(functionToCheck) === '[object Function]';
    }
});