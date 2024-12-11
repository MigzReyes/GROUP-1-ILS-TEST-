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
  <!--MESSAGE POP UP FOR ONLICK BUTTONS-->
  <script>
    function onclickPopUp (message) {
      alert (message);
    }
  </script>

  <!--DATE TIME-->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const dateTimeInput = document.getElementById("dateTime");

        dateTimeInput.addEventListener("input", function () {
            const now = new Date();
            const selectedDate = new Date(dateTimeInput.value);

            // Check if the selected date is in the past
            if (selectedDate < now) {
                alert("The selected date and time must be in the present or future.");
                dateTimeInput.value = ""; // Clear the input
                return;
            }

            // Check if the time is between 7:00 AM and 10:00 PM
            const selectedHours = selectedDate.getHours();
            if (selectedHours < 7 || selectedHours > 21) {
                alert("Please select a time between 7:00 AM and 10:00 PM.");
                dateTimeInput.value = ""; // Clear the input
                return;
            }

            // Check if the selected time is at least 6 hours ahead
            const sixHoursLater = new Date(now.getTime() + 6 * 60 * 60 * 1000); // Current time + 6 hours
            if (selectedDate < sixHoursLater) {
                alert("Please select a time at least 6 hours from the current time.");
                dateTimeInput.value = ""; // Clear the input
            }
        });
    });
</script>


  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>

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
  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
</body>

</html>