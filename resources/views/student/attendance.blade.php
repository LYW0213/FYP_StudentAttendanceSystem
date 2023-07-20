<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Marking</title>

    @include('includes.style')
</head>

<body>
    <div id="app">
        {{-- Sidebar --}}
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

                {{-- Sidebar --}}
                @include('includes.sidebar_subjectlist')

            </div>
        </div>

        {{-- Content --}}
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h2>Attendance Marking</h2>
            </div>
                <h6 class="t-name">Subject</h6>
                <h4>Subject code + Subject Name </h4>

                <h6 class="t-name">Class</h6>
                <h4>Title</h4>

                <h6 class="t-name">Time</h6>
                <h4>11-2-2023</h4>

                <h6 class="t-name">Venue</h6>
                <h4>B106</h4>

                <h6>Please ensure the following before you proceed:</h6>
                <a>1. You are guide by your lecturer. </a>
                <a>1. You are only marking your own attendance. </a>

        </div>
    </div>
    @include('includes.script')
</body>

</html>
