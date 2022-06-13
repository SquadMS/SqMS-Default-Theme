import supportsWebP from 'supports-webp';

supportsWebP.then(supported => {
    if (supported) {
        document.body.classList.add('webp');
    } else {
        document.body.classList.add('no-webp');
    }
});