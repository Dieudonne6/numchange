<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="icon"  type="image/png" href="{{asset('assets/images/log1.png')}}">

    <title>Convertisseur de Numéros</title>
    <style>
        .block {
            position: relative;
            display: flex;
            align-items: center;
            background-repeat: no-repeat;
            background-position: top center;
            background-size: cover;
            color: #fff !important;
            height: 100vh;
            background-image: url('assets/images/bio.jpg');
        }

        .text-bg-primary {
            background-color: rgba(56, 77, 96, 0.85) !important;
        }

        .operator-images img {
            width: 70px;
            height: auto;
            margin-right: 10px;
        }
        .copyrigth{
            margin-bottom: 10px !important;
            margin-top: 10px !important;
        }
    </style>
</head>

<body>
    <section class="block py-3 py-md-5 py-xl-8">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <!-- Bloc de texte -->
                    <div class="col-12 col-md-6 col-xl-7 text-bg-primary px-4 py-3 rounded-4">                    
                        <h2 class="h1 mb-4 text-center">Mettez à jour des numéro de téléphone.</h2>
                    <p class="lead mb-4" style="text-align: justify;">
                        Chers utilisateurs, avec le récent changement dans la numérotation des téléphones dans notre
                        pays, passant de 8 chiffres à 10 chiffres, notre application est là pour simplifier cette transition.
                        Nous vous permettons de convertir facilement et rapidement les numéros existants vers le nouveau format à 10 chiffres.
                    </p>
                    <p>Prenez quelques secondes pour mettre à jour votre numéro de téléphone dès maintenant .</p>
                </div>

                <!-- Bloc formulaire et images -->
                <div class="col-12 col-md-6 col-xl-5 px-4 py-3">
                    <div class="card border-0 rounded-4 p-4" style="background-color: #ffffffb1;">
                        @if (Session::has('status'))
                            <div class="alert alert-success">
                                {{ Session::get('status') }}
                            </div>
                        @endif

                        @if (Session::has('danger'))
                            <div class="alert alert-danger">
                                {{ Session::get('danger') }}
                            </div>
                        @endif

                        <div class="text-center mb-4">
                            <img class="img-fluid rounded" src="assets/images/lkoo-removebg-preview.png" width="250" alt="Logo">
                        </div>

                        <form action="{{ route('convert.contacts') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="contacts_file" class="form-label">Téléverser votre fichier de contacts (.vcf):</label>
                            <input type="file" name="contacts_file" id="contacts_file" accept=".csv, .vcf, .xlsx" class="form-control mb-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Convertir</button>
                        </form>

                        <!-- Images des opérateurs GSM -->
                        {{-- <div class="operator-images mt-4 text-center">
                            <img src="assets/images/operator1.png" alt="Operator 1">
                            <img src="assets/images/operator2.png" alt="Operator 2">
                            <img src="assets/images/operator3.png" alt="Operator 3">
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center text-bg-primary d-flex align-items-center justify-content-center">
        <p class="copyrigth">&copy; {{ date('Y') }}C BOX Sarl. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
