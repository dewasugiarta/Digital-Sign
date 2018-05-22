function getUserDetail(uname){
    $.get('./process/user/read-user.php',{
        username:uname
    }, function(data){
        data = JSON.parse(data)
        data = data[0]

        $("#update-nama").val(data.nama)
        $("#update-nik").val(data.nik)
        $("#update-pangkat-golongan").val(data.pangkat_golongan)
        $("#update-jabatan").val(data.jabatan)
        $("#update-instansi").val(data.instansi)
        // $("#update-opd").val(data.id_opd)
        $("#update-email").val(data.email)
        $("#update-telepon").val(data.telepon)

        //get list opd into selection list
        getOPD(data.id_opd)

        //show modal
        $("#update-profile").modal()

    })
}

function getOPD(id){
    $.get('./process/user/read-opd.php',{},function(data){
        data = JSON.parse(data)
        data = data.map(opd=>{
            return(
                `<option value="${opd.id_opd}" ${opd.id_opd==id?'selected':''}>${opd.nama_opd}</option>`
            )
        })

        $("#update-opd").html(data)
    })
}

function handleUpdateProfile(){
    let conf = confirm('Update infromasi profile?')

    if(!conf){
        $("#update-profile").modal('hide')
        return false
    }else{
        return true
    }
}
