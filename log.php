<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<body style="background-image: url('../dimension_sokkong/back.jpg');">
  <!-- Section: Design Block -->
  <section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
        background-image: url('../dimension_sokkong/cover.jpg');
        height: 380px;
        margin:auto;
        "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -120px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(1px);
        ">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col mx-5">
            <h1 class="fw-bold mb-5 fontkh">ចូលទៅកាន់ផ្ទាំងបច្ចេកទេស</h1>
            <form action="cod_sok.php" method="POST">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error alert alert-danger" role="alert"><?php echo $_GET['error']; ?></p>
            <?php } ?>
              <div class="row">
                <div class="col-lg-6">
                  <div class="row">
                    <div class="col-2"></div>
                      <div class="col-8">
                        
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                          <input type="text" id="form3Example3" name="username" class="form-control" />
                          <label class="form-label" for="form3Example3">Username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                          <input type="password" name="pwd" id="form3Example4" class="form-control" />
                          <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-center mb-4">
                          <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                          <label class="form-check-label" for="form2Example33">
                            Remember me
                          </label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">
                          Login
                        </button>
                    </div>
                    <div class="col-2"></div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 fontkh text-center">
                          <img src="../dimension_sokkong/logo.jpg" alt="Logo" style="width: 80px;">
                          <div class="mt-3">
                            <p>រក្សាសិទ្ធកម្មវិធីដោយ</p>
                          </div>
                          <div class="mt-3">
                            <h6>មជ្ឈមណ្ឌលឆៀកយានយន្តបឹងបែតង - HK Car Inspection Center</h6>
                          </div>
                          <div class="mt-3">
                            <p>@Copyright By</p>
                          </div>
                          <div class="mt-3">
                            <h5>HK Car Inspection Center</h5>
                          </div>
                    </div>
                    <div class="col-2"></div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>