<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin & Lecturer List</title>

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
                <h2>Add New Lecturer & Admin</h2>
            </div>
            <section>
                <form action="{{ route('admin.adminlecturer_create') }}" method="POST">
                    @csrf
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
                                            <input type="text" class="form-control" placeholder="Name" id="name"
                                                name="name" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mx-4">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="email" class="form-control" placeholder="Email"
                                                    id="email-horizontal-icon" name="email" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex mx-4 form-group ">
                                            <label for="gender" class="mr-2">Gender:</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    value="Male" id="gender-male" required>
                                                <label class="form-check-label" for="gender-male">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    value="Female" id="gender-female" required>
                                                <label class="form-check-label" for="gender-female">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mx-4">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="Password"
                                                    id="password-horizontal-icon" name="password" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mx-4 form-group">
                                        <div class="form-group">
                                            <select class="form-select" aria-label="Default select example"
                                                name="faculty_id">
                                                <option value="" selected disabled>Select a Faculty
                                                </option>
                                                @foreach ($faculties as $faculty)
                                                    <option value="{{ $faculty->id }}">{{ $faculty->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mx-4 form-group">
                                        <div class="form-group">
                                            <select class="form-select" aria-label="Default select example"
                                                name="faculty_id">
                                                <option value="" selected disabled>Select a Role
                                                </option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-center margin-bottom">
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
                </form>
        </div>
        </section>
    </div>
    @include('includes.script')


</body>

</html>
