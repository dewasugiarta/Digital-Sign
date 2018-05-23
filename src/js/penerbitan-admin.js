function getDetailPengajuan(id){

    $.get('./process/admin/read-penerbitan.php',{
        id:id
    }, function(data){
        data = JSON.parse(data)
        data = data[0]

        $("#nama-user").html(data.nama_user)
        $("#nama-pengaju").html(data.nama)
        $("#nip").html(data.nip)
        $("#nik").html(data.nik)
        $("#pangkat-golongan").html(data.pangkat_golongan)
        $("#jabatan").html(data.jabatan)
        $("#instansi").html(data.instansi)
        $("#kota").html(data.kota)
        $("#provinsi").html(data.provinsi)
        $("#opd").html(data.nama_opd)
        $("#email").html(data.email)
        $("#kegunaan").html(data.kegunaan)
        $("#sistem").html(data.sistem)
    
        $("#ktp").val(data.id)
        $("#surat").val(data.id)
    })
}


function open_ktp(id){ 
    window.open('pages/preview-ktp.php?id='+id)
}

function open_surat(id){
    window.open('pages/preview-surat.php?id='+id)
}