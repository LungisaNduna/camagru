(function() {
    var wc_display = document.getElementById('webcam_dis');
    var vendorURL = window.URL || window.webkitURL;
    
    navigator.getMedia =    navigator.getUserMedia ||
                            navigator.webkitGetUserMedia ||
                            navigator.mozGetUserMedia ||
                            navigator.msGetUserMedia;
    
    navigator.getMedia({
        video: true,
        audio:false
    }, function(stream) {
        //document.getElementById('webcam_display').src = vendorURL.createObjectURL(stream);
        //document.getElementById('webcam_display').play();
        wc_display.src = vendorURL.createObjectURL(stream);
        wc_display.play();
    }, function (error) {
        //some error display if the webcam isn't functioning properly;
    });

    var canvas = document.getElementById('capture_dis');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo_dis');

    document.getElementById('capture-btn').addEventListener('click', function() {
        context.drawImage(wc_display, 0, 0, 400, 300);
        canvas.style.display = 'block';
        document.getElementById('capture-btn').style.display = 'none';
        wc_display.style.display = 'none';
        document.getElementById('finalize-btn').style.display = 'block';
        document.getElementById('returnToWebcam-btn').style.display = 'block';
    });

    document.getElementById('returnToWebcam-btn').addEventListener('click', function() {
        canvas.style.display = 'none';
        document.getElementById('capture-btn').style.display = 'block';
        wc_display.style.display = 'block';
        document.getElementById('finalize-btn').style.display = 'none';
        document.getElementById('returnToWebcam-btn').style.display = 'none';
    });

    document.getElementById('finalize-btn').addEventListener('click', function() {
        canvas.style.display = 'none';
        photo.setAttribute('src', canvas.toDataURL('image/png'));
        photo.style.display = 'block';
        document.getElementById('post-final').style.display = 'block';
        document.getElementById('finalize-btn').style.display = 'none';
        document.getElementById('returnToWebcam-btn').style.display = 'none';
        document.getElementById('post-btn').style.display = 'block';
        document.getElementById('returnToCanvas-btn').style.display = 'block';
    });

    document.getElementById('returnToCanvas-btn').addEventListener('click', function() {
        canvas.style.display = 'block';
        photo.style.display = 'none';
        document.getElementById('post-final').style.display = 'none';
        document.getElementById('finalize-btn').style.display = 'block';
        document.getElementById('returnToWebcam-btn').style.display = 'block';
        document.getElementById('post-btn').style.display = 'none';
        document.getElementById('returnToCanvas-btn').style.display = 'none';
    });

})();