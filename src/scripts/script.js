const elementPhotos = document.querySelector('.preview')
const elementFilesCountAlert = document.querySelector('#files-count-alert')
const input = document.querySelector("input");
const preview = document.querySelector(".preview");

input.style.opacity = 0;

input.addEventListener("change", updateImageDisplay);

function updateImageDisplay() {
    while (preview.firstChild) {
    preview.removeChild(preview.firstChild);
    }

    const curFiles = input.files;
    if (curFiles.length === 0) {
    const para = document.createElement("p");
    preview.appendChild(para);
    } else if (curFiles.length !== 5) {
        elementPhotos.value = ''
        const para = document.createElement("p");
        preview.appendChild(para);
        elementFilesCountAlert.classList.remove('hidden')
    } else {
        elementFilesCountAlert.classList.add('hidden')

        const list = document.createElement("ol");
        preview.appendChild(list);

        for (const file of curFiles) {
            const listItem = document.createElement("li");
            const para = document.createElement("p");
            if (validFileType(file)) {
            para.textContent = ``;
            const image = document.createElement("img");
            image.src = URL.createObjectURL(file);
            image.alt = image.title = file.name;

            listItem.appendChild(image);
            listItem.appendChild(para);
            } else {
            para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
            listItem.appendChild(para);
            }

            list.appendChild(listItem);
        }
    }
}

const fileTypes = [
    "image/apng",
    "image/bmp",
    "image/gif",
    "image/jpeg",
    "image/pjpeg",
    "image/png",
    "image/svg+xml",
    "image/tiff",
    "image/webp",
    "image/x-icon",
];

function validFileType(file) {
    return fileTypes.includes(file.type);
}