var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');



document.addEventListener('DOMContentLoaded', function () {
    if(route == "product_edit"){
        var btn_product_file_image = document.getElementById('btn_product_file_image');
        var product_file_image = document.getElementById('product_file_image');
        btn_product_file_image.addEventListener('click', function () {
            product_file_image.click();
        }, false);

        product_file_image.addEventListener('change', function () {
            document.getElementById('form_product_gallery').submit();
        });
    }
    route_active = document.getElementsByClassName('lk-'+route)[0].classList.add('active');
});

$(document).ready(function(){
    editor_init('editor');
})

function editor_init(field){
    CKEDITOR.replace(field,{
        toolbar: [
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            { name: 'links', groups: [ 'links' ] },
            { name: 'insert', groups: [ 'insert' ] },
            { name: 'forms', groups: [ 'forms' ] },
            { name: 'tools', groups: [ 'tools' ] },
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
            { name: 'others', groups: [ 'others' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'about', groups: [ 'about' ] }
        ]
    });
}
