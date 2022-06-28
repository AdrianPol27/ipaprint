  <!-- Vendor JS -->
  <script src="./vendor/jquery/jquery.min.js"></script>
  <script src="./vendor/popper/popper.min.js"></script>
  <script src="./vendor/bootstrap/bootstrap.min.js"></script>
  <script src="./vendor/datatables/datatables.min.js"></script>
  <script src="./vendor/datatables/datatables.responsive.min.js"></script>
  <script src="./vendor/datatables/responsive.bootstrap5.min.js"></script>
  <script>
    // Data Table Function
    $(document).ready(function() {
      $('#myTable').DataTable( {
        responsive: true
      });
    });
  </script>
</body>
</html>