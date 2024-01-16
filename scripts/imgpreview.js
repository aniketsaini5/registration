//image previewer
function previewImage(input) {
    const fileInput = input;
    const previewImage = input.id === 'passportPhoto' ? document.getElementById('passportPhotoPreview') : document.getElementById('signImagePreview');

    const file = fileInput.files[0];

    if (file) {
        // Check file type
        const fileType = file.type;
        if (fileType !== 'image/png' && fileType !== 'image/jpeg') {
            alert('Please upload a PNG or JPEG image.');
            fileInput.value = ''; // Clear the input field
            return;
        }

        // Check file size
        const fileSize = file.size;
        const maxSizeInBytes = 500 * 1024; // 500KB
        if (fileSize > maxSizeInBytes) {
            alert('File size exceeds the limit of 500KB.');
            fileInput.value = ''; // Clear the input field
            return;
        }

        const reader = new FileReader();

        reader.onload = function (e) {
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
        };

        reader.readAsDataURL(file);
    }
}

