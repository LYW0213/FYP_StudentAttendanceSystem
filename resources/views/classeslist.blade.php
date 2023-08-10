<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Classes List</title>

    @include('includes.style')

    {{-- QrCode --}}
    <script type="text/javascript" src="{{ asset('jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('qrcode.min.js') }}"></script>
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
                <h2>{{ $subject->subjectCode }} - {{ $subject->subjectName }}</h2>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="page-content">
                <div class="col-12">
                    <div class="row">
                        {{-- Add New Button --}}
                        {{-- Admin --}}
                        <div class="col-12">
                            @if (Auth::user()->roles_id == 1)
                                <div class="buttons" style="text-align: right;">
                                    <a class="btn btn-primary bg-blue" data-bs-toggle="modal"
                                        data-bs-target="#NewSubjectForm">Add New</a>
                                </div>
                            @elseif (Auth::user()->roles_id == 2)
                                <div class="buttons" style="text-align: right;">
                                    <a class="btn btn-primary bg-blue" data-bs-toggle="modal"
                                        data-bs-target="#NewSubjectForm">Add New</a>
                                </div>
                            @endif
                        </div>

                        {{-- Add New Button Popup --}}
                        <div class="modal fade text-left" id="NewSubjectForm" tabindex="-1"
                            aria-labelledby="NewSubjectModal" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="NewSubjectModal">
                                            Add Classes
                                        </h4>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>
                                    {{-- Input Text --}}
                                    <form method="POST" action="{{ route('classescreate', ['subject' => $subject]) }}">
                                        @csrf
                                        @method('POST')
                                        {{-- Title Code --}}
                                        <div class="modal-body">
                                            {{-- Title Code --}}
                                            <label for="text">Title: </label>
                                            <div class="form-group">
                                                <input id="text" type="text" placeholder="Title" name="name"
                                                    class="form-control">
                                            </div>

                                            {{-- Venue and Date --}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="text">Venue: </label>
                                                    <div class="form-group">
                                                        <input id="text" type="text" placeholder="Venue"
                                                            name="venue" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="text">Date: </label>
                                                    <div class="form-group">
                                                        <input id="day" type="date"
                                                            class="day form-control shadow-none rounded-0"
                                                            name="day">
                                                        <small class="day_error fs-5 text-danger"></small>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Start Time and End Time --}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="date">Start Time</label>
                                                    <div class="form-group">
                                                        <input id="start" type="time"
                                                            class="start form-control shadow-none rounded-0"
                                                            name="start">
                                                        <small class="start_error fs-6 text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="time">End Time</label>
                                                    <div class="form-group">
                                                        <input id="end" type="time"
                                                            class="end form-control shadow-none rounded-0"
                                                            name="end">
                                                        <small class="end_error fs-6 text-danger"></small>
                                                    </div>

                                                </div>

                                                {{-- Close & Save --}}
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary bg-blue ms-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">ADD</span>
                                                    </button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Lecturer --}}
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-hover bdr">
                    <thead class="bg-blue">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Venue</th>
                            <th scope="col">Date</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">End Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    {{-- Body of Table --}}
                    <tbody class="bg-white">
                        <?php
                        $num = 1;
                        ?>
                        @foreach ($classes as $class)
                            <tr>
                                <td class="text-bold-700">{{ $num }}</td>
                                <?php
                                $num++;
                                ?>
                                <td>{{ $class->name }}</td>
                                <td>{{ $class->venue }}</td>
                                <td>{{ $class->day }}</td>
                                <td>{{ $class->start }}</td>
                                <td>{{ $class->end }}</td>
                                <td>
                                    <?php
                                    $starttime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $class->day . ' ' . $class->start, '+08:00');
                                    $endtime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $class->day . ' ' . $class->end, '+08:00');

                                    ?>
                                    {{-- Check if the current time is within the start and end times --}}
                                    @if (now() < $starttime)
                                        <span class="badge bg-end">Haven't start</span>
                                    @elseif (now() >= $starttime && now() <= $endtime)
                                        <span class="badge bg-success">Active</span>
                                    @elseif (now() > $endtime)
                                        <span class="badge bg-end">end</span>
                                    @endif
                                </td>
                                <td class="align-items-center justify-content-between">
                                    {{-- QRCode Icon --}}
                                    {{-- Admin --}}
                                    @if (auth::user()->roles_id == 1)
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#QRCode{{ $class->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                style="enable-background:new 0 0 512 512; width: 28px; height: 28px;"
                                                class="bi bi-qr-code" viewBox="0 0 16 16">
                                                <path d="M2 2h2v2H2V2Z" />
                                                <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z" />
                                                <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z" />
                                                <path
                                                    d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z" />
                                                <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z" />
                                            </svg>
                                        </a>
                                        <div class="modal fade text-left" id="QRCode{{ $class->id }}"
                                            tabindex="-1" aria-labelledby="QRCode" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">QR Code</h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    {{-- Display the QR code --}}
                                                    <div class="d-flex justify-content-center align-items-center py-4">
                                                        <div id="qrcode-{{ $class->id }}"
                                                            style="width: 200px; height: 200px;"></div>
                                                    </div>
                                                    <script>
                                                        var qrcode = new QRCode(document.getElementById("qrcode-{{ $class->id }}"), {
                                                            width: 200,
                                                            height: 200,
                                                            text: "{{ route('attendance', ['class' => $class->id, 'password' => $class->password]) }}",
                                                            useSVG: true
                                                        });
                                                    </script>
                                                    <div class="modal-body ">
                                                        <div class="alert" style="padding-left: 15%;">
                                                            <div><label class="qrcode-label">Subject Code</label>
                                                                <h4 class="qrcode-text">{{ $subject->subjectCode }}
                                                                </h4>
                                                            </div>
                                                            <div><label class="qrcode-label">Subject</label>
                                                                <h4 class="qrcode-text">{{ $subject->subjectName }}
                                                                </h4>
                                                            </div>
                                                            <div>
                                                                <label class="qrcode-label">Title</label>
                                                                <h4 class="qrcode-text">{{ $class->name }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Lecturer --}}
                                    @elseif (auth::user()->roles_id == 2)
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#QRCode{{ $class->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                style="enable-background:new 0 0 512 512; width: 28px; height: 28px;"
                                                class="bi bi-qr-code" viewBox="0 0 16 16">
                                                <path d="M2 2h2v2H2V2Z" />
                                                <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z" />
                                                <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z" />
                                                <path
                                                    d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z" />
                                                <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z" />
                                            </svg>
                                        </a>
                                        <div class="modal fade text-left" id="QRCode{{ $class->id }}"
                                            tabindex="-1" aria-labelledby="QRCode" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">QR Code</h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    {{-- Display the QR code --}}
                                                    <div class="d-flex justify-content-center align-items-center py-4">
                                                        <div id="qrcode-{{ $class->id }}"
                                                            style="width: 200px; height: 200px;"></div>
                                                    </div>
                                                    <script>
                                                        var qrcode = new QRCode(document.getElementById("qrcode-{{ $class->id }}"), {
                                                            width: 200,
                                                            height: 200,
                                                            text: "{{ route('attendance', ['class' => $class->id, 'password' => $class->password]) }}",
                                                            useSVG: true
                                                        });
                                                    </script>
                                                    <div class="modal-body ">
                                                        <div class="alert" style="padding-left: 15%;">
                                                            <div><label class="qrcode-label">Subject Code</label>
                                                                <h4 class="qrcode-text">{{ $subject->subjectCode }}
                                                                </h4>
                                                            </div>
                                                            <div><label class="qrcode-label">Subject</label>
                                                                <h4 class="qrcode-text">{{ $subject->subjectName }}
                                                                </h4>
                                                            </div>
                                                            <div>
                                                                <label class="qrcode-label">Title</label>
                                                                <h4 class="qrcode-text">{{ $class->name }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (auth::user()->roles_id == 1)
                                        <a href="{{ route('attendanceview', ['class' => $class->id]) }}">
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                y="0px" viewBox="0 0 512 512"
                                                style="enable-background:new 0 0 512 512; width: 28px; height: 28px;"
                                                xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M359.3,138.6v-28.2c0-2.6-2.1-4.7-4.7-4.7H129.2c-2.6,0-4.7,2.1-4.7,4.7v28.2c0,2.6,2.1,4.7,4.7,4.7h225.5
                                                C357.2,143.3,359.3,141.2,359.3,138.6z M129.2,190.2c-2.6,0-4.7,2.1-4.7,4.7v28.2c0,2.6,2.1,4.7,4.7,4.7h108c2.6,0,4.7-2.1,4.7-4.7
                                                v-28.2c0-2.6-2.1-4.7-4.7-4.7H129.2z M213.7,455.6H77.5V42.3h328.8v202c0,2.6,2.1,4.7,4.7,4.7h32.9c2.6,0,4.7-2.1,4.7-4.7V18.8
                                                c0-10.4-8.4-18.8-18.8-18.8H54C43.6,0,35.2,8.4,35.2,18.8v460.3c0,10.4,8.4,18.8,18.8,18.8h159.7c2.6,0,4.7-2.1,4.7-4.7v-32.9
                                                C218.4,457.7,216.3,455.6,213.7,455.6z M475.4,485.9l-54.8-54.8c13.1-17.3,20.9-38.9,20.9-62.4c0-57.1-46.3-103.3-103.3-103.3
                                                s-103.3,46.3-103.3,103.3s46.3,103.3,103.3,103.3c21,0,40.5-6.3,56.8-17l55.6,55.6c0.9,0.9,2.1,1.4,3.3,1.4s2.4-0.5,3.3-1.4
                                                l18.2-18.2C477.2,490.6,477.2,487.7,475.4,485.9L475.4,485.9z M338.2,434.5c-36.3,0-65.8-29.4-65.8-65.8s29.4-65.8,65.8-65.8
                                                c36.3,0,65.8,29.4,65.8,65.8S374.5,434.5,338.2,434.5z" />
                                                </g>
                                            </svg>
                                        </a>
                                        {{-- Lecturer --}}
                                    @elseif (auth::user()->roles_id == 2)
                                        <a href="{{ route('attendanceview', ['class' => $class->id]) }}">
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                y="0px" viewBox="0 0 512 512"
                                                style="enable-background:new 0 0 512 512; width: 28px; height: 28px;"
                                                xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M359.3,138.6v-28.2c0-2.6-2.1-4.7-4.7-4.7H129.2c-2.6,0-4.7,2.1-4.7,4.7v28.2c0,2.6,2.1,4.7,4.7,4.7h225.5
                                            C357.2,143.3,359.3,141.2,359.3,138.6z M129.2,190.2c-2.6,0-4.7,2.1-4.7,4.7v28.2c0,2.6,2.1,4.7,4.7,4.7h108c2.6,0,4.7-2.1,4.7-4.7
                                            v-28.2c0-2.6-2.1-4.7-4.7-4.7H129.2z M213.7,455.6H77.5V42.3h328.8v202c0,2.6,2.1,4.7,4.7,4.7h32.9c2.6,0,4.7-2.1,4.7-4.7V18.8
                                            c0-10.4-8.4-18.8-18.8-18.8H54C43.6,0,35.2,8.4,35.2,18.8v460.3c0,10.4,8.4,18.8,18.8,18.8h159.7c2.6,0,4.7-2.1,4.7-4.7v-32.9
                                            C218.4,457.7,216.3,455.6,213.7,455.6z M475.4,485.9l-54.8-54.8c13.1-17.3,20.9-38.9,20.9-62.4c0-57.1-46.3-103.3-103.3-103.3
                                            s-103.3,46.3-103.3,103.3s46.3,103.3,103.3,103.3c21,0,40.5-6.3,56.8-17l55.6,55.6c0.9,0.9,2.1,1.4,3.3,1.4s2.4-0.5,3.3-1.4
                                            l18.2-18.2C477.2,490.6,477.2,487.7,475.4,485.9L475.4,485.9z M338.2,434.5c-36.3,0-65.8-29.4-65.8-65.8s29.4-65.8,65.8-65.8
                                            c36.3,0,65.8,29.4,65.8,65.8S374.5,434.5,338.2,434.5z" />
                                                </g>
                                            </svg>
                                        </a>
                                        {{-- student --}}
                                    @else
                                        <a href="{{ route('attendanceview', ['class' => $class->id]) }}">
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                y="0px" viewBox="0 0 512 512"
                                                style="enable-background:new 0 0 512 512; width: 28px; height: 28px;"
                                                xml:space="preserve">
                                                <g>
                                                    <path
                                                        d="M359.3,138.6v-28.2c0-2.6-2.1-4.7-4.7-4.7H129.2c-2.6,0-4.7,2.1-4.7,4.7v28.2c0,2.6,2.1,4.7,4.7,4.7h225.5
                                            C357.2,143.3,359.3,141.2,359.3,138.6z M129.2,190.2c-2.6,0-4.7,2.1-4.7,4.7v28.2c0,2.6,2.1,4.7,4.7,4.7h108c2.6,0,4.7-2.1,4.7-4.7
                                            v-28.2c0-2.6-2.1-4.7-4.7-4.7H129.2z M213.7,455.6H77.5V42.3h328.8v202c0,2.6,2.1,4.7,4.7,4.7h32.9c2.6,0,4.7-2.1,4.7-4.7V18.8
                                            c0-10.4-8.4-18.8-18.8-18.8H54C43.6,0,35.2,8.4,35.2,18.8v460.3c0,10.4,8.4,18.8,18.8,18.8h159.7c2.6,0,4.7-2.1,4.7-4.7v-32.9
                                            C218.4,457.7,216.3,455.6,213.7,455.6z M475.4,485.9l-54.8-54.8c13.1-17.3,20.9-38.9,20.9-62.4c0-57.1-46.3-103.3-103.3-103.3
                                            s-103.3,46.3-103.3,103.3s46.3,103.3,103.3,103.3c21,0,40.5-6.3,56.8-17l55.6,55.6c0.9,0.9,2.1,1.4,3.3,1.4s2.4-0.5,3.3-1.4
                                            l18.2-18.2C477.2,490.6,477.2,487.7,475.4,485.9L475.4,485.9z M338.2,434.5c-36.3,0-65.8-29.4-65.8-65.8s29.4-65.8,65.8-65.8
                                            c36.3,0,65.8,29.4,65.8,65.8S374.5,434.5,338.2,434.5z" />
                                                </g>
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-responsive dataTable-bottom">
                <nav class="dataTable-pagination">
                    <ul class="dataTable-pagination-list pagination pagination-primary">
                        {{ $classes->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @include('includes.script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.3/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>
