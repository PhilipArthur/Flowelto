require('./bootstrap');

$(() => {
    if($('#notification').length > 0) {
        setTimeout(() => {
            $('.alert').alert('close');
            console.log('Close Notification');
        }, 6000, $('#notification'))
    }
});

$(`#image`).change((e) => {
    const displayed = $(`#displayed`)
    const reader = new FileReader();
    reader.onload = (el) => {
        displayed.attr('src',el.target.result)
    }
    reader.readAsDataURL(e.target.files[0])
})
