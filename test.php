<!DOCTYPE html>
<html>
<head>
  <title>Lector de código de barras</title>
  <script src="https://cdn.jsdelivr.net/npm/barcode-scanner/dist/barcode-scanner.min.js"></script>
</head>
<body>
  <h1>Lector de código de barras</h1>
  <input type="text" id="sku-input" readonly />
  <script>
    // Espera a que se cargue el contenido de la página
    document.addEventListener("DOMContentLoaded", function() {
      // Accede al input text
      var skuInput = document.getElementById("sku-input");

      // Crea una instancia de BarcodeScanner
      var scanner = new BarcodeScanner();

      // Asocia el evento de lectura de código de barras al lector
      scanner.onDetected(function(barcode) {
        var code = barcode.code; // Obtiene el código de barras leído
        skuInput.value = code; // Establece el valor en el input text
      });

      // Inicia la escucha del lector de código de barras
      scanner.start();
    });
  </script>
</body>
</html>
