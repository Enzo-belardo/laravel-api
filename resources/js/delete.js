const deleter = document.querySelectorAll('form.delete');

deleter.forEach((element) => {
    element.addEventListener('submit', function (event) {
        event.preventDefault();
        const dataElement = element.getAttribute('data-element');
        const confirmDelete = window.confirm(`sei sicuro di voler cancellare ${dataElement}`);
        if (confirmDelete){
            this.submit();
        } 
    } )
});