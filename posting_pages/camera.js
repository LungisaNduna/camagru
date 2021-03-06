(function() {
    var wc_display = document.getElementById('webcam_dis');
    var vendorURL = window.URL || window.webkitURL;
    var canvas = document.getElementById('capture_dis');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo_dis');
    var originalImage = document.getElementById('ogHolder');
    var uploadedfile = document.getElementById('uploadfile');
    
    function stepOneDisplay(display) {
        wc_display.style.display = display;
        document.getElementById('capture-btn').style.display = display;
        uploadedfile.style.display = display;
        document.getElementById('steponetext').style.display = display;
    }

    function stepTwoDisplay(display) {
        canvas.style.display = display;
        document.getElementById('finalize-btn').style.display = display;
        document.getElementById('returnToWebcam-btn').style.display = display;
        document.getElementById("overlay_options").style.display = display;
    }

    function stepThreeDisplay(display) {
        photo.style.display = display;
        document.getElementById('post-final').style.display = display;
        document.getElementById('post-btn').style.display = display;
        document.getElementById('returnToCanvas-btn').style.display = display;
        document.getElementById('imageAsText').style.display = 'none';
    }

    navigator.getMedia =    navigator.getUserMedia ||
                            navigator.webkitGetUserMedia ||
                            navigator.mozGetUserMedia ||
                            navigator.msGetUserMedia;
    
    navigator.getMedia({
        video: true,
        audio:false
    }, function(stream) {
        wc_display.src = vendorURL.createObjectURL(stream);
        wc_display.play();
    }, function (error) {
        //some error display if the webcam isn't functioning properly;
    });

    uploadedfile.addEventListener('change', function(ev) {
        stepTwoDisplay('block');
        var file = ev.target.files[0];
        var imageType = /image.*/;
        if (file.type.match(imageType)) {
            var reader = new FileReader();

            reader.onloadend = function(event) {
                var tempImg = new Image();
                tempImg.onload = function(ev) {
                    canvas.height = ev.target.height;
                    canvas.width = ev.target.width;
                    context.drawImage(ev.target, 0, 0);
                }
                tempImg.src = event.target.result;
            }
            reader.readAsDataURL(file);
        }
        stepOneDisplay('none');
        originalImage.setAttribute('src', canvas.toDataURL('image/png'));
    });

    document.getElementById('capture-btn').addEventListener('click', function() {
        context.drawImage(wc_display, 0, 0, 400, 300);
        originalImage.setAttribute('src', canvas.toDataURL('image/png'));
        stepOneDisplay('none');
        stepTwoDisplay('block');
    });
  
    document.getElementById('returnToWebcam-btn').addEventListener('click', function() {
        stepOneDisplay('block');
        stepTwoDisplay('none');
    });

    document.getElementById('finalize-btn').addEventListener('click', function() {
        photo.setAttribute('src', canvas.toDataURL('image/png'));
        document.getElementById("imageAsText").value = canvas.toDataURL('image/png');
        stepThreeDisplay('block');
        stepTwoDisplay('none');
    });

    document.getElementById('returnToCanvas-btn').addEventListener('click', function() {
        stepThreeDisplay('none');
        stepTwoDisplay('block');
    });

})();