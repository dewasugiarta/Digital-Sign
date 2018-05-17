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
