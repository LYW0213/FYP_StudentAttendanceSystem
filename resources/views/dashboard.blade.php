<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    @include('includes.style')

</head>

<body>
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            @include('includes.sidebar')
        </div>
    </div>


    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h1>NEUC Student Attendance System</h1>
            <h2>
                <span style=" text-decoration: underline;">{{ Auth::user()->name }}</span>, Welcome back!
            </h2>
        </div>


        <div class="row">
            {{-- Admiin --}}
            @if (auth::user()->roles_id == 1)
                {{-- Total Student --}}
                <div class="col-lg-4 col-sm-6 col-12 mb-3">
                    <div class="card">
                        <div class="card-body px-5 py-4-5">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <h2 class="font-bold mb-0">
                                    <?php
                                    $roleID = 3;
                                    $userCount = DB::table('users')
                                        ->where('roles_id', $roleID)
                                        ->count();
                                    if ($userCount > 0) {
                                        echo $userCount;
                                    } else {
                                        echo 'No students';
                                    }
                                    ?>
                                </h2>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h5 class="text-muted font-semibold">
                                    Total Student
                                </h5>
                                <div class="d-grid gap-4">
                                    <a href="{{ route('admin.studentlist') }}">
                                        <button class="btn custom-button rounded-pill custom-long-button"
                                            type="button">More
                                            Info</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12 mb-3">
                    <div class="card">
                        <div class="card-body px-5 py-4-5">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <h2 class="font-bold mb-0">
                                    <?php
                                    $roleID = 2;
                                    $userCount = DB::table('users')
                                        ->where('roles_id', $roleID)
                                        ->count();
                                    if ($userCount > 0) {
                                        echo $userCount;
                                    } else {
                                        echo 'No lecturer';
                                    }
                                    ?>
                                </h2>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h5 class="text-muted font-semibold">
                                    Total Lecturer
                                </h5>
                                <div class="d-grid gap-4">
                                    <a href="{{ route('admin.adminlecturerlist') }}">
                                        <button class="btn custom-button rounded-pill custom-long-button"
                                            type="button">More
                                            Info</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Subject --}}
                <div class="col-lg-4 col-sm-6 col-12 mb-3">
                    <div class="card">
                        <div class="card-body px-5 py-4-5">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <h2 class="font-bold mb-0">
                                    <?php
                                    $subjectCount = DB::table('subjects')->count();
                                    echo $subjectCount;
                                    ?>
                                </h2>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h5 class="text-muted font-semibold">
                                    Subject
                                </h5>
                                <div class="d-grid gap-4">
                                    <a href="{{ route('subjectlist') }}">
                                        <button class="btn custom-button rounded-pill custom-long-button"
                                            type="button">More
                                            Info</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif (auth::user()->roles_id == 2)
                <div class="col-lg-4 col-sm-6 col-12 mb-3">
                    <div class="card">
                        <div class="card-body px-5 py-4-5">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <h2 class="font-bold mb-0">
                                    <?php
                                    $subjectCount = DB::table('subjects')->count();
                                    echo $subjectCount;
                                    ?>
                                </h2>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h5 class="text-muted font-semibold">
                                    Subject
                                </h5>
                                <div class="d-grid gap-4">
                                    <a href="{{ route('subjectlist') }}">
                                        <button class="btn custom-button rounded-pill custom-long-button"
                                            type="button">More
                                            Info</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-4 col-sm-6 col-12 mb-3">
                    <div class="card">
                        <div class="card-body px-5 py-4-5">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <h2 class="font-bold mb-0">
                                    <?php
                                    $subjectCount = DB::table('subjects')->count();
                                    echo $subjectCount;
                                    ?>
                                </h2>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h5 class="text-muted font-semibold">
                                    Subject
                                </h5>
                                <div class="d-grid gap-4">
                                    <a href="{{ route('subjectlist') }}">
                                        <button class="btn custom-button rounded-pill custom-long-button"
                                            type="button">More
                                            Info</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- On-going classes --}}
            {{-- admin --}}
            @if (auth::user()->roles_id == 1)
                <div class="col-lg-4 col-sm-6 col-12 mb-3">
                    <div class="card">
                        <div class="card-body px-5 py-4-5">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <h2 class="font-bold mb-0">
                                    {{ $activeClassesCount }}
                                </h2>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h5 class="text-muted font-semibold">
                                    On-Going Classes
                                </h5>
                                <div class="d-grid gap-4">
                                    <a href="{{ route('subjectlist') }}">
                                        <button class="btn custom-button rounded-pill custom-long-button"
                                            type="button">More
                                            Info</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Lecturer --}}
            @elseif (auth::user()->roles_id == 2)
                <div class="col-lg-4 col-sm-6 col-12 mb-3">
                    <div class="card">
                        <div class="card-body px-5 py-4-5">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <h2 class="font-bold mb-0">
                                    {{ $activeClassesCount }}
                                </h2>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h5 class="text-muted font-semibold">
                                    On-Going Classes
                                </h5>
                                <div class="d-grid gap-4">
                                    <a href="{{ route('subjectlist') }}">
                                        <button class="btn custom-button rounded-pill custom-long-button"
                                            type="button">More
                                            Info</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Student --}}
                {{-- admin --}}
            @else
                <div class="col-lg-4 col-sm-6 col-12 mb-3">
                    <div class="card">
                        <div class="card-body px-5 py-4-5">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <h2 class="font-bold mb-0">
                                    {{ $activeClassesCount }}
                                </h2>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h5 class="text-muted font-semibold">
                                    On-Going Classes
                                </h5>
                                <div class="d-grid gap-4">
                                    <a href="{{ route('subjectlist') }}">
                                        <button class="btn custom-button rounded-pill custom-long-button"
                                            type="button">More
                                            Info</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @include('includes.script')
</body>

</html>
