let { deleteRoute, deleteId } = "";
var waktu = new Date();
var jam = waktu.getHours();

if (jam < 12) {
    $('#ucapan').text('Selamat Pagi');
} else if (jam < 18) {
    $('#ucapan').text('Selamat Siang');
} else {
    $('#ucapan').text('Selamat Malam');
}

$(".table-responsive").on("show.bs.dropdown", function () {
    $(".table-responsive").css("overflow", "inherit");
});
$(".table-responsive").on("hide.bs.dropdown", function () {
    $(".table-responsive").css("overflow", "auto");
});

$("body")
    .on("show.bs.dropdown", ".table-responsive", function () {
        $(this).css("overflow", "visible");
    })
    .on("hide.bs.dropdown", ".table-responsive", function () {
        $(this).css("overflow", "auto");
    });
function loadTable(tablename = "", page = 1) {
    event.preventDefault();
    var keyword = $("#search_" + tablename).val();
    var perpage = $("#perpage_" + tablename).val();
    var status = $("#status_" + tablename).val();
    var table_url = window.location.pathname;
    var table_page = table_url.split("/");
    let tableFilter = [];

    if (tablename == null || tablename == "") {
        var tablename = table_page[2];
    }

    // Jika di halaman tersebut terdapat filter tambahan,
    // maka menggunakan logic berikut

    if ($(".table-filter").length > 0) {
        $.each($(".table-filter"), function (index, val) {
            tableFilter.push($(this).val());
        });
    }

    $.ajax({
        url: window.location.pathname.replace(/\/$/, "") + "/loadTable",
        type: "get",
        data: {
            tableName: tablename,
            keyword: keyword,
            perPage: perpage,
            status: status,
            page: page,
            tableFilter: tableFilter,
        },
        success: function (data) {
            $("#table-" + tablename).html(data);
        },
        error: function (data) {
            messageAlert("Terjadi kesalahan saat memuat data", 1);
        },
    });
}

function messageAlert(message, isError = false) {
    if (!message && !isError) {
        var message = "Data berhasil di-update";
    } else if (!message && isError) {
        var message = "Data berhasil tidak dapat di-update";
    }

    if (isError) {
        var alertType = "danger";
        var icon =
            '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';
    } else {
        var alertType = "success";
        var icon =
            '<svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/check</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>';
    }

    let messageAlert =
        '<div class="alert alert-important alert-' +
        alertType +
        ' alert-dismissible" style="display:none" role="alert">' +
        '<div class="d-flex">' +
        icon +
        "<div>" +
        message +
        "</div>" +
        "</div>" +
        "</div>";

    $("#message-alert").html(messageAlert);
    $("#message-alert .alert").fadeIn("slow");

    document.documentElement.scrollTop = 0;

    setTimeout(function () {
        $("#message-alert .alert").fadeOut("slow");
    }, 3000);
}