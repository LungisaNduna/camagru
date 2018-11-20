(function() {
    var wc_display = document.getElementById('webcam_dis');
    var vendorURL = window.URL || window.webkitURL;
    var canvas = document.getElementById('capture_dis');
    var context = canvas.getContext('2d');
    var photo = document.getElementById('photo_dis');
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
        
    });

    document.getElementById('capture-btn').addEventListener('click', function() {
        context.drawImage(wc_display, 0, 0, 400, 300);
        stepOneDisplay('none');
        stepTwoDisplay('block');
    });

    /*function updateImage() {
        if (document.getElementById('optDog').checked) {
            alert("dog overlay picked");
            loadOverlay("./posting_pages/overlays/dog.png");
        }
        else if (document.getElementById('optMin').checked) {
            alert("minion overlay picked");
            loadOverlay("./posting_pages/overlays/minion.png");
        }
        else if (document.getElementById('optXmas').checked) {
            alert("christmas overlay picked");
            loadOverlay("./posting_pages/overlays/christmas.png");
        }
    }*/

    /*function loadOverlay(file) {
        var olImg = new Image();

        olImg.src = file;
        alert("about to load"+file);
        olImg.onload = function(ev) {
            context.drawImage(ev.target, 0, 0)
        }
    }*/

    

    

    document.getElementById('returnToWebcam-btn').addEventListener('click', function() {
        stepOneDisplay('block');
        stepTwoDisplay('none');
    });

    document.getElementById('finalize-btn').addEventListener('click', function() {
        photo.setAttribute('src', canvas.toDataURL('image/png'));
        stepThreeDisplay('block');
        stepTwoDisplay('none');
    });

    document.getElementById('returnToCanvas-btn').addEventListener('click', function() {
        stepThreeDisplay('none');
        stepTwoDisplay('block');
    });

})();