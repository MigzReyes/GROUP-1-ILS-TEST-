<footer class="footer pt-3  ">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href=".././RamenMatsurikaFrontPage.php" class="nav-link text-muted" target="_blank">Home</a>
                </li>
                <li class="nav-item">
                  <a href=".././RamenMatsurikaMenu.php" class="nav-link text-muted" target="_blank">Menu</a>
                </li>
                <li class="nav-item">
                  <a href=".././RamenMatsurikaAboutUs.php" class="nav-link text-muted" target="_blank">About us</a>
                </li>
              </ul>
            </div>
        </div>
    </div>
</footer>

</main>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>

<!--JS SCRIPT FOR PAGINATION-->
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
  <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
  </script>
  
<!-- SCREENSHOT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    document.getElementById("downloadScreenshot").addEventListener("click", function () {
        const receipt = document.querySelector(".receipt"); // Ensure this class matches your div
        if (!receipt) {
            alert("Receipt element not found!");
            return;
        }
        html2canvas(receipt, { useCORS: true }).then(canvas => {
            const link = document.createElement('a');
            link.download = 'receipt.png'; // Name of the image file
            link.href = canvas.toDataURL(); // Convert to data URL
            link.click(); // Trigger the download
        }).catch(err => {
            console.error("Error generating screenshot:", err);
            alert("Unable to capture receipt. Check the console for details.");
        });
    });
</script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
</body>

</html>