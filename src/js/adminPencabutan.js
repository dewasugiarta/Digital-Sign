function terima(jenis,id, nip){
    let conf = confirm('Terima pengajuan ini?')
    if(conf){
        $.post('./process/admin/terimaPencabutan.php',{
            jenis,id,nip
        }, function(data){
            location.reload()
        })
    }
}

function as(x,y,z){
    console.log(z)
}

function tolak(id_pencabutan){
    let conf = confirm('Tolak pengajuan?')
    if(conf){
        $.post('./process/admin/tolakPencabutan.php',{
            id_pencabutan
        }, function(data){
            if(data==1){
                alert('Pengajuan ditolak')
                location.reload()
            }
        })
    }
}

function getAlasan(x){
    document.getElementById("alasan-pencabutan").innerHTML =x
}