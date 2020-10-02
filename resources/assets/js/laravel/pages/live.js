const root = process.env.MIX_APP_URL;

const defaultAvatarPath = root + '/media/avatars/avatar0.jpg';
const storagePath = root + '/storage/';

const roomSubject = 'SALA EXCLUSIVA';

const domain = 'meet.jit.si';

var api = null;
var events = [];
var publicUsers = [];

jQuery(() => {
    document.querySelector('#live-session').innerHTML = "";
    const options = {
        roomName: room,
        width: '100%',
        height: 600,
        parentNode: document.querySelector('#live-session'),
        devices: {
            //
        },
        interfaceConfigOverwrite: {
            filmStripOnly: false,
        },
        configOverwrite: {
            // DEFAULT_LOCAL_DISPLAY_NAME: user.person.age ? user.person.age : 'N/I',
        },
        onload: whenLive,
    };
    api = new JitsiMeetExternalAPI(domain, options);
});

function whenLive() {

    //
    // Regular Events
    //
    api.addEventListener("avatarChanged", ($e) => {
        //console.log('avatar loaded', $e);
    });

    api.addEventListener("incomingMessage", ($e) => {
        console.log('message received', $e);
    });

    api.addEventListener("outgoingMessage", ($e) => {
        console.log('message sent', $e);
    });

    api.addEventListener("displayNameChange", ($e) => {
        console.log('name changed', $e);
    });

    api.addEventListener("emailChange", ($e) => {
        console.log('email changed', $e);
    });

    //
    // Friendly Events
    //

    api.addEventListener("participantJoined", ($e) => {
        console.log('member joined the room', $e, api.getNumberOfParticipants());
        updateSummary('members', api.getNumberOfParticipants());
        updateEvents('memberArrive', {
            ...$e, membersOnline: api.getNumberOfParticipants(), created: new Date()
        });
    });

    api.addEventListener("participantKickedOut", ($e) => {
        console.error('member kicked from the room', $e);
    });

    api.addEventListener("participantLeft", ($e) => {
        console.log('member left the room', $e);
        updateSummary('members', api.getNumberOfParticipants());
        updateEvents('memberLeft', {
            ...$e, membersOnline: api.getNumberOfParticipants(), created: new Date()
        });
    });

    api.addEventListener("passwordRequired", () => {
        console.error('room has a password');
        alert("Desculpe, mas esta sala foi fechada para manutencao. Tente novamente mais tarde.");
    });

    // 
    // Plugin Errors
    // 
    api.addEventListener("cameraError", (error) => {
        console.error('camera fail to load', error);
        alert('A camera nao esta respondendo. Verificou permissao? Tem alguma outra coisa usando a camera?');
    });

    api.addEventListener("micError", (error) => {
        console.error('mic fail to load', error);
        alert('O microfone nao esta respondendo. Verificou permissao? Tem alguma outra coisa usando o microfone ou camera?');
    });

    //
    // Conference Events
    //

    api.addEventListener("videoConferenceJoined", ($e) => {
        console.warn('video conference joined', $e);
    });

    api.addEventListener("videoConferenceLeft", ($e) => {
        console.warn('video conference left', $e);
    });

    //
    // Audio Changes
    //

    api.addEventListener("audioAvailabilityChanged", ($e) => {
        console.warn('audio has changed', $e);
    });

    api.addEventListener("audioMuteStatusChanged", ($e) => {
        console.warn('muted has changed', $e);
        updateStatus("muted", $e.muted);
    });

    //
    // Video Events
    //

    api.addEventListener("videoAvailabilityChanged", ($e) => {
        console.warn('video has changed', $e);
    });

    api.addEventListener("videoMuteStatusChanged", ($e) => {
        console.warn('video muted has changed', $e);
        updateStatus("video", $e.muted);
    });

    //
    // Settings Events
    //

    api.addEventListener("screenSharingStatusChanged", ($e) => {
        console.warn('screen sharing has changed', $e);
    });

    api.addEventListener("tileViewChanged", ($e) => {
        console.warn('tile view has changed', $e);
    });

    api.addEventListener("deviceListChanged", ($e) => {
        console.warn('devices list has changed', $e);
    });

    api.addEventListener("filmstripDisplayChanged", ($e) => {
        console.warn('pvt mode (filmstrip) has changed', $e);
    });

    api.addEventListener("subjectChange", ($e) => {
        if ($e && $e.subject !== roomSubject) {
            console.log('subject has changed', $e);
            if ($e.subject.length > 2) {
                alert($e.subject);
            }
        }
    });

    api.addEventListener("suspendDetected", () => {
        console.warn('are you awake?');
    });

    api.addEventListener("readyToClose", () => {
        console.error('ready to die...');
        api.dispose();

        $('#live').append(`<a class="btn btn-lg btn-primary" href="/live">Entrar na Sala</a>`);
    });

    // Set Initial Configurations
    api.executeCommand('subject', roomSubject);
    api.executeCommand('displayName', user.person.full_name);
    api.executeCommand('email', user.email);

    api.executeCommand('avatarUrl', user.settings.avatar_url);

    // Actions / Commands
    api.executeCommand('toggleAudio');
    api.executeCommand('toggleVideo');
}

function updateStatus(event, value) {
    if (event === 'muted') {
        createOrUpdateStatus(event, {
            value,
            content: value ? 'Mic OFF' : 'Mic ON',
        });
    }
    if (event === 'video') {
        createOrUpdateStatus(event, {
            value,
            content: value ? 'Cam OFF' : 'Cam ON',
        });
    }
}

function updateSummary(event, value) {
    if (event === 'members') {
        createOrUpdateSummary(event, {
            value,
            content: value ? `${value} Usuarios Online` : `Nenhum Usuario Online`,
        });
    }
}

function createOrUpdateStatus(name, properties) {
    let root = $(`#live-status-${name}`);
    if (root.length === 0) {
        $('#live-status').append(`<div id="live-status-${name}" class="badge badge-pill badge-danger mr-2">${properties.content}</div>`);
        return;
    }
    if (properties.value) {
        root.removeClass('badge-success').addClass('badge-danger');
        root.text(properties.content);
    } else {
        root.removeClass('badge-danger').addClass('badge-success');
        root.text(properties.content);
    }
}

function createOrUpdateSummary(name, properties) {
    let root = $(`#live-summary-${name}`);
    if (root.length === 0) {
        $('#live-status').append(`<div id="live-summary-${name}" class="badge badge-primary float-right">${properties.content}</div>`);
        return;
    }
    if (properties.value > 1) {
        root.removeClass('badge-secondary').addClass('badge-primary');
        root.text(properties.content);
    } else {
        root.removeClass('badge-primary').addClass('badge-secondary');
        root.text(properties.content);
    }
}

function updateEvents(event, properties) {
    if (event === 'memberArrive') {
        publicUsers.push(properties);
        pushNewEvent(event, {
            ...properties,
            content: `${properties.created.toLocaleString()}: ${properties.displayName} entrou na sala.`,
    });
    }
    if (event === 'memberLeft') {
        const user = publicUsers.find(user => user.id == properties.id);
        pushNewEvent(event, {
            ...properties,
            content: `${properties.created.toLocaleString()}: ${user.displayName} saiu da sala.`,
        });
    }
}

function pushNewEvent(name, properties) {
    events.push({ name, ...properties });
    let root = $(`#live-events`);
    if (root.length > 0) {
        root.empty();
        events.sort((b, a) => a.created - b.created).slice(0, 5).forEach(event => {
            root.append(`<div id="event-${event.name}" class="alert alert-info d-flex align-items-center" role="alert">${event.content}</div>`);
        })
        return;
    }
}