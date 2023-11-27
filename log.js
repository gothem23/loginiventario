let isEditable = false;

function toggleEditable(row) {
  const nombreProducto = row.querySelector(".nombreProducto");
  const precio = row.querySelector(".precio");
  const cantidadUnidades = row.querySelector(".cantidadUnidades");

  isEditable = !isEditable;

  nombreProducto.readOnly = !isEditable;
  precio.readOnly = !isEditable;
  cantidadUnidades.readOnly = !isEditable;

  updateButtonText(row);
}


function cambiarImagen() {
  // Código para cambiar la imagen (sin cambios)
}

function toggleEditableForAll() {
  const tableRows = document.querySelectorAll("#inventory-table tbody tr");
  tableRows.forEach(row => {
    row.querySelector(".modificarButton").onclick = function() {
      toggleEditable(row);
    };
  });
}

function agregarFila() {
  const tableBody = document.getElementById("inventory-table");
  const firstRow = tableBody.getElementsByTagName("tr")[0].cloneNode(true);

  tableBody.appendChild(firstRow);
  toggleEditableForAll();
}

function eliminarFila() {
  const tableBody = document.getElementById("inventory-table");
  const rowCount = tableBody.getElementsByTagName("tr").length;
  if (rowCount > 1) {
    tableBody.removeChild(tableBody.lastChild);
  }
}
