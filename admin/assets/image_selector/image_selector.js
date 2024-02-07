
document.addEventListener('DOMContentLoaded', function () {
    const imageContainer = document.getElementById('imageContainer');

    // Fetch image options from the server (PHP endpoint)
    fetchImageOptions();

    // Handle file input change (when local image is selected)

    // Handle drag and drop
    imageContainer.addEventListener('dragover', handleDragOver);
    imageContainer.addEventListener('drop', handleFileDrop);
});

function fetchImageOptions() {
    // Use AJAX to get image options from the server (PHP endpoint)
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                updateImageContainer(data);
            } else {
                console.error('Error fetching image options:', xhr.statusText);
            }
        }
    };
    url=window.location.href;
    xhr.open('GET', url.substring(0,url.lastIndexOf('/'))+'/assets/image_selector/get_images.php', true);
    xhr.send();
}

function updateImageContainer(data) {
    const imageContainer = document.getElementById('imageContainer');
    imageContainer.innerHTML = ''; // Clear previous options
    // Iterate through the data and create image options
    if(data!=null){
    data.forEach(image => {
        const imgOption = document.createElement('div');
        imgOption.className = 'imgOption';
        csbg='url('+image.thumb_url+')'
        imgOption.style.backgroundImage = csbg;
        imgOption.addEventListener('click', () => selectImage(image,imgOption));

        imageContainer.appendChild(imgOption);
    });}
}

function handleFileSelect(event) {
    const files = event.target.files;
    for(i=0;i<files.length;i++)
    { const file = files[i];
        const allowedTypes = ['image/png', 'image/jpeg', 'image/webp'];

        if (allowedTypes.includes(file.type)) {
            // If the dropped file is one of the allowed image types, proceed with the upload
            uploadImage(file);
        } else {
            alert('Only PNG, JPG, and WebP image files are allowed.');
        }
    }
       
}

function handleDragOver(event) {
    event.preventDefault();
}

function handleFileDrop(event) {
    event.preventDefault();
    const files = event.dataTransfer.files;
    for(i=0;i<files.length;i++)
    { const file = files[i];
        const allowedTypes = ['image/png', 'image/jpeg', 'image/webp',  'image/svg+xml'];

        if (allowedTypes.includes(file.type)) {
            // If the dropped file is one of the allowed image types, proceed with the upload
            uploadImage(file);
        } else {
            alert('Only PNG, JPG, and WebP image files are allowed.');
        }
    }
    }
    

function uploadImage(file) {
    console.log(file.type)
    if(file.size<3145728){
    const formData = new FormData();
    formData.append('image', file);

    // Use AJAX to upload the image to the server (PHP endpoint)
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                // After successful upload, fetch updated image options
                fetchImageOptions();
                // Optionally, set the newly uploaded image as the selected option
            } else {
                console.error('Error uploading image:', xhr.statusText);
            }
        }
    };
    url=window.location.href;
    xhr.open('POST', url.substring(0,url.lastIndexOf('/'))+'/assets/image_selector/upload_image.php', true);
    xhr.send(formData);
}
else
alert('Files Size should be less than 3 MB')
}

function selectImage(image,imgele) {
    // Implement the logic to highlight the selected image
    img_id=document.querySelector('#img_id');
    img_id.value=image.id;
    allimgopt= document.querySelectorAll('.selected');
    allimgopt.forEach(opt => {
        opt.classList.remove('selected');
    });
    imgele.classList.add('selected');
}