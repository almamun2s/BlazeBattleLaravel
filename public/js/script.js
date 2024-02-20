const dataUpdated = document.querySelector('.bb-data-updated');

dataUpdated.addEventListener('click', function(){
    dataUpdated.classList.add('bb-hide');
});

setTimeout(() => {
    dataUpdated.classList.add('bb-hide');
}, 5000);