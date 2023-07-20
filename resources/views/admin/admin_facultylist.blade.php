<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty List</title>
    @include('includes.style')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="assets/images/logo/logo.svg" alt="Logo" srcset="">
                            </a>
                        </div>
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2" id="toggle-dark"></div>
                    </div>
                </div>
                @include('includes.sidebar_facultylist')
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h2>Faculty List</h2>
            </div>
            <div class="page-content">
                <section class="section">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="buttons" style="text-align: right;">
                                    <a class="btn btn-primary bg-blue" data-bs-toggle="modal"
                                        data-bs-target="#AddFaculty">Add New</a>
                                </div>
                            </div>
                            <div class="modal fade text-left" id="AddFaculty" tabindex="-1"
                                aria-labelledby="AddFaculty" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="AddFaculty">Add Faculty</h4>
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
                                        <form action="#">
                                            <div class="modal-body">
                                                <label for="text">Faculty Name: </label>
                                                <div class="form-group">
                                                    <input id="text" type="text" placeholder="Faculty name"
                                                        class="form-control">
                                                </div>
                                                <label for="textarea">Description: </label>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="textarea" rows="3" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="table-responsive">
                        <table class="table table-hover bdr">
                            <thead class="bg-blue">
                                <tr>
                                    <th scope="col" class="text-bold-700">id</th>
                                    <th scope="col">Faculty</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($faculties as $faculty)
                                    <tr>
                                        <td class="text-bold-700">{{ $faculty->id }}</td>
                                        <td>{{ $faculty->name }}</td>
                                        <td>{{ $faculty->description }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="mr-2" data-bs-toggle="modal"
                                                    data-bs-target="#EditFaculty ">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="bi bi-pencil-square" viewBox="0 0 16 16"
                                                        style="width: 30px; height: 30px; fill: rgb(0, 140, 255);">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade text-left" id="EditFaculty" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalLabel33"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel33">Edit
                                                                    Faculty</h4>
                                                                <button type="button" class="close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <form action="#">
                                                                <div class="modal-body">
                                                                    <label>Faculty Name:</label>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                    <label>Description:</label>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="#">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-trash3"
                                                        viewBox="0 0 16 16"
                                                        style="width: 29px; height: 29px; fill: red;">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive dataTable-bottom">
                        <nav class="dataTable-pagination">
                            <ul class="dataTable-pagination-list pagination pagination-primary">
                                <li class="active page-item"><a href="#" data-page="1"
                                        class="page-link">1</a></li>
                                <li class="page-item"><a href="#" data-page="2" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" data-page="3" class="page-link">3</a></li>
                                <li class="pager page-item"><a href="#" data-page="2" class="page-link">›</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </section>

            </div>
        </div>
    </div>
    @include('includes.script')
</body>

</html>
