const elementPhotos = document.querySelector('#photos')
const elementFilesCountAlert = document.querySelector('#files-count-alert')

elementPhotos.addEventListener('change', function() {
    const fileCount = this.files.length;
    if(fileCount != 5){
        elementPhotos.value = ''
        elementFilesCountAlert.classList.remove('hidden')
    } else {
        elementFilesCountAlert.classList.add('hidden')
    }
});