<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    @include('includes.style')

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2" id="toggle-dark">
                        </div>
                    </div>
                </div>
                @include('includes.sidebar_userlist')
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h2>Profile</h2>
            </div>
            @if ($errors->any())
                <div class="alert alert-light-danger color-danger">
                    <i class="bi bi-exclamation-circle"></i> Error:
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <section>
                <form action="{{ route('profile', ['user' => $user]) }}" method="POST">
                    @csrf
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-12 col-xl-4">

                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body text-center">
                                    <div class="mt-3 mb-4">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                            class="rounded-circle img-fluid" style="width: 100px;" />
                                    </div>
                                    <div class="mx-4 form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Name" id="name"
                                                name="name" required value="{{ $user->name }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="mx-4 form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Student ID"
                                                    id="first-name-horizontal-icon" name="studentId"
                                                    value="{{ $user->student->studentId }}" readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-badge"></i>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="mx-4">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="email" class="form-control" placeholder="Email"
                                                    id="email-horizontal-icon" name="email"
                                                    value="{{ $user->email }}" readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex mx-4 form-group ">
                                            <label for="gender" class="mr-2">Gender:</label>
                                            <div>
                                                {{ $user->gender }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mx-4">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="role" class="form-control" placeholder="role"
                                                    name="role" value="{{ $user->role->name }}" readonly>
                                                <div class="form-control-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                        height="20" fill="currentColor" class="bi bi-person-gear"
                                                        viewBox="0 0 16 16" style="width: 20px; height: 20px;">
                                                        <path
                                                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mx-4">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="faculty" class="form-control" placeholder="faculty"
                                                    name="faculty" value="{{ $user->faculty->name }}" readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-collection-fill"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="mx-4">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="faculty" class="form-control" placeholder="faculty"
                                                        name="faculty" value="{{ $user->student->course->name }}"
                                                        readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-collection-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <a href="{{ route('admin.studentlist') }}" class="btn btn-primary2 me-1 mb-1">
                                                Back To Dasboard
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
        </div>
        </section>
    </div>
    @include('includes.script')


</body>

</html>
