function handleFileChange(){
    var file = $("#new-template").prop('files')[0]
    let fileSize = file.size
    let fileName = file.name
    let fileExt = fileName.split('.')
    fileExt = fileExt[fileExt.length-1]
    
    //allowed datatype
    let allowedExt = ['doc', 'docx']
    console.log(file)

    //verify if filesize not exceeding 2mb
    if(fileSize >2000000){
        alert('Ukuran file melebihi batas!')
        $("#submit-new-template").prop('disabled', true)
    }else if(!allowedExt.includes(fileExt)){
        //verify if datatype allowed
        alert('Pastikan format file .doc atau .docx')
        $("#submit-new-template").prop('disabled', true)
    }else{
        $("#submit-new-template").prop('disabled', false)
    }
}

function handleTemplateSubmit(){
    let conf = confirm('test yakin?');
    if(conf==true){
        return true
    }else return false;
}