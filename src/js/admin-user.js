//auto make username
function getUsername(){
    var nama = $('#addNama').val();
    var getRandom = Math.floor(Math.random() * (999 - 111 + 1) + 111);
    var username = nama.replace(/\s/g,'').toLowerCase().substring(0, 10)+getRandom;
    $('#addUsername').val(username);
}

//validate userId
function validateData(command,id){
    $.post('process/admin/validateDataUser.php',{
        id : id
    }, function(data){
        console.log(data);
        if(data > 0){
            $('#messageNIP').html('data sudah ada!');
        }else {
            $('#messageNIP').html('');
        }
    })
}

function getDetailUser(id){
    $.get('./process/admin/read-user.php',{
        iduser : id
    }, function(data){
        data = JSON.parse(data)
        data = data[0]
        console.log(data);
        $('input[name=updateNama]').val(data.nama).prop('readonly', true);
        $('input[name=updateNIP]').val(data.iduser).prop('readonly', true);
        $('input[name=updateNIK').val(data.nik).prop('readonly', true);
        $('input[name=updateInstansi').val(data.instansi).prop('readonly', true);
        $('input[name=updatePangkat]').val(data.pangkat_golongan).prop('readonly', true);
        $('input[name=updateJabatan]').val(data.jabatan).prop('readonly', true);
        $('input[name=updateEmail]').val(data.email).prop('readonly', true);
        $('input[name=updateUsername').val(data.username).prop('readonly', true);
        $('input[name=updateTelepon').val(data.telepon).prop('readonly', true);
        $('select[name=updateOPD').val(data.id_opd).prop('readonly', true);
        $('#updateToggle').prop('checked', false);
        $('#btnUpdate').hide()
        $('#update-user').modal('show')
    })
}

function onUpdate(checkboxElem) {
    if (checkboxElem.checked) {
        $('#updateNama').prop('readonly', false);
        $('#updateNIK').prop('readonly', false);
        $('#updateJabatan').prop('readonly', false);
        $('#updatePangkat').prop('readonly', false);
        $('#updateInstansi').prop('readonly', false);
        $('#updateEmail').prop('readonly', false);
        $('#updateTelepon').prop('readonly', false);
        $('#updateOPD').attr("readonly", false);
        $('#btnUpdate').show();

    } else {
        $('#updateNama').prop('readonly', true);
        $('#updateNIK').prop('readonly', true);
        $('#updateJabatan').prop('readonly', true);
        $('#updatePangkat').prop('readonly', true);
        $('#updateInstansi').prop('readonly', true);
        $('#updateEmail').prop('readonly', true);
        $('#updateTelepon').prop('readonly', true);
        $('#updateOPD').attr('readonly', true);
        $('#btnUpdate').hide()
    }
}
