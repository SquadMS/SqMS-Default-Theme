const ServerStatusListenerDefinitions = [
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
]

export default class ServerStatusListener {
    constructor(definitions = {}) {
        /* Merge options with defaults */
        this.definitions = Object.merge(ServerStatusListenerDefinitions, definitions);

        /* Get all servers elements with an id set */
        this.servers = {};
        for (const element of document.querySelectorAll('.server[server-id]')) {
            this.servers[parseInt(element.getAttribute('server-id'))] = element;
        }

        /* Start listening */
        this.listen();
    }

    listen() {
        /* Check if Echo is installed, loaded and instanciated */
        if (!window.Echo) {
            throw new Error('SquadServerListener requires Echo to be available!');
        }

        /* Listen for status updates */
        Echo.channel(`server-status`).listen('.SquadMS\\Servers\\Events\\ServerStatusUpdated', (event) => {
            /* Only update servers that are registered and found on the page */
            if (!Object.keys(this.servers).includes(event.server)) {
                console.log(`Server ${event.server} is not registered, skipping...`);
                return;
            }

            /* Update with the configured definitions */
            for (const triple of this.definitions) {
                for (const element of this.definitions[event.server].getElementsByClassName(triple[0])) {
                    if (isFunction(triple[1])) {
                        triple[1](element, event[triple[2]]);
                    } else {
                        element[triple[1]] = event[triple[2]];
                    }
                    
                }
            }

            /* Toggle online/offline visibility elements */
            this.toggleVisibilites(server, event.online);
        });
    }

    toggleVisibilites(root, state = true) {
        for (const element of root.getElementsByClassName('data-show-online')) {
            element.classList.toggle('d-none', !state);
        }

        for (const element of root.getElementsByClassName('data-show-offline')) {
            element.classList.toggle('d-none', state);
        }
    }

    isFunction(functionToCheck) {
        return functionToCheck && {}.toString.call(functionToCheck) === '[object Function]';
    }
}

window.ServerStatusListener = ServerStatusListener;