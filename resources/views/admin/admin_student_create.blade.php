<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>

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
                <h2>Add New Student</h2>
            </div>
            <section>
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-12 col-xl-4">

                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body text-center">
                                <div class="mt-3 mb-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                        class="rounded-circle img-fluid" style="width: 100px;" />
                                </div>
                                <div class="mx-4 form-group">
                                    <div class="position-relative">
                                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                                    </div>
                                </div>
                                <div class="mx-4 form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Name"
                                            id="first-name-horizontal-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-4 form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Student ID"
                                            id="first-name-horizontal-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-person-badge"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-4">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="email" class="form-control" placeholder="Email"
                                                id="email-horizontal-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-4">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder="Password"
                                                id="password-horizontal-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-4 form-group">
                                    <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"
                                        style="width: 100%; background-color: #ffffff; border: 1px solid #dce7f1; color:#747d86">
                                        Faculty
                                    </button>
                                    <div class="mx-4 form-group dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Option 1</a>
                                        <a class="dropdown-item" href="#">Option 2</a>
                                        <a class="dropdown-item" href="#">Option 3</a>
                                    </div>
                                </div>
                                <div class="mx-4 form-group">
                                    <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"
                                        style="width: 100%; background-color: #ffffff; border: 1px solid #dce7f1; color:#747d86">
                                        Course
                                    </button>
                                    <div class="mx-4 form-group dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Option 1</a>
                                        <a class="dropdown-item" href="#">Option 2</a>
                                        <a class="dropdown-item" href="#">Option 3</a>
                                    </div>
                                </div>
                            </div>
                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                Reset
                            </button>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    </section>



    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @include('includes.script')


</body>

</html>
