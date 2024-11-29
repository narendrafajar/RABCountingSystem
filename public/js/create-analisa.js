const jenisPekerjaan = () => {
    let jenis = $('#jenis_pekerjaan option:selected').val();
    if(jenis == '0'){
        $('#perlengkapanLandscape').show('slow');
        $('#transportasi_row').show('slow');
        $('#perawatan_row').show('slow');
        $('#peralatan_row').hide('slow');
        $('#landscape').show('slow');
        $('#bangunan').hide('slow');
    } else {
        $('#perlengkapanLandscape').hide('slow');
        $('#transportasi_row').hide('slow');
        $('#perawatan_row').hide('slow');
        $('#peralatan_row').show('slow');
        $('#landscape').hide('slow');
        $('#bangunan').show('slow');
    }
}

$('#perlengkapan_bahan').on('change',function(){
    let perlengkapanValue = parseFloat($(this).val());
    
    $(this).val(perlengkapanValue.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}))
    $('#n_perlengkapan_bahan').val(perlengkapanValue);

    let jenis = $('#jenis_pekerjaan option:selected').val();
    let totalBahan = parseFloat($('#totalBahan').val());
    let n_perlengkapan = $('#n_perlengkapan_bahan').val();
    let perlengkapan = parseFloat(0);
        if(jenis == '0'){
            if(n_perlengkapan != "" || n_perlengkapan != null){
                perlengkapan = parseFloat($('n_perlengkapan_bahan').val());
            } else {
                perlengkapan = 0;
            }
        } else {
            perlengkapan = parseFloat($('n_perlengkapan_bahan').val(0));
        }
    let totalBahanPerlengkapan = totalBahan + perlengkapanValue;
    $("#totalHargaBahan").text(totalBahanPerlengkapan.toLocaleString('id-ID',{minimumFractionDigits : 2,maximumFractionDigits:2}))
    $('#totalBahan').val(parseFloat(totalBahanPerlengkapan))
    totalAnalisa();
});

const daftarPekerjaan = [];
const daftarBahan = [];
const daftarAlat = [];
let {
    tempIdPekerjaan,
    idPekerja,
    nmPekerja,
    kodePekerja,
    hargaPekerja,
    GHargaPekerja,
    koefisienPekerja,
    satuanPekerja,

    tempIdBahan,
    idBahan,
    nmBahan,
    kodeBahan,
    hargaBahan,
    GHargaBahan,
    koefisienBahan,
    satuanBahan,

    tempIdAlat,
    idAlat,
    nmAlat,
    kodeAlat,
    hargaAlat,
    GhargaAlat,
    koefisienAlat,
    satuanAlat,
} = 0;

const getUrl = window.location.href.split('/');

// console.log(getUrl);

const randomId = () => {
	return '_' + Math.random().toString(36).substr(2, 9);
}

const setInitialPekerja = () => {
    tempIdPekerjaan = randomId();
}

const setInitialBahan = () => {
    tempIdBahan = randomId();
}

const setInitialAlat = () => {
    tempIdAlat = randomId();
}

const resetFormPekerja = () => {
    tempIdPekerjaan = randomId();
    $('#pekerja').select2().val('');
    $('#harga_pekerja').val(0);
    $('#n_harga_pekerja').val(0);
    $('#koefiesien_pekerja').val(0);
}

const resetFormBahan = () => {
    tempIdBahan = randomId();
    $('#bahan').select2().val('');
    $('#harga_bahan').val(0);
    $('#n_harga_bahan').val(0);
    $('#koefisien_bahan').val(0);
}

const resetFormAlat = () => {
    tempIdAlat = randomId();
    $('#pekerja').select2().val('');
    $('#harga_pekerja').val(0);
    $('#koefiesien_pekerja').val(0);
}

const addToPekerjaList = () => {
    let idPekerja = $('#pekerja option:selected').val();
    let nmPekerja = $('#pekerja option:selected').data('deskripsi');
    let kodePekerja = $('#pekerja option:selected').data('kode');
    let satuanPekerja = $('#pekerja option:selected').data('satuan');
    let hargaPekerja = $('#harga_pekerja').val();
    let GHargaPekerja = $('#n_harga_pekerja').val();
    let koefisienPekerja = $('#koefisien_pekerja').val();

    if(tempIdPekerjaan == 0){
        messageAlert('Terjadi kesalahan saat mendapatkan id ', 1);
		return false;
    }

    const newDataPekerja = {
        tempIdPekerjaan,
        idPekerja,
        nmPekerja,
        kodePekerja,
        hargaPekerja,
        GHargaPekerja,
        koefisienPekerja,
        satuanPekerja
    }

    daftarPekerjaan.push(newDataPekerja);
    const isSuccess = daftarPekerjaan.filter((w) => w.tempIdPekerjaan === tempIdPekerjaan).length > 0;

    if(isSuccess){
        resetFormPekerja();
    } else {
        messageAlert('Data Pekerja tidak dapat ditambahkan',1);
    }
    console.log(daftarPekerjaan);
    loadDataPekerja();
}

const loadDataPekerja = () => {
    $('#pekerjaanTbody').html('');
    if(daftarPekerjaan.length > 0){
        let totalPekerjaan = 0;
        let subtotalPekerjaan = 0;
        for(const element of daftarPekerjaan){
            subtotalPekerjaan = parseFloat(element.GHargaPekerja) * parseFloat(element.koefisienPekerja);
            totalPekerjaan += subtotalPekerjaan;
            $('#pekerjaanTbody').append(`<tr id="${element.tempIdPekerjaan}">`
            +`<td>${element.nmPekerja}</td>`
            +`<td class="text-center">${element.kodePekerja}</td>`
            +`<td class="text-center">${element.satuanPekerja}</td>`
            +`<td class="text-end">${element.koefisienPekerja}</td>`
            +`<td class="text-end">${element.hargaPekerja}</td>`
            +`<td class="text-end">${subtotalPekerjaan.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>`
            + `<td>`
				+ `<a href="#" onclick="removePekerja('${element.tempIdPekerjaan}')" class="btn btn-icon btn-red btn-sm w-100">`
				+ `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">`
				+ `<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>`
				+ `<path d="M4 7h16"></path>`
				+ `<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>`
				+ `<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>`
				+ `<path d="M10 12l4 4m0 -4l-4 4"></path>`
				+ `</svg>`
				+ `</a>`
			+ `</td>`
            +`</tr>`)
        }
        $('#totalHargaPekerja').text(totalPekerjaan.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}))
        resetFormPekerja();
        $('#totalPekerjaan').val(totalPekerjaan);
        totalAnalisa();

    } else {
        $("#pekerjaanTbody").html('<tr>'
        +'<td colspan="7" class="text-center">'
        +'<p class="empty-subtitle text-muted">'
        +'Data Masih Kosong'
        +'</p>'
        +'</div>'
        +'</td>'
        +'</tr>');
        $('#totalHargaPekerja').text(0)
    }
}

const removePekerja = (tempIdPekerjaan) => {
    event.preventDefault();
    const index = daftarPekerjaan.findIndex((q) => q.tempIdPekerjaan === tempIdPekerjaan);

	if (index !== -1) {
		daftarPekerjaan.splice(index, 1);
		//sisaLuasLahanEfektif = countSisaLahanEfektif();
		//$("#input_luas_lahan_efektif").val(sisaLuasLahanEfektif);
	} else {
		messageAlert('Data titipan tidak dapat dihapus', 1);
	}

	loadDataPekerja();
}

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
            $('#koefisien_pekerja').val(koefisien.toLocaleString('id-ID',{minimumFractionDigits: 3, maximumFractionDigits: 3}));
            $('#harga_pekerja').val(harga.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#n_harga_pekerja').val(harga);

            if (getUrl[4] == 'analisa-pekerjaan') {
                window.addEventListener("load", setInitialPekerja);
            }
        }
    })
}
function getBahan(){
    tempIdBahan = randomId();
    let bahan = $('#bahan option:selected').val();
    let idBahan = $('#idBahan').val();
    $.ajax({
        url : '/setting/analisa-pekerjaan/getBahan',
        type : 'GET',
        data :{
            bahan : bahan
        },
        dataType : "json",
        success : function(data){
            let harga_bahan = parseFloat(data.harga_bahan);
            $('#harga_bahan').val(harga_bahan.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#n_harga_bahan').val(harga_bahan);
            $('#koefisien_bahan').val(0);

            if (getUrl[4] == 'analisa-pekerjaan') {
                window.addEventListener("load", setInitialBahan);
            }
        }
    });
}
function getPeralatan(){
    tempIdAlat = randomId();
    let alat = $('#alat option:selected').val();
    $.ajax({
        url : '/setting/analisa-pekerjaan/getAlat',
        type : 'GET',
        data :{
            alat : alat
        },
        dataType : "json",
        success : function(data){
            let harga_peralatan = parseFloat(data.harga_alat);
            $('#harga_peralatan').val(harga_peralatan.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}));
            $('#n_harga_peralatan').val(harga_peralatan);
            $('#koefisien_bahan').val(0.000);

            if (getUrl[4] == 'analisa-pekerjaan') {
                window.addEventListener("load", setInitialAlat);
            }
        }
    });
}

const addToBahanList = () => {
    let idBahan = $('#bahan option:selected').val();
    let nmBahan = $('#bahan option:selected').data('nama');
    let kodeBahan = $('#bahan option:selected').data('kode');
    let satuanBahan = $('#bahan option:selected').data('satuan');
    let hargaBahan = $('#harga_bahan').val();
    let GHargaBahan = $('#n_harga_bahan').val();
    let koefisienBahan = $('#koefisien_bahan').val();

    if(tempIdBahan == 0){
        messageAlert('Terjadi kesalahan saat mendapatkan id ', 1);
		return false;
    }

    const newDataBahan = {
        tempIdBahan,
        idBahan,
        nmBahan,
        kodeBahan,
        hargaBahan,
        GHargaBahan,
        koefisienBahan,
        satuanBahan
    }

    daftarBahan.push(newDataBahan);
    const isSuccess = daftarBahan.filter((w) => w.tempIdBahan === tempIdBahan).length > 0;

    if(isSuccess){
        resetFormBahan();
    } else {
        messageAlert('Data Pekerja tidak dapat ditambahkan',1);
    }
    console.log(daftarBahan);
    loadDataBahan();
}

const loadDataBahan = () => {
    $('#bahanTbody').html('');
    if(daftarBahan.length > 0){
        let totalBahan = 0;
        let subtotalBahan = 0;
        for(const element of daftarBahan){
            subtotalBahan = parseFloat(element.GHargaBahan) * parseFloat(element.koefisienBahan);
            totalBahan += subtotalBahan;
            $('#bahanTbody').append(`<tr id="${element.tempIdBahan}">`
            +`<td>${element.nmBahan}</td>`
            +`<td class="text-center">${element.kodeBahan}</td>`
            +`<td class="text-center">${element.satuanBahan}</td>`
            +`<td class="text-end">${element.koefisienBahan}</td>`
            +`<td class="text-end">${element.hargaBahan}</td>`
            +`<td class="text-end">${subtotalBahan.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>`
            + `<td>`
				+ `<a href="#" onclick="removeBahan('${element.tempIdBahan}')" class="btn btn-icon btn-red btn-sm w-100">`
				+ `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">`
				+ `<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>`
				+ `<path d="M4 7h16"></path>`
				+ `<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>`
				+ `<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>`
				+ `<path d="M10 12l4 4m0 -4l-4 4"></path>`
				+ `</svg>`
				+ `</a>`
			+ `</td>`
            +`</tr>`)
        }
        // console.log(n_perlengkapan);
        // console.log(perlengkapanValue);
        // console.log(totalBahanPerlengkapan);
        // console.log(totalBahan);
        $('#totalHargaBahan').text(totalBahan.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}))
        resetFormBahan();
        $('#totalBahan').val(totalBahan);
        totalAnalisa();

    } else {
        $("#bahanTbody").html('<tr>'
        +'<td colspan="7" class="text-center">'
        +'<p class="empty-subtitle text-muted">'
        +'Data Masih Kosong'
        +'</p>'
        +'</div>'
        +'</td>'
        +'</tr>');
        $('#totalHargaBahan').text(0)
    }
}

const removeBahan = (tempIdBahan) => {
    event.preventDefault();
    const index = daftarBahan.findIndex((q) => q.tempIdBahan === tempIdBahan);

	if (index !== -1) {
		daftarBahan.splice(index, 1);
		//sisaLuasLahanEfektif = countSisaLahanEfektif();
		//$("#input_luas_lahan_efektif").val(sisaLuasLahanEfektif);
	} else {
		messageAlert('Data bahan tidak dapat dihapus', 1);
	}

	loadDataBahan();
}

const addToAlatList = () => {
    let idAlat = $('#alat option:selected').val();
    let nmAlat = $('#alat option:selected').data('nama');
    let kodeAlat = $('#alat option:selected').data('kode');
    let satuanAlat = $('#alat option:selected').data('satuan');
    let hargaAlat = $('#harga_peralatan').val();
    let GhargaAlat = $('#n_harga_peralatan').val();
    let koefisienAlat = $('#koefisien_peralatan').val();

    if(tempIdAlat == 0){
        messageAlert('Terjadi kesalahan saat mendapatkan id ', 1);
		return false;
    }

    const newDataBahan = {
        tempIdAlat,
        idAlat,
        nmAlat,
        kodeAlat,
        hargaAlat,
        GhargaAlat,
        koefisienAlat,
        satuanAlat
    }

    daftarBahan.push(newDataBahan);
    const isSuccess = daftarBahan.filter((w) => w.tempIdBahan === tempIdBahan).length > 0;

    if(isSuccess){
        resetFormBahan();
    } else {
        messageAlert('Data Pekerja tidak dapat ditambahkan',1);
    }
    console.log(daftarBahan);
    loadDataAlat();
}

const loadDataAlat = () => {
    $('#AlatTbody').html('');
    if(daftarBahan.length > 0){
        let totalBahan = 0;
        let subtotalBahan = 0;
        for(const element of daftarBahan){
            subtotalBahan = parseFloat(element.GHargaBahan) * parseFloat(element.koefisienBahan);
            totalBahan += subtotalBahan;
            $('#AlatTbody').append(`<tr id="${element.tempIdBahan}">`
            +`<td>${element.nmBahan}</td>`
            +`<td class="text-center">${element.kodeBahan}</td>`
            +`<td class="text-center">${element.satuanBahan}</td>`
            +`<td class="text-end">${element.koefisienBahan}</td>`
            +`<td class="text-end">${element.hargaBahan}</td>`
            +`<td class="text-end">${subtotalBahan.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>`
            + `<td>`
				+ `<a href="#" onclick="removeBahan('${element.tempIdBahan}')" class="btn btn-icon btn-red btn-sm w-100">`
				+ `<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">`
				+ `<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>`
				+ `<path d="M4 7h16"></path>`
				+ `<path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>`
				+ `<path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>`
				+ `<path d="M10 12l4 4m0 -4l-4 4"></path>`
				+ `</svg>`
				+ `</a>`
			+ `</td>`
            +`</tr>`)
        }
        // console.log(n_perlengkapan);
        // console.log(perlengkapanValue);
        // console.log(totalBahanPerlengkapan);
        // console.log(totalBahan);
        $('#totalHargaAlat').text(totalBahan.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}))
        resetFormBahan();
        $('#totalAlat').val(totalBahan);
        totalAnalisa();

    } else {
        $("#AlatTbody").html('<tr>'
        +'<td colspan="7" class="text-center">'
        +'<p class="empty-subtitle text-muted">'
        +'Data Masih Kosong'
        +'</p>'
        +'</div>'
        +'</td>'
        +'</tr>');
        $('#totalHargaAlat').text(0)
    }
}

const removeAlat = (tempIdBahan) => {
    event.preventDefault();
    const index = daftarBahan.findIndex((q) => q.tempIdBahan === tempIdBahan);

	if (index !== -1) {
		daftarBahan.splice(index, 1);
		//sisaLuasLahanEfektif = countSisaLahanEfektif();
		//$("#input_luas_lahan_efektif").val(sisaLuasLahanEfektif);
	} else {
		messageAlert('Data bahan tidak dapat dihapus', 1);
	}

	loadDataAlat();
}


$('#transportasi').on('change',function(){
    let transportasiValue = parseFloat($(this).val());

    $('#n_transportasi').val(transportasiValue);

    let jenis = $('#jenis_pekerjaan option:selected').val();
    let nominalTransportasi = 0;
    if(jenis == 0){
        $(this).val(transportasiValue.toLocaleString('id-ID',{minimumFractionDigits:2,maximumFractionDigits:2}));
        nominalTransportasi = parseFloat($('#n_transportasi').val());
    } else {
        $(this).val(0);
        nominalTransportasi = parseFloat(0);
    }

    totalAnalisa();
});

$('#perawatan').on('change',function(){
    let perawatanValue = parseFloat($(this).val());

    $('#n_perawatan').val(perawatanValue);

    let jenis = $('#jenis_pekerjaan option:selected').val();
    let nominalPerawatan = 0;
    if(jenis == 0){
        $(this).val(perawatanValue.toLocaleString('id-ID',{minimumFractionDigits:2,maximumFractionDigits:2}));
        nominalPerawatan = parseFloat($('#n_transportasi').val());
    } else {
        $(this).val(0);
        nominalPerawatan = parseFloat(0);
    }

    totalAnalisa();
});

const totalAnalisa = () => {
    let n_transportasi = isNaN(parseFloat($('#n_transportasi').val())) ? parseFloat(0) : parseFloat($('#n_transportasi').val());
    let n_perawatan = isNaN(parseFloat($('#n_perawatan').val())) ? parseFloat(0) : parseFloat($('#n_perawatan').val());
    let totalPekerjaan = isNaN(parseFloat($('#totalPekerjaan').val())) ? parseFloat(0) : parseFloat($('#totalPekerjaan').val());
    let totalBahan = parseFloat($('#totalBahan').val());
    let totalAlat = parseFloat(0);

    let totalAnalisaPekerjaan = totalPekerjaan + totalBahan + totalAlat + n_perawatan + n_transportasi;
    let profitAnalisa = totalAnalisaPekerjaan * 0.10;
    let totalBersihAnalisa = totalAnalisaPekerjaan + profitAnalisa;


    $('#totalKotor').text(totalAnalisaPekerjaan.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}))
    $('#profit').text(profitAnalisa.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}))
    $('#totalAll').text(totalBersihAnalisa.toLocaleString('id-ID',{minimumFractionDigits: 2, maximumFractionDigits: 2}))
}

const submitAnalisa = () => {
    
}

