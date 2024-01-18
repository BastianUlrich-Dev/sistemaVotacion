$(document).ready(function () {
  cargaInfo("regiones", "#region");
});

$("#region").change(function () {
  var regionId = $(this).val();
  if (regionId !== "") {
    cargaInfo("comunas", "#comuna", regionId);
  } else {
    $("#comuna").html(
      '<option value="" disabled selected>Selecciona una comuna</option>'
    );
  }
});

function cargaInfo(tipo, selectId, regionId = null) {
  $.ajax({
    url: "cargarRegion.php",
    type: "GET",
    dataType: "json",
    data: {
      tipo: tipo,
      regionId: regionId,
    },
    success: function (data) {
      $(selectId).html("");
      $.each(data, function (index, item) {
        var option = $("<option/>", {
          value: item.id,
          text: item.region || item.comuna,
        });
        $(selectId).append(option);
      });
    },
    error: function () {
      console.log("Error en la solicitud Ajax.");
    },
  });
}
