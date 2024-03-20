<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
    <title>Document</title>
    <style>
        .block {
          position: relative;
          display: flex;
          align-items: center;
          background-repeat: no-repeat;
          background-position: top center;
          background-size: cover;
          color: #fff!important;
          height: 100vh;
          background-image: url('assets/images/bio.jpg');
        }
        .text-bg-primary {
          background-color:  rgba(56, 77, 96, 0.85) !important;
        }
      
      </style>
</head>
<body>

    <body>
        <section class="block py-3 py-md-5 py-xl-8">
          <div class="container">
            <div class="row gy-4 align-items-center">
              <div class="col-12 col-md-6 col-xl-7">
                <div class="d-flex justify-content-center text-bg-primary">
                  <div class="col-12 col-xl-9">
                    <hr class="border-primary-subtle mb-4">
                    <h2 class="h1 mb-4 text-center">Mettez à jour votre numéro de téléphone.</h2>
                    <p class="lead mb-5">Nous avons besoin de votre numéro de téléphone à jour pour vous contacter en cas de besoin et pour vous informer des dernières mises à jour et offres spéciales. Assurez-vous que votre numéro de téléphone est correct et à jour pour ne manquer aucune communication importante de notre part.</p>
                    <div class="text-endx">
                      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                        <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                      </svg>
                    </div>
                    <p>  Prenez quelques secondes pour mettre à jour votre numéro de téléphone dès maintenant afin de ne rien manquer.</p>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-xl-5" >
                <div class="card border-0 rounded-4" style="background-color: #ffffffb1">
                  <div class="card-body p-3 p-md-4 p-xl-5">
                    @if (Session::has('status'))
                    <br>
                    <div class="alert alert-success">
                      {{Session::get('status')}}
                    </div>
                    @endif
                    {{-- @elseif --}}
                    @if (Session::has('danger'))
                    <br>
                    <div class="alert alert-danger">
                      {{Session::get('danger')}}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12 text-center">
                            <img class="img-fluid rounded text-center" loading="lazy" src="assets/images/lkoo-removebg-preview.png" width="350" height="70" alt="BootstrapBrain Logo">
                        <div class="mb-4">
                            <h3>Mettre a jour votre Numero</h3>
                    </div>
                      </div>
                    </div>
                    <form action="{{url('convertnum')}}" method="POST">
                        @csrf
                      <div class="row gy-3 overflow-hidden">
                        <div class="col-12">
                          <div class="row g-1">
                            <div class="form-floating mb-3 col-3">                    
                              {{-- <input type="tel" class="form-control" id="phone" placeholder="+229" readonly>
                              <label for="email" class="form-label">+229</label> --}}           
                               <input type="text" class="form-control pt-2" id="code" value="+229" readonly style="width: 70px">

                            </div>
                            <div class="form-floating mb-3 col-9">
                              <input type="tel" class="form-control" name="number" minlength="8" maxlength="8" pattern="\d{1,8}" id="phone" placeholder="name@example.com" required>
                              <label for="email" class="form-label">Telephone</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button class="btn btn-primary btn-lg" type="submit">Mettre à jour</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </body>


    {{-- <h2>NUM CHANGE</h2>
    <form action="{{url('convertnum')}}" method="post">
        @csrf
        <div class="form-group form-inline">
            <input type="text" class="form-control" id="code" value="+229" readonly style="width: 70px">
            <input type="text" class="form-control" id="number" name="number" minlength="8" maxlength="8" pattern="\d{1,8}" placeholder="entrer votre numero">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form> --}}




   {{-- <script src="{{asset('assets/css/bootstrap.min.js')}}"></script> --}}
   {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
 </body>

</body>
</html>