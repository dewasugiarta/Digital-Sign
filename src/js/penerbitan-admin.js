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

function validasi(id){
    let conf = confirm('Approve Pengajuan Penerbitan?')
    if(conf){
        //update status pengajuan 0 => 3
    
        $.post('./process/admin/update-penerbitan.php',{
            id:id,
            status:3
        }, function(data){
            location.reload()
        })
    }
}

function getIdKomentar(id){
    $("#id-hidden").val(id)
    //open modal after value assign
    $("#add-comment").modal()
}

function add_comment(){
    let conf = confirm('Tambahkan revisi pada pegajuan?')
    if(conf){
        return true
    }else return false
}


//load data revisi, resubmit dan verified
//revisi =1, resubmit = 2, verified =3

function show_pengajuan(status){
    $.get('./process/admin/read-penerbitan-by-status.php',{
        status:status
    }, function(data){
        data = JSON.parse(data)
        
        let head = status!=4? `
                        <br>
                        <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Nama User</th>
                            <th>Nama Pengaju</th>
                            <th>NIP</th>
                            <th>Unit Kerja</th>
                            <th>Sistem</th>
                            <th>Kegunaan</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                    `:
                    `
                        <br>
                        <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                            <th>Nama User</th>
                            <th>Nama Pengaju</th>
                            <th>NIP</th>
                            <th>Unit Kerja</th>
                            <th>Sistem</th>
                            <th>Kegunaan</th>
                            <th>Tanggal Terbit</th>
                            <th>Berlaku Sampai</th>
                            </tr>
                        </thead>
                        <tbody>
                    `
                    
        let foot = ` </tbody>
                     </table>`
        if(data.length<1){
            var row = '<h2>KOSONG</h2>'
        }else{
            row = data.map(item=>{
                if(item.status==1||item.status==2){
                    return (
                        `
                            <tr>
                                <td>${item.nama_user}</td>
                                <td>${item.nama}</td>
                                <td>${item.nip}</td>
                                <td>${item.nama_opd}</td>
                                <td>${item.sistem}</td>
                                <td>${item.kegunaan}</td>
                                <td>
                                <button class="btn btn-sm" data-toggle="modal" data-target="#detail-pengajuan" onclick="getDetailPengajuan(${item.id})">
                                    <i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="detail"></i>
                                </button>
                                <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Validasi" onclick="validasi(${item.id})">
                                    <i class="fa fa-check"></i>
                                </button>
                                <button class="btn btn-sm"  data-toggle="tooltip" data-placement="top" title="Beri Pesan" onclick="getIdKomentar(${item.id})">
                                    <i class="fa fa-comment"></i>
                                </button>
                                <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" onclick="deletePengajuan(${item.id})" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                                </td>
                            </tr>
                        `

                    )
                }else if(item.status==3){
                    return (
                        `
                            <tr>
                                <td>${item.nama_user}</td>
                                <td>${item.nama}</td>
                                <td>${item.nip}</td>
                                <td>${item.nama_opd}</td>
                                <td>${item.sistem}</td>
                                <td>${item.kegunaan}</td>
                                <td>
                                <button class="btn btn-sm" data-toggle="modal" data-target="#detail-pengajuan" onclick="getDetailPengajuan(${item.id})">
                                    <i class="fa fa-info" data-toggle="tooltip" data-placement="top" title="detail"></i>
                                </button>
                                <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" title="Validasi" onclick="validasi(${item.id})">
                                    <i class="fa fa-check"></i>
                                </button>
                                <button class="btn btn-sm"  data-toggle="tooltip" data-placement="top" title="Beri Pesan" onclick="getIdKomentar(${item.id})">
                                    <i class="fa fa-comment"></i>
                                </button>
                                <button class="btn btn-sm" data-toggle="tooltip" data-placement="top" onclick="deletePengajuan(${item.id})" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <button class="btn btn-sm" data-toggle="modal" data-target="#terbitkan-pengajuan" onclick="getIdTerbit(${item.id})" >
                                    <i class="fa fa-calendar-check-o" data-toggle="tooltip" data-placement="top" title="Terbitkan"></i>
                                </button>
                                </td>
                            </tr>
                        `

                    )
                }else if(item.status==4){
                    return (
                        `
                            <tr>
                                <td>${item.nama_user}</td>
                                <td>${item.nama}</td>
                                <td>${item.nip}</td>
                                <td>${item.nama_opd}</td>
                                <td>${item.sistem}</td>
                                <td>${item.kegunaan}</td>
                                <td>${parseDate(item.tanggal_terbit)}</td>
                                <td>${getExpireDate(item.tanggal_terbit)}</td>
                            </tr>
                        `

                    )
                }
        })
    }
        
        let table = head+row+foot
        $("#m"+status).html(table)
    })

}


function deletePengajuan(id){
    let conf = confirm('Hapus pengajuan ini?')

    if(conf){
        $.post('./process/admin/delete-penerbitan.php',{
            id:id
        }, function(data){
            data = JSON.parse(data)
        })
    }
}


function terbitkan(){
    let conf = confirm('Terbitkan pengajuan?');
    conf ==true?true:false
}

function getIdTerbit(id){
    $("#id-terbit").val(id)
    //open modal after value assign
    // $("#terbitkan-pengajuan").modal()
}

function parseDate(tgl){
    let newTgl = tgl.split('-')
    let year = newTgl[0]
    let mon = newTgl[1]
    let date = newTgl[2]

    return(date+'-'+mon+'-'+year) 
}

function getExpireDate(tgl){
    newTgl = parseDate(tgl)
    newTgl = newTgl.split('-')
    let year = parseInt(newTgl[2])+2
    let mon = newTgl[1]
    let date = newTgl[0]
    
    return(date+'-'+mon+'-'+year)
}