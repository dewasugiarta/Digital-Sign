function checkSizeKtp(){
    var file = $("#ktp").prop('files')[0]
    let fileSize = file.size
    let fileName = file.name
    let fileExt = fileName.split('.')
    fileExt = fileExt[fileExt.length-1]

    //allowed datatype
    let allowedExt = ['jpg','jpeg']
    console.log(file)

    //verify if filesize not exceeding 2mb
    if(fileSize >2000000){
        alert('Ukuran file melebihi batas!')
        $("#ktp").val('');
        return false;
    }else if(!allowedExt.includes(fileExt)){
        //verify if datatype allowed
        alert('Pastikan format file .jpg atau .jpeg')
        $("#ktp").val('');
        return false;
    }else{
        return true;
    }
}

function checkPdf(){
    var file = $("#surat").prop('files')[0]
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
        $("#surat").val('');
        return false;
    }else if(!allowedExt.includes(fileExt)){
        //verify if datatype allowed
        alert('Pastikan format file .pdf')
        $("#surat").val('');
        return false;
    }else{
        return true;
    }
}
