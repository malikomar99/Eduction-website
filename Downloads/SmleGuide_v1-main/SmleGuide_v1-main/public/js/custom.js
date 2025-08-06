
// Attach event listeners dynamically to all file inputs with "data-preview" attribute
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("input[type='file'][data-preview]").forEach(input => {
        const previewId = input.getAttribute("data-preview");
        const previewElement = document.getElementById(previewId);

        if (!previewElement) {
            console.error(`Element with ID '${previewId}' not found.`);
            return;
        }

        // Click preview image to open file dialog
        previewElement.addEventListener("click", function () {
            input.click(); // Open file selection dialog
        });

        // Handle file selection
        input.addEventListener("change", function () {
            previewImage(this, previewId);
        });
    });
});


function previewImage(input, previewId) {
    if (!input.files || input.files.length === 0) {
        console.warn("No file selected.");
        return;
    }

    const file = input.files[0];
    const previewElement = document.getElementById(previewId);

    if (!previewElement) {
        console.error(`Element with ID '${previewId}' not found.`);
        return;
    }

    const reader = new FileReader();
    reader.onload = function (e) {
        previewElement.src = e.target.result;
    };
    reader.readAsDataURL(file);
}

