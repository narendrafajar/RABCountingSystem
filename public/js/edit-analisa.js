// const pekerjaShow = () => {
//     $('.dataPekerja').show();
//     $('#btn-show-pekerja').hide('slow');
// }

function getPekerja(){
    let pekerja = $('#pekerja option:selected').val();
    let idPekerja = $('#idpekerjaan').val();
    $.ajax({
        url : '/setting/analisa-pekerjaan/getPekerja',
        type : 'GET',
        data :{
            pekerja : pekerja,
            idPekerjaan : idPekerja
        },
        dataType : "json",
        success : function(data){
            let harga = parseFloat(data.harga);
            let koefisien = data.koefisien == null ? 0 : parseFloat(data.koefisien) ;
            $('#koefisien').val(koefisien.toLocaleString('id-ID',{minimumFractionDigits: 3, maximumFractionDigits: 3}));
            $('#harga').val(harga.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}));
            
        }
    })
}