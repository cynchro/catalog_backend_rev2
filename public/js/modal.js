$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})

function setModalId(id){
    $('#idProduct').val(id);
}