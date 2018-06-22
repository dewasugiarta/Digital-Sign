//push data to modal update
function getDetailUser(id){
    checkId(id);
}

function checkPdf(){
    var file = $("#suratPencabutan").prop('files')[0]
    let fileSize = file.size
    let fileName = file.name
    let fileExt = fileName.split('.')
    fileExt = fileExt[fileExt.length-1]

    //allowed datatype
    let allowedExt = ['pdf']
    console.log(file)

    //verify if filesize not exceeding 2mb
    if(fileSize >2000000){
        alert('Ukuran file melebihi batas!')
        $("#suratPencabutan").val('');
        return false;
    }else if(!allowedExt.includes(fileExt)){
        //verify if datatype allowed
        alert('Pastikan format file .pdf')
        $("#suratPencabutan").val('');
        return false;
    }else{
        return true;
    }
}

function checkId(id){
    $.get('./process/user/readListPencabutan.php',{
        id : id
    }, function(data){
        console.log(data);
        if(data[0]>0){
            alert('Data Sudah Diajukan');location.href='index.php?pageid=userPencabutan';
        }else {
            console.log(id);
            $.get('./process/user/readDataPencabutan.php',{
                id : id
            }, function(data){
                data = JSON.parse(data)
                data = data[0]
                console.log(data);
                $('#nama').html(data.nama);
                $('#nip').html(data.nip);
                $('#pangkat-golongan').html(data.pangkat_golongan);
                $('#jabatan').html(data.jabatan);
                $('#instansi').html(data.instansi);
                $('#opd').html(data.nama_opd);
                $('#kegunaan').html(data.kegunaan);
                $('#sistem').html(data.sistem);
                $('input[name=idUser]').val(data.iduser);
                $('input[name=idPengajuan]').val(data.id);
                // $('input[name=updateId]').val(data.id);
                // $('input[name=updateNama]').val(data.nama).prop('readonly', true);
                // $('input[name=updateNIP]').val(data.nip).prop('readonly', true);
                // $('input[name=updateNIK').val(data.nik).prop('readonly', true);
                // $('input[name=updateInstansi').val(data.instansi).prop('readonly', true);
                // $('input[name=updatePangkat]').val(data.pangkat_golongan).prop('readonly', true);
                // $('input[name=updateJabatan]').val(data.jabatan).prop('readonly', true);
                // $('input[name=updateKota]').val(data.kota).prop('readonly',true);
                // $('input[name=updateProvinsi]').val(data.provinsi).prop('readonly',true);
                // $('select[name=updateOPD').val(data.id_opd).prop('disabled', true);
                // $('input[name=updateEmail]').val(data.email).prop('readonly',true);
                // $('input[name=updateSistem]').val(data.sistem).prop('readonly',true);
                // $('select[name=updateKegunaan]').val(data.kegunaan).prop('disabled',true);
                // $("#previewKTP").attr("href", data.ktp)
                // $("#previewSurat").attr("data-id", data.id).attr("data-nip", data.nip).attr("data-get","surat");
                // $("#previewKTP").attr("data-id", data.id).attr("data-nip", data.nip).attr("data-get","ktp");
                // $('#updateKTP').hide();
                // $('#updateSurat').hide();
                // $('#updateToggle').prop('checked', false);
                // $('#btnUpdate').hide()
                //$('#list_data').modal('hide')
                $('#pencabutan_data').modal('show')

            })
        }
    })
}

function batalPencabutan(id_pencabutan, id){
    console.log(id_pencabutan);
    console.log(id);
    let conf = confirm('batalkan pengajuan?');
    if(conf === true){
       $.post('./process/user/deletePencabutan.php',{
            id_pencabutan:id_pencabutan,
            id:id
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


    
