function terima(jenis,id, nip){
    let conf = confirm('Terima pengajuan ini?')
    if(conf){
        $.post('./process/admin/terimaPencabutan.php',{
            jenis,id,nip
        }, function(data){
            // data = JSON.parse(data)
            // data = data[0]

            // if(JSON.parse(data)===1){
            //     alert('Berhasil menghapus!')
            //     location.reload();
            // }else{
            //     alert('Gagal menghapus!')
            // }
            // if(data==1){
            //     alert('Berhasil Diterima')
            //     location.reload()
            // }else{
            //     alert('Gagal Menerima')
            // }
            location.reload()
        })
    }
}


function tolak(x,y){
    console.log(x)
    console.log(y)
}

function getAlasan(x){
    document.getElementById("alasan-pencabutan").innerHTML =x
}