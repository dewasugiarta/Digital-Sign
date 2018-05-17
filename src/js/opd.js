function getDetailOPD(id){
    $.get('./process/admin/read-opd.php',{
        id_opd : id
    }, function(data){
        data = JSON.parse(data)
        data = data[0]

        $('input[name=edit-id-opd]').val(data.id_opd)
        $('input[name=edit-nama-opd]').val(data.nama_opd)
        $('input[name=edit-alamat-opd]').val(data.alamat_opd)
        $('input[name=edit-telepon-opd]').val(data.telepon_opd)
        $('input[name=edit-kepala-opd]').val(data.kepala_opd)
        $('input[name=edit-email-opd]').val(data.email_opd)

        $('#edit-opd').modal('show')
    })
}

function deleteOPD(id){
    let conf = confirm('Hapus item dari daftar OPD?');
    if(conf === true){
        $.post('./process/admin/delete-opd.php',{
            id_opd:id
        }, function(data){
            data = JSON.parse(data)
            data = data[0]

            if(JSON.parse(data)===1){
                alert('Berhasil menghapus!')
                location.reload();
            }else{
                alert('Gagal menghapus!')
            }
        })
    }
}