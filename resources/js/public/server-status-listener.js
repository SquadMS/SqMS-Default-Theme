const ServerStatusListenerDefinitions = {
    name: [
        'data-server-name',
        'innerText',
    ],
    count: [
        'data-count',
        'innerText',
    ],
    queue: [
        'data-queue',
        'innerText',
    ],
    slots: [
        'data-slots',
        'innerText',
    ],
    reserved: [
        'data-reserved',
        'innerText',
    ],
    levelClass: [
        'data-level-class',
        function() {},
    ],
    teamTags: [
        'data-team-tags',
        function() {},
    ],
}

export default class ServerStatusListener {
    constructor(definitions = {}, callback = null) {
        /* Merge options with defaults */
        this.definitions = Object.assign(ServerStatusListenerDefinitions, definitions);

        /* Callback to run once a server update has been received */
        this.callback = callback;

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
            if (!Object.keys(this.servers).includes(event.server.toString())) {
                console.log(`Server ${event.server} is not registered, skipping...`);
                return;
            }

            /* Update with the configured definitions */
            for (const param in this.definitions) {
                /* Get the pair, selector and modifier */
                const pair = this.definitions[param];

                /* Get the data from the event */
                const value = event[param];

                /* Find all descendant elements of the server for the selector */
                for (const element of this.servers[event.server].getElementsByClassName(pair[0])) {
                    /* If the modifier is a function, execute it, otherwise simply write */
                    if (this.isFunction(pair[1])) {
                        pair[1](element, value);
                    } else {
                        element[pair[1]] = value;
                    }
                    
                }
            }

            /* Toggle online/offline visibility elements */
            this.toggleVisibilites(server, event.online);

            /* Run the user defined callback */
            if (this.callback) {
                this.callback(server, event);
            }
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