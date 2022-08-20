document.addEventListener("DOMContentLoaded", () => {
    let client = document.querySelectorAll('input[name="client"]');
    client.forEach(function (e){
        e.onclick = function () {
            changeAddForm(this.value);
        }
    })
});


function changeAddForm(value) {
    let req = new XMLHttpRequest();
    let token = document.querySelector('meta[name="csrf-token"]').content;
    let data = 'client=' + value;
    req.open('Post', '/record/form-view', true);
    req.setRequestHeader('X-CSRF-TOKEN', token);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    req.onload = function (e) {
        if (req.readyState === 4) {
            if (req.status === 200) {
                document.querySelector('#record-add-form').innerHTML = req.responseText;
            } else {
                console.error(req.statusText);
            }
        }
    };
    req.onerror = function (e) {
        console.error(req.statusText);
    };
    req.send(data);

}
